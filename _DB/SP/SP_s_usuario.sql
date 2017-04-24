CREATE DEFINER=`root`@`localhost` PROCEDURE `s_usuario`(
	IN id smallint(5)
)
BEGIN
SELECT contra,nombreU,AP,AM,email,tel,fechNac,tipoU,activo
FROM usuario
WHERE idUsuario = id;
END