

CREATE TABLE usuario(

id int auto_increment PRIMARY KEY,
nombres   varchar(100),
apellidos varchar(100),
dni  char(8),
fecha_nacimiento date

)ENGINE=INNODB;


INSERT INTO usuario(nombres,apellidos,dni,fecha_nacimiento)
VALUES
('Luis Augusto','Claudio Ponce','46794282','1990-07-15'),
('Omar','Zea','00004444','1990-05-29');