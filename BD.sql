-- MySQL Script generated by MySQL Workbench
-- 01/17/17 00:38:09
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
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
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
-- Table `mydb`.`Slide`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Slide` (
  `idSlide` INT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(100) NULL,
  `Imagen` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idSlide`, `user_id`),
  CONSTRAINT `fk_Slide_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CategoriaEspecialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`CategoriaEspecialidad` (
  `idCategoriaEspecialidad` INT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategoriaEspecialidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TipoEspecialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TipoEspecialidad` (
  `idTipoEspecialidad` INT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipoEspecialidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Especialidad` (
  `idEspecialidades` INT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
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
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especialidad_CategoriaEspecialidad1`
    FOREIGN KEY (`CategoriaEspecialidad_idCategoriaEspecialidad`)
    REFERENCES `mydb`.`CategoriaEspecialidad` (`idCategoriaEspecialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Especialidad_TipoEspecialidad1`
    FOREIGN KEY (`TipoEspecialidad_idTipoEspecialidad`)
    REFERENCES `mydb`.`TipoEspecialidad` (`idTipoEspecialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ComentarioEspecialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ComentarioEspecialidad` (
  `idComentarioEspecialidad` INT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(100) NULL,
  `Fecha` DATETIME NULL,
  `Especialidad_idEspecialidades` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idComentarioEspecialidad`, `Especialidad_idEspecialidades`, `user_id`),
  INDEX `fk_ComentarioEspecialidad_Especialidad1_idx` (`Especialidad_idEspecialidades` ASC),
  INDEX `fk_ComentarioEspecialidad_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ComentarioEspecialidad_Especialidad1`
    FOREIGN KEY (`Especialidad_idEspecialidades`)
    REFERENCES `mydb`.`Especialidad` (`idEspecialidades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComentarioEspecialidad_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`proyecto` (
  `idProyecto` INT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  `Url` VARCHAR(255) NULL,
  `Imagen` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  `Fecha` DATETIME NOT NULL,
  PRIMARY KEY (`idProyecto`, `user_id`),
  INDEX `fk_Proyecto_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_Proyecto_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ComentarioProyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ComentarioProyecto` (
  `idComentarioProyecto` INT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NULL,
  `Fecha` DATETIME NULL,
  `Proyecto_idProyecto` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idComentarioProyecto`, `Proyecto_idProyecto`, `user_id`),
  INDEX `fk_ComentarioProyecto_Proyecto1_idx` (`Proyecto_idProyecto` ASC),
  INDEX `fk_ComentarioProyecto_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ComentarioProyecto_Proyecto1`
    FOREIGN KEY (`Proyecto_idProyecto`)
    REFERENCES `mydb`.`proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ComentarioProyecto_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tipoUsuario` (
  `idtipoUsuario` INT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idtipoUsuario`, `user_id`),
  INDEX `fk_tipoUsuario_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_tipoUsuario_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`noticia` (
  `idnoticia` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(100) NULL,
  `imagen` VARCHAR(45) NULL,
  `visitas` INT NULL,
  `comentarios` INT NULL,
  `user_id` INT NOT NULL,
  `link` VARCHAR(255) NULL,
  PRIMARY KEY (`idnoticia`, `user_id`),
  INDEX `fk_noticia_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_noticia_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`comentarioNoticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`comentarioNoticia` (
  `idcomentarioNoticia` INT NOT NULL AUTO_INCREMENT,
  `noticia_idnoticia` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idcomentarioNoticia`, `noticia_idnoticia`, `user_id`),
  INDEX `fk_comentarioNoticia_noticia1_idx` (`noticia_idnoticia` ASC),
  INDEX `fk_comentarioNoticia_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_comentarioNoticia_noticia1`
    FOREIGN KEY (`noticia_idnoticia`)
    REFERENCES `mydb`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarioNoticia_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`contacto` (
  `idcontacto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `leido` TINYINT(1) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idcontacto`, `user_id`),
  INDEX `fk_contacto_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_contacto_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`evento` (
  `idevento` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(100) NULL,
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
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ratingEspecialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ratingEspecialidad` (
  `idRatingEspecialidad` INT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `Especialidad_idEspecialidades` INT NOT NULL,
  `Rating` FLOAT NULL DEFAULT 0,
  PRIMARY KEY (`idRatingEspecialidad`, `user_id`, `Especialidad_idEspecialidades`),
  INDEX `fk_ratingEspecialidad_Usuario1_idx` (`user_id` ASC),
  INDEX `fk_ratingEspecialidad_Especialidad1_idx` (`Especialidad_idEspecialidades` ASC),
  CONSTRAINT `fk_ratingEspecialidad_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ratingEspecialidad_Especialidad1`
    FOREIGN KEY (`Especialidad_idEspecialidades`)
    REFERENCES `mydb`.`Especialidad` (`idEspecialidades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ratingProyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ratingProyecto` (
  `idRatingProyecto` INT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `Proyecto_idProyecto` INT NOT NULL,
  `Rating` FLOAT NULL DEFAULT 0,
  PRIMARY KEY (`idRatingProyecto`, `user_id`, `Proyecto_idProyecto`),
  INDEX `fk_ratingProyecto_Usuario1_idx` (`user_id` ASC),
  INDEX `fk_ratingProyecto_Proyecto1_idx` (`Proyecto_idProyecto` ASC),
  CONSTRAINT `fk_ratingProyecto_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ratingProyecto_Proyecto1`
    FOREIGN KEY (`Proyecto_idProyecto`)
    REFERENCES `mydb`.`proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Nosotros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Nosotros` (
  `idNosotros` INT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(100) NULL,
  `Imagen` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`idNosotros`, `user_id`),
  INDEX `fk_Nosotros_Usuario1_idx` (`user_id` ASC),
  CONSTRAINT `fk_Nosotros_Usuario1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Maestro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Maestro` (
  `idMaestro` INT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Tipo` VARCHAR(45) NULL,
  `Imagen` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(100) NULL,
  `Nosotros_idNosotros` INT NOT NULL,
  `LinkFace` VARCHAR(45) NULL,
  `LinkTwitter` VARCHAR(45) NULL,
  `LinkGoogle` VARCHAR(45) NULL,
  `LinkInstagram` VARCHAR(45) NULL,
  PRIMARY KEY (`idMaestro`, `Nosotros_idNosotros`),
  INDEX `fk_Maestro_Nosotros1_idx` (`Nosotros_idNosotros` ASC),
  CONSTRAINT `fk_Maestro_Nosotros1`
    FOREIGN KEY (`Nosotros_idNosotros`)
    REFERENCES `mydb`.`Nosotros` (`idNosotros`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Experiencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Experiencia` (
  `idExperiencia` INT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Valor` INT NULL DEFAULT 0,
  `Nosotros_idNosotros` INT NOT NULL,
  PRIMARY KEY (`idExperiencia`, `Nosotros_idNosotros`),
  INDEX `fk_Experiencia_Nosotros1_idx` (`Nosotros_idNosotros` ASC),
  CONSTRAINT `fk_Experiencia_Nosotros1`
    FOREIGN KEY (`Nosotros_idNosotros`)
    REFERENCES `mydb`.`Nosotros` (`idNosotros`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ElementosPagina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ElementosPagina` (
  `idElementosPagina` INT NOT NULL,
  `InicioTitulo` VARCHAR(45) NULL,
  `InicioDescripcion` VARCHAR(45) NULL,
  `InicioCuentaAlumnos` INT NULL,
  `InicioCuentaPremios` INT NULL,
  `InformacionDescripcion` VARCHAR(100) NULL,
  `InformacionLinkFace` VARCHAR(45) NULL,
  `InformacionLinkGoogle` VARCHAR(45) NULL,
  `InformacionLinkTwitter` VARCHAR(45) NULL,
  `InformacionTelefono` VARCHAR(45) NULL,
  `InformacionCorreo` VARCHAR(45) NULL,
  `InformacionPagina` VARCHAR(45) NULL,
  `InformacionDireccion` VARCHAR(45) NULL,
  PRIMARY KEY (`idElementosPagina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ImagenesPaginas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ImagenesPaginas` (
  `idImagenesPaginas` INT NULL AUTO_INCREMENT,
  `Nosotros` VARCHAR(45) NOT NULL,
  `Especialidades` VARCHAR(45) NOT NULL,
  `Proyectos` VARCHAR(45) NOT NULL,
  `Noticias` VARCHAR(45) NOT NULL,
  `Eventos` VARCHAR(45) NOT NULL,
  `Contacto` VARCHAR(45) NOT NULL,
  `ElementosPagina_idElementosPagina` INT NOT NULL,
  PRIMARY KEY (`idImagenesPaginas`, `ElementosPagina_idElementosPagina`),
  INDEX `fk_ImagenesPaginas_ElementosPagina1_idx` (`ElementosPagina_idElementosPagina` ASC),
  CONSTRAINT `fk_ImagenesPaginas_ElementosPagina1`
    FOREIGN KEY (`ElementosPagina_idElementosPagina`)
    REFERENCES `mydb`.`ElementosPagina` (`idElementosPagina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`EnlacePaginas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`EnlacePaginas` (
  `idEnlacePaginas` INT NOT NULL,
  `Titulo` VARCHAR(45) NULL,
  `Link` VARCHAR(45) NULL,
  `ElementosPagina_idElementosPagina` INT NOT NULL,
  PRIMARY KEY (`idEnlacePaginas`, `ElementosPagina_idElementosPagina`),
  INDEX `fk_EnlacePaginas_ElementosPagina1_idx` (`ElementosPagina_idElementosPagina` ASC),
  CONSTRAINT `fk_EnlacePaginas_ElementosPagina1`
    FOREIGN KEY (`ElementosPagina_idElementosPagina`)
    REFERENCES `mydb`.`ElementosPagina` (`idElementosPagina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
