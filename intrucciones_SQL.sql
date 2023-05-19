CREATE DATABASE pokedex;
USE pokedex;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(11) NOT NULL,
  PRIMARY KEY (`idUsuario`));
  
DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE `pokemon` (
`id_db_Pokemon` int(11) NOT NULL AUTO_INCREMENT,
`idPokemon` int(11) NOT NULL,
`imagen` varchar(45) DEFAULT NULL,
`nombre` varchar(45) DEFAULT NULL,
`tipo` varchar(50) DEFAULT NULL,
`descripcion` varchar(200) DEFAULT NULL,
PRIMARY KEY (`id_db_Pokemon`));