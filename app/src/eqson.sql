-- MySQL Script generated by MySQL Workbench
-- Fri 13 Jul 2018 10:01:09 AM -05
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(10) NOT NULL,
  `clave` VARCHAR(20) NOT NULL,
  `direccion` VARCHAR(100) NULL,
  `privilegio` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idUsuario`, `nombre`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Producto` (
  `idProducto` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(20) NOT NULL,
  `modelo` VARCHAR(20) NOT NULL,
  `imagen` LONGBLOB NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `especificaciones` VARCHAR(400) NULL,
  `precioFabrica` DECIMAL(15,2) NOT NULL,
  `precioVenta` DECIMAL(15,2) NOT NULL,
  `stock` INT NOT NULL,
  PRIMARY KEY (`idProducto`, `marca`, `modelo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`Ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Ticket` (
  `idTicket` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`idTicket`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`Venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Venta` (
  `idTicket` INT NOT NULL,
  `idProducto` INT NOT NULL,
  PRIMARY KEY (`idTicket`, `idProducto`),
  INDEX `fk_Venta_1_idx` (`idProducto` ASC),
  CONSTRAINT `fk_Venta_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `mydb`.`Producto` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Venta_2`
    FOREIGN KEY (`idTicket`)
    REFERENCES `mydb`.`Ticket` (`idTicket`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `mydb`.`Compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Compra` (
  `idUsuario` INT NOT NULL,
  `idTicket` INT NOT NULL,
  PRIMARY KEY (`idUsuario`, `idTicket`),
  INDEX `fk_Compra_2_idx` (`idTicket` ASC),
  CONSTRAINT `fk_Compra_1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Compra_2`
    FOREIGN KEY (`idTicket`)
    REFERENCES `mydb`.`Ticket` (`idTicket`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
