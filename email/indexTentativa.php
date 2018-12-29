<!doctype html>
<html lang="pt-br">
  <head>
    <title>E-mail PHP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group row">
              <input type="text" name="name" id="name"  class="form-control col-lg-4" placeholder="Nome">
              <small id="obrigatorio" class="ml-1 text-danger"> * </small>
            </div>

            <div class="form-group row">
              <input type="email" name="email" id="email"  class="form-control col-lg-4" placeholder="E-mail">
              <small id="obrigatorio" class="ml-1 text-danger"> * </small>
            </div>

            <div class="form-group row">
              <input type="text" name="assunto" id="assunto"  class="form-control col-lg-4" placeholder="Assunto">
              <small id="obrigatorio" class="ml-1 text-danger"> * </small>
            </div>

            <div class="form-group row">
              <textarea class="form-control col-lg-4" name="msg" id="msg" placeholder="Mensagem" rows="3"></textarea><small id="obrigatorio" class="ml-1 text-danger"> * </small>
            </div>

            <div class="row">
            <button type="submit" class="btn btn-primary col-lg-2 ">Enviar</button>
            <button type="reset" class="btn btn-secondary ml-1 col-lg-2 ">Resetar</button>
            </div>
        </form>


        <?php
        
            $name = $_POST['name'];
            $email = $_POST['email'];
            $assunto = $_POST['assunto'];
            $msg = $_POST['msg'];


            require_once("vendor/autoload.php");

            //Create a new PHPMailer instance
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->isSMTP();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Tell PHPMailer to use SMTP

            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;

            //Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';

            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6

            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;

            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';

            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "arthurabreu00@gmail.com";

            //Password to use for SMTP authentication
            $mail->Password = "senha";

            //Set who the message is to be sent from
            $mail->SetFrom($email, utf8_decode('Padrão PHPemailer'));

            //Set an alternative reply-to address
            $mail->addReplyTo($email, $name);

            //Set who the message is to be sent to
            $mail->addAddress('arthurabreu00@gmail.com', 'Email - Formulario PHP Mailer Teste');

            //Set the subject line
            $mail->Subject = $assunto;

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $mail->Body = $msg;

            //Attach an image file
            // $mail->addAttachment('images/phpmailer_mini.png');

            //send the message, check for errors
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "E-mail enviando com sucesso!";
            }

        ?>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
