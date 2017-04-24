CREATE DEFINER=`root`@`localhost` PROCEDURE `i_media`(

IN path varchar (300),
IN idNot smallint(5)
)
BEGIN

INSERT INTO media(path,idNoti)
VALUES (path,idNot);
END