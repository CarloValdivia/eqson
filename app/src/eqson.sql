USE `eqson` ;

-- -----------------------------------------------------
-- Table `eqson`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eqson`.`Usuario` (
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
-- Table `eqson`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eqson`.`Producto` (
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
-- Table `eqson`.`Ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eqson`.`Ticket` (
  `idTicket` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`idTicket`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `eqson`.`Venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eqson`.`Venta` (
  `idTicket` INT NOT NULL,
  `idProducto` INT NOT NULL,
  PRIMARY KEY (`idTicket`, `idProducto`),
  INDEX `fk_Venta_1_idx` (`idProducto` ASC),
  CONSTRAINT `fk_Venta_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `eqson`.`Producto` (`idProducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Venta_2`
    FOREIGN KEY (`idTicket`)
    REFERENCES `eqson`.`Ticket` (`idTicket`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `eqson`.`Compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eqson`.`Compra` (
  `idUsuario` INT NOT NULL,
  `idTicket` INT NOT NULL,
  PRIMARY KEY (`idUsuario`, `idTicket`),
  INDEX `fk_Compra_2_idx` (`idTicket` ASC),
  CONSTRAINT `fk_Compra_1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `eqson`.`Usuario` (`idUsuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Compra_2`
    FOREIGN KEY (`idTicket`)
    REFERENCES `eqson`.`Ticket` (`idTicket`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;
