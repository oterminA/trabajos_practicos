CREATE TABLE `usuario` (
  `idusuario` BIGINT(10) NOT NULL AUTO_INCREMENT,
  `usnombre` VARCHAR(50) NOT NULL,
  `uspass` VARCHAR(255) NOT NULL, 
  `usmail` VARCHAR(50) NOT NULL,
  `usdeshabilitado` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `rol` (
  `idrol` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `roldescripcion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `usuariorol` (
  `idusuariorol` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `idrol` BIGINT(20) NOT NULL,
  `idusuario` BIGINT(10) NOT NULL,
  PRIMARY KEY (`idusuariorol`),
  FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
