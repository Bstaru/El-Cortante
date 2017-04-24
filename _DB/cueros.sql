use elcortante
DELIMITER //
create procedure d_usuario(
IN id smallint(5)
)
BEGIN

UPDATE usuario
SET activo = 0
WHERE idMedia = id;
END
//

    call d_usuario (7)

