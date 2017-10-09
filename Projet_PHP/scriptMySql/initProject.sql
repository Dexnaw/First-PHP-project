INSERT INTO users (nom, prenom, pseudo, mail, mdp, droits) VALUES (
    'Urbain', 'Arnaud', 'Wanxed', 'arnaud-3@outlook.com', SHA1('lavandeadmin'), 2);

TRUNCATE TABLE cartes;
INSERT INTO cartes (nom, type, classe, cout, image, poussieres) VALUES 
    ('Eclair de jade', 0, 'Chaman', '04', 'img/1.jpg', 40),
    ('Volcan', 0, 'Chaman', '05', 'img/2.jpg', 100),
    ('Esprit farouche', 0, 'Chaman', '03', 'img/3.jpg', 100),
    ('Griffes de jade', 2, 'Chaman', '02', 'img/4.jpg', 100),
	('Eauracle jinyu', 1, 'Chaman', '04', 'img/5.jpg', 100),
	('Chef de jade', 1, 'Chaman', '07', 'img/6.jpg', 40),
	('Totem Langue de feu', 1, 'Chaman', '02', 'img/7.jpg', 0),
	('Chose venue d\'en bas', 1, 'Chaman', '06', 'img/8.jpg', 100),
	('Regard de nacre', 1, 'Chaman', '05', 'img/9.jpg', 1600),
	('Al\'Akir, seigneur des vents', 1, 'Chaman', '08', 'img/10.jpg', 1600),
	('Tir réflexe', 0, 'Chasseur', '02', 'img/11.jpg', 40),
	('Tir explosif', 0, 'Chasseur', '05', 'img/12.jpg', 100),
	('Compagnon animal', 0, 'Chasseur', '03', 'img/13.jpg', 0),
	('Arc long du gladiateur', 2, 'Chasseur', '07', 'img/14.jpg', 400),
	('Elekk du roi', 1, 'Chasseur', '02', 'img/15.jpg', 40),
	('Hyène charognarde', 1, 'Chasseur', '02', 'img/16.jpg', 40),
	('Gentille grand-mère', 1, 'Chasseur', '02', 'img/17.jpg', 40),
	('Grande crinière des savanes', 1, 'Chasseur', '06', 'img/18.jpg', 100),
	('Roi du marais Dred', 1, 'Chasseur', '07', 'img/19.jpg', 1600),
	('Roi Krush', 1, 'Chasseur', '09', 'img/20.jpg', 1600),
	('Potion rougefurie', 0, 'Demoniste', '03', 'img/21.jpg', 100),
	('Flammes infernales', 0, 'Demoniste', '04', 'img/22.jpg', 0),
	('Plaie funeste', 0, 'Demoniste', '05', 'img/23.jpg', 400),
	('Néant distordu', 0, 'Demoniste', '08', 'img/24.jpg', 400),
	('Diablotin de Malchezaar', 1, 'Demoniste', '01', 'img/25.jpg', 40),
	('Chef du gang des diablotins', 1, 'Demoniste', '03', 'img/26.jpg', 40),
	('Garde funeste', 1, 'Demoniste', '05', 'img/27.jpg', 100),
	('Trafiquante de la Kabale', 1, 'Demoniste', '06', 'img/28.jpg', 400),
	('Krul le Déchaîné', 1, 'Demoniste', '09', 'img/29.jpg', 1600),
	('Seigneur Jaraxxus', 1, 'Demoniste', '09', 'img/30.jpg', 1600),
	('Idole corbeau', 0, 'Druide', '01', 'img/31.jpg', 40),
	('Balayage', 0, 'Druide', '04', 'img/32.jpg', 0),
	('Portail de Reflet-de-Lune', 0, 'Druide', '06', 'img/33.jpg', 100),
	('Innervation', 0, 'Druide', '00', 'img/34.jpg', 0),
	('Gardien du bourbier', 1, 'Druide', '04', 'img/35.jpg', 100),
	('Druide de la Griffe', 1, 'Druide', '05', 'img/36.jpg', 40),
	('Gardienne de la Ménagerie', 1, 'Druide', '06', 'img/37.jpg', 40),
	('Raptor de monte', 1, 'Druide', '03', 'img/38.jpg', 40),
	('Cénarius', 1, 'Druide', '09', 'img/39.jpg', 1600),
	('Fandral Forterarmure', 1, 'Druide', '04', 'img/40.jpg', 1600),
	('Revanche', 0, 'Guerrier', '02', 'img/41.jpg', 100),
	('Baston', 0, 'Guerrier', '05', 'img/42.jpg', 400),
	('Exécution', 0, 'Guerrier', '02', 'img/43.jpg', 0),
	('Hache de guerre embrassée', 2, 'Guerrier', '02', 'img/44.jpg', 0),
	('Hurlesang', 2, 'Guerrier', '07', 'img/45.jpg', 400),
	('Brave Sabot-de-Sang', 1, 'Guerrier', '04', 'img/46.jpg', 40),
	('Goule ravageuse', 1, 'Guerrier', '03', 'img/47.jpg', 40),
	('Armurière clandestine', 1, 'Guerrier', '05', 'img/48.jpg', 100),
	('Varian Wrynn', 1, 'Guerrier', '10', 'img/49.jpg', 1600),
	('Grommash Hurlenfer', 1, 'Guerrier', '08', 'img/50.jpg', 1600),
	('Grimoire de cabaliste', 0, 'Mage', '05', 'img/51.jpg', 400),
	('Boule de feu', 0, 'Mage', '04', 'img/52.jpg', 0),
	('Portail des terres de Feu', 0, 'Mage', '07', 'img/53.jpg', 40),
	('Choc de flammes', 0, 'Mage', '07', 'img/54.jpg', 0),
	('Projectiles des Arcanes', 0, 'Mage', '01', 'img/55.jpg', 0),
	('Wyrm de mana', 1, 'Mage', '01', 'img/56.jpg', 40),
	('Elémentaire d\'eau', 1, 'Mage', '04', 'img/57.jpg', 0),
	('Attise-flammes', 1, 'Mage', '03', 'img/58.jpg', 100),
	('Rhonin', 1, 'Mage', '08', 'img/59.jpg', 1600),
	('Archimage Antonidas', 1, 'Mage', '07', 'img/60.jpg', 1600),
	('Sceau des champions', 0, 'Paladin', '03', 'img/61.jpg', 40),
	('Egalité', 0, 'Paladin', '02', 'img/62.jpg', 100),
	('Consécration', 0, 'Paladin', '04', 'img/63.jpg', 0),
	('Championne en vrai-argent', 2, 'Paladin', '04', 'img/64.jpg', 0),
	('Chevalier murloc', 1, 'Paladin', '04', 'img/65.jpg', 40),
	('Protecteur de l\'Aube', 1, 'Paladin', '02', 'img/66.jpg', 40),
	('Garde-paix de l\'Aldor', 1, 'Paladin', '03', 'img/67.jpg', 100),
	('Gardienne d\'Uldaman', 1, 'Paladin', '04', 'img/68.jpg', 40),
	('Barbefeu Tresse-Flammes', 1, 'Paladin', '03', 'img/69.jpg', 1600),
	('Tirion Fordring', 1, 'Paladin', '08', 'img/70.jpg', 1600),
	('Mot de l\'ombre : Douleur', 0, 'Prêtre', '02', 'img/71.jpg', 0),
	('Mot de l\'ombre : Mort', 0, 'Prêtre', '03', 'img/72.jpg', 0),
	('Nova sacrée', 0, 'Prêtre', '05', 'img/73.jpg', 0),
	('Cercle de soins', 0, 'Prêtre', '00', 'img/74.jpg', 40),
	('Clerc de Comté-du-Nord', 1, 'Prêtre', '01', 'img/75.jpg', 0),
	('Championne sacrée', 1, 'Prêtre', '04', 'img/76.jpg', 40),
	('Ombre mouvante', 1, 'Prêtre', '04', 'img/77.jpg', 100),
	('Prêtresse auchenaï', 1, 'Prêtre', '04', 'img/78.jpg', 100),
	('Prophète Velen', 1, 'Prêtre', '07', 'img/79.jpg', 1600),
	('Confesseur d\'argent Paletress', 1, 'Prêtre', '07', 'img/80.jpg', 1600),
	('Préparation', 0, 'Voleur', '00', 'img/81.jpg', 400),
	('Eviscération', 0, 'Voleur', '02', 'img/82.jpg', 40),
	('Attaque sournoise', 0, 'Voleur', '00', 'img/83.jpg', 0),
	('éventail de couteaux', 0, 'Voleur', '03', 'img/84.jpg', 0),
	('Assommer', 0, 'Voleur', '02', 'img/85.jpg', 0),
	('Fieffé forban', 1, 'Voleur', '01', 'img/86.jpg', 40),
	('Agent du SI:7', 1, 'Voleur', '03', 'img/87.jpg', 100),
	('Pilleur de tombes', 1, 'Voleur', '04', 'img/88.jpg', 40),
	('Shaku, le Collectionneur', 1, 'Voleur', '03', 'img/89.jpg', 1600),
	('Edwin VanCleef', 1, 'Voleur', '03', 'img/90.jpg', 1600),
	('Acolyte de la souffrance', 1, 'Neutre', '03', 'img/91.jpg', 40),
	('Amasseur de butin', 1, 'Neutre', '02', 'img/92.jpg', 40),
	('Araignée des tombes', 1, 'Neutre', '04', 'img/93.jpg', 40),
	('Cavalier d\'Argent', 1, 'Neutre', '03', 'img/94.jpg', 40),
	('Ecuyère d\'Argent', 1, 'Neutre', '01', 'img/95.jpg', 40),
	('Golem des moissons', 1, 'Neutre', '03', 'img/96.jpg', 40),
	('Loup alpha redoutable', 1, 'Neutre', '02', 'img/97.jpg', 40),
	('Prophète du Cercle terrestre', 1, 'Neutre', '03', 'img/98.jpg', 40),
	('Champion de Hurlevent', 1, 'Neutre', '07', 'img/99.jpg', 0),
	('Yéti noroît', 1, 'Neutre', '04', 'img/100.jpg', 0),
	('Forban de la Voila sanglante', 1, 'Neutre', '01', 'img/101.jpg', 100),
	('Boucanier de petite envergure', 1, 'Neutre', '01', 'img/102.jpg', 100),
	('Pyromancien sauvage', 1, 'Neutre', '02', 'img/103.jpg', 100),
	('Oracle froide-lumière', 1, 'Neutre', '03', 'img/104.jpg', 100),
	('Poulet furieux', 1, 'Neutre', '01', 'img/105.jpg', 100),
	('Gardelumière', 1, 'Neutre', '01', 'img/106.jpg', 100),
	('Drake azur', 1, 'Neutre', '05', 'img/107.jpg', 100),
	('Défenseur d\'Argus', 1, 'Neutre', '04', 'img/108.jpg', 100),
	('Commissaire-priseur', 1, 'Neutre', '06', 'img/109.jpg', 100),
	('Aventurier en pleine quête', 1, 'Neutre', '03', 'img/110.jpg', 100),
	('Recruteur', 1, 'Neutre', '05', 'img/111.jpg', 400),
	('Fouine perce-tunnels', 1, 'Neutre', '01', 'img/112.jpg', 400),
	('Chasseur de gros gibier', 1, 'Neutre', '05', 'img/113.jpg', 400),
	('Rat déloyal', 1, 'Neutre', '02', 'img/114.jpg', 400),
	('Auspice funeste', 1, 'Neutre', '02', 'img/115.jpg', 400),
	('Sylvanas Coursevent', 1, 'Neutre', '06', 'img/116.jpg', 1600),
	('Leeroy Jenkins', 1, 'Neutre', '05', 'img/117.jpg', 1600),
	('Malygos', 1, 'Neutre', '09', 'img/118.jpg', 1600),
	('Ragnaros, seigneur du feu', 1, 'Neutre', '08', 'img/119.jpg', 1600),
	('Aile de morrt', 1, 'Neutre', '10', 'img/120.jpg', 1600);
