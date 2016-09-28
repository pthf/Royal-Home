SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `royalhome` DEFAULT CHARACTER SET utf8 ;
USE `royalhome` ;

-- -----------------------------------------------------
-- Table `royalhome`.`Estados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Estados` (
  `idEstados` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombreEstado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idEstados`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`Ciudades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Ciudades` (
  `idCiudades` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombreCiudad` VARCHAR(45) NOT NULL ,
  `Estados_idEstados` INT(11) NOT NULL ,
  PRIMARY KEY (`idCiudades`, `Estados_idEstados`) ,
  INDEX `fk_Ciudades_Estados1_idx` (`Estados_idEstados` ASC) ,
  CONSTRAINT `fk_Ciudades_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `royalhome`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`Contactos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Contactos` (
  `idContactos` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `empresa` VARCHAR(45) NOT NULL ,
  `mensaje` TEXT NOT NULL ,
  `fecha` DATETIME NOT NULL ,
  PRIMARY KEY (`idContactos`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`tipoInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`tipoInmobiliaria` (
  `idtipoInmobiliaria` INT(11) NOT NULL AUTO_INCREMENT ,
  `tipoInmobiliaria` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipoInmobiliaria`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`subcategoriaInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`subcategoriaInmobiliaria` (
  `idsubcategoriaInmobiliaria` INT NOT NULL AUTO_INCREMENT ,
  `subcategoriaInmobiliaria` VARCHAR(45) NOT NULL ,
  `tipoInmobiliaria_idtipoInmobiliaria` INT(11) NOT NULL ,
  PRIMARY KEY (`idsubcategoriaInmobiliaria`, `tipoInmobiliaria_idtipoInmobiliaria`) ,
  INDEX `fk_subcategoriaInmobiliaria_tipoInmobiliaria1_idx` (`tipoInmobiliaria_idtipoInmobiliaria` ASC) ,
  CONSTRAINT `fk_subcategoriaInmobiliaria_tipoInmobiliaria1`
    FOREIGN KEY (`tipoInmobiliaria_idtipoInmobiliaria` )
    REFERENCES `royalhome`.`tipoInmobiliaria` (`idtipoInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`Desarrollos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Desarrollos` (
  `idDesarrollos` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombreDesarrollo` VARCHAR(45) NOT NULL ,
  `descripDesarrollo` TEXT NOT NULL ,
  `logoDesarrollo` VARCHAR(45) NOT NULL ,
  `imagenHomeDesarrollo` VARCHAR(45) NOT NULL ,
  `direccionDesarrollo` VARCHAR(300) NOT NULL ,
  `coloniaDesarrollo` VARCHAR(45) NOT NULL ,
  `cpDesarrollo` VARCHAR(45) NOT NULL ,
  `telDesarrollo` VARCHAR(45) NOT NULL ,
  `emailDesarrollo` VARCHAR(45) NOT NULL ,
  `Estados_idEstados` INT(11) NOT NULL ,
  `Ciudades_idCiudades` INT(11) NOT NULL ,
  `tipoInmobiliaria_idtipoInmobiliaria` INT(11) NOT NULL ,
  `subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` INT NOT NULL ,
  PRIMARY KEY (`idDesarrollos`, `Estados_idEstados`, `Ciudades_idCiudades`, `tipoInmobiliaria_idtipoInmobiliaria`, `subcategoriaInmobiliaria_idsubcategoriaInmobiliaria`) ,
  INDEX `fk_Desarrollos_Estados1_idx` (`Estados_idEstados` ASC) ,
  INDEX `fk_Desarrollos_Ciudades1_idx` (`Ciudades_idCiudades` ASC) ,
  INDEX `fk_Desarrollos_tipoInmobiliaria1_idx` (`tipoInmobiliaria_idtipoInmobiliaria` ASC) ,
  INDEX `fk_Desarrollos_subcategoriaInmobiliaria1_idx` (`subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` ASC) ,
  CONSTRAINT `fk_Desarrollos_Ciudades1`
    FOREIGN KEY (`Ciudades_idCiudades` )
    REFERENCES `royalhome`.`Ciudades` (`idCiudades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Desarrollos_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `royalhome`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Desarrollos_tipoInmobiliaria1`
    FOREIGN KEY (`tipoInmobiliaria_idtipoInmobiliaria` )
    REFERENCES `royalhome`.`tipoInmobiliaria` (`idtipoInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Desarrollos_subcategoriaInmobiliaria1`
    FOREIGN KEY (`subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` )
    REFERENCES `royalhome`.`subcategoriaInmobiliaria` (`idsubcategoriaInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`imagenesInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`imagenesInmobiliaria` (
  `idimagenesInmobiliaria` INT(11) NOT NULL AUTO_INCREMENT ,
  `imagenesInmobiliaria` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idimagenesInmobiliaria`) )
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`Desarrollos_has_imagenesInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Desarrollos_has_imagenesInmobiliaria` (
  `Desarrollos_idDesarrollos` INT(11) NOT NULL ,
  `imagenesInmobiliaria_idimagenesInmobiliaria` INT(11) NOT NULL ,
  PRIMARY KEY (`Desarrollos_idDesarrollos`, `imagenesInmobiliaria_idimagenesInmobiliaria`) ,
  INDEX `fk_Desarrollos_has_imagenesInmobiliaria_imagenesInmobiliari_idx` (`imagenesInmobiliaria_idimagenesInmobiliaria` ASC) ,
  INDEX `fk_Desarrollos_has_imagenesInmobiliaria_Desarrollos1_idx` (`Desarrollos_idDesarrollos` ASC) ,
  CONSTRAINT `fk_Desarrollos_has_imagenesInmobiliaria_Desarrollos1`
    FOREIGN KEY (`Desarrollos_idDesarrollos` )
    REFERENCES `royalhome`.`Desarrollos` (`idDesarrollos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Desarrollos_has_imagenesInmobiliaria_imagenesInmobiliaria1`
    FOREIGN KEY (`imagenesInmobiliaria_idimagenesInmobiliaria` )
    REFERENCES `royalhome`.`imagenesInmobiliaria` (`idimagenesInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`tipoOperacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`tipoOperacion` (
  `idtipoOperacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `tipoOperacion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipoOperacion`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`Propiedades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Propiedades` (
  `idPropiedades` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombrePropiedad` VARCHAR(45) NOT NULL ,
  `descripPropiedad` TEXT NOT NULL ,
  `logoPropiedad` VARCHAR(45) NOT NULL ,
  `imagenHomePropiedad` VARCHAR(45) NOT NULL ,
  `direccionPropiedad` VARCHAR(300) NOT NULL ,
  `coloniaPropiedad` VARCHAR(45) NOT NULL ,
  `cpPropiedad` VARCHAR(45) NOT NULL ,
  `telPropiedad` VARCHAR(45) NOT NULL ,
  `emailPropiedad` VARCHAR(45) NOT NULL ,
  `Estados_idEstados` INT(11) NOT NULL ,
  `Ciudades_idCiudades` INT(11) NOT NULL ,
  `tipoOperacion_idtipoOperacion` INT(11) NOT NULL ,
  `tipoInmobiliaria_idtipoInmobiliaria` INT(11) NOT NULL ,
  `subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` INT NOT NULL ,
  PRIMARY KEY (`idPropiedades`, `Estados_idEstados`, `Ciudades_idCiudades`, `tipoOperacion_idtipoOperacion`, `tipoInmobiliaria_idtipoInmobiliaria`, `subcategoriaInmobiliaria_idsubcategoriaInmobiliaria`) ,
  INDEX `fk_Propiedades_Estados1_idx` (`Estados_idEstados` ASC) ,
  INDEX `fk_Propiedades_Ciudades1_idx` (`Ciudades_idCiudades` ASC) ,
  INDEX `fk_Propiedades_tipoOperacion1_idx` (`tipoOperacion_idtipoOperacion` ASC) ,
  INDEX `fk_Propiedades_tipoInmobiliaria1_idx` (`tipoInmobiliaria_idtipoInmobiliaria` ASC) ,
  INDEX `fk_Propiedades_subcategoriaInmobiliaria1_idx` (`subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` ASC) ,
  CONSTRAINT `fk_Propiedades_Ciudades1`
    FOREIGN KEY (`Ciudades_idCiudades` )
    REFERENCES `royalhome`.`Ciudades` (`idCiudades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Propiedades_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `royalhome`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Propiedades_tipoInmobiliaria1`
    FOREIGN KEY (`tipoInmobiliaria_idtipoInmobiliaria` )
    REFERENCES `royalhome`.`tipoInmobiliaria` (`idtipoInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Propiedades_tipoOperacion1`
    FOREIGN KEY (`tipoOperacion_idtipoOperacion` )
    REFERENCES `royalhome`.`tipoOperacion` (`idtipoOperacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Propiedades_subcategoriaInmobiliaria1`
    FOREIGN KEY (`subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` )
    REFERENCES `royalhome`.`subcategoriaInmobiliaria` (`idsubcategoriaInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`Propiedades_has_imagenesInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Propiedades_has_imagenesInmobiliaria` (
  `Propiedades_idPropiedades` INT(11) NOT NULL ,
  `imagenesInmobiliaria_idimagenesInmobiliaria` INT(11) NOT NULL ,
  PRIMARY KEY (`Propiedades_idPropiedades`, `imagenesInmobiliaria_idimagenesInmobiliaria`) ,
  INDEX `fk_imagenesInmobiliaria_has_Propiedades_Propiedades1_idx` (`Propiedades_idPropiedades` ASC) ,
  INDEX `fk_imagenesInmobiliaria_has_Propiedades_imagenesInmobiliari_idx` (`imagenesInmobiliaria_idimagenesInmobiliaria` ASC) ,
  CONSTRAINT `fk_imagenesInmobiliaria_has_Propiedades_Propiedades1`
    FOREIGN KEY (`Propiedades_idPropiedades` )
    REFERENCES `royalhome`.`Propiedades` (`idPropiedades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagenesInmobiliaria_has_Propiedades_imagenesInmobiliaria1`
    FOREIGN KEY (`imagenesInmobiliaria_idimagenesInmobiliaria` )
    REFERENCES `royalhome`.`imagenesInmobiliaria` (`idimagenesInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`Proyectos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Proyectos` (
  `idProyectos` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombreProyecto` VARCHAR(50) NOT NULL ,
  `descripProyecto` TEXT NOT NULL ,
  `logoProyecto` VARCHAR(45) NOT NULL ,
  `imagenHomeProyecto` VARCHAR(45) NOT NULL ,
  `direccionProyecto` VARCHAR(300) NOT NULL ,
  `coloniaProyecto` VARCHAR(45) NOT NULL ,
  `cpProyecto` VARCHAR(45) NOT NULL ,
  `telProyecto` VARCHAR(45) NOT NULL ,
  `emailProyecto` VARCHAR(45) NOT NULL ,
  `Estados_idEstados` INT(11) NOT NULL ,
  `Ciudades_idCiudades` INT(11) NOT NULL ,
  `tipoInmobiliaria_idtipoInmobiliaria` INT(11) NOT NULL ,
  `subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` INT NOT NULL ,
  PRIMARY KEY (`idProyectos`, `Estados_idEstados`, `Ciudades_idCiudades`, `tipoInmobiliaria_idtipoInmobiliaria`, `subcategoriaInmobiliaria_idsubcategoriaInmobiliaria`) ,
  INDEX `fk_Proyectos_Estados1_idx` (`Estados_idEstados` ASC) ,
  INDEX `fk_Proyectos_Ciudades1_idx` (`Ciudades_idCiudades` ASC) ,
  INDEX `fk_Proyectos_tipoInmobiliaria1_idx` (`tipoInmobiliaria_idtipoInmobiliaria` ASC) ,
  INDEX `fk_Proyectos_subcategoriaInmobiliaria1_idx` (`subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` ASC) ,
  CONSTRAINT `fk_Proyectos_Ciudades1`
    FOREIGN KEY (`Ciudades_idCiudades` )
    REFERENCES `royalhome`.`Ciudades` (`idCiudades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `royalhome`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_tipoInmobiliaria1`
    FOREIGN KEY (`tipoInmobiliaria_idtipoInmobiliaria` )
    REFERENCES `royalhome`.`tipoInmobiliaria` (`idtipoInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_subcategoriaInmobiliaria1`
    FOREIGN KEY (`subcategoriaInmobiliaria_idsubcategoriaInmobiliaria` )
    REFERENCES `royalhome`.`subcategoriaInmobiliaria` (`idsubcategoriaInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`Proyectos_has_imagenesInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Proyectos_has_imagenesInmobiliaria` (
  `Proyectos_idProyectos` INT(11) NOT NULL ,
  `imagenesInmobiliaria_idimagenesInmobiliaria` INT(11) NOT NULL ,
  PRIMARY KEY (`Proyectos_idProyectos`, `imagenesInmobiliaria_idimagenesInmobiliaria`) ,
  INDEX `fk_Proyectos_has_imagenesInmobiliaria_imagenesInmobiliaria1_idx` (`imagenesInmobiliaria_idimagenesInmobiliaria` ASC) ,
  INDEX `fk_Proyectos_has_imagenesInmobiliaria_Proyectos1_idx` (`Proyectos_idProyectos` ASC) ,
  CONSTRAINT `fk_Proyectos_has_imagenesInmobiliaria_Proyectos1`
    FOREIGN KEY (`Proyectos_idProyectos` )
    REFERENCES `royalhome`.`Proyectos` (`idProyectos` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_has_imagenesInmobiliaria_imagenesInmobiliaria1`
    FOREIGN KEY (`imagenesInmobiliaria_idimagenesInmobiliaria` )
    REFERENCES `royalhome`.`imagenesInmobiliaria` (`idimagenesInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `royalhome`.`adminuser`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`adminuser` (
  `idAdminUser` INT(11) NOT NULL AUTO_INCREMENT ,
  `adminName` VARCHAR(45) NOT NULL ,
  `adminPassword` VARCHAR(60) NOT NULL ,
  `adminLastConnection` DATETIME NOT NULL ,
  PRIMARY KEY (`idAdminUser`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

USE `royalhome` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
