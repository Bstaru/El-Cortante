CREATE DEFINER=`root`@`localhost` PROCEDURE `i_noticia`(

IN titulo varchar(70),
IN descri varchar(200),
IN cuerpo varchar (2500),
IN fecha date,
IN aprobado bit(1),
IN idU smallint (5),
IN idS smallint (5)
)
BEGIN

INSERT INTO noticia (titulo,descrip,cuerpo,fechaNoti,aprobado,idUsuario,idSec,activo)
VALUES (titulo, descri,cuerpo,fecha,aprobado,idU,idS,1);

END