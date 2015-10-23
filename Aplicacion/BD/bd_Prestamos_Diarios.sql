CREATE TABLE IF NOT EXISTS `prestamos_diarios`.`lector` (
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

CREATE TABLE IF NOT EXISTS `prestamos_diarios`.`diario` (
  `codigo` VARCHAR(6) NOT NULL,
  `fecha_ingreso` DATE NOT NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `prestamos_diarios`.`administrador` (
  `idadmin` VARCHAR(10) NOT NULL,
  `pass` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idadmin`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `prestamos_diarios`.`prestamo` (
  `idprestamo` INT NOT NULL AUTO_INCREMENT,
  `lector_rut` VARCHAR(10) NOT NULL,
  `diario_codigo` VARCHAR(6) NOT NULL,
  `fecha_prestamo` DATE NOT NULL,
  `estado` TINYINT(1) NOT NULL,
  `administrador_idadmin` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idprestamo`, `lector_rut`, `diario_codigo`, `administrador_idadmin`),
  INDEX `fk_prestamo_lector_idx` (`lector_rut` ASC),
  INDEX `fk_prestamo_diario1_idx` (`diario_codigo` ASC),
  INDEX `fk_prestamo_administrador1_idx` (`administrador_idadmin` ASC),
  CONSTRAINT `fk_prestamo_lector`
    FOREIGN KEY (`lector_rut`)
    REFERENCES `prestamos_diarios`.`lector` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_diario1`
    FOREIGN KEY (`diario_codigo`)
    REFERENCES `prestamos_diarios`.`diario` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_administrador1`
    FOREIGN KEY (`administrador_idadmin`)
    REFERENCES `prestamos_diarios`.`administrador` (`idadmin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;
