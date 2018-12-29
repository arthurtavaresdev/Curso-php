<?php
class User{
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this -> idusuario;
    }

    public function setIdusuario($value){
        $this -> idusuario = $value;
    }

    public function getDeslogin(){
        return $this -> deslogin;
    }

    public function setDeslogin($value){
        $this -> deslogin = $value;
    }

    public function getDessenha(){
        return $this -> dessenha;
    }

    public function setDessenha($value){
        $this -> dessenha = $value;
    }
    
    public function getDtcadastro(){
        return $this -> dtcadastro;
    }

    public function setDtcadastro($value){
        $this -> dtcadastro = $value;
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql -> select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",array(
            ":ID"=> $id
        ));

        if(isset($results[0])){
            $this -> setData($results[0]);
        }
    }

    public function deleteUser(){
        $sql = new Sql();

        $sql -> query("DELETE FROM tb_usuarios WHERE idusuario = :ID",array(
            ":ID" => $this -> getIdusuario()
        ));

        $this-> setIdusuario(0);
        $this-> setDeslogin = ("");
        $this -> setDessenha = ("");
        $this -> setDtcadastro(new DateTime());
    }

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro() -> format("d/m/Y H:i:s")
		));
	}

    public static function getList(){
        $sql = new Sql();
        return $sql -> select('SELECT * FROM tb_usuarios ORDER BY deslogin');
    }

    public static function search($login){
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin;", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

    public function login($login,$password){
        $sql = new Sql();
        $results  = $sql -> select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD",array(
            ":LOGIN" => $login,
            ":PASSWORD" => $password
        ));

        if(count($results) > 0){
            $this -> setData($results[0]);
        }else{
            throw new Exception("O login/senha invalido", 1);
        }
        
    }


    public function setData($row){
        $this -> setIdusuario($row['idusuario']);
        $this -> setDeslogin($row['deslogin']);
        $this -> setDessenha($row['dessenha']);
        $this -> setDtcadastro(new DateTime($row['dtcadastro']));
    }

    public function insert(){
        $sql = new Sql();
        $results = $sql -> select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
            ":LOGIN" => $this -> getDeslogin(), 
            ":PASSWORD" => $this -> getDessenha()
        ));

        
        if(count($results) > 0){
            $this -> setData($results[0]);


        }
    }

    public function __construct($login = "",$password = ""){
        $this -> setDeslogin($login);
        $this -> setDessenha($password);
     
    }

    public function update($login,$password){
        $sql = new Sql();
        $this -> setDeslogin($login);
        $this -> setDessenha($password);

        $sql -> query("UPDATE tb_usuarios SET deslogin = :LOGIN,dessenha = :PASSWORD WHERE idusuario = :ID",array(
            ":LOGIN" => $this -> getDeslogin(), 
            ":PASSWORD" => $this -> getDessenha(),
            ":ID" => $this -> getIdusuario()
        ));

    }
}
    



?>