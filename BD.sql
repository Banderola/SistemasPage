-- MySQL Script generated by MySQL Workbench
-- 01/19/17 21:44:32
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema yii2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema yii2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `yii2` DEFAULT CHARACTER SET utf8 ;
USE `yii2` ;

-- -----------------------------------------------------
-- Table `yii2`.`Slide`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`Slide` (
  `idSlide` INT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(255) NULL,
  `Imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`idSlide`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`user` (
  `id` INT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `auth_key` VARCHAR(32) NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `password_reset_token` VARCHAR(255) NULL,
  `email` VARCHAR(255) NOT NULL,
  `status` SMALLINT NULL,
  `created_at` INT NULL,
  `updated_at` INT NULL,
  `nombre` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`CategoriaEspecialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`CategoriaEspecialidad` (
  `idCategoriaEspecialidad` INT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategoriaEspecialidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`TipoEspecialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`TipoEspecialidad` (
  `idTipoEspecialidad` INT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipoEspecialidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`Especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`Especialidad` (
  `idEspecialidades` INT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(255) NULL,
  `Visitas` INT NULL,
  `Comentarios` INT NULL,
  `user_id` INT NOT NULL,
  `CategoriaEspecialidad_idCategoriaEspecialidad` INT NOT NULL,
  `TipoEspecialidad_idTipoEspecialidad` INT NOT NULL,
  PRIMARY KEY (`idEspecialidades`, `user_id`, `CategoriaEspecialidad_idCategoriaEspecialidad`, `TipoEspecialidad_idTipoEspecialidad`),
  INDEX `fk_Especialidad_Usuario1_idx` (`user_id` ASC),
  INDEX `fk_Especialidad_CategoriaEspecialidad1_idx` (`CategoriaEspecialidad_idCategoriaEspecialidad` ASC),
  INDEX `fk_Especialidad_TipoEspecialidad1_idx` (`TipoEspecialidad_idTipoEspecialidad` ASC),
  CONSTRAINT `fk_Especialidad_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especialidad_CategoriaEspecialidad1`
    FOREIGN KEY (`CategoriaEspecialidad_idCategoriaEspecialidad`)
    REFERENCES `yii2`.`CategoriaEspecialidad` (`idCategoriaEspecialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especialidad_TipoEspecialidad1`
    FOREIGN KEY (`TipoEspecialidad_idTipoEspecialidad`)
    REFERENCES `yii2`.`TipoEspecialidad` (`idTipoEspecialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`ComentarioEspecialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`ComentarioEspecialidad` (
  `idComentarioEspecialidad` INT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(255) NULL,
  `Fecha` DATETIME NULL,
  `Especialidad_idEspecialidades` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idComentarioEspecialidad`, `Especialidad_idEspecialidades`, `user_id`),
  INDEX `fk_ComentarioEspecialidad_Especialidad1_idx` (`Especialidad_idEspecialidades` ASC),
  INDEX `fk_ComentarioEspecialidad_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ComentarioEspecialidad_Especialidad1`
    FOREIGN KEY (`Especialidad_idEspecialidades`)
    REFERENCES `yii2`.`Especialidad` (`idEspecialidades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComentarioEspecialidad_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`Proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`Proyecto` (
  `idProyecto` INT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(255) NULL,
  `Url` VARCHAR(100) NULL,
  `Imagen` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  `Fecha` DATETIME NOT NULL,
  PRIMARY KEY (`idProyecto`, `user_id`),
  INDEX `fk_Proyecto_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_Proyecto_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`ComentarioProyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`ComentarioProyecto` (
  `idComentarioProyecto` INT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(255) NULL,
  `Fecha` DATETIME NULL,
  `Proyecto_idProyecto` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idComentarioProyecto`, `Proyecto_idProyecto`, `user_id`),
  INDEX `fk_ComentarioProyecto_Proyecto1_idx` (`Proyecto_idProyecto` ASC),
  INDEX `fk_ComentarioProyecto_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ComentarioProyecto_Proyecto1`
    FOREIGN KEY (`Proyecto_idProyecto`)
    REFERENCES `yii2`.`Proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComentarioProyecto_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`noticia` (
  `idnoticia` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(255) NULL,
  `imagen` VARCHAR(45) NULL,
  `visitas` INT NULL,
  `comentarios` INT NULL,
  `user_id` INT NOT NULL,
  `link` VARCHAR(255) NULL,
  PRIMARY KEY (`idnoticia`, `user_id`),
  INDEX `fk_noticia_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_noticia_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`comentarioNoticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`comentarioNoticia` (
  `idcomentarioNoticia` INT NOT NULL AUTO_INCREMENT,
  `noticia_idnoticia` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idcomentarioNoticia`, `noticia_idnoticia`, `user_id`),
  INDEX `fk_comentarioNoticia_noticia1_idx` (`noticia_idnoticia` ASC),
  INDEX `fk_comentarioNoticia_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_comentarioNoticia_noticia1`
    FOREIGN KEY (`noticia_idnoticia`)
    REFERENCES `yii2`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarioNoticia_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`contacto` (
  `idcontacto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `leido` TINYINT(1) NULL,
  `user_id` INT NOT NULL,
  `mensaje` VARCHAR(255) NULL,
  PRIMARY KEY (`idcontacto`, `user_id`),
  INDEX `fk_contacto_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_contacto_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`evento` (
  `idevento` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(255) NULL,
  `imagen` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `hora_inicio` TIME(3) NULL,
  `hora_fin` TIME(3) NULL,
  `lugar` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idevento`, `user_id`),
  INDEX `fk_evento_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_evento_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`ratingEspecialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`ratingEspecialidad` (
  `idRatingEspecialidad` INT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `Especialidad_idEspecialidades` INT NOT NULL,
  `Rating` FLOAT NULL DEFAULT 0,
  PRIMARY KEY (`idRatingEspecialidad`, `user_id`, `Especialidad_idEspecialidades`),
  INDEX `fk_ratingEspecialidad_Usuario1_idx` (`user_id` ASC),
  INDEX `fk_ratingEspecialidad_Especialidad1_idx` (`Especialidad_idEspecialidades` ASC),
  CONSTRAINT `fk_ratingEspecialidad_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ratingEspecialidad_Especialidad1`
    FOREIGN KEY (`Especialidad_idEspecialidades`)
    REFERENCES `yii2`.`Especialidad` (`idEspecialidades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`ratingProyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`ratingProyecto` (
  `idRatingProyecto` INT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `Proyecto_idProyecto` INT NOT NULL,
  `Rating` FLOAT NULL DEFAULT 0,
  PRIMARY KEY (`idRatingProyecto`, `user_id`, `Proyecto_idProyecto`),
  INDEX `fk_ratingProyecto_Usuario1_idx` (`user_id` ASC),
  INDEX `fk_ratingProyecto_Proyecto1_idx` (`Proyecto_idProyecto` ASC),
  CONSTRAINT `fk_ratingProyecto_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ratingProyecto_Proyecto1`
    FOREIGN KEY (`Proyecto_idProyecto`)
    REFERENCES `yii2`.`Proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`Maestro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`Maestro` (
  `idMaestro` INT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `tipo` VARCHAR(45) NULL,
  `imagen` VARCHAR(100) NULL,
  `descripcion` VARCHAR(255) NULL,
  `linkFace` VARCHAR(100) NULL,
  `linkTwitter` VARCHAR(100) NULL,
  `linkGoogle` VARCHAR(100) NULL,
  `linkInstagram` VARCHAR(100) NULL,
  PRIMARY KEY (`idMaestro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`Experiencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`Experiencia` (
  `idExperiencia` INT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `valor` INT NULL DEFAULT 0,
  PRIMARY KEY (`idExperiencia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`ImagenPortada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`ImagenPortada` (
  `idImagen` INT NULL AUTO_INCREMENT,
  `Nosotros` VARCHAR(45) NOT NULL,
  `Especialidades` VARCHAR(45) NOT NULL,
  `Proyectos` VARCHAR(45) NOT NULL,
  `Noticias` VARCHAR(45) NOT NULL,
  `Eventos` VARCHAR(45) NOT NULL,
  `Contacto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idImagen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`PaginaEnlaces`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`PaginaEnlaces` (
  `idEnlaces` INT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `link` VARCHAR(255) NULL,
  PRIMARY KEY (`idEnlaces`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`PaginaApartado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`PaginaApartado` (
  `idPaginaApartado` INT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPaginaApartado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`PaginaContacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`PaginaContacto` (
  `idPaginaContacto` INT NULL AUTO_INCREMENT,
  `telefono` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `direccion` VARCHAR(100) NULL,
  `faceLink` VARCHAR(100) NULL,
  `rssLink` VARCHAR(100) NULL,
  `googleLink` VARCHAR(100) NULL,
  `pintLink` VARCHAR(100) NULL,
  `instagramLink` VARCHAR(100) NULL,
  PRIMARY KEY (`idPaginaContacto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`PaginaInicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`PaginaInicio` (
  `idPaginaInicio` INT NULL AUTO_INCREMENT,
  `tituloPortada` VARCHAR(100) NOT NULL,
  `descripcionPortada` VARCHAR(255) NOT NULL,
  `cantidadAlumnos` INT NOT NULL,
  `cantidadPremios` INT NOT NULL,
  `imagenAlumnos` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idPaginaInicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`PaginaNosotros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`PaginaNosotros` (
  `idPaginaNosotros` INT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(255) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idPaginaNosotros`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`ComentarioAlumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`ComentarioAlumno` (
  `idComentarioAlumno` INT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(255) NOT NULL,
  `user_id` INT NULL,
  PRIMARY KEY (`idComentarioAlumno`, `user_id`),
  INDEX `fk_ComentarioAlumno_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ComentarioAlumno_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `yii2`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`Apartados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`Apartados` (
  `idApartados` INT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idApartados`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yii2`.`PaginaImagenPortada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yii2`.`PaginaImagenPortada` (
  `idPaginaImagenPortada` INT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(100) NOT NULL,
  `Apartados_idApartados` INT NOT NULL,
  PRIMARY KEY (`idPaginaImagenPortada`, `Apartados_idApartados`),
  INDEX `fk_PaginaImagenPortada_Apartados1_idx` (`Apartados_idApartados` ASC),
  CONSTRAINT `fk_PaginaImagenPortada_Apartados1`
    FOREIGN KEY (`Apartados_idApartados`)
    REFERENCES `yii2`.`Apartados` (`idApartados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
