CREATE DEFINER=`root`@`localhost` PROCEDURE `s_seccion`(
IN id smallint(5)
)
BEGIN
	SELECT nomSec
    FROM seccion
    WHERE idSec = id;
END