#
# TABLE STRUCTURE FOR: alistamientos
#

DROP TABLE IF EXISTS `alistamientos`;

CREATE TABLE `alistamientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int(11) DEFAULT NULL,
  `conductor_id` int(11) DEFAULT NULL,
  `licencia_chk` tinyint(1) DEFAULT NULL,
  `licencia_obs` text COLLATE utf8_spanish_ci,
  `soat_chk` tinyint(1) DEFAULT NULL,
  `soat_obs` text COLLATE utf8_spanish_ci,
  `rtm_chk` tinyint(1) DEFAULT NULL,
  `rtm_obs` text COLLATE utf8_spanish_ci,
  `seguros_chk` tinyint(1) DEFAULT NULL,
  `seguros_obs` text COLLATE utf8_spanish_ci,
  `direcdelante_chk` tinyint(1) DEFAULT NULL,
  `direcdelante_obs` text COLLATE utf8_spanish_ci,
  `direcatras_chk` tinyint(1) DEFAULT NULL,
  `direcatras_obs` text COLLATE utf8_spanish_ci,
  `lucesaltas_chk` tinyint(1) DEFAULT NULL,
  `lucesaltas_obs` text COLLATE utf8_spanish_ci,
  `lucesbajas_chk` tinyint(1) DEFAULT NULL,
  `lucesbajas_obs` text COLLATE utf8_spanish_ci,
  `lucesstops_chk` tinyint(1) DEFAULT NULL,
  `lucesstops_obs` text COLLATE utf8_spanish_ci,
  `lucesreversa_chk` tinyint(1) DEFAULT NULL,
  `lucesreversa_obs` text COLLATE utf8_spanish_ci,
  `lucesparqueo_chk` tinyint(1) DEFAULT NULL,
  `lucesparqueo_obs` text COLLATE utf8_spanish_ci,
  `limpiabrizas_chk` tinyint(1) DEFAULT NULL,
  `limpiabrizas_obs` text COLLATE utf8_spanish_ci,
  `frenoprincipal_chk` tinyint(1) DEFAULT NULL,
  `frenoprincipal_obs` text COLLATE utf8_spanish_ci,
  `frenoemergencia_chk` tinyint(1) DEFAULT NULL,
  `frenoemergencia_obs` text COLLATE utf8_spanish_ci,
  `llantadelante_chk` tinyint(1) DEFAULT NULL,
  `llantadelante_obs` text COLLATE utf8_spanish_ci,
  `llantaatras_chk` tinyint(1) DEFAULT NULL,
  `llantaatras_obs` text COLLATE utf8_spanish_ci,
  `llantarepuesto_chk` tinyint(1) DEFAULT NULL,
  `llantarepuesto_obs` text COLLATE utf8_spanish_ci,
  `espejolateral_chk` tinyint(1) DEFAULT NULL,
  `espejolateral_obs` text COLLATE utf8_spanish_ci,
  `espejoretrovisor_chk` tinyint(1) DEFAULT NULL,
  `espejoretrovisor_obs` text COLLATE utf8_spanish_ci,
  `pito_chk` tinyint(1) DEFAULT NULL,
  `pito_obs` text COLLATE utf8_spanish_ci,
  `fluidofrenos_chk` tinyint(1) DEFAULT NULL,
  `fluidofrenos_obs` text COLLATE utf8_spanish_ci,
  `fluidoaceite_chk` tinyint(1) DEFAULT NULL,
  `fluidoaceite_obs` text COLLATE utf8_spanish_ci,
  `fluidorefrigera_chk` tinyint(1) DEFAULT NULL,
  `fluidorefrigera_obs` text COLLATE utf8_spanish_ci,
  `apoyadelante_chk` tinyint(1) DEFAULT NULL,
  `apoyadelante_obs` text COLLATE utf8_spanish_ci,
  `apoyaatras_chk` tinyint(1) DEFAULT NULL,
  `apoyaatras_obs` text COLLATE utf8_spanish_ci,
  `cinturon_chk` tinyint(1) DEFAULT NULL,
  `cinturon_obs` text COLLATE utf8_spanish_ci,
  `mantenaceite` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mantenaceite_chk` tinyint(1) DEFAULT NULL,
  `mantenaceite_obs` text COLLATE utf8_spanish_ci,
  `mantensincro` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mantensincro_chk` tinyint(1) DEFAULT NULL,
  `mantensincro_obs` text COLLATE utf8_spanish_ci,
  `mantenalinea` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mantenalinea_chk` tinyint(1) DEFAULT NULL,
  `mantenalinea_obs` text COLLATE utf8_spanish_ci,
  `mantenllantas` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mantenllantas_chk` tinyint(1) DEFAULT NULL,
  `mantenllantas_obs` text COLLATE utf8_spanish_ci,
  `tecnomecanica` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tecnomecanica_chk` tinyint(1) DEFAULT NULL,
  `tecnomecanica_obs` text COLLATE utf8_spanish_ci,
  `soatvencimiento` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `soatvencimiento_chk` tinyint(1) DEFAULT NULL,
  `soatvencimiento_obs` text COLLATE utf8_spanish_ci,
  `extintor` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extintor_chk` tinyint(1) DEFAULT NULL,
  `extintor_obs` text COLLATE utf8_spanish_ci,
  `capaextintor` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capaextintor_chk` tinyint(1) DEFAULT NULL,
  `capaextintor_obs` text COLLATE utf8_spanish_ci,
  `herramienta_chk` tinyint(1) DEFAULT NULL,
  `herramienta_obs` text COLLATE utf8_spanish_ci,
  `cruceta_chk` tinyint(1) DEFAULT NULL,
  `cruceta_obs` text COLLATE utf8_spanish_ci,
  `gato_chk` tinyint(1) DEFAULT NULL,
  `gato_obs` text COLLATE utf8_spanish_ci,
  `taco_chk` tinyint(1) DEFAULT NULL,
  `taco_obs` text COLLATE utf8_spanish_ci,
  `senales_chk` tinyint(1) DEFAULT NULL,
  `senales_obs` text COLLATE utf8_spanish_ci,
  `chaleco_chk` tinyint(1) DEFAULT NULL,
  `chaleco_obs` text COLLATE utf8_spanish_ci,
  `botiquin_chk` tinyint(1) DEFAULT NULL,
  `botiquin_obs` text COLLATE utf8_spanish_ci,
  `final_obs` text COLLATE utf8_spanish_ci,
  `fch_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_registro` int(11) NOT NULL,
  `user_aprueba` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_VEHICULO_ALISTAMIENTO_idx` (`vehiculo_id`),
  KEY `fk_conductor_alistamiento_idx` (`conductor_id`),
  KEY `fk_despachador_idx` (`user_registro`),
  CONSTRAINT `FK_VEHICULO_ALISTAMIENTO` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_conductor_alistamiento` FOREIGN KEY (`conductor_id`) REFERENCES `conductores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_despachador` FOREIGN KEY (`user_registro`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `alistamientos` (`id`, `vehiculo_id`, `conductor_id`, `licencia_chk`, `licencia_obs`, `soat_chk`, `soat_obs`, `rtm_chk`, `rtm_obs`, `seguros_chk`, `seguros_obs`, `direcdelante_chk`, `direcdelante_obs`, `direcatras_chk`, `direcatras_obs`, `lucesaltas_chk`, `lucesaltas_obs`, `lucesbajas_chk`, `lucesbajas_obs`, `lucesstops_chk`, `lucesstops_obs`, `lucesreversa_chk`, `lucesreversa_obs`, `lucesparqueo_chk`, `lucesparqueo_obs`, `limpiabrizas_chk`, `limpiabrizas_obs`, `frenoprincipal_chk`, `frenoprincipal_obs`, `frenoemergencia_chk`, `frenoemergencia_obs`, `llantadelante_chk`, `llantadelante_obs`, `llantaatras_chk`, `llantaatras_obs`, `llantarepuesto_chk`, `llantarepuesto_obs`, `espejolateral_chk`, `espejolateral_obs`, `espejoretrovisor_chk`, `espejoretrovisor_obs`, `pito_chk`, `pito_obs`, `fluidofrenos_chk`, `fluidofrenos_obs`, `fluidoaceite_chk`, `fluidoaceite_obs`, `fluidorefrigera_chk`, `fluidorefrigera_obs`, `apoyadelante_chk`, `apoyadelante_obs`, `apoyaatras_chk`, `apoyaatras_obs`, `cinturon_chk`, `cinturon_obs`, `mantenaceite`, `mantenaceite_chk`, `mantenaceite_obs`, `mantensincro`, `mantensincro_chk`, `mantensincro_obs`, `mantenalinea`, `mantenalinea_chk`, `mantenalinea_obs`, `mantenllantas`, `mantenllantas_chk`, `mantenllantas_obs`, `tecnomecanica`, `tecnomecanica_chk`, `tecnomecanica_obs`, `soatvencimiento`, `soatvencimiento_chk`, `soatvencimiento_obs`, `extintor`, `extintor_chk`, `extintor_obs`, `capaextintor`, `capaextintor_chk`, `capaextintor_obs`, `herramienta_chk`, `herramienta_obs`, `cruceta_chk`, `cruceta_obs`, `gato_chk`, `gato_obs`, `taco_chk`, `taco_obs`, `senales_chk`, `senales_obs`, `chaleco_chk`, `chaleco_obs`, `botiquin_chk`, `botiquin_obs`, `final_obs`, `fch_registro`, `user_registro`, `user_aprueba`, `estado`) VALUES ('1', '2', '1', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', 'Todo correcto', '2018-04-17 08:28:44', '1', '4', '1');
INSERT INTO `alistamientos` (`id`, `vehiculo_id`, `conductor_id`, `licencia_chk`, `licencia_obs`, `soat_chk`, `soat_obs`, `rtm_chk`, `rtm_obs`, `seguros_chk`, `seguros_obs`, `direcdelante_chk`, `direcdelante_obs`, `direcatras_chk`, `direcatras_obs`, `lucesaltas_chk`, `lucesaltas_obs`, `lucesbajas_chk`, `lucesbajas_obs`, `lucesstops_chk`, `lucesstops_obs`, `lucesreversa_chk`, `lucesreversa_obs`, `lucesparqueo_chk`, `lucesparqueo_obs`, `limpiabrizas_chk`, `limpiabrizas_obs`, `frenoprincipal_chk`, `frenoprincipal_obs`, `frenoemergencia_chk`, `frenoemergencia_obs`, `llantadelante_chk`, `llantadelante_obs`, `llantaatras_chk`, `llantaatras_obs`, `llantarepuesto_chk`, `llantarepuesto_obs`, `espejolateral_chk`, `espejolateral_obs`, `espejoretrovisor_chk`, `espejoretrovisor_obs`, `pito_chk`, `pito_obs`, `fluidofrenos_chk`, `fluidofrenos_obs`, `fluidoaceite_chk`, `fluidoaceite_obs`, `fluidorefrigera_chk`, `fluidorefrigera_obs`, `apoyadelante_chk`, `apoyadelante_obs`, `apoyaatras_chk`, `apoyaatras_obs`, `cinturon_chk`, `cinturon_obs`, `mantenaceite`, `mantenaceite_chk`, `mantenaceite_obs`, `mantensincro`, `mantensincro_chk`, `mantensincro_obs`, `mantenalinea`, `mantenalinea_chk`, `mantenalinea_obs`, `mantenllantas`, `mantenllantas_chk`, `mantenllantas_obs`, `tecnomecanica`, `tecnomecanica_chk`, `tecnomecanica_obs`, `soatvencimiento`, `soatvencimiento_chk`, `soatvencimiento_obs`, `extintor`, `extintor_chk`, `extintor_obs`, `capaextintor`, `capaextintor_chk`, `capaextintor_obs`, `herramienta_chk`, `herramienta_obs`, `cruceta_chk`, `cruceta_obs`, `gato_chk`, `gato_obs`, `taco_chk`, `taco_obs`, `senales_chk`, `senales_obs`, `chaleco_chk`, `chaleco_obs`, `botiquin_chk`, `botiquin_obs`, `final_obs`, `fch_registro`, `user_registro`, `user_aprueba`, `estado`) VALUES ('2', '2', '1', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '', '2018-04-17 13:30:05', '1', '1', '1');
INSERT INTO `alistamientos` (`id`, `vehiculo_id`, `conductor_id`, `licencia_chk`, `licencia_obs`, `soat_chk`, `soat_obs`, `rtm_chk`, `rtm_obs`, `seguros_chk`, `seguros_obs`, `direcdelante_chk`, `direcdelante_obs`, `direcatras_chk`, `direcatras_obs`, `lucesaltas_chk`, `lucesaltas_obs`, `lucesbajas_chk`, `lucesbajas_obs`, `lucesstops_chk`, `lucesstops_obs`, `lucesreversa_chk`, `lucesreversa_obs`, `lucesparqueo_chk`, `lucesparqueo_obs`, `limpiabrizas_chk`, `limpiabrizas_obs`, `frenoprincipal_chk`, `frenoprincipal_obs`, `frenoemergencia_chk`, `frenoemergencia_obs`, `llantadelante_chk`, `llantadelante_obs`, `llantaatras_chk`, `llantaatras_obs`, `llantarepuesto_chk`, `llantarepuesto_obs`, `espejolateral_chk`, `espejolateral_obs`, `espejoretrovisor_chk`, `espejoretrovisor_obs`, `pito_chk`, `pito_obs`, `fluidofrenos_chk`, `fluidofrenos_obs`, `fluidoaceite_chk`, `fluidoaceite_obs`, `fluidorefrigera_chk`, `fluidorefrigera_obs`, `apoyadelante_chk`, `apoyadelante_obs`, `apoyaatras_chk`, `apoyaatras_obs`, `cinturon_chk`, `cinturon_obs`, `mantenaceite`, `mantenaceite_chk`, `mantenaceite_obs`, `mantensincro`, `mantensincro_chk`, `mantensincro_obs`, `mantenalinea`, `mantenalinea_chk`, `mantenalinea_obs`, `mantenllantas`, `mantenllantas_chk`, `mantenllantas_obs`, `tecnomecanica`, `tecnomecanica_chk`, `tecnomecanica_obs`, `soatvencimiento`, `soatvencimiento_chk`, `soatvencimiento_obs`, `extintor`, `extintor_chk`, `extintor_obs`, `capaextintor`, `capaextintor_chk`, `capaextintor_obs`, `herramienta_chk`, `herramienta_obs`, `cruceta_chk`, `cruceta_obs`, `gato_chk`, `gato_obs`, `taco_chk`, `taco_obs`, `senales_chk`, `senales_obs`, `chaleco_chk`, `chaleco_obs`, `botiquin_chk`, `botiquin_obs`, `final_obs`, `fch_registro`, `user_registro`, `user_aprueba`, `estado`) VALUES ('3', '2', '1', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', 'Esta todo correcto°!!', '2018-04-18 18:43:23', '1', '1', '2');
INSERT INTO `alistamientos` (`id`, `vehiculo_id`, `conductor_id`, `licencia_chk`, `licencia_obs`, `soat_chk`, `soat_obs`, `rtm_chk`, `rtm_obs`, `seguros_chk`, `seguros_obs`, `direcdelante_chk`, `direcdelante_obs`, `direcatras_chk`, `direcatras_obs`, `lucesaltas_chk`, `lucesaltas_obs`, `lucesbajas_chk`, `lucesbajas_obs`, `lucesstops_chk`, `lucesstops_obs`, `lucesreversa_chk`, `lucesreversa_obs`, `lucesparqueo_chk`, `lucesparqueo_obs`, `limpiabrizas_chk`, `limpiabrizas_obs`, `frenoprincipal_chk`, `frenoprincipal_obs`, `frenoemergencia_chk`, `frenoemergencia_obs`, `llantadelante_chk`, `llantadelante_obs`, `llantaatras_chk`, `llantaatras_obs`, `llantarepuesto_chk`, `llantarepuesto_obs`, `espejolateral_chk`, `espejolateral_obs`, `espejoretrovisor_chk`, `espejoretrovisor_obs`, `pito_chk`, `pito_obs`, `fluidofrenos_chk`, `fluidofrenos_obs`, `fluidoaceite_chk`, `fluidoaceite_obs`, `fluidorefrigera_chk`, `fluidorefrigera_obs`, `apoyadelante_chk`, `apoyadelante_obs`, `apoyaatras_chk`, `apoyaatras_obs`, `cinturon_chk`, `cinturon_obs`, `mantenaceite`, `mantenaceite_chk`, `mantenaceite_obs`, `mantensincro`, `mantensincro_chk`, `mantensincro_obs`, `mantenalinea`, `mantenalinea_chk`, `mantenalinea_obs`, `mantenllantas`, `mantenllantas_chk`, `mantenllantas_obs`, `tecnomecanica`, `tecnomecanica_chk`, `tecnomecanica_obs`, `soatvencimiento`, `soatvencimiento_chk`, `soatvencimiento_obs`, `extintor`, `extintor_chk`, `extintor_obs`, `capaextintor`, `capaextintor_chk`, `capaextintor_obs`, `herramienta_chk`, `herramienta_obs`, `cruceta_chk`, `cruceta_obs`, `gato_chk`, `gato_obs`, `taco_chk`, `taco_obs`, `senales_chk`, `senales_obs`, `chaleco_chk`, `chaleco_obs`, `botiquin_chk`, `botiquin_obs`, `final_obs`, `fch_registro`, `user_registro`, `user_aprueba`, `estado`) VALUES ('6', '2', '1', '1', 'Algun comentario', '1', 'Algun comentario', '1', 'Algun comentario', '1', 'Algun comentario', '1', '', '1', '', '1', 'Algun comentario', '1', 'Algun comentario', '1', '', '1', '', '1', '', '1', '', '1', '', NULL, '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', 'todo correcto para este alistamiento', '2018-04-27 08:49:08', '1', '1', '1');
INSERT INTO `alistamientos` (`id`, `vehiculo_id`, `conductor_id`, `licencia_chk`, `licencia_obs`, `soat_chk`, `soat_obs`, `rtm_chk`, `rtm_obs`, `seguros_chk`, `seguros_obs`, `direcdelante_chk`, `direcdelante_obs`, `direcatras_chk`, `direcatras_obs`, `lucesaltas_chk`, `lucesaltas_obs`, `lucesbajas_chk`, `lucesbajas_obs`, `lucesstops_chk`, `lucesstops_obs`, `lucesreversa_chk`, `lucesreversa_obs`, `lucesparqueo_chk`, `lucesparqueo_obs`, `limpiabrizas_chk`, `limpiabrizas_obs`, `frenoprincipal_chk`, `frenoprincipal_obs`, `frenoemergencia_chk`, `frenoemergencia_obs`, `llantadelante_chk`, `llantadelante_obs`, `llantaatras_chk`, `llantaatras_obs`, `llantarepuesto_chk`, `llantarepuesto_obs`, `espejolateral_chk`, `espejolateral_obs`, `espejoretrovisor_chk`, `espejoretrovisor_obs`, `pito_chk`, `pito_obs`, `fluidofrenos_chk`, `fluidofrenos_obs`, `fluidoaceite_chk`, `fluidoaceite_obs`, `fluidorefrigera_chk`, `fluidorefrigera_obs`, `apoyadelante_chk`, `apoyadelante_obs`, `apoyaatras_chk`, `apoyaatras_obs`, `cinturon_chk`, `cinturon_obs`, `mantenaceite`, `mantenaceite_chk`, `mantenaceite_obs`, `mantensincro`, `mantensincro_chk`, `mantensincro_obs`, `mantenalinea`, `mantenalinea_chk`, `mantenalinea_obs`, `mantenllantas`, `mantenllantas_chk`, `mantenllantas_obs`, `tecnomecanica`, `tecnomecanica_chk`, `tecnomecanica_obs`, `soatvencimiento`, `soatvencimiento_chk`, `soatvencimiento_obs`, `extintor`, `extintor_chk`, `extintor_obs`, `capaextintor`, `capaextintor_chk`, `capaextintor_obs`, `herramienta_chk`, `herramienta_obs`, `cruceta_chk`, `cruceta_obs`, `gato_chk`, `gato_obs`, `taco_chk`, `taco_obs`, `senales_chk`, `senales_obs`, `chaleco_chk`, `chaleco_obs`, `botiquin_chk`, `botiquin_obs`, `final_obs`, `fch_registro`, `user_registro`, `user_aprueba`, `estado`) VALUES ('7', '2', '1', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '1', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '', '2018-04-27 08:49:18', '1', '1', '2');
INSERT INTO `alistamientos` (`id`, `vehiculo_id`, `conductor_id`, `licencia_chk`, `licencia_obs`, `soat_chk`, `soat_obs`, `rtm_chk`, `rtm_obs`, `seguros_chk`, `seguros_obs`, `direcdelante_chk`, `direcdelante_obs`, `direcatras_chk`, `direcatras_obs`, `lucesaltas_chk`, `lucesaltas_obs`, `lucesbajas_chk`, `lucesbajas_obs`, `lucesstops_chk`, `lucesstops_obs`, `lucesreversa_chk`, `lucesreversa_obs`, `lucesparqueo_chk`, `lucesparqueo_obs`, `limpiabrizas_chk`, `limpiabrizas_obs`, `frenoprincipal_chk`, `frenoprincipal_obs`, `frenoemergencia_chk`, `frenoemergencia_obs`, `llantadelante_chk`, `llantadelante_obs`, `llantaatras_chk`, `llantaatras_obs`, `llantarepuesto_chk`, `llantarepuesto_obs`, `espejolateral_chk`, `espejolateral_obs`, `espejoretrovisor_chk`, `espejoretrovisor_obs`, `pito_chk`, `pito_obs`, `fluidofrenos_chk`, `fluidofrenos_obs`, `fluidoaceite_chk`, `fluidoaceite_obs`, `fluidorefrigera_chk`, `fluidorefrigera_obs`, `apoyadelante_chk`, `apoyadelante_obs`, `apoyaatras_chk`, `apoyaatras_obs`, `cinturon_chk`, `cinturon_obs`, `mantenaceite`, `mantenaceite_chk`, `mantenaceite_obs`, `mantensincro`, `mantensincro_chk`, `mantensincro_obs`, `mantenalinea`, `mantenalinea_chk`, `mantenalinea_obs`, `mantenllantas`, `mantenllantas_chk`, `mantenllantas_obs`, `tecnomecanica`, `tecnomecanica_chk`, `tecnomecanica_obs`, `soatvencimiento`, `soatvencimiento_chk`, `soatvencimiento_obs`, `extintor`, `extintor_chk`, `extintor_obs`, `capaextintor`, `capaextintor_chk`, `capaextintor_obs`, `herramienta_chk`, `herramienta_obs`, `cruceta_chk`, `cruceta_obs`, `gato_chk`, `gato_obs`, `taco_chk`, `taco_obs`, `senales_chk`, `senales_obs`, `chaleco_chk`, `chaleco_obs`, `botiquin_chk`, `botiquin_obs`, `final_obs`, `fch_registro`, `user_registro`, `user_aprueba`, `estado`) VALUES ('8', '2', '1', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', NULL, '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', '1', '', 'Todo esta correcto', '2018-04-27 08:33:05', '1', NULL, '0');


#
# TABLE STRUCTURE FOR: asignaciones
#

DROP TABLE IF EXISTS `asignaciones`;

CREATE TABLE `asignaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int(11) DEFAULT NULL,
  `conductor_id` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_conductores_idx` (`conductor_id`),
  KEY `fk_vehiculos_idx` (`vehiculo_id`),
  CONSTRAINT `fk_conductores` FOREIGN KEY (`conductor_id`) REFERENCES `conductores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_vehiculos` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `asignaciones` (`id`, `vehiculo_id`, `conductor_id`, `fecha`) VALUES ('1', '2', '1', '2018-04-13 04:13:16');
INSERT INTO `asignaciones` (`id`, `vehiculo_id`, `conductor_id`, `fecha`) VALUES ('2', '3', '2', '2018-04-15 05:09:05');
INSERT INTO `asignaciones` (`id`, `vehiculo_id`, `conductor_id`, `fecha`) VALUES ('3', '2', '6', '2018-04-27 15:17:26');


#
# TABLE STRUCTURE FOR: conductores
#

DROP TABLE IF EXISTS `conductores`;

CREATE TABLE `conductores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(45) DEFAULT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `foto` text,
  `hoja` text,
  `fecha` timestamp NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `conductores` (`id`, `documento`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `foto`, `hoja`, `fecha`, `estado`) VALUES ('1', '46767421', 'luis', 'su casa', NULL, '4545454', 'luis@gmail.com', NULL, NULL, '2018-04-05 03:53:43', '1');
INSERT INTO `conductores` (`id`, `documento`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `foto`, `hoja`, `fecha`, `estado`) VALUES ('2', '10120121', 'juan', ' Perez', 'direccion de juan', '454545', 'juan@gmail.com', NULL, NULL, '2018-04-05 04:12:04', '1');
INSERT INTO `conductores` (`id`, `documento`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `foto`, `hoja`, `fecha`, `estado`) VALUES ('3', '12131412', 'gean', 'fernandez', 'Calle moquegua 340', '4545454', 'gean@gmail.com', 'user2-160x160.jpg', 'constancia.pdf', '2018-04-05 04:15:24', '1');
INSERT INTO `conductores` (`id`, `documento`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `foto`, `hoja`, `fecha`, `estado`) VALUES ('4', '46767422', 'luis ', 'carpio', 'calle arequipa 430', '', '', '', '', '2018-04-07 15:08:12', '1');
INSERT INTO `conductores` (`id`, `documento`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `foto`, `hoja`, `fecha`, `estado`) VALUES ('5', '46767423', 'karla beatriz', 'rodriguez ponce', 'Calle moquegua 340', '43434345', 'karla@gmail.com', '', '', '2018-04-15 08:40:39', '1');
INSERT INTO `conductores` (`id`, `documento`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `foto`, `hoja`, `fecha`, `estado`) VALUES ('6', '4676745', 'carlos ', 'gutierrez', 'Jr. Moquegua 4390', '', 'carlosg@gmail.com', '', '', '2018-04-07 15:09:46', '0');
INSERT INTO `conductores` (`id`, `documento`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, `foto`, `hoja`, `fecha`, `estado`) VALUES ('7', '46767898', 'yony brondy', 'mamani fuentes', 'jr. moquegua 310', '054565454', '', '', '', '2018-04-27 17:07:39', '1');


#
# TABLE STRUCTURE FOR: empresas
#

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(20) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('1', '121212121', 'Empresa Soldadura', 'direccion 01', '3434343', 'empresa01@gmail.com', '2018-04-22 18:55:48', '1', 'Desert.jpg');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('2', '11110211', 'Empresa 01', 'DIRECCION 02', '4545454', 'empresa02@gmail.com', '2018-04-27 14:55:50', '1', '');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('3', '454454442', 'empresa 03', 'direccion 03', '4545454', 'empresa03@gmail.com', '2018-04-06 00:00:00', '1', '');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('4', '5454321', 'empresa 04', 'direccion emprsa 04', '545454', 'empresa04@gmail.com', '2018-04-04 20:51:36', '1', '');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('5', '12121211', 'empresa robles sa', 'calle pichincha 430', '053545467', 'empresaroblessa@hotmail.com', '2018-04-07 14:43:55', '1', '');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('6', '10010201', 'Empresa de Seguros', 'calle arica 430', '054545452', 'empresaseguros@gmail.com', '2018-04-15 02:55:46', '1', '');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('7', '203040512', 'Empresa Textil', 'calle moquegua 430', '4040213', 'empresatextil@gmail.com', '2018-04-27 16:52:25', '1', '');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('8', '390400112', 'empresa cardenas sa', 'jr abatao 450', '409044', 'empresacardenas@gmail.com', '2018-04-15 03:01:30', '0', '');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('9', '1020304012', 'empresa brondy', 'Jr abtao 340', '053434343', 'brondy@gmail.com', '2018-04-27 17:07:19', '1', '');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('10', '10200103', 'Los pierolas s.r.l', 'Calle Arica 320', '454646', 'lospierolassrl@gmail.com', '2018-04-22 18:38:51', '1', 'Koala.jpg');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('11', '2001020166', 'Carty S.A', 'Av. Sarmiento 430', '', '', '2018-04-22 18:02:17', '1', 'Penguins.jpg');
INSERT INTO `empresas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`, `logo`) VALUES ('12', '343434312', 'Fernandez S.A', 'Calle Miraflores 340', '', '', '2018-04-27 14:49:38', '1', 'Captura.PNG');


#
# TABLE STRUCTURE FOR: logs
#

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `modulo` varchar(200) NOT NULL,
  `accion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('1', '2018-04-27 14:37:20', '1', 'Vehiculos', '', 'Inserción de nuevo Vehiculo con placa ahc01');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('2', '2018-04-27 14:43:06', '1', 'Vehiculos', '', 'Actualización del Vehiculo con placa 001');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('3', '2018-04-27 14:43:57', '1', 'Vehiculos', '', 'Eliminación del Vehiculo con placa ah1021');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('4', '2018-04-27 14:49:38', '1', 'Empresas', '', 'Inserción de nueva Empresa con NIT 343434312');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('5', '2018-04-27 14:55:50', '1', 'Empresas', '', 'Actualización de la Empresa con NIT 11110211');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('6', '2018-04-27 14:56:12', '1', 'Empresas', '', 'Eliminación de la Empresa con NIT 203040512');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('7', '2018-04-27 14:58:23', '1', 'Conductores', '', 'Inserción de nuevo Coductor con documento 46767898');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('8', '2018-04-27 14:59:01', '1', 'Conductores', '', 'Actualización del Conductor con documento 46767898');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('9', '2018-04-27 14:59:15', '1', 'Conductores', '', 'Eliminación del Conductor con documento 46767898');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('10', '2018-04-27 15:17:26', '1', 'Asignaciones', '', 'Inserción de nueva Asignaciones del Conductor 4676745  con el Vehiculo 001');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('11', '2018-04-27 15:33:05', '1', 'Alistamientos', '', 'Inserción de nuevo Alistamiento con número 8');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('12', '2018-04-27 15:40:37', '1', 'Vehiculos', '', 'Inserción de nuevo Mantenimiento para el Vehiculo con placa');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('13', '2018-04-27 15:41:31', '1', 'Vehiculos', '', 'Actualización del Mantenimiento al Vehiculo con placa 001');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('14', '2018-04-27 15:49:08', '1', 'Alistamientos', '', 'Aprobación del Alistamiento N°6');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('15', '2018-04-27 15:49:18', '1', 'Alistamientos', '', 'No Aprobación del Alistamiento N°7');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('16', '2018-04-27 15:55:39', '1', 'Usuarios', '', 'Actualización del Usuario julio@gmail.com');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('17', '2018-04-27 15:55:56', '1', 'Usuarios', '', 'Eliminación del Usuario geanf@gmail.com');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('18', '2018-04-27 16:52:25', '1', 'Empresas', '', 'Actualización de la Empresa con NIT 203040512');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('19', '2018-04-27 17:06:53', '1', 'Vehiculos', '', 'Actualización del Vehiculo con placa ahc01');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('20', '2018-04-27 17:07:19', '1', 'Empresas', '', 'Actualización de la Empresa con NIT 1020304012');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('21', '2018-04-27 17:07:39', '1', 'Conductores', '', 'Actualización del Conductor con documento 46767898');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('22', '2018-04-27 17:19:44', '1', 'Usuarios', '', 'Cierre de sesión');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('23', '2018-04-27 17:20:10', '1', 'Usuarios', '', 'Inicio de sesión');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('24', '2018-04-28 17:56:49', '1', 'Usuarios', '', 'Inicio de sesión');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('25', '2018-04-28 17:59:40', '1', 'Proveedores', '', 'Inserción de nuevo Proveedor con NIT 401020010');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('26', '2018-04-28 18:18:30', '1', 'Proveedores', '', 'Actualización del Proveedor con NIT 401020012');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('27', '2018-04-28 18:22:20', '1', 'Proveedores', '', 'Eliminación del Proveedor con NIT 401020012');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('28', '2018-04-28 18:22:32', '1', 'Proveedores', '', 'Actualización del Proveedor con NIT 401020012');
INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES ('29', '2018-04-28 20:37:28', '1', 'Proveedores', '', 'Eliminación del Proveedor con NIT ');


#
# TABLE STRUCTURE FOR: mantenimientos
#

DROP TABLE IF EXISTS `mantenimientos`;

CREATE TABLE `mantenimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int(11) NOT NULL,
  `tipomantenimiento_id` int(11) NOT NULL,
  `numfac` varchar(100) NOT NULL,
  `proveedor` varchar(250) NOT NULL,
  `costo` varchar(200) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehiculo_id` (`vehiculo_id`),
  KEY `tipomantenimiento_id` (`tipomantenimiento_id`),
  CONSTRAINT `mantenimientos_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`),
  CONSTRAINT `mantenimientos_ibfk_2` FOREIGN KEY (`tipomantenimiento_id`) REFERENCES `tipo_mantenimientos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `mantenimientos` (`id`, `vehiculo_id`, `tipomantenimiento_id`, `numfac`, `proveedor`, `costo`, `fecha_vencimiento`, `descripcion`, `cantidad`, `fecha`) VALUES ('1', '4', '1', '1001012', 'Los gonzales S.A', '150.00', '2018-04-30', 'MANTENIMIENTO DE SOAT', '', '2018-04-22');
INSERT INTO `mantenimientos` (`id`, `vehiculo_id`, `tipomantenimiento_id`, `numfac`, `proveedor`, `costo`, `fecha_vencimiento`, `descripcion`, `cantidad`, `fecha`) VALUES ('2', '4', '2', '10010', 'LOS MARTINEZ', '100.40', '2018-04-27', 'REVISION TECNICOMECANICA', '', '2018-04-21');
INSERT INTO `mantenimientos` (`id`, `vehiculo_id`, `tipomantenimiento_id`, `numfac`, `proveedor`, `costo`, `fecha_vencimiento`, `descripcion`, `cantidad`, `fecha`) VALUES ('3', '4', '4', '1021012', 'Los mochos s.a', '300.00', '2018-04-19', 'cambio de aceite', '', '2018-04-19');
INSERT INTO `mantenimientos` (`id`, `vehiculo_id`, `tipomantenimiento_id`, `numfac`, `proveedor`, `costo`, `fecha_vencimiento`, `descripcion`, `cantidad`, `fecha`) VALUES ('4', '4', '8', '1010212', 'Salinas S.A', '100.00', '2018-04-19', 'cambio de extintor', '100', '2018-04-20');
INSERT INTO `mantenimientos` (`id`, `vehiculo_id`, `tipomantenimiento_id`, `numfac`, `proveedor`, `costo`, `fecha_vencimiento`, `descripcion`, `cantidad`, `fecha`) VALUES ('5', '2', '3', 'FAC120012', 'los mendozas S.A', '400.00', '2018-04-27', 'Mantenimiento de Seguros', '', '2018-04-27');


#
# TABLE STRUCTURE FOR: proveedores
#

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(150) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `proveedores` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `correo`, `fecha`, `estado`) VALUES ('1', '401020012', 'Los Fernandez S.A', 'Calle Arequipa 310', '454522', 'losfernandez@gmail.com', '2018-04-28 18:22:32', '1');


#
# TABLE STRUCTURE FOR: roles
#

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `estado`) VALUES ('1', 'Administrador', NULL, '1');
INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `estado`) VALUES ('2', 'Despachador', NULL, '1');
INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `estado`) VALUES ('3', 'Jefe de Ruta', NULL, '1');
INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `estado`) VALUES ('4', 'Usuario', NULL, '1');


#
# TABLE STRUCTURE FOR: tipo_mantenimientos
#

DROP TABLE IF EXISTS `tipo_mantenimientos`;

CREATE TABLE `tipo_mantenimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `tipo_mantenimientos` (`id`, `nombre`) VALUES ('1', 'SOAT');
INSERT INTO `tipo_mantenimientos` (`id`, `nombre`) VALUES ('2', 'REVISION TECNICOMECANICA');
INSERT INTO `tipo_mantenimientos` (`id`, `nombre`) VALUES ('3', 'SEGUROS DAÑOS Y RC');
INSERT INTO `tipo_mantenimientos` (`id`, `nombre`) VALUES ('4', 'CAMBIO DE ACEITE');
INSERT INTO `tipo_mantenimientos` (`id`, `nombre`) VALUES ('5', 'SINCRONIZACION');
INSERT INTO `tipo_mantenimientos` (`id`, `nombre`) VALUES ('6', 'ALINEACION - BALANCEO');
INSERT INTO `tipo_mantenimientos` (`id`, `nombre`) VALUES ('7', 'CAMBIO DE LLANTAS');
INSERT INTO `tipo_mantenimientos` (`id`, `nombre`) VALUES ('8', 'EXTINTOR');


#
# TABLE STRUCTURE FOR: usuarios
#

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) DEFAULT NULL,
  `sexo` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `imagen` text NOT NULL,
  `hoja` text NOT NULL,
  `firma` text NOT NULL,
  `cedula` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rol_idx` (`rol`),
  CONSTRAINT `fk_rol` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `nombres`, `sexo`, `email`, `password`, `estado`, `rol`, `imagen`, `hoja`, `firma`, `cedula`) VALUES ('1', 'Yony Brondy Fuentes', 'M', 'yonybrondy17@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', '1', 'avatar51.png', 'ErrorTicket1.pdf', '4.JPG', '45654311');
INSERT INTO `usuarios` (`id`, `nombres`, `sexo`, `email`, `password`, `estado`, `rol`, `imagen`, `hoja`, `firma`, `cedula`) VALUES ('2', 'juan perez', '', 'juan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', '2', '', '', 'Koala.jpg', '45654314');
INSERT INTO `usuarios` (`id`, `nombres`, `sexo`, `email`, `password`, `estado`, `rol`, `imagen`, `hoja`, `firma`, `cedula`) VALUES ('3', 'abel', '', 'abel@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', '4', '', '', '', '45654315');
INSERT INTO `usuarios` (`id`, `nombres`, `sexo`, `email`, `password`, `estado`, `rol`, `imagen`, `hoja`, `firma`, `cedula`) VALUES ('4', 'santiago miguel', '', 'santiago@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', '3', '', '', 'Lighthouse.jpg', '45654345');
INSERT INTO `usuarios` (`id`, `nombres`, `sexo`, `email`, `password`, `estado`, `rol`, `imagen`, `hoja`, `firma`, `cedula`) VALUES ('5', 'Yessica Fuentes', 'F', 'yessica@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', '4', 'imagen_femenino.jpg', '', '', '32123556');
INSERT INTO `usuarios` (`id`, `nombres`, `sexo`, `email`, `password`, `estado`, `rol`, `imagen`, `hoja`, `firma`, `cedula`) VALUES ('6', 'gean  fernandez', 'M', 'geanf@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0', '4', 'imagen_masculino.jpg', '', '', '45432145');
INSERT INTO `usuarios` (`id`, `nombres`, `sexo`, `email`, `password`, `estado`, `rol`, `imagen`, `hoja`, `firma`, `cedula`) VALUES ('7', 'Julio Grondona Cardona', 'M', 'julio@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0', '4', 'imagen_masculino.jpg', '', '', '4543222');


#
# TABLE STRUCTURE FOR: vehiculos
#

DROP TABLE IF EXISTS `vehiculos`;

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `kilometraje` varchar(45) DEFAULT NULL,
  `tarjeta` date DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `licencia` varchar(45) DEFAULT NULL,
  `fv_licencia` date DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empresa_idx` (`empresa_id`),
  CONSTRAINT `fk_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `vehiculos` (`id`, `placa`, `numero`, `kilometraje`, `tarjeta`, `empresa_id`, `fecha`, `licencia`, `fv_licencia`, `estado`) VALUES ('2', '001', '0001', '100 KM/S', '2018-04-09', '1', '2018-04-27', '7678690', '2018-05-01', '1');
INSERT INTO `vehiculos` (`id`, `placa`, `numero`, `kilometraje`, `tarjeta`, `empresa_id`, `fecha`, `licencia`, `fv_licencia`, `estado`) VALUES ('3', 'placa 01', '1001011', '100 KM/S', '2018-04-11', '1', '2018-04-10', NULL, NULL, '1');
INSERT INTO `vehiculos` (`id`, `placa`, `numero`, `kilometraje`, `tarjeta`, `empresa_id`, `fecha`, `licencia`, `fv_licencia`, `estado`) VALUES ('4', 'Ahk2343', '001', '176008', '2018-04-12', '1', '2018-04-13', NULL, NULL, '1');
INSERT INTO `vehiculos` (`id`, `placa`, `numero`, `kilometraje`, `tarjeta`, `empresa_id`, `fecha`, `licencia`, `fv_licencia`, `estado`) VALUES ('5', 'ah1021', '101020', '400031', '2018-04-14', '1', '2018-04-22', '', '2018-04-26', '0');
INSERT INTO `vehiculos` (`id`, `placa`, `numero`, `kilometraje`, `tarjeta`, `empresa_id`, `fecha`, `licencia`, `fv_licencia`, `estado`) VALUES ('6', 'kaks11', '1012', '100 KM/S', '2018-04-27', '2', '2018-04-27', '101011p1', '2018-04-30', '0');
INSERT INTO `vehiculos` (`id`, `placa`, `numero`, `kilometraje`, `tarjeta`, `empresa_id`, `fecha`, `licencia`, `fv_licencia`, `estado`) VALUES ('7', 'ahc01', '34341221', '200 ', '2018-04-27', '2', '2018-04-27', '2311201', '2018-04-30', '1');


