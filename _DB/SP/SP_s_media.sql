CREATE DEFINER=`root`@`localhost` PROCEDURE `s_media`(
IN id smallint(5)
)
BEGIN

SELECT (path,idNoti)
FROM media
WHERE idMedia = id;
END