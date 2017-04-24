CREATE DEFINER=`root`@`localhost` PROCEDURE `u_usuario`(
	IN id smallint(5),
	IN con varchar(255),
	IN nombre varchar(50),
    IN ApP varchar(50),
    IN ApM varchar(50),
    IN corr varchar(30),
    IN telef bigint(20),
    IN fecha date,
    IN tipo enum('admin','reportero','usuario'),
    IN activo bit(1)
)
BEGIN
	UPDATE usuario
	SET contra = MD5(con),
		nombreU = nombre,
		AP =ApP,
		AM =ApM,
		email = corr,
		tel = telef,
		fechNac = fecha,
		tipoU = tipo,
        activo = activo
		WHERE idUsuario = id;
END