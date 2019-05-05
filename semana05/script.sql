

CREATE TABLE usuario
(

id int auto_increment PRIMARY KEY,
nombres varchar(100),
apellidos varchar(100),
dni  char(8),
usuario varchar(50),
password varchar(200),
dateCreate timestamp DEFAULT current_timestamp

) ENGINE=INNODB


