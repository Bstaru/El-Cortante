
CREATE TABLE `usuario` (
  `idUsuario` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `contra` varchar(255) DEFAULT NULL,
  `nombreU` varchar(50) DEFAULT NULL,
  `AP` varchar(50) DEFAULT NULL,
  `AM` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tel` bigint(20) DEFAULT NULL,
  `fechNac` date DEFAULT NULL,
  `tipoU` enum('admin','reportero','usuario') DEFAULT NULL,
  `activo` bit(1) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE `seccion` (
  `idSec` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nomSec` varchar(20) NOT NULL,
  PRIMARY KEY (`idSec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `noticia` (
  `idNoti` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(70) NOT NULL,
  `descrip` varchar(200) DEFAULT NULL,
  `cuerpo` varchar(2500) DEFAULT NULL,
  `fechaNoti` date NOT NULL,
  `aprobado` bit(1) DEFAULT NULL,
  `idUsuario` smallint(5) unsigned NOT NULL,
  `idSec` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idNoti`),
  KEY `noticia_ibfk_1` (`idUsuario`),
  KEY `noticia_ibfk_2` (`idSec`),
  CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `noticia_ibfk_2` FOREIGN KEY (`idSec`) REFERENCES `seccion` (`idSec`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `media` (
  `idMedia` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(300) DEFAULT NULL,
  `idNoti` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idMedia`),
  KEY `idNoti` (`idNoti`),
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`idNoti`) REFERENCES `noticia` (`idNoti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `megusta` (
  `idLike` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `idNoti` smallint(5) unsigned NOT NULL,
  `idUsuario` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idLike`),
  KEY `megusta_ibfk_1` (`idUsuario`),
  KEY `megusta_ibfk_2` (`idNoti`),
  CONSTRAINT `megusta_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `megusta_ibfk_2` FOREIGN KEY (`idNoti`) REFERENCES `noticia` (`idNoti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `comentario` (
  `idCmt` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `idNoti` smallint(5) unsigned NOT NULL,
  `contenido` varchar(140) NOT NULL,
  `fechaCom` date NOT NULL,
  `idUsuario` smallint(5) unsigned NOT NULL,
  `idReply` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`idCmt`),
  KEY `idReply` (`idReply`),
  KEY `comentario_ibfk_1` (`idUsuario`),
  KEY `comentario_ibfk_2` (`idNoti`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idNoti`) REFERENCES `noticia` (`idNoti`),
  CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`idReply`) REFERENCES `comentario` (`idCmt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



