CREATE DEFINER=`root`@`localhost` PROCEDURE `d_usuario`(
IN id smallint(5)
)
BEGIN

UPDATE usuario
SET activo = 0
WHERE idUsuario = id;
END