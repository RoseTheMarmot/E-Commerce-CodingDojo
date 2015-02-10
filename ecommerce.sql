SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ECommerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ECommerce` ;

-- -----------------------------------------------------
-- Table `ECommerce`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ECommerce`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `description` TEXT NULL ,
  `price` DECIMAL(45,2) NULL ,
  `inventory` INT NULL ,
  `added_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ECommerce`.`customers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ECommerce`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(255) NULL ,
  `last_name` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `address2` VARCHAR(255) NULL ,
  `city` VARCHAR(255) NULL ,
  `state` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ECommerce`.`orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ECommerce`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `status` VARCHAR(255) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ECommerce`.`relationships`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ECommerce`.`relationships` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `products_id` INT NOT NULL ,
  `customers_id` INT NOT NULL ,
  `orders_id` INT NOT NULL ,
  `quantity` INT NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_products_has_customers_customers1_idx` (`customers_id` ASC) ,
  INDEX `fk_products_has_customers_products_idx` (`products_id` ASC) ,
  INDEX `fk_products_has_customers_orders1_idx` (`orders_id` ASC) ,
  CONSTRAINT `fk_products_has_customers_products`
    FOREIGN KEY (`products_id` )
    REFERENCES `ECommerce`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_customers_customers1`
    FOREIGN KEY (`customers_id` )
    REFERENCES `ECommerce`.`customers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_customers_orders1`
    FOREIGN KEY (`orders_id` )
    REFERENCES `ECommerce`.`orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ECommerce`.`admins`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ECommerce`.`admins` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

USE `ECommerce` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
