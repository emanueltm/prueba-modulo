create table municipio(
  fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  fecha_actualizacion datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  estatus int NOT NULL DEFAULT '1',
  fecha_eliminacion datetime DEFAULT NULL,
  id_municipio int(10) not null AUTO_INCREMENT,
  municipio varchar(100) not null,
  primary key (id_municipio)
);

create table escuelas(
  fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  fecha_actualizacion datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  estatus int NOT NULL DEFAULT '1',
  fecha_eliminacion datetime DEFAULT NULL,
  id_escuela int(10) not null AUTO_INCREMENT,
  nombre varchar(100) not null,
  clave varchar(100) not null,
  region int(10) not null,
  total_alumnos int(5) not null,
  turno1 varchar(1) not null,
  turno2 varchar(1) not null,
  id_municipio int(10) not null,
  primary key (id_escuela, id_municipio),
  foreign key (id_municipio) references municipio (id_municipio) on delete cascade on update cascade
);

create table m1_grupos(
  fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  fecha_actualizacion datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  estatus int NOT NULL DEFAULT '1',
  fecha_eliminacion datetime DEFAULT NULL,
  id_grupo int(10) not null AUTO_INCREMENT,
  grupo varchar(25) not null,
  turno varchar(1) not null,
  id_escuela int(10) not null,
  ninos int(5) not null DEFAULT 0,
  ninas int(5) not null DEFAULT 0,
  peso_bajo_ninos int(5) not null DEFAULT 0,
  peso_normal_ninos int(5) not null DEFAULT 0,
  sobrepeso_ninos int(5) not null DEFAULT 0,
  obesidad_ninos int(5) not null DEFAULT 0,
  peso_bajo_ninas int(5) not null DEFAULT 0,
  peso_normal_ninas int(5) not null DEFAULT 0,
  sobrepeso_ninas int(5) not null DEFAULT 0,
  obesidad_ninas int(5) not null DEFAULT 0,
  hemo_ninos int(5) not null DEFAULT 0,
  hemo_ninas int(5) not null DEFAULT 0,
  anemia_ninos int(5) not null DEFAULT 0,
  anemia_ninas int(5) not null DEFAULT 0,
  primary key (id_grupo, id_escuela),
  foreign key (id_escuela) references escuelas (id_escuela) on delete cascade on update cascade
);

create table m1_estudiantes(
  fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  fecha_actualizacion datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  estatus int NOT NULL DEFAULT '1',
  fecha_eliminacion datetime DEFAULT NULL,
  id_estudiante int(10) not null AUTO_INCREMENT,
  nombre_completo varchar(50) not null,
  sexo int(1) not null,
  peso double(3,2) DEFAULT '0.00',
  talla double(3,2) DEFAULT '0.00',
  imc double(2,2) DEFAULT '00.00',
  hemoglabina double(2,1) DEFAULT '00.00',
  anemia int(1) not null DEFAULT '0',
  fecha_entrega_farmacos timestamp DEFAULT null,
  consentimiento int(1) NOT NULL DEFAULT '-1',
  id_grupo int(10) not null,
  primary key (id_estudiante, id_grupo),
  foreign key (id_grupo) references m1_grupos (id_grupo) on delete cascade on update cascade
);

create table roles(
  fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  fecha_actualizacion datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  estatus int NOT NULL DEFAULT '1',
  fecha_eliminacion datetime DEFAULT NULL,
  id_rol int(10) not null AUTO_INCREMENT,
  rol varchar(100) not null,
  primary key (id_rol)
);

create table usuarios(
  fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  fecha_actualizacion datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  estatus int NOT NULL DEFAULT '1',
  fecha_eliminacion datetime DEFAULT NULL,
  id_usuario int(10) not null AUTO_INCREMENT,
  nombre_completo varchar(100) not null,
  usuario varchar(25) not null,
  contrasena varchar(64) not null,
  primary key (id_usuario)
);

create table usuario_rol(
  fecha_creacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  estatus int NOT NULL DEFAULT '1',
  id_usuario int(10) not null,
  id_rol int(10) not null,
  primary key (id_usuario, id_rol),
  foreign key (id_usuario) references usuarios (id_usuario) on delete cascade on update cascade,
  foreign key (id_rol) references roles (id_rol) on delete cascade on update cascade
);

INSERT INTO `usuarios` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'Administrador', 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');
INSERT INTO `usuarios` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'Evelyn Hernandez', 'ev_her', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');
INSERT INTO `usuarios` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'Nombre Completo', 'cap_turistas', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

INSERT INTO `roles` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'Admin');
INSERT INTO `roles` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'Capturista');
INSERT INTO `roles` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'Observardor');

INSERT INTO `usuario_rol` (`fecha_creacion`, `estatus`, `id_usuario`, `id_rol`) VALUES (CURRENT_TIMESTAMP, '1', 1, 1);
INSERT INTO `usuario_rol` (`fecha_creacion`, `estatus`, `id_usuario`, `id_rol`) VALUES (CURRENT_TIMESTAMP, '1', 2, 3);
INSERT INTO `usuario_rol` (`fecha_creacion`, `estatus`, `id_usuario`, `id_rol`) VALUES (CURRENT_TIMESTAMP, '1', 3, 2);

INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'AMAXAC DE GUERRERO');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'APETATITLÁN DE ANTONIO CARVAJAL');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'ATLANGATEPEC');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'ATLTZAYANCA');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'APIZACO');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'CALPULALPAN');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'EL CARMEN TEQUEXQUITLA');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'CUAPIAXTLA');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'CUAXOMULCO');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'CHIAUTEMPAN');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'MUÑOZ DE DOMINGO ARENAS');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'ESPAÑITA');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'HUAMANTLA');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'HUEYOTLIPAN');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'IXTACUIXTLA DE MARIANO MATAMOROS');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'IXTENCO');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'MAZATECOCHCO DE JOSÉ MARÍA MORELOS');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'CONTLA DE JUAN CUAMATZI');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'TEPETITLA DE LARDIZÁBAL');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'SANCTÓRUM DE LÁZARO CÁRDENAS');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'NANACAMILPA DE MARIANO ARISTA');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'TLAXCALA');
INSERT INTO `municipio`  VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'ZACATELCO');

INSERT INTO `escuelas` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'PEDRO RAMIREZ VAZQUEZ', '29EPR0150H', 22, 44, 'm', '', 1); 
INSERT INTO `escuelas` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'NIÑOS HEROES DE CHAPULTEPEC', '29DPR0021O', 22, 145, 'v', '', 1); 
INSERT INTO `escuelas` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'ANTONIO CARVAJAL', '29EPR0126H', 23, 106, 'v', '', 2);
INSERT INTO `escuelas` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'AMADO NERVO', '29DPR0199A', 5, 68, 'm', '', 3);
INSERT INTO `escuelas` VALUES (CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', NULL, NULL, 'CIENCIA Y TRABAJO', '29DPR0273S', 5, 344, 'm', '', 4);