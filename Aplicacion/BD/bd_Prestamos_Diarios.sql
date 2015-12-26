CREATE TABLE IF NOT EXISTS `prestamos_diarios`.`usuario` (
  `rut` VARCHAR(10) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `sexo` VARCHAR(10) NOT NULL,
  `fnac` DATE NOT NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` INT(11) NOT NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`rut`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `prestamos_diarios`.`lote_diario` (
  `codigo` VARCHAR(6) NOT NULL,
  `fecha_ingreso` DATE NOT NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `prestamos_diarios`.`admin` (
  `idadmin` VARCHAR(10) NOT NULL,
  `pass` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idadmin`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `prestamos_diarios`.`prestamo` (
  `idprestamo` INT NOT NULL AUTO_INCREMENT,
  `usuario_rut` VARCHAR(10) NOT NULL,
  `lote_diario_codigo` VARCHAR(6) NOT NULL,
  `fecha_prestamo` DATE NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `admin_idadmin` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idprestamo`, `usuario_rut`, `lote_diario_codigo`, `admin_idadmin`),
  INDEX `fk_prestamo_usuario_idx` (`usuario_rut` ASC),
  INDEX `fk_prestamo_lote_diario1_idx` (`lote_diario_codigo` ASC),
  INDEX `fk_prestamo_admin1_idx` (`admin_idadmin` ASC),
  CONSTRAINT `fk_prestamo_usuario`
    FOREIGN KEY (`usuario_rut`)
    REFERENCES `prestamos_diarios`.`usuario` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_lote_diario1`
    FOREIGN KEY (`lote_diario_codigo`)
    REFERENCES `prestamos_diarios`.`lote_diario` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_admin1`
    FOREIGN KEY (`admin_idadmin`)
    REFERENCES `prestamos_diarios`.`admin` (`idadmin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;