-- jeuEssai.sql - SQL - DML - Data manipulation language

use gestion_absence;
-- pour les delete
set SQL_SAFE_UPDATES = 0;

delete from apprendre;
delete from personne;
delete from offre;
delete from formation;
delete from fonction;

-- INSERT INTO FONCTION (nom_fonction) VALUES ('Stagiaire');
-- INSERT INTO FONCTION (nom_fonction) VALUES ('Formateur');
INSERT INTO FONCTION (id_fonction,nom_fonction) VALUES (1,'Stagiaire');
INSERT INTO FONCTION (id_fonction,nom_fonction) VALUES (2,'Formateur');
INSERT INTO FONCTION (id_fonction,nom_fonction) VALUES (3,'Admin');

INSERT INTO formation (id_form, lib_form, sigle) VALUES ('F1','Développeur Web & Web mobile','DWWM');
INSERT INTO formation (id_form, lib_form, sigle) VALUES ('F2','Concepteur Développeur d''Application','CDA');
INSERT INTO formation (id_form, lib_form, sigle) VALUES ('F3','Assistant Ressources humaines','ARH');

INSERT INTO offre (id_offre, lib_offre, date_deb, date_fin, id_form) VALUES ('22285','TP_DWWM_OG_285','2023/04/11','2023/11/24','F1');
INSERT INTO offre (id_offre, lib_offre, date_deb, date_fin, id_form) VALUES ('22286','TP_DWWM_OG_286','2023/06/12','2024/01/28','F1');
INSERT INTO offre (id_offre, lib_offre, date_deb, date_fin, id_form) VALUES ('22281','TP_DWWM_281',null,null,'F1');
INSERT INTO offre (id_offre, lib_offre, date_deb, date_fin, id_form) VALUES ('22999','TP_CDA_999',null,null,'F2');

INSERT INTO personne (id_pers, nom, prenom, email, photo, mdp, civilite, nb_enfants, offre_stag, id_fonction, date_naiss, telephone) VALUES
			('23073002','Canal','Lionel','lionel@truc.fr','trombine.jpg','lionel','Mr',8,'22286',1,'2000/01/01', '0610111213'),
			('22065081','Tortosa','Sofiane','sofiane@truc.fr','trombine.jpg','sofiane','Mr',4,'22285',1,'2000/01/01', '0610111214'),
			('23005065','Segura','Miguel','miguel@truc.fr','trombine.jpg','miguel','Mr',4,'22285',1,'2000/01/01', '0610111215'),
            ('02CP091','Muller','Dominique','dm@truc.fr','trombine.jpg','dominique','Mme',2,null,2,'2000/01/01', '0610111216'),
            ('02CP090','Muller','Toto','dm1@truc.fr','trombine.jpg','dominique','Mme',2,null,2,'2000/01/01', '0610111217'),
            ('23105256','Muller','Toto','dm1@truc.fr','trombine.jpg','dominique','Mme',2,null,1,'2000/01/01', '0610111218')
;

INSERT INTO apprendre (codeAgent, id_offre) VALUES ('02CP091', '22286');
INSERT INTO apprendre (codeAgent, id_offre) VALUES ('02CP091', '22285');

-- tests

-- select * from personne;

 -- INSERT INTO personne (id_pers, nom, prenom, email, photo, mdp, civilite, nb_enfants, offre_stag, id_fonction) VALUES
-- 			('xx','xx','xx','xx@truc.fr','trombine.jpg','xx','xx',8,'22286',1)		-- KO Civilite
--          ('xx','xx','xx','xx@truc.fr','trombine.jpg','xx',null,8,'22286',1)		-- OK
--          ('xx1','xx','xx','xx@truc.fr','trombine.jpg','xx','mr',8,'22286',1)		-- OK
--          ('xx2','xx','xx','xx@truc.fr','trombine.jpg','xx','mme',8,'22286',1)	-- OK
-- 		    ('xx3',null,'xx','xx@truc.fr','trombine.jpg','xx','mme',8,'22286',1)	-- KO
--   	    ('xx4','xx',null,'xx@truc.fr','trombine.jpg','xx','mme',8,'22286',1)	-- KO
--          ('xx5','xx','xx',null,'trombine.jpg','xx','mme',8,'22286',1)			-- KO
--          ('xx6','xx','xx','xx@truc.fr',null,null,'mme',8,'22286',1)				-- KO pour mdp
--          ('xx7','xx','xx','xx@truc.fr',null,'xx','mme',11,'22286',1)				-- KO Error Code: 3819. Check constraint 'CKC_PERSONNE_ENFANTS' is violated.
--          ('xx8','xx','xx','xx@truc.fr',null,'xx','mme',8,'xx',1)					-- KO Error Code: 1452. Cannot add or update a child row: a foreign key constraint fails 
-- 														(`gestion_absence`.`personne`, CONSTRAINT `FK_PERSONNE_OFFRE` FOREIGN KEY (`offre_stag`) REFERENCES `offre` (`id_offre`))
--           ('xx9','xx','xx','xx@truc.fr',null,'xx','mme',8,'22286',5)				-- KO Error Code: 1452. Cannot add or update a child row: a foreign key constraint fails 
--                											(`gestion_absence`.`personne`, CONSTRAINT `FK_PERSONNE_FONCTION` FOREIGN KEY (`id_fonction`) REFERENCES `fonction` (`id_fonction`))

;