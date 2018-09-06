-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 14 août 2018 à 10:57
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL,
  `c_titre` varchar(100) NOT NULL,
  `c_coordonnees` longtext NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_auteur_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`c_id`, `c_titre`, `c_coordonnees`, `c_email`, `c_auteur_fk`) VALUES
(2, 'Florent Fontaine <br>Web Developpeur', '11 rue des tilleuls <br>\r\n14370 Bellengreville <br>\r\nTel : 06.12.64.04.12', 'florent_fontaine@hotmail.com', 106),
(3, 'ordi', '0612640412', 'flo@flo', 106);

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE `cv` (
  `cv_id` int(11) NOT NULL,
  `cv_titre` varchar(100) DEFAULT NULL,
  `cv_contenu` longtext,
  `cv_partie` int(30) NOT NULL,
  `cv_ville` varchar(50) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`cv_id`, `cv_titre`, `cv_contenu`, `cv_partie`, `cv_ville`, `annee`) VALUES
(75, NULL, 'Intégration site internet (HTML5/CSS3)', 1, NULL, NULL),
(76, NULL, 'Programmation procédurale PHP', 1, NULL, NULL),
(77, NULL, 'Modélisation des données SQL', 1, NULL, NULL),
(78, NULL, 'Programmation Orientée Objet, Design Patterns', 1, NULL, NULL),
(79, NULL, 'Javascript (JQuery, Ajax)', 1, NULL, NULL),
(80, NULL, 'Rédiger les spécifcations générales et\r\ndétaillées d’un projet', 1, NULL, NULL),
(81, NULL, 'Défnir avec les équipes projet les objectifs\r\net les délais de réalisation des livrables', 1, NULL, NULL),
(82, NULL, 'Élaborer la proposition commerciale et\r\ndéterminer avec le client les modalités du contrat\r\nde vente', 1, NULL, NULL),
(83, NULL, 'Participer à la défnition de la stratégie\r\ncommerciale et marketing de l’entreprise', 1, NULL, NULL),
(84, NULL, 'Réalisation de reporting', 1, NULL, NULL),
(86, NULL, 'Formation Titre professionnel Développeur Web\r\nniveau III', 2, NULL, 2018),
(87, NULL, 'Formation d’anglais à Arrimage', 2, NULL, 2015),
(88, NULL, 'Niveau Licence DEES marketing\r\n(lycée privé)', 2, NULL, 2010),
(89, NULL, 'BTS management des unités commerciales', 2, NULL, 2009),
(90, NULL, 'BAC professionnel de comptabilité', 2, NULL, 2007),
(91, NULL, 'Réalisation d’un projet PHP en équipe dans le cadre de la formation (jeu de cartes à\r\ncollectionner en ligne, ref: Hearthstone )', 3, 'Montpellier', 2017),
(92, NULL, 'Vendeur téléphonie chez Sfr - Vente assistée, produits et services', 3, 'Sète', 2016),
(93, NULL, 'Vendeur chaussures running chez  Intersport- Vente conseil', 3, 'Balaruc', 2016),
(94, NULL, 'Responsable rayon (informatique, son et téléphonie) chez  Cash Express - Vente linéaire, conseil, gestion des rayons, d’équipe et des commandes', 3, 'Châlons en champagne', 2014),
(95, NULL, 'Vendeur chez Décathlon (Running, sport co.) - Vente linéaire, conseil', 3, 'Pierry', 2013),
(96, NULL, 'Commercial chez Bien Cuisiner (B to B) - Vente prospection terrain', 3, 'Montpellier', 2012),
(97, NULL, 'Vendeur Brun chez Darty - Vente assistée', 3, 'Pérols', 2011),
(98, NULL, 'Attaché commercial chez ELT (B to B) - Vente en logistique, prospection terrain', 3, 'Montpellier', 2010),
(99, 'Outils', 'PhpmyAdmin, XAMPP, Apache, MySQL, GIT', 4, NULL, NULL),
(100, 'UML', 'Dia', 4, NULL, NULL),
(101, 'Loisirs', 'Escalade, Tennis, jonglerie, audiovisuel,\r\npiano', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `mess_id` int(11) NOT NULL,
  `mess_titre` varchar(30) NOT NULL,
  `mess_descript` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `visiteur_fk` int(11) NOT NULL,
  `auteur_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `part_id` int(25) NOT NULL,
  `part_libelle` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`part_id`, `part_libelle`) VALUES
(1, 'competence'),
(2, 'formation'),
(3, 'experience'),
(4, 'divers');

-- --------------------------------------------------------

--
-- Structure de la table `rang`
--

CREATE TABLE `rang` (
  `r_id` int(11) NOT NULL,
  `r_libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Liste des rôles du site';

--
-- Déchargement des données de la table `rang`
--

INSERT INTO `rang` (`r_id`, `r_libelle`) VALUES
(1, 'admin'),
(2, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `realisation`
--

CREATE TABLE `realisation` (
  `r_id` int(11) NOT NULL,
  `r_titre` varchar(111) NOT NULL,
  `r_contenu` longtext NOT NULL,
  `r_lien` varchar(200) NOT NULL,
  `r_img` varchar(111) NOT NULL,
  `r_auteur_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `realisation`
--

INSERT INTO `realisation` (`r_id`, `r_titre`, `r_contenu`, `r_lien`, `r_img`, `r_auteur_fk`) VALUES
(20, 'HYLEMAGIA', 'C\'est un projet réalisé durant la formation, un jeux de carte virtuel avec opération marketing (landing page, site de pré-inscription...). Contenant une équipe de 4 designers et 3 développeurs nous avons utilisés la méthode agile pour l\'organisation ainsi que la mise en place d\'une rotation chef de projet. Programmation en orienté objet, langage php, utilisation de design pattern... ', 'hylemagia.etudiants3w.com/root2/', 'dosCarte.png', 106),
(21, 'PORTFOLIO', 'C\'est un projet personnel réalisé lors de mon stage chez O+Studio, se portfolio permet de présenter les projets réalisés, les services proposés et un CV détaillés. Il possède aussi une gestion simplifié pour l\'administrateur sur la présentation du contenu. Programmation orienté objet, langage php, design pattern, my SQL...', 'florentfontaine.etudiants3w.com/Portfolio/', 'portfolio.jpg', 106),
(26, 'LANDING PAGE', 'La landing page à était faite en collaboration avec les designers, qui on permis l’intégration de la maquette. Cette page est responsive pour les plateformes les plus récurrentes, avec l\'utilisation des medias query, HTML5 et CSS3', 'hylemagia.etudiants3w.com', 'land.jpg', 106),
(27, 'ECHEC', 'C\'est un exercice de jeu d’échec, en utilisant la Programmation Orientée Objet avec le langage PHP.  Il s\'agit de déterminer les objets présents et d\'isoler leurs données et les fonctions qui les utilisent.', 'www.portfolio.com', 'echec.jpg', 106),
(28, 'MVC', 'Un des plus célèbres design patterns le MVC, qui signifie Modèle - Vue - Contrôleur. Une methode d\'organisation en trois parties.  le contrôleur est le chef d\'orchestre, le contrôleur demande les données au modèle et une fois les données récupérées, le contrôleur les transmet à la vue qui se chargera d\'afficher la liste des messages.', 'www.portfolio.com', 'mvc.png', 106);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `s_id` int(11) NOT NULL,
  `s_titre` varchar(100) NOT NULL,
  `s_contenu` longtext NOT NULL,
  `s_img` varchar(200) NOT NULL,
  `s_date` datetime NOT NULL,
  `s_auteur_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Liste des messages du site';

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`s_id`, `s_titre`, `s_contenu`, `s_img`, `s_date`, `s_auteur_fk`) VALUES
(2009, 'Développeur Back-End', 'Je m\'occupe du développement des différentes fonctionnalités techniques et les tester dans son environnement. Je peux assurer les parties support technique et maintenance tout au long de la vie du site web. Modélisation des données SQL, Programmation Orientée Objet, Design Patterns, Javascript (JQuery, Ajax),', 'portrait.jpg', '2018-03-15 14:46:39', 106),
(2010, 'Sites Internet', 'Construction d\'un site avec interface administrateur, pour une gestion du contenu simplifiée. gestion de l\'hebergement et du service après vente.', 'site.jpg', '2018-05-28 14:58:34', 106),
(2011, 'Compétence Marketing', 'J\'ai une expérience significative en relation client, la combinaison marketing avec la programmation pourrais vous permettre une bien meilleur étude et écoute des besoins clients. Ainsi qu\'une capacité à gérer les négociations.', 'marketing.jpg', '2018-05-28 17:40:09', 106),
(2014, 'Responsive', 'La création d’un site responsive est de s’assurer que le site soit uniformément la même pour tous les utilisateurs selon les différents supports utilisés. ', 'landing.jpg', '2018-07-17 10:25:27', 106);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_prenom` varchar(255) DEFAULT NULL,
  `u_nom` varchar(255) DEFAULT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_pwd` varchar(250) NOT NULL,
  `u_rang_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Liste des utilisateurs du site';

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`u_id`, `u_prenom`, `u_nom`, `u_email`, `u_pwd`, `u_rang_fk`) VALUES
(106, 'flo', 'flo', 'flo@flo', '$2y$10$s9Nvb2CVVPShtKVlEjwYXeKtJp3VVlFOGktRHhBQOnKxsWft/XQyi', 1),
(111, 'flo', 'flo', 'florent@florent', '$2y$10$I08APVaZs7ioYSoiQIRFhuBmBEKrQW0QFNfWCFeL8ZQ/givIx1SuW', 2);

-- --------------------------------------------------------

--
-- Structure de la table `vis`
--

CREATE TABLE `vis` (
  `vis_id` int(11) NOT NULL,
  `vis_name` varchar(25) NOT NULL,
  `vis_l_name` varchar(25) NOT NULL,
  `vis_crea_day` date NOT NULL,
  `vis_email` varchar(25) NOT NULL,
  `vis_username` varchar(25) NOT NULL,
  `vis_pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vis`
--

INSERT INTO `vis` (`vis_id`, `vis_name`, `vis_l_name`, `vis_crea_day`, `vis_email`, `vis_username`, `vis_pass`) VALUES
(1, 'test', 'test', '0000-00-00', 'test@test', 'test', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `contact_user` (`c_auteur_fk`);

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `cv_partie` (`cv_partie`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `visiteur_fk` (`visiteur_fk`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`part_id`);

--
-- Index pour la table `rang`
--
ALTER TABLE `rang`
  ADD PRIMARY KEY (`r_id`);

--
-- Index pour la table `realisation`
--
ALTER TABLE `realisation`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `real_user` (`r_auteur_fk`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `m_auteur_fk` (`s_auteur_fk`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_rang_fk` (`u_rang_fk`);

--
-- Index pour la table `vis`
--
ALTER TABLE `vis`
  ADD PRIMARY KEY (`vis_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `part_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rang`
--
ALTER TABLE `rang`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `realisation`
--
ALTER TABLE `realisation`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2015;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT pour la table `vis`
--
ALTER TABLE `vis`
  MODIFY `vis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_user` FOREIGN KEY (`c_auteur_fk`) REFERENCES `user` (`u_id`);

--
-- Contraintes pour la table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`cv_partie`) REFERENCES `partie` (`part_id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`visiteur_fk`) REFERENCES `vis` (`vis_id`);

--
-- Contraintes pour la table `realisation`
--
ALTER TABLE `realisation`
  ADD CONSTRAINT `real_user` FOREIGN KEY (`r_auteur_fk`) REFERENCES `user` (`u_id`);

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `message_user` FOREIGN KEY (`s_auteur_fk`) REFERENCES `user` (`u_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_to_rang` FOREIGN KEY (`u_rang_fk`) REFERENCES `rang` (`r_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
