USE elcortante

/*------------------------------------------------------------------------------USUARIO-------------*/ 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `i_usuario`(
	IN con varchar(255),
	IN nombre varchar(50),
    IN ApP varchar(50),
    IN ApM varchar(50),
    IN corr varchar(30),
    IN telef bigint(20),
    IN fecha date,
    IN tipo enum('admin','reportero','usuario'),
    IN pic varchar(255)
)
BEGIN
		INSERT INTO usuario (contra,nombreU,AP,AM,email,tel,fechNac,tipoU,activo,imagen)
		VALUES (MD5(con),nombre,ApP,ApM,corr,telef,fecha,tipo,1,pic);
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_usuario`(
	IN id smallint(5)
)
BEGIN
		SELECT contra,nombreU,AP,AM,email,tel,fechNac,tipoU,imagen
		FROM usuario
		WHERE idUsuario = id;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_usuario_login`(
	IN pass varchar(255),
    IN corr varchar (30)
)
BEGIN
		SELECT idUsuario,contra,nombreU,AP,AM,email,tel,fechNac,tipoU,activo
		FROM usuario
		WHERE contra = MD5(pass) AND email = corr AND  activo = 1;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `u_usuario`(
	IN id smallint(5),
	IN nombre varchar(50),
    IN ApP varchar(50),
    IN ApM varchar(50),
    IN telef bigint(20),
    IN fecha date,
    IN activo bit(1),
    IN imagen blob
)
BEGIN
    	UPDATE usuario
    
			SET nombreU = nombre,
				AP = ApP,
				AM = ApM,
				tel = telef,
				fechNac = fecha,
				activo = activo,
				imagen = imagen
				WHERE idUsuario = id;
		END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `d_usuario`(
IN id smallint(5)
)
BEGIN
	UPDATE usuario
	SET activo = 0
	WHERE idUsuario = id;
	END$$
DELIMITER ;

/*------------------------------------------------------------------------------NOTICIA-------------*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `i_noticia`(

IN titulo varchar(70),
IN descri varchar(200),
IN cuerpo varchar (2500),
IN idU smallint (5),
IN idS smallint (5)
)
BEGIN

		INSERT INTO noticia (titulo,descrip,cuerpo,fechaNoti,aprobado,idUsuario,idSec,activo)
		VALUES (titulo, descri,cuerpo,CURDATE(),0,idU,idS,1);

	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia_usuario`(

IN id smallint (5)
)
BEGIN

	SELECT idNoti,descrip,cuerpo,fechaNoti,aprobado,idUsuario,idSec,activo
	FROM noticia
	WHERE idUsuario = id;

	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia`(

IN id smallint (5)
)
BEGIN
	SET lc_time_names = 'es_MX';
	SELECT 		
			n.idNoti,
			n.titulo,
			n.descrip,
			concat(u.nombreU, ' ', u.AP, ' ', u.AM) as NombreUsuario,
			date_format(n.fechaNoti,'%W %d de %M,%Y'),
            n.cuerpo,
            n.aprobado, 
            n.activo
    
	FROM noticia n
    LEFT JOIN usuario u
    ON n.idUsuario = u.idUsuario
    LEFT JOIN seccion s
    ON s.idSec = n.idSec
    
	WHERE n.aprobado = 1 AND n.idNoti = id
    
	ORDER BY n.fechaNoti DESC;
 
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia_sec`(

IN id smallint (5)
)
BEGIN
	SELECT 		
			n.idNoti,
			n.titulo,
			n.descrip,
			concat(u.nombreU, ' ', u.AP, ' ', u.AM) as NombreUsuario,
			n.fechaNoti,
            n.aprobado, 
            s.nomSec, 
            n.activo
    
	FROM noticia n
    LEFT JOIN usuario u
    ON n.idUsuario = u.idUsuario
    LEFT JOIN seccion s
    ON s.idSec = n.idSec
    
	WHERE n.aprobado = 1 AND n.idSec = id
    
	ORDER BY n.fechaNoti DESC;
 
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia_si`(

)
BEGIN
SELECT 		
			n.idNoti,
			n.titulo,
			n.descrip,
			concat(u.nombreU, ' ', u.AP, ' ', u.AM) as NombreUsuario,
			n.fechaNoti,
            n.aprobado, 
            s.nomSec, 
            n.activo
    
	FROM noticia n
    LEFT JOIN usuario u
    ON n.idUsuario = u.idUsuario
    LEFT JOIN seccion s
    ON s.idSec = n.idSec
    
	WHERE n.aprobado = 1
    
	ORDER BY n.fechaNoti DESC;

	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia_no`(

)
BEGIN

	SELECT n.titulo,
			concat(u.nombreU, ' ', u.AP, ' ', u.AM) as NombreUsuario,
			n.fechaNoti,
            n.aprobado, 
            s.nomSec, 
            n.activo
    
	FROM noticia n
    LEFT JOIN usuario u
    ON n.idUsuario = u.idUsuario
    LEFT JOIN seccion s
    ON s.idSec = n.idSec
    
	WHERE n.aprobado = 0;

	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `u_noticia`(

IN id smallint (5),
IN titulo varchar(70),
IN descri varchar(200),
IN cuerpo varchar (2500),
IN fecha date,
IN idU smallint (5),
IN idS smallint (5),
IN activo bit(1)
)
BEGIN
	UPDATE noticia
	SET titulo =titulo,
		descrip = descri,
		cuerpo = cuerpo,
		fechaNoti = fecha,
		idSec = idS,
		activo = activo
	WHERE idNoti = id and idUsuario = idU;

	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `u_noticia_si`(

IN id smallint (5)
)
BEGIN
	UPDATE noticia
	SET aprobado = 1
	WHERE idNoti = id;

	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `d_noticia`(
IN id smallint(5)
)
BEGIN

	UPDATE noticia
	SET activo = 0
	WHERE idNoti = id;
	END$$
DELIMITER ;

/*------------------------------------------------------------------------------SECCION-------------*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `i_seccion`(
IN nombre varchar(20)
)
BEGIN
	INSERT INTO seccion (nomSec)
	VALUES (nombre);
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_seccion`(

)
BEGIN
		SELECT idSec, nomSec
		FROM seccion;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `u_seccion`(
IN id smallint(5),
IN nombre varchar(20)
)
BEGIN
	UPDATE usuario
		SET nombreSec = nombre
		WHERE idSec = id;
	END$$
DELIMITER ;

/*------------------------------------------------------------------------------MEDIA-------------*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `i_media`(

IN path varchar (300),
IN idNot smallint(5)
)
BEGIN

	INSERT INTO media(path,idNoti)
	VALUES (path,idNot);
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_media`(
IN id smallint(5)
)
BEGIN

	SELECT path,idNoti
	FROM media
	WHERE idMedia = id;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `u_media`(
IN id smallint(5),
IN path varchar (300),
IN idNot smallint(5)
)
BEGIN

	UPDATE media
	SET path = path, idNoti = idNot
	WHERE idMedia = id;
	END$$
DELIMITER ;





