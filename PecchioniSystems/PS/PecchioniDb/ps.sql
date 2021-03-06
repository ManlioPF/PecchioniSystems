-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema prueba1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema prueba1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prueba1` DEFAULT CHARACTER SET latin1 ;
USE `prueba1` ;

-- -----------------------------------------------------
-- Table `prueba1`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba1`.`producto` (
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `p_nombre` VARCHAR(30) NOT NULL,
  `p_origen` VARCHAR(20) NOT NULL,
  `p_descripcion` VARCHAR(1000) NOT NULL,
  `p_precio` INT(11) NOT NULL,
  `p_fabricante` VARCHAR(20) NOT NULL,
  `p_cantidad` INT(11) NOT NULL,
  `p_foto` VARCHAR(100) NOT NULL,
  `p_categoria` VARCHAR(25) NOT NULL,
  `p_fecha` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `prueba1`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba1`.`usuario` (
  `u_mail` VARCHAR(40) NOT NULL,
  `u_contrasena` VARCHAR(50) NOT NULL,
  `u_anio_nacimiento` INT(4) NOT NULL,
  `u_direccion` VARCHAR(50) NOT NULL,
  `u_postal` INT(11) NOT NULL,
  `u_tarjeta` BIGINT(16) NOT NULL,
  PRIMARY KEY (`u_mail`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `prueba1`.`usuario_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prueba1`.`usuario_producto` (
  `id_producto` INT(11) NOT NULL AUTO_INCREMENT,
  `pagado` INT(11) NOT NULL,
  `cantidad` INT(11) NOT NULL,
  `u_mail` VARCHAR(45) NOT NULL,
  `fecha_compra` VARCHAR(80) NULL DEFAULT NULL,
  INDEX `id_producto_idx` (`id_producto` ASC) VISIBLE,
  INDEX `u_mail_idx` (`u_mail` ASC) VISIBLE,
  CONSTRAINT `id_producto`
    FOREIGN KEY (`id_producto`)
    REFERENCES `prueba1`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `u_mail`
    FOREIGN KEY (`u_mail`)
    REFERENCES `prueba1`.`usuario` (`u_mail`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
