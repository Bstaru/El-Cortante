CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `elcortante`.`v_busqueda` AS select `u`.`idUsuario` AS `idUsuario`,`u`.`nombreU` AS `nombreU`,`u`.`AP` AS `AP`,`u`.`AM` AS `AM`,`u`.`imagen` AS `imagen`,`u`.`tipoU` AS `tipoU`,`n`.`idNoti` AS `idNoti`,`n`.`titulo` AS `titulo`,`n`.`descrip` AS `descrip`,`n`.`fechaNoti` AS `fechaNoti`,`n`.`activo` AS `activo` from (`elcortante`.`usuario` `u` join `elcortante`.`noticia` `n` on((`n`.`idUsuario` = `u`.`idUsuario`)));

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `elcortante`.`v_noticias` AS select `n`.`idNoti` AS `idNoti`,`n`.`titulo` AS `titulo`,`n`.`descrip` AS `descrip`,concat(`u`.`nombreU`,' ',`u`.`AP`,' ',`u`.`AM`) AS `NombreUsuario`,`n`.`fechaNoti` AS `fechaNoti`,`n`.`aprobado` AS `aprobado`,`s`.`nomSec` AS `nomSec`,`n`.`idSec` AS `idSec`,`n`.`activo` AS `activo` from ((`elcortante`.`noticia` `n` left join `elcortante`.`usuario` `u` on((`n`.`idUsuario` = `u`.`idUsuario`))) left join `elcortante`.`seccion` `s` on((`s`.`idSec` = `n`.`idSec`))) where (`n`.`aprobado` = 1) order by `n`.`fechaNoti` desc;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `elcortante`.`v_noticiasno` AS select `n`.`idNoti` AS `idNoti`,`n`.`titulo` AS `titulo`,concat(`u`.`nombreU`,' ',`u`.`AP`,' ',`u`.`AM`) AS `NombreUsuario`,`n`.`fechaNoti` AS `fechaNoti`,`n`.`aprobado` AS `aprobado`,`s`.`nomSec` AS `nomSec`,`n`.`activo` AS `activo` from ((`elcortante`.`noticia` `n` left join `elcortante`.`usuario` `u` on((`n`.`idUsuario` = `u`.`idUsuario`))) left join `elcortante`.`seccion` `s` on((`s`.`idSec` = `n`.`idSec`))) where (`n`.`aprobado` = 0);

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `elcortante`.`v_secciones` AS select `elcortante`.`seccion`.`idSec` AS `idSec`,`elcortante`.`seccion`.`nomSec` AS `nomSec` from `elcortante`.`seccion`;

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

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `i_comentario`(

IN idNot smallint(5),
IN cont varchar(140),
IN idU smallint(5)
)
BEGIN

	INSERT INTO comentario(idNoti,contenido, fechaCom, idUsuario)
	VALUES (idNot,cont,CURDATE(),idU);
	END$$
DELIMITER ;

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `i_megusta`(

IN idNot smallint(5),
IN idU smallint(5)
)
BEGIN

	INSERT INTO megusta(idNoti,idUsuario)
	VALUES (idNot,idU);
	END$$
DELIMITER ;

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `i_seccion`(
IN nombre varchar(20)
)
BEGIN
	INSERT INTO seccion (nomSec)
	VALUES (UPPER(nombre));
	END$$
DELIMITER ;

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
    IN pic mediumblob
)
BEGIN
		INSERT INTO usuario (contra,nombreU,AP,AM,email,tel,fechNac,tipoU,activo,imagen)
		VALUES (MD5(con),nombre,ApP,ApM,corr,telef,fecha,tipo,1,pic);
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_busqueda_fecha`(
	IN dato varchar(100)
)
BEGIN

SELECT 	idNoti,
		titulo, 
        descrip,
        fechaNoti
FROM noticia

WHERE fechaNoti LIKE CONCAT('%', dato ,'%')
      AND activo = 1;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_busqueda_general`(
	IN dato varchar(100)
)
BEGIN
SELECT idUsuario,nombreU,AP,AM,idNoti,titulo,descrip,activo FROM v_busqueda

WHERE nombreU LIKE CONCAT('%', dato ,'%') OR
	  AP LIKE CONCAT('%', dato ,'%')OR
	  AM LIKE CONCAT('%', dato ,'%') or
      titulo LIKE CONCAT('%', dato ,'%') OR
	  descrip LIKE CONCAT('%', dato ,'%')
      AND activo = 1;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_busqueda_noticia`(
	IN dato varchar(100)
)
BEGIN

SELECT 	idNoti,
		titulo, 
        descrip,
        fechaNoti
FROM noticia

WHERE titulo LIKE CONCAT('%', dato ,'%') OR
	  descrip LIKE CONCAT('%', dato ,'%')
      AND activo = 1;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_busqueda_usuario`(
	IN dato varchar(100)
)
BEGIN

SELECT 	idUsuario,
		nombreU, 
        AP, 
        AM,
		imagen,
        tipoU

FROM usuario

WHERE nombreU LIKE CONCAT('%', dato ,'%') OR
	  AP LIKE CONCAT('%', dato ,'%')OR
	  AM LIKE CONCAT('%', dato ,'%');
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_media_img`(

IN id smallint (5)
)
BEGIN
SELECT path,idNoti
	FROM media
	WHERE idNoti = id AND path LIKE('%.jpg') OR path LIKE('%.png') OR path LIKE('%.gif');
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_comentario`(
IN id smallint(5)
)
BEGIN
	SELECT c.idCmt, c.idNoti, c.contenido, c.fechaCom,
	   concat(u.nombreU, ' ', u.AP, ' ', u.AM) as NombreUsuario,
       u.imagen
	FROM comentario c
	INNER JOIN usuario u
	ON u.idUsuario = c.idUsuario
    WHERE idNoti = id
    
    ORDER BY  c.fechaCom DESC;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_media_video`(
IN id smallint(5)
)
BEGIN

	SELECT path,idNoti
	FROM media
	WHERE idNoti = id AND path LIKE('%.mp4');
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_megusta_usuario`(
IN id smallint(5)
)
BEGIN
	SELECT  n.idNoti,n.titulo

	FROM megusta mg
	INNER JOIN usuario u
	ON u.idUsuario = mg.idUsuario
    INNER JOIN noticia n
    ON n.idNoti = mg.idNoti
    
    WHERE u.idUsuario = id;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_megusta`(
IN id smallint(5)
)
BEGIN
	SELECT COUNT(mg.idNoti)
       
	FROM megusta mg
	INNER JOIN usuario u
	ON u.idUsuario = mg.idUsuario
    
    WHERE idNoti = id;
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
			date_format(n.fechaNoti,'%W %d de %M, %Y'),
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia_no`(

)
BEGIN

SELECT idNoti,titulo,NombreUsuario,fechaNoti,aprobado,nomSec,activo 
FROM v_noticiasno;

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
			idNoti,
			titulo,
			descrip,
			NombreUsuario,
			fechaNoti,
            aprobado, 
            nomSec,
            idSec,
            activo
    
	FROM v_noticias;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia_usuario_no`(

IN id smallint (5)
)
BEGIN

	SELECT titulo,descrip,fechaNoti,aprobado,activo, idNoti
	FROM noticia
	WHERE idUsuario = id AND aprobado = 0;

	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_noticia_usuario_si`(

IN id smallint (5)
)
BEGIN

	SELECT titulo,descrip,fechaNoti,aprobado,activo, idNoti
	FROM noticia
	WHERE idUsuario = id AND aprobado = 1;

	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_seccion`(

)
BEGIN
SELECT idSec, nomSec FROM v_secciones;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_usuario`(
	IN id smallint(5)
)
BEGIN
		SELECT nombreU,AP,AM,email,tel,fechNac,imagen
		FROM usuario
		WHERE idUsuario = id;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_usuario_bye`()
BEGIN
	SELECT idUsuario,concat(nombreU, ' ', AP, ' ', AM),imagen,tipoU
	FROM usuario
	WHERE tipoU != 'admin' AND activo = 1;
	END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `s_usuario_login`(
	IN pass varchar(255),
    IN corr varchar (30)
)
BEGIN
		SELECT idUsuario,contra,nombreU,AP,AM,email,tel,fechNac,tipoU,activo,imagen
		FROM usuario
		WHERE contra = MD5(pass) AND email = corr AND  activo = 1;
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

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `u_usuario`(
	IN id smallint(5),
	IN nombre varchar(50),
    IN ApP varchar(50),
    IN ApM varchar(50),
    IN telef bigint(20),
    IN fecha date,
    IN imagen mediumblob
)
BEGIN
    	UPDATE usuario
    
			SET nombreU = nombre,
				AP = ApP,
				AM = ApM,
				tel = telef,
				fechNac = fecha,
				imagen = imagen
				WHERE idUsuario = id;
		END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `u_usuario_bye`(
	IN id smallint(5)
)
BEGIN
    	UPDATE usuario
		SET		activo = 0
        WHERE idUsuario = id;
		END$$
DELIMITER ;
