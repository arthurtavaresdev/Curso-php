-- CREATE database dbphp7;
use dbphp7;

CREATE TABLE tb_usuarios(
	idusuario INT NOT NULL auto_increment PRIMARY KEY,
    deslogin VARCHAR(64) NOT NULL,
    dessenha VARCHAR(256) NOT NULL,
    dtcadastro TIMESTAMP NOT NULL DEFAULT current_timestamp()
);

INSERT INTO tb_usuarios (deslogin,dessenha) VALUES ('arthurabreu00','hoje2010');

SELECT * FROM tb_usuarios;

UPDATE tb_usuarios SET dessenha = '123456' WHERE idusuario = 1;
	
DELETE FROM tb_usuarios WHERE idusuario = 1;
