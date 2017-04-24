CREATE DEFINER=`root`@`localhost` PROCEDURE `d_noticia`(
IN id smallint(5)
)
BEGIN

UPDATE noticia
SET activo = 0
WHERE idNoti = id;
END