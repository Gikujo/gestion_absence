-- create schema gestion_absence;
-- DWWM Juillet 
-- crebas.sql - SQL - DDL - Data definition language
use gestion_absence;

drop table if exists apprendre;
drop table if exists personne;
drop table if exists fonction;
drop table if exists offre; 
drop table if exists formation;

CREATE TABLE FORMATION (
   id_form 	      VARCHAR(10),
   lib_form       VARCHAR(50)       NOT NULL,
   sigle 	      VARCHAR(5) 	      NOT NULL,
   primary key (id_form)
);

CREATE TABLE FONCTION (
   id_fonction    INT               auto_increment,
   nom_fonction   VARCHAR(50)       NOT NULL,
   constraint PK_FONCTION primary key (id_fonction)
);

/*
	cardinalite entre offre et formation 0,1
	Si cardinalite entre offre et formation 1,1 alors id_form VARCHAR(50) not null,
*/
CREATE TABLE OFFRE(
   id_offre    VARCHAR(50),
   lib_offre   VARCHAR(50)          NOT NULL,
   date_deb    DATE,
   date_fin    DATE,
   id_form     VARCHAR(50),
   FOREIGN KEY(id_form) REFERENCES FORMATION(id_form)
);

alter table offre add constraint PK_OFFRE primary key (id_offre);

CREATE TABLE PERSONNE (
   id_pers 			VARCHAR(50),
   nom 				VARCHAR(50) 		NOT NULL,
   prenom 			VARCHAR(50) 		NOT NULL,
   email 			VARCHAR(50) 		NOT NULL,
   photo 			VARCHAR(50),
   mdp 				VARCHAR(50) 		NOT NULL,
   civilite 		VARCHAR(50),
   nb_enfants 		INT,
   offre_stag 		VARCHAR(50),
   id_fonction 		INT,
   telephone      VARCHAR(20),
   date_naiss 		DATE,
   constraint PK_PERSONNE 			   primary key (id_pers),
   constraint FK_PERSONNE_OFFRE 	   FOREIGN KEY(offre_stag) REFERENCES OFFRE(id_offre),
   constraint FK_PERSONNE_FONCTION 	FOREIGN KEY(id_fonction) REFERENCES FONCTION(id_fonction),
   constraint CKC_PERSONNE_ENFANTS 	check (nb_enfants between 0 and 10),
   constraint CKC_CIVILITE 			check (civilite in ('Mr','Mme'))
);

CREATE TABLE apprendre (
   codeAgent   VARCHAR(50),
   id_offre    VARCHAR(50),
   constraint PK_APPRENDRE primary key (codeAgent, id_offre)
);
alter table apprendre
   add constraint FK_CODEAGENT_APPRENDRE foreign key (codeAgent)
      references PERSONNE(id_pers);
alter table apprendre
   add constraint FK_OFFRE_APPRENDRE foreign key (id_offre)
      references OFFRE(id_offre);
