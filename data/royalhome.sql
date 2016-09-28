SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `royalhome` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `royalhome` ;

-- -----------------------------------------------------
-- Table `royalhome`.`tipoInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`tipoInmobiliaria` (
  `idtipoInmobiliaria` INT NOT NULL AUTO_INCREMENT ,
  `tipoInmobiliaria` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipoInmobiliaria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`tipoOperacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`tipoOperacion` (
  `idtipoOperacion` INT NOT NULL AUTO_INCREMENT ,
  `tipoOperacion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipoOperacion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`Estados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Estados` (
  `idEstados` INT NOT NULL AUTO_INCREMENT ,
  `nombreEstado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idEstados`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`Ciudades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Ciudades` (
  `idCiudades` INT NOT NULL AUTO_INCREMENT ,
  `nombreCiudad` VARCHAR(45) NOT NULL ,
  `Estados_idEstados` INT NOT NULL ,
  PRIMARY KEY (`idCiudades`, `Estados_idEstados`) ,
  INDEX `fk_Ciudades_Estados1_idx` (`Estados_idEstados` ASC) ,
  CONSTRAINT `fk_Ciudades_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `royalhome`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`Proyectos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Proyectos` (
  `idProyectos` INT NOT NULL AUTO_INCREMENT ,
  `nombreProyecto` VARCHAR(50) NOT NULL ,
  `descripProyecto` TEXT NOT NULL ,
  `logoProyecto` VARCHAR(45) NOT NULL ,
  `Estados_idEstados` INT NOT NULL ,
  `Ciudades_idCiudades` INT NOT NULL ,
  `tipoOperacion_idtipoOperacion` INT NOT NULL ,
  `tipoInmobiliaria_idtipoInmobiliaria` INT NOT NULL ,
  PRIMARY KEY (`idProyectos`, `Estados_idEstados`, `Ciudades_idCiudades`, `tipoOperacion_idtipoOperacion`, `tipoInmobiliaria_idtipoInmobiliaria`) ,
  INDEX `fk_Proyectos_Estados1_idx` (`Estados_idEstados` ASC) ,
  INDEX `fk_Proyectos_Ciudades1_idx` (`Ciudades_idCiudades` ASC) ,
  INDEX `fk_Proyectos_tipoOperacion1_idx` (`tipoOperacion_idtipoOperacion` ASC) ,
  INDEX `fk_Proyectos_tipoInmobiliaria1_idx` (`tipoInmobiliaria_idtipoInmobiliaria` ASC) ,
  CONSTRAINT `fk_Proyectos_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `royalhome`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_Ciudades1`
    FOREIGN KEY (`Ciudades_idCiudades` )
    REFERENCES `royalhome`.`Ciudades` (`idCiudades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_tipoOperacion1`
    FOREIGN KEY (`tipoOperacion_idtipoOperacion` )
    REFERENCES `royalhome`.`tipoOperacion` (`idtipoOperacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proyectos_tipoInmobiliaria1`
    FOREIGN KEY (`tipoInmobiliaria_idtipoInmobiliaria` )
    REFERENCES `royalhome`.`tipoInmobiliaria` (`idtipoInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`Desarrollos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Desarrollos` (
  `idDesarrollos` INT NOT NULL AUTO_INCREMENT ,
  `nombreDesarrollo` VARCHAR(45) NOT NULL ,
  `descripDesarrollo` TEXT NOT NULL ,
  `logoDesarrollo` VARCHAR(45) NOT NULL ,
  `Estados_idEstados` INT NOT NULL ,
  `Ciudades_idCiudades` INT NOT NULL ,
  `tipoOperacion_idtipoOperacion` INT NOT NULL ,
  `tipoInmobiliaria_idtipoInmobiliaria` INT NOT NULL ,
  PRIMARY KEY (`idDesarrollos`, `Estados_idEstados`, `Ciudades_idCiudades`, `tipoOperacion_idtipoOperacion`, `tipoInmobiliaria_idtipoInmobiliaria`) ,
  INDEX `fk_Desarrollos_Estados1_idx` (`Estados_idEstados` ASC) ,
  INDEX `fk_Desarrollos_Ciudades1_idx` (`Ciudades_idCiudades` ASC) ,
  INDEX `fk_Desarrollos_tipoOperacion1_idx` (`tipoOperacion_idtipoOperacion` ASC) ,
  INDEX `fk_Desarrollos_tipoInmobiliaria1_idx` (`tipoInmobiliaria_idtipoInmobiliaria` ASC) ,
  CONSTRAINT `fk_Desarrollos_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `royalhome`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Desarrollos_Ciudades1`
    FOREIGN KEY (`Ciudades_idCiudades` )
    REFERENCES `royalhome`.`Ciudades` (`idCiudades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Desarrollos_tipoOperacion1`
    FOREIGN KEY (`tipoOperacion_idtipoOperacion` )
    REFERENCES `royalhome`.`tipoOperacion` (`idtipoOperacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Desarrollos_tipoInmobiliaria1`
    FOREIGN KEY (`tipoInmobiliaria_idtipoInmobiliaria` )
    REFERENCES `royalhome`.`tipoInmobiliaria` (`idtipoInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`Propiedades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Propiedades` (
  `idPropiedades` INT NOT NULL AUTO_INCREMENT ,
  `nombrePropiedad` VARCHAR(45) NOT NULL ,
  `descripPropiedad` TEXT NOT NULL ,
  `logoPropiedad` VARCHAR(45) NOT NULL ,
  `Estados_idEstados` INT NOT NULL ,
  `Ciudades_idCiudades` INT NOT NULL ,
  `tipoOperacion_idtipoOperacion` INT NOT NULL ,
  `tipoInmobiliaria_idtipoInmobiliaria` INT NOT NULL ,
  PRIMARY KEY (`idPropiedades`, `Estados_idEstados`, `Ciudades_idCiudades`, `tipoOperacion_idtipoOperacion`, `tipoInmobiliaria_idtipoInmobiliaria`) ,
  INDEX `fk_Propiedades_Estados1_idx` (`Estados_idEstados` ASC) ,
  INDEX `fk_Propiedades_Ciudades1_idx` (`Ciudades_idCiudades` ASC) ,
  INDEX `fk_Propiedades_tipoOperacion1_idx` (`tipoOperacion_idtipoOperacion` ASC) ,
  INDEX `fk_Propiedades_tipoInmobiliaria1_idx` (`tipoInmobiliaria_idtipoInmobiliaria` ASC) ,
  CONSTRAINT `fk_Propiedades_Estados1`
    FOREIGN KEY (`Estados_idEstados` )
    REFERENCES `royalhome`.`Estados` (`idEstados` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Propiedades_Ciudades1`
    FOREIGN KEY (`Ciudades_idCiudades` )
    REFERENCES `royalhome`.`Ciudades` (`idCiudades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Propiedades_tipoOperacion1`
    FOREIGN KEY (`tipoOperacion_idtipoOperacion` )
    REFERENCES `royalhome`.`tipoOperacion` (`idtipoOperacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Propiedades_tipoInmobiliaria1`
    FOREIGN KEY (`tipoInmobiliaria_idtipoInmobiliaria` )
    REFERENCES `royalhome`.`tipoInmobiliaria` (`idtipoInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`imagenesInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`imagenesInmobiliaria` (
  `idimagenesInmobiliaria` INT NOT NULL AUTO_INCREMENT ,
  `imagenesInmobiliaria` VARCHAR(45) NULL ,
  PRIMARY KEY (`idimagenesInmobiliaria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`imagenesInmobiliaria_has_Propiedades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`imagenesInmobiliaria_has_Propiedades` (
  `imagenesInmobiliaria_idimagenesInmobiliaria` INT NOT NULL ,
  `Propiedades_idPropiedades` INT NOT NULL ,
  PRIMARY KEY (`imagenesInmobiliaria_idimagenesInmobiliaria`, `Propiedades_idPropiedades`) ,
  INDEX `fk_imagenesInmobiliaria_has_Propiedades_Propiedades1_idx` (`Propiedades_idPropiedades` ASC) ,
  INDEX `fk_imagenesInmobiliaria_has_Propiedades_imagenesInmobiliari_idx` (`imagenesInmobiliaria_idimagenesInmobiliaria` ASC) ,
  CONSTRAINT `fk_imagenesInmobiliaria_has_Propiedades_imagenesInmobiliaria1`
    FOREIGN KEY (`imagenesInmobiliaria_idimagenesInmobiliaria` )
    REFERENCES `royalhome`.`imagenesInmobiliaria` (`idimagenesInmobiliaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagenesInmobiliaria_has_Propiedades_Propiedades1`
    FOREIGN KEY (`Propiedades_idPropiedades` )
    REFERENCES `royalhome`.`Propiedades` (`idPropiedades` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`Desarrollos_has_imagenesInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Desarrollos_has_imagenesInmobiliaria` (
  `Desarrollos_idDesarrollos` INT NOT NULL ,
  `imagenesInmobiliaria_idimagenesInmobiliaria` INT NOT NULL ,
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
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `royalhome`.`Proyectos_has_imagenesInmobiliaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `royalhome`.`Proyectos_has_imagenesInmobiliaria` (
  `Proyectos_idProyectos` INT NOT NULL ,
  `imagenesInmobiliaria_idimagenesInmobiliaria` INT NOT NULL ,
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
ENGINE = InnoDB;

USE `royalhome` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
