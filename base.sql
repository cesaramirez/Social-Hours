-- MySQL dump 10.13  Distrib 5.7.13, for Linux (x86_64)
--
-- Host: localhost    Database: base
-- ------------------------------------------------------
-- Server version	5.7.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `action`
--

DROP TABLE IF EXISTS `action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable de las acciones.',
  `name` varchar(100) NOT NULL COMMENT 'Nombre de la acción tal y como aparece en la barra de direcciones en el navegador.',
  `friendly_name` varchar(100) NOT NULL COMMENT 'Nombre Amigable para identificar la Acción en la aplicación.',
  `description` varchar(500) DEFAULT NULL COMMENT 'Descripción de la acción.',
  `controller_id` int(11) NOT NULL COMMENT 'Identificador único del Controlador al que pertenece la acción.',
  PRIMARY KEY (`id`),
  KEY `FK_Accion_Controlador_idx` (`controller_id`) USING BTREE,
  CONSTRAINT `FK_Accion_Controlador` FOREIGN KEY (`controller_id`) REFERENCES `controller` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena las Acciones de la aplicación para conceder permisos.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action`
--

LOCK TABLES `action` WRITE;
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
INSERT INTO `action` VALUES (1,'index','index','Accion creada automaticamente',1),(2,'index','index','Accion creada automaticamente',2),(3,'index','index','Accion creada automaticamente',3);
/*!40000 ALTER TABLE `action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controller`
--

DROP TABLE IF EXISTS `controller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable de los Controladores.',
  `name` varchar(100) NOT NULL COMMENT 'Nombre del Controlador tal como aparece en la barra de direccion del navegador.',
  `friendly_name` varchar(100) NOT NULL COMMENT 'Nombre Amigable para identificarlo dentro de la aplicación.',
  `description` varchar(500) DEFAULT NULL COMMENT 'Descripcion del Controlador.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena la información de los Controladores de la aplicación.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controller`
--

LOCK TABLES `controller` WRITE;
/*!40000 ALTER TABLE `controller` DISABLE KEYS */;
INSERT INTO `controller` VALUES (1,'usuario','usuario','Controlador creado automaticamente'),(2,'rol','rol','Controlador creado automaticamente'),(3,'accion','accion','Controlador creado automaticamente');
/*!40000 ALTER TABLE `controller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable de los registros en la tabla.',
  `user_id` varchar(45) NOT NULL COMMENT 'Nombre del Usuario que realiza la acción',
  `ip` varchar(20) NOT NULL COMMENT 'IP Remota del usuario que realiza la acción.',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha y Hora en que se realiza la acción.',
  `controller_id` varchar(45) NOT NULL COMMENT 'Controlador que fue invocado.',
  `action_id` varchar(45) NOT NULL COMMENT 'Acción que fue invocada.',
  `details` longtext COMMENT 'Detalles de la acción realizada, cambios que se hicieron en el sistema.',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena el detalle de todas las acciones que se realizan en el sistem';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable de los Roles.',
  `name` varchar(45) NOT NULL COMMENT 'Nombre descriptivo del Rol.',
  `description` varchar(200) DEFAULT NULL COMMENT 'Descripción del Rol.',
  `active` tinyint(4) NOT NULL COMMENT 'Indica si el Rol está activo o no.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena la información de los Roles de Seguridad del Sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrador','Tiene acceso a todas las funciones del sistema',1);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable de los registros de la tabla.',
  `role_id` int(11) NOT NULL COMMENT 'Identificador único del Rol.',
  `action_id` int(11) NOT NULL COMMENT 'Identificador único de la Acción',
  `permission` tinyint(4) NOT NULL COMMENT 'Indica si el Rol tiene permiso o no a la Acción indicada.',
  PRIMARY KEY (`id`),
  KEY `FK_PermisosRol_Rol_idx` (`role_id`),
  KEY `FK_PermisosRol_Accion_idx` (`action_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena la información de las acciones a las que tienen permiso cada Rol.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (2,1,1,1),(3,1,2,1),(4,1,3,1);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único autoincrementable de los Usuarios.',
  `name` varchar(100) NOT NULL COMMENT 'Nombre del Usuario.',
  `last_name` varchar(100) DEFAULT NULL COMMENT 'Apellido del Usuario.',
  `username` varchar(45) NOT NULL COMMENT 'Nombre de Usuario único en el Sistema.',
  `password` varchar(500) NOT NULL COMMENT 'Contraseña encriptada del usuario.',
  `role_id` int(11) NOT NULL COMMENT 'Identificador único del Rol que le ha sido asignado al Usuario.',
  `email` varchar(200) NOT NULL COMMENT 'Correo electrónico del Usuario.',
  `active` tinyint(4) NOT NULL COMMENT 'Indica si el Usuario está activo o no dentro del sistema.',
  `reset_password` tinyint(4) NOT NULL COMMENT 'Indica si la próxima vez que el usuario inicie sesión se le pedirá que reestablezca su contrasña.',
  PRIMARY KEY (`id`),
  KEY `FK_Usuario_Rol_idx` (`role_id`) USING BTREE,
  CONSTRAINT `FK_Usuario_Rol` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena la imación de los Usuarios del Sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Josué','Morales','Josh','$2a$13$Ah0ZEY.vYfzEr7QOMC/Q7OPhD5I2HqvRi7K9X2myDjFROk9rfKO4S',1,'josue.morales@outlook.com',1,0),(2,'César ','Ramírez','cesar','$2y$13$x4mKIATERHFvn4kKBbKHXuDbv3MKqC1BvJvcK1DRfhwUhK4o/0z8O',1,'ramirezcesar193@gmail.com',1,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-25 13:54:59
