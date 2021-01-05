-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2021 a las 02:31:39
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `freelos`
--
CREATE DATABASE IF NOT EXISTS `freelos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `freelos`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_City` (IN `_City` CHAR(40))  BEGIN
	insert into cityss (City) VALUES (_City);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_ComApli` (IN `_fkJob` INT, IN `_fkcomp` INT, IN `_pryce` VARCHAR(120), IN `_msgg` VARCHAR(350))  BEGIN
	insert INTO aplicattions (fk_job,fk_company,precio,message) values (_fkJob,_fkcomp,_pryce,_msgg);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Company` (IN `_Company` VARCHAR(120), IN `_Us` VARCHAR(40), IN `_Mail` VARCHAR(100), IN `_Psd` VARCHAR(100), IN `_AEco` TINYINT(18), IN `__TpDo` TINYINT(4), IN `_Rol` TINYINT(4))  BEGIN
    	insert INTO companys (name_company,user,mail,password,fk_actEconomic,fk_tp_document,fk_rol)
        	values (_Company,_Us,_Mail,_Psd,_AEco,__TpDo,_Rol);
    
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Job` (IN `_title` VARCHAR(150), IN `_des` VARCHAR(500), IN `_profesion` INT, IN `_person` INT, IN `_pre` VARCHAR(100))  BEGIN 
INSERT into jobs (title,description,fk_profesion,fk_person,Presupuesto) 
values 
(_title,_des,_profesion,_person,_pre ); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_JobCom` (IN `_tle` VARCHAR(150), IN `_des` VARCHAR(500), IN `_pro` INT, IN `_fkCom` INT, IN `_pres` VARCHAR(100))  insert into jobs (title,description, fk_profesion,fk_company,Presupuesto)
	values (_tle,_des,_pro,_fkCom,_pres)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_PerApli` (IN `_IdJob` INT, IN `_IdPe` INT, IN `_precio` VARCHAR(120), IN `_msg` VARCHAR(350))  BEGIN
	insert INTO aplicattions (fk_job,fk_person,precio,message) values (_IdJob,_IdPe,_precio,_msg);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_User` (IN `_Name` VARCHAR(20), IN `_Name1` VARCHAR(20), IN `_Lana` VARCHAR(20), IN `_Lana1` VARCHAR(20), IN `_Tp_Document` TINYINT(4), IN `_Document` CHAR(22), IN `_Rol` TINYINT(4), IN `_City` TINYINT(4), IN `_Gender` TINYINT(4), IN `_Profesion` INT, IN `_Mail` VARCHAR(80), IN `_Psd` VARCHAR(100), IN `_User` VARCHAR(40), IN `_Born` DATE)  BEGIN
	insert into persons (name_one,name_twoo,lastname_one,lastname_twoo,fk_tp_document,number_document,fk_rol,fk_city,fk_gender,fk_profesion,mail, password,user,Bornn)
    VALUES
 (_Name ,_Name1,_Lana,_Lana1,_Tp_Document, _Document,_Rol, _City, _Gender, _Profesion, _Mail, _Psd, _User,  _Born );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `All_Citys` ()  BEGIN
	select Id_City,City from cityss;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `All_Ctys` (IN `_City` CHAR(40))  BEGIN
	select City,Id_City FROM cityss where City = _City;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `All_Genders` ()  BEGIN
	select Id_gender,Gender from genders;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `All_Jobs` ()  BEGIN
	SELECT id_job,title,description,Presupuesto,fk_profesion FROM jobs;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `All_Professions` ()  BEGIN
	select Id_profesion, profesion from professions;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `All_tp` ()  BEGIN
	select Id_to_documents, document from type_documents;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `All__Economics` ()  BEGIN
    	SELECT Id_esoActivity,activityy from economic_activities;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetIdCompany` (IN `_name` VARCHAR(120))  BEGIN
	select id_company,name_company,fk_actEconomic from companys  
    	where name_company = _name;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetId_Company` (IN `_namee` VARCHAR(100))  BEGIN
	select id_company from  companys
    	where  name_company = _namee;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetId_Person` (IN `_User` VARCHAR(40))  BEGIN
	select id_person from persons where user =_User ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Job_id_Pro` (IN `_pro` INT)  BEGIN
	select J.id_job from jobs J
    	INNER JOIN professions P On P.Id_profesion = J.fk_profesion
        	WHERE p.Id_profesion = _pro;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Job_Pros` (IN `_Job` INT, IN `_Beginn` INT, IN `_Endd` INT)  BEGIN
	select J.id_job,J.title,J.description,J.Presupuesto,P.profesion from jobs J
    	INNER JOIN professions P ON P.Id_profesion = J.fk_profesion where P.Id_profesion = _Job
        	LIMIT _Beginn,_Endd;
       
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `person_AplJob` (IN `_idPerson` INT, IN `_Id_Job` INT)  BEGIN
	SELECT id_aplicattiones FROM `aplicattions` WHERE fk_job = _Id_Job and fk_person = _idPerson;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_Company` (IN `_Us_Mail` VARCHAR(100), IN `_Psd` VARCHAR(100))  BEGIN
	select id_company, name_company, fk_rol, user,mail, password, fk_actEconomic from companys
    	where (user = _Us_Mail or mail = _Us_Mail) and (password= _Psd ) LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_Login` (IN `_mail` VARCHAR(80), IN `_pass` VARCHAR(100))  BEGIN
	SELECT id_person,mail,user,password,fk_rol FROM persons  WHERE (mail= _mail  or user= _mail) and password= _pass;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicattions`
--
-- Creación: 31-12-2020 a las 18:26:46
--

CREATE TABLE `aplicattions` (
  `id_aplicattiones` int(11) NOT NULL,
  `fk_job` int(11) DEFAULT NULL,
  `fk_person` int(11) DEFAULT NULL,
  `Date_applications` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `precio` varchar(120) COLLATE utf8_spanish_ci NOT NULL COMMENT 'importante',
  `message` varchar(350) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'contra oferta',
  `fk_company` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `aplicattions`:
--   `fk_job`
--       `jobs` -> `id_job`
--   `fk_person`
--       `persons` -> `id_person`
--   `fk_company`
--       `companys` -> `id_company`
--

--
-- Volcado de datos para la tabla `aplicattions`
--

INSERT INTO `aplicattions` (`id_aplicattiones`, `fk_job`, `fk_person`, `Date_applications`, `precio`, `message`, `fk_company`) VALUES
(1, 1, 1, '2020-12-15 23:54:58', '', '', NULL),
(2, 1, 1, '2020-12-30 02:31:07', '545000', 'que dice?', NULL),
(3, 1, 2, '2020-12-30 14:21:02', '54000', 'si?', NULL),
(4, 1, 2, '2020-12-30 14:21:02', '100000', 'aqui?', NULL),
(5, 1, 2, '2020-12-30 14:32:36', '84100', 'PROBANDO', NULL),
(6, 2, 2, '2020-12-30 14:56:56', '60.000', 'piensas?', NULL),
(7, 8, 2, '2020-12-30 16:08:41', '120.000', 'sdgdgsdssgd', NULL),
(8, 23, 2, '2020-12-30 16:12:00', '500.000', 'Ultima', NULL),
(9, 12, 2, '2020-12-30 16:13:37', '450.000', 'Es buena oferta amigo!', NULL),
(10, 17, NULL, '2020-12-31 18:32:08', '40000', 'gdhjhgghghjh', 3),
(11, 12, NULL, '2020-12-31 18:37:42', '400.000', 'piensalol=', 1),
(12, 12, NULL, '2020-12-31 18:37:53', '400.000', 'piensalol=', 1),
(13, 7, 3, '2020-12-31 18:46:45', '300.000', 'que dice?', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cityss`
--
-- Creación: 15-12-2020 a las 19:56:08
--

CREATE TABLE `cityss` (
  `Id_City` tinyint(4) NOT NULL,
  `City` char(40) COLLATE utf8_spanish_ci NOT NULL,
  `Date_City` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `cityss`:
--

--
-- Volcado de datos para la tabla `cityss`
--

INSERT INTO `cityss` (`Id_City`, `City`, `Date_City`) VALUES
(1, 'Bogotá', '2020-12-15 21:26:24'),
(2, 'Santa Marta', '2020-12-15 23:38:00'),
(3, 'Cartagena', '2020-12-15 21:28:56'),
(4, 'Popayan', '2020-12-15 21:28:56'),
(5, 'Cali', '2020-12-15 21:28:56'),
(6, 'Medellin', '2020-12-19 04:47:44'),
(7, 'Neiva', '2020-12-19 04:47:49'),
(8, 'Cesar', '2020-12-19 04:54:14'),
(9, 'Bucaramanga', '2020-12-19 04:56:45'),
(40, 'Cucuta', '2020-12-19 05:05:20'),
(41, 'Pereira', '2020-12-19 05:05:41'),
(42, 'Ibagué', '2020-12-19 05:07:47'),
(43, 'Quibdó', '2020-12-19 05:10:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companys`
--
-- Creación: 21-12-2020 a las 17:38:10
--

CREATE TABLE `companys` (
  `id_company` int(11) NOT NULL,
  `name_company` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `fk_actEconomic` tinyint(18) DEFAULT NULL,
  `fk_tp_document` tinyint(4) DEFAULT NULL,
  `fk_rol` tinyint(4) DEFAULT NULL,
  `Date_Company` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `companys`:
--   `fk_actEconomic`
--       `economic_activities` -> `Id_esoActivity`
--   `fk_tp_document`
--       `type_documents` -> `Id_to_documents`
--   `fk_rol`
--       `rols` -> `Id_rol`
--

--
-- Volcado de datos para la tabla `companys`
--

INSERT INTO `companys` (`id_company`, `name_company`, `fk_actEconomic`, `fk_tp_document`, `fk_rol`, `Date_Company`, `user`, `mail`, `password`) VALUES
(1, 'Abellco ltda', 11, 2, 1, '2020-12-31 18:08:17', 'abelcoltda', 'abelcoltda@gmail.com', '1234'),
(2, 'Empresa01', 1, 2, 2, '2020-12-27 01:06:47', 'Empresa1', 'Empresa1@hotmail.com', '1234'),
(3, 'Empresa02', 9, 2, 1, '2020-12-27 02:13:40', 'empresa2', 'Empresa2@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `economic_activities`
--
-- Creación: 15-12-2020 a las 21:45:36
--

CREATE TABLE `economic_activities` (
  `Id_esoActivity` tinyint(18) NOT NULL,
  `activityy` varchar(160) COLLATE utf8_spanish_ci NOT NULL,
  `Date_Activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `economic_activities`:
--

--
-- Volcado de datos para la tabla `economic_activities`
--

INSERT INTO `economic_activities` (`Id_esoActivity`, `activityy`, `Date_Activity`) VALUES
(1, 'Agricultura, ganadería, caza, silvicultura y pesca', '2020-12-15 21:50:55'),
(2, 'Explotación de minas y canteras', '2020-12-15 21:52:28'),
(3, 'Industrias manufactureras', '2020-12-15 21:52:28'),
(4, 'Suministro de electricidad, gas, vapor y aire acondicionado', '2020-12-15 21:52:28'),
(5, 'Distribución de agua; evacuación y tratamiento de aguas residuales, gestión de desechos y actividades', '2020-12-15 21:52:28'),
(6, 'Construcción', '2020-12-15 21:55:13'),
(7, 'Derecho', '2020-12-15 21:55:13'),
(8, 'Comercio al por mayor y al por menor; reparación de vehículos automotores y motocicletas', '2020-12-15 21:55:13'),
(9, 'Transporte y almacenamiento', '2020-12-15 21:55:13'),
(10, 'Información y comunicaciones', '2020-12-15 21:55:13'),
(11, 'Actividades financieras y de seguros', '2020-12-15 21:55:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genders`
--
-- Creación: 15-12-2020 a las 19:56:59
--

CREATE TABLE `genders` (
  `Id_gender` tinyint(4) NOT NULL,
  `Gender` char(18) COLLATE utf8_spanish_ci NOT NULL,
  `Date_Gender` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `genders`:
--

--
-- Volcado de datos para la tabla `genders`
--

INSERT INTO `genders` (`Id_gender`, `Gender`, `Date_Gender`) VALUES
(1, 'Masculino', '2020-12-15 21:29:58'),
(2, 'Femenino', '2020-12-15 21:29:58'),
(3, 'Sin definir', '2020-12-23 01:09:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--
-- Creación: 22-12-2020 a las 20:06:52
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Presupuesto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fk_profesion` int(11) DEFAULT NULL,
  `fk_company` int(11) DEFAULT NULL,
  `fk_person` int(11) DEFAULT NULL,
  `Date_job` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `jobs`:
--   `fk_profesion`
--       `professions` -> `Id_profesion`
--   `fk_company`
--       `companys` -> `id_company`
--   `fk_person`
--       `persons` -> `id_person`
--

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id_job`, `title`, `description`, `Presupuesto`, `fk_profesion`, `fk_company`, `fk_person`, `Date_job`) VALUES
(1, 'programador web', 'cree un s.i', '', 1, 1, NULL, '2020-12-15 23:48:14'),
(2, 'sistema de información', 'se necesita programador...', '', 1, NULL, 1, '2020-12-22 18:48:19'),
(3, 'Divorcio', 'Quien me colabora llevando mi divorcio?', '', 4, NULL, 2, '2020-12-22 19:45:45'),
(4, 'Divorcio', 'Quien me colabora llevando mi divorcio?', '', 4, NULL, 2, '2020-12-22 19:45:46'),
(5, 'Divorcio', 'se requiere abogado para que me colabore con el divorcio', '', 3, NULL, 2, '2020-12-22 19:48:55'),
(6, 'Diseño de web', 'Se requiere Diseñador', '', 2, NULL, 2, '2020-12-22 19:51:06'),
(7, 'Declaracion de renta', 'un contador que me colabore', '', 4, NULL, 1, '2020-12-22 19:57:06'),
(8, 'Editor de contenido multimedia', 'Se requiere editar video', '150.000', 1, NULL, 1, '2020-12-29 17:43:56'),
(12, 'Desarrollador', 'Grande', '500.000', 1, NULL, 1, '2020-12-22 20:20:10'),
(13, 'Regulaion voltaje edificio', 'se requiere ingeniero de sistemas para la labor', '800000', 5, NULL, 1, '2020-12-22 20:27:26'),
(15, 'Abogada', 'para una susecion', '1000', 3, 3, NULL, '2020-12-27 02:35:14'),
(16, 'Programador', 'programa', '80.000', 1, 3, NULL, '2020-12-29 17:44:57'),
(17, 'Divorcio', 'Quien me ayuda', '700.000', 3, NULL, 10, '2020-12-29 17:55:51'),
(18, 'Sucesion', 'Grande', 'negociemos', 3, NULL, 2, '2020-12-29 17:55:51'),
(19, 'DEmanda', 'Larga historia...', '500.000', 3, 1, NULL, '2020-12-29 17:57:02'),
(20, 'Pension', 'Quien me colabora con una demanda para reclamar mi pension', 'negociemos', 3, NULL, 3, '2020-12-29 17:57:02'),
(21, 'sucesion', 'buena plata', 'a convenir', 3, NULL, 4, '2020-12-29 18:21:00'),
(22, 'Abogada', 'abogada si', 'a conevir', 3, NULL, 2, '2020-12-29 18:21:00'),
(23, 'administrador base de datos', 'se requiere un ingeniero para administrar una base de datos', '600.000', 1, NULL, 4, '2020-12-29 18:46:19'),
(24, 'Administrador de servidores', 'se requiere administrador de servidor linux', '500.000', 1, 3, NULL, '2020-12-29 18:46:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persons`
--
-- Creación: 18-12-2020 a las 21:43:10
--

CREATE TABLE `persons` (
  `id_person` int(11) NOT NULL,
  `name_one` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `name_twoo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lastname_one` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lastname_twoo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fk_tp_document` tinyint(4) DEFAULT NULL,
  `number_document` char(22) COLLATE utf8_spanish_ci NOT NULL,
  `fk_rol` tinyint(4) DEFAULT NULL,
  `fk_city` tinyint(4) DEFAULT NULL,
  `fk_gender` tinyint(4) DEFAULT NULL,
  `fk_profesion` int(11) DEFAULT NULL,
  `mail` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Bornn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `persons`:
--   `fk_tp_document`
--       `type_documents` -> `Id_to_documents`
--   `fk_rol`
--       `rols` -> `Id_rol`
--   `fk_city`
--       `cityss` -> `Id_City`
--   `fk_gender`
--       `genders` -> `Id_gender`
--   `fk_profesion`
--       `professions` -> `Id_profesion`
--

--
-- Volcado de datos para la tabla `persons`
--

INSERT INTO `persons` (`id_person`, `name_one`, `name_twoo`, `lastname_one`, `lastname_twoo`, `fk_tp_document`, `number_document`, `fk_rol`, `fk_city`, `fk_gender`, `fk_profesion`, `mail`, `password`, `user`, `Bornn`) VALUES
(1, 'Camilo', NULL, 'MonteAelgre', NULL, 1, '1022546987', 2, 2, 1, 4, 'camilomonteal@hotmail.com', '45454545', 'camimontealegre', '1980-10-05'),
(2, 'Diana', 'Marcela', 'Gomez', 'Rocha', 1, '1022054987', 1, 1, 2, 1, 'email', 'psd', 'user', '0000-00-00'),
(3, 'Juan', 'Manuel', 'Gomez', 'Rocha', 1, '1022054987', 1, 1, 2, 1, 'emailxfgc', 'psddg', 'vbvbvb', '1980-10-10'),
(4, 'Ana', 'Sofia', 'Jimienez', 'Rodriguez', 1, '1022154963', 1, 4, 2, 2, 'Anaji@hotmail.com', '$2y$10$e1oIe99Xjd7gsWZVJdClHOCgSj27xNFqIN0oWzBVqEmyv9p6714vS', 'Anaji', '1985-11-04'),
(9, 'Ana', 'Maria', 'Martinez', 'Ahumada', 1, '21432432324', 1, 42, 2, 3, 'sdds', '$2y$10$682gET3fS/MtzEe/LHQL6uANO379qQuiH3kSwzXH9Eu.ag.IHjH92', 'dsfd', '0000-00-00'),
(10, 'Juliana', '', 'Solorzano', 'Garzón', 1, '10452879', 1, 6, 2, 2, 'julisol@gmail.com', '$2y$10$TbtcFXBPxIg5619yyLNnk.OH2hhcdNAE2.cZ45KycT2HsetkHxDam', 'JuliSol', '0000-00-00'),
(11, 'Juan', 'David', 'Gomez', 'Giraldo', 1, '10101010', 1, 8, 1, 4, 'Juanda@gmail.com', '$2y$10$d6GofCX0SWYR/VN4PqPCf.IRSUjMT0.JvH1Oe.zP1JKcXqYOFuCse', 'Juandaa', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professions`
--
-- Creación: 15-12-2020 a las 20:35:20
--

CREATE TABLE `professions` (
  `Id_profesion` int(11) NOT NULL,
  `profesion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Date_Gender` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `professions`:
--

--
-- Volcado de datos para la tabla `professions`
--

INSERT INTO `professions` (`Id_profesion`, `profesion`, `Date_Gender`) VALUES
(1, 'ingeniero de sistemas', '2020-12-15 21:32:32'),
(2, 'Diseñador grafico', '2020-12-15 21:32:32'),
(3, 'Abogado', '2020-12-15 21:32:32'),
(4, 'Contador', '2020-12-15 21:32:32'),
(5, 'ingeniero electrónico', '2020-12-15 21:32:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--
-- Creación: 15-12-2020 a las 21:34:36
--

CREATE TABLE `rols` (
  `Id_rol` tinyint(4) NOT NULL,
  `rol` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `Date_Gender` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `rols`:
--

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`Id_rol`, `rol`, `Date_Gender`) VALUES
(1, 'user', '2020-12-15 21:35:48'),
(2, 'admin', '2020-12-15 21:35:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_documents`
--
-- Creación: 15-12-2020 a las 21:39:07
--

CREATE TABLE `type_documents` (
  `Id_to_documents` tinyint(4) NOT NULL,
  `document` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `Date_tp_document` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `type_documents`:
--

--
-- Volcado de datos para la tabla `type_documents`
--

INSERT INTO `type_documents` (`Id_to_documents`, `document`, `Date_tp_document`) VALUES
(1, 'Cedula', '2020-12-15 21:40:11'),
(2, 'Nit', '2020-12-15 21:40:11'),
(3, 'Pasaporte', '2020-12-15 21:40:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplicattions`
--
ALTER TABLE `aplicattions`
  ADD PRIMARY KEY (`id_aplicattiones`),
  ADD KEY `fk_job` (`fk_job`),
  ADD KEY `fk_person` (`fk_person`),
  ADD KEY `fk_company` (`fk_company`);

--
-- Indices de la tabla `cityss`
--
ALTER TABLE `cityss`
  ADD PRIMARY KEY (`Id_City`);

--
-- Indices de la tabla `companys`
--
ALTER TABLE `companys`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `fk_actEconomic` (`fk_actEconomic`),
  ADD KEY `fk_tp_document` (`fk_tp_document`),
  ADD KEY `fk_rol` (`fk_rol`);

--
-- Indices de la tabla `economic_activities`
--
ALTER TABLE `economic_activities`
  ADD PRIMARY KEY (`Id_esoActivity`);

--
-- Indices de la tabla `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`Id_gender`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `fk_profesion` (`fk_profesion`),
  ADD KEY `fk_company` (`fk_company`),
  ADD KEY `fk_person` (`fk_person`);

--
-- Indices de la tabla `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id_person`),
  ADD KEY `fk_tp_document` (`fk_tp_document`),
  ADD KEY `fk_rol` (`fk_rol`),
  ADD KEY `fk_city` (`fk_city`),
  ADD KEY `fk_gender` (`fk_gender`),
  ADD KEY `fk_profesion` (`fk_profesion`);

--
-- Indices de la tabla `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`Id_profesion`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`Id_rol`);

--
-- Indices de la tabla `type_documents`
--
ALTER TABLE `type_documents`
  ADD PRIMARY KEY (`Id_to_documents`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aplicattions`
--
ALTER TABLE `aplicattions`
  MODIFY `id_aplicattiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cityss`
--
ALTER TABLE `cityss`
  MODIFY `Id_City` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `companys`
--
ALTER TABLE `companys`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `economic_activities`
--
ALTER TABLE `economic_activities`
  MODIFY `Id_esoActivity` tinyint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `genders`
--
ALTER TABLE `genders`
  MODIFY `Id_gender` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `persons`
--
ALTER TABLE `persons`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `professions`
--
ALTER TABLE `professions`
  MODIFY `Id_profesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `Id_rol` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `type_documents`
--
ALTER TABLE `type_documents`
  MODIFY `Id_to_documents` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplicattions`
--
ALTER TABLE `aplicattions`
  ADD CONSTRAINT `aplicattions_ibfk_1` FOREIGN KEY (`fk_job`) REFERENCES `jobs` (`id_job`),
  ADD CONSTRAINT `aplicattions_ibfk_2` FOREIGN KEY (`fk_person`) REFERENCES `persons` (`id_person`),
  ADD CONSTRAINT `fk_company` FOREIGN KEY (`fk_company`) REFERENCES `companys` (`id_company`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `companys`
--
ALTER TABLE `companys`
  ADD CONSTRAINT `companys_ibfk_1` FOREIGN KEY (`fk_actEconomic`) REFERENCES `economic_activities` (`Id_esoActivity`),
  ADD CONSTRAINT `companys_ibfk_2` FOREIGN KEY (`fk_tp_document`) REFERENCES `type_documents` (`Id_to_documents`),
  ADD CONSTRAINT `companys_ibfk_3` FOREIGN KEY (`fk_rol`) REFERENCES `rols` (`Id_rol`);

--
-- Filtros para la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`fk_profesion`) REFERENCES `professions` (`Id_profesion`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`fk_company`) REFERENCES `companys` (`id_company`),
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`fk_person`) REFERENCES `persons` (`id_person`);

--
-- Filtros para la tabla `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_ibfk_1` FOREIGN KEY (`fk_tp_document`) REFERENCES `type_documents` (`Id_to_documents`),
  ADD CONSTRAINT `persons_ibfk_2` FOREIGN KEY (`fk_rol`) REFERENCES `rols` (`Id_rol`),
  ADD CONSTRAINT `persons_ibfk_3` FOREIGN KEY (`fk_city`) REFERENCES `cityss` (`Id_City`),
  ADD CONSTRAINT `persons_ibfk_4` FOREIGN KEY (`fk_gender`) REFERENCES `genders` (`Id_gender`),
  ADD CONSTRAINT `persons_ibfk_5` FOREIGN KEY (`fk_profesion`) REFERENCES `professions` (`Id_profesion`);


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla aplicattions
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'aplicattions', '{\"sorted_col\":\"`aplicattions`.`fk_company` ASC\"}', '2020-12-31 18:41:03');

--
-- Metadatos para la tabla cityss
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'cityss', '{\"sorted_col\":\"`Id_City` ASC\"}', '2020-12-19 05:02:46');

--
-- Metadatos para la tabla companys
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'companys', '{\"sorted_col\":\"`name_company` ASC\"}', '2020-12-27 02:13:41');

--
-- Metadatos para la tabla economic_activities
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'economic_activities', '{\"sorted_col\":\"`economic_activities`.`activityy` ASC\"}', '2020-12-26 20:04:12');

--
-- Metadatos para la tabla genders
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'genders', '[]', '2020-12-23 01:08:47');

--
-- Metadatos para la tabla jobs
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'jobs', '{\"CREATE_TIME\":\"2020-12-15 18:46:32\",\"sorted_col\":\"`jobs`.`id_job` ASC\"}', '2020-12-30 01:02:56');

--
-- Metadatos para la tabla persons
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'persons', '{\"sorted_col\":\"`fk_rol` ASC\"}', '2020-12-30 14:22:50');

--
-- Metadatos para la tabla professions
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'professions', '{\"sorted_col\":\"`professions`.`profesion` ASC\"}', '2020-12-18 23:03:58');

--
-- Metadatos para la tabla rols
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'rols', '{\"sorted_col\":\"`rols`.`Id_rol`  ASC\"}', '2020-12-15 22:17:37');

--
-- Metadatos para la tabla type_documents
--

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'freelos', 'type_documents', '{\"sorted_col\":\"`type_documents`.`document` ASC\"}', '2020-12-18 22:26:58');

--
-- Metadatos para la base de datos freelos
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
