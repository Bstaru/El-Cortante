CREATE DEFINER=`root`@`localhost` PROCEDURE `u_noticia`(

IN id smallint (5),
IN titulo varchar(70),
IN descri varchar(200),
IN cuerpo varchar (2500),
IN fecha date,
IN aprobado bit(1),
IN idU smallint (5),
IN idS smallint (5),
IN activo bit(1)
)
BEGIN

UPDATE noticia
SET titulo =titulo,
	descrip = descri,
    cuerpo = cuerpo,
    fechaNoti = fecha,
    aprobado = aprobado,
    idSec = idS,
    activo = activo1
WHERE idNoti = id and idUsuario = idU;

END