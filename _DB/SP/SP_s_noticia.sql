CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia`(

IN id smallint (5)
)
BEGIN

SELECT titulo,descrip,cuerpo,fechaNoti,aprobado,idUsuario,idSec,activo
FROM noticia
WHERE idNoti = id;

END