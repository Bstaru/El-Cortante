CREATE DEFINER=`root`@`localhost` PROCEDURE `i_usuario`(
	IN con varchar(255),
	IN nombre varchar(50),
    IN ApP varchar(50),
    IN ApM varchar(50),
    IN corr varchar(30),
    IN telef bigint(20),
    IN fecha date,
    IN tipo enum('admin','reportero','usuario')
)
BEGIN
INSERT INTO usuario (contra,nombreU,AP,AM,email,tel,fechNac,tipoU,activo)
VALUES (MD5(con),nombre,ApP,ApM,corr,telef,fecha,tipo,1);
END