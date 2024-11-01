
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

use primeirocrud;

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` char(14) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(17) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE IF NOT EXISTS `Usuario` (
idusuario int not null primary key AUTO_INCREMENT,
email varchar(50) not null,
senha varchar(100) not null
)engine=innodb;

CREATE TABLE IF NOT EXISTS `Equipamento` (
  `idEquipamento` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  `Quantidade` INT UNSIGNED NOT NULL,
  `Tipo` VARCHAR(70) NOT NULL,
  `PrecoTotal` DECIMAL(10,2) UNSIGNED NOT NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`idEquipamento`),
    FOREIGN KEY (`idusuario`) REFERENCES `usuario`(`idusuario`)
    )
ENGINE = InnoDB;

create table IF NOT EXISTS Gerente(
idgerente int not null primary key AUTO_INCREMENT,
email varchar(50) not null,
senha varchar(100) not null
)ENGINE = InnoDB;


INSERT INTO `client` (`id`, `name`, `email`, `cpf`, `birth`, `address`, `phone`) VALUES
(2, 'marcus', 'marcus@gmail.com', '100.364.476-76', '2006-11-04', 'Rua  Azevedo', '+55 (31) 998250683' );
COMMIT;