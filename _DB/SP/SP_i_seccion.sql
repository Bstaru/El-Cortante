CREATE DEFINER=`root`@`localhost` PROCEDURE `i_seccion`(
IN nombre varchar(20)
)
BEGIN
INSERT INTO seccion (nomSec)
VALUES (nombre);
END