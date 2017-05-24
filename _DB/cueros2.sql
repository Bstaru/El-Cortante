
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_busqueda_general`(
	IN dato varchar(100)
)
BEGIN
SELECT idUsuario,AP,AM,idNoti,titulo,descrip,activo FROM v_busqueda

WHERE nombreU LIKE CONCAT('%', dato ,'%') OR
	  AP LIKE CONCAT('%', dato ,'%')OR
	  AM LIKE CONCAT('%', dato ,'%') or
      titulo LIKE CONCAT('%', dato ,'%') OR
	  descrip LIKE CONCAT('%', dato ,'%')
      AND activo = 1;
END$$
DELIMITER ;

