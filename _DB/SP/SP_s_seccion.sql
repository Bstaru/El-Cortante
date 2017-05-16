CREATE DEFINER=`root`@`localhost` PROCEDURE `s_seccion`(

)
BEGIN
	SELECT idSec, nomSec
    FROM seccion;
END