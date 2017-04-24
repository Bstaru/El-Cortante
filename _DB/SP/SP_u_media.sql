CREATE DEFINER=`root`@`localhost` PROCEDURE `u_media`(
IN id smallint(5),
IN path varchar (300),
IN idNot smallint(5)
)
BEGIN

UPDATE media
SET path = path, idNoti = idNot
WHERE idMedia = id;
END