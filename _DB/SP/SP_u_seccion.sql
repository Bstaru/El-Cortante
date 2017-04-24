CREATE DEFINER=`root`@`localhost` PROCEDURE `u_seccion`(
IN id smallint(5),
IN nombre varchar(20)
)
BEGIN
UPDATE usuario
	SET nombreSec = nombre
    WHERE idSec = id;
END