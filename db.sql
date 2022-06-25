-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 25 juin 2022 à 09:49
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `MyTechOnWeb`
--

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `payment_method` int(11) DEFAULT NULL,
  `comment` text,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `status`, `payment_method`, `comment`, `created_on`, `confirmed_on`) VALUES
(1, 1, 0, NULL, NULL, '2022-06-24 17:06:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `basketline`
--

CREATE TABLE `basketline` (
  `id` int(11) NOT NULL,
  `basket_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `basketline`
--

INSERT INTO `basketline` (`id`, `basket_id`, `product_id`, `quantity`, `product_price`) VALUES
(4, 1, 4, 1, 1749),
(5, 1, 7, 1, 1249);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Smartphone'),
(2, 'Ordinateur'),
(3, 'Tablette'),
(4, 'Accessoires'),
(5, 'Périphériques'),
(6, 'Écrans'),
(7, 'Imprimantes');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `message`) VALUES
(1, 'Marc', 'Glero', 'marc.glero@gmail.com', 'Ceci est un message. '),
(2, 'Adam', 'Jero', 'adam.jero@gmail.com', 'Ceci est un message\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `introduction` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `perks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `introduction`, `description`, `price`, `perks`) VALUES
(1, 'Apple iPhone 13', 'Apple est de retour avec son nouveau smartphone ! l\'iPhone 13 !', 'En exclusivité, le nouvel iPhone d\'Apple, l\'iPhone 13 !', 999, 'Apple'),
(4, 'HP Omen 15\"', 'Les ordinateurs portables HP Omen sont des ordinateurs portables haut de gamme conçu pour le gaming.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dolor dui, lobortis ac turpis nec, scelerisque pulvinar justo. Curabitur eget ipsum commodo, tristique neque in, finibus mauris. Donec at scelerisque dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur viverra euismod tellus non ultrices. Donec dapibus elit vel erat cursus posuere. Vestibulum et orci ligula. Quisque vitae quam in neque accumsan lacinia ut egestas risus.\r\n\r\nUt euismod, justo in dapibus sagittis, nibh quam euismod massa, eu venenatis leo metus a elit. Nulla eu sem est. Aenean efficitur libero eu egestas ornare. Cras volutpat sagittis lectus in sodales. Integer posuere neque et est finibus, in semper tellus sollicitudin. Pellentesque lobortis sapien sit amet neque efficitur hendrerit. Praesent odio ex, varius id bibendum eu, sollicitudin id massa. Nulla facilisi.\r\n\r\nUt vestibulum mauris nec felis pharetra pretium. Donec pulvinar ullamcorper ante, hendrerit euismod velit volutpat at. Maecenas nunc erat, iaculis et viverra vitae, convallis et massa. Suspendisse dictum eleifend sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer ornare sed odio sed viverra. Cras sodales leo at vestibulum aliquet. Ut interdum metus', 1749, 'HP'),
(7, 'Samsung S22', 'Le Samsung S22 est le nouveau fleuron de Samsung', 'Le Samsung S22 est le nouveau fleuron de Samsung', 1249, 'Samsung'),
(8, 'Logitech G915 TKL', 'Le logitech G915 TKL est un clavier mécanique haut de gamme....', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut ligula vitae libero convallis hendrerit. Etiam in euismod sapien. Ut mattis est in pulvinar vulputate. Aenean vestibulum sem eu pretium vestibulum. Sed eleifend nisl semper est maximus, vitae rhoncus ligula facilisis. Pellentesque et dictum libero. Proin sit amet lectus arcu.\r\n\r\nDuis diam massa, suscipit eu lectus nec, finibus sodales ligula. Aliquam erat volutpat. Vestibulum rutrum, massa at eleifend ultrices, est ipsum eleifend mi, eu scelerisque nunc turpis et lacus. Pellentesque tellus ante, pulvinar nec urna at, maximus ullamcorper sapien. Mauris vestibulum, nisl sit amet consequat pulvinar, ante enim aliquet orci, non finibus massa nunc vel risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sagittis elit ac vestibulum porta. Quisque pretium quam lacus, eget maximus elit malesuada sodales. Proin egestas rutrum diam, nec sollicitudin orci laoreet eu. Nullam eu scelerisque sapien, sit amet sollicitudin arcu. Nam nunc felis, tristique egestas pulvinar euismod, semper sit amet mi. Donec et diam non quam porttitor vulputate sit amet quis lacus. Maecenas vulputate quam vitae nunc feugiat maximus. Duis eget lacinia purus. Duis in commodo dolor, molestie tempor arcu.\r\n\r\nPraesent gravida rhoncus est vitae fringilla. Proin in ultrices massa. Proin at dapibus nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam ut convallis felis. Aenean non quam nibh. Integer a pharetra ipsum, eget bibendum augue. Donec vulputate feugiat justo et laoreet. Ut venenatis felis quis leo egestas, sed tempus purus rhoncus. Morbi accumsan neque quis dolor vestibulum condimentum. Quisque maximus ex ipsum, nec porttitor sem semper sit amet. Curabitur suscipit condimentum nisl, ut lobortis turpis sodales a. Praesent ut lacinia magna.\r\n\r\nVestibulum ac augue id nisi imperdiet rhoncus dictum sed ligula. Aliquam commodo finibus erat, sed egestas ante venenatis eu. Donec efficitur orci ac dui feugiat convallis. Fusce ex augue, sodales viverra vehicula et, gravida lobortis orci. Integer iaculis tincidunt diam ut placerat. Maecenas a nunc varius, consectetur elit ac, rutrum lectus. Vivamus ullamcorper, massa et ultrices finibus, leo quam lacinia ante, id gravida lectus dui ut mi. Ut venenatis consectetur nunc, a luctus ligula maximus eu. Nulla facilisi. Sed ultrices vel erat nec varius.', 249.99, 'Logitech'),
(10, 'Samsung Galaxy Z Fold 3', 'Le Samsung Galaxy Z Fold 3 est le nouveau fleuron de Samsung.', 'Le Samsung Galaxy Z Fold 3 est équipé d\'un écran AMOLED 2K 120Hz qui va vous en mettre plein la vue ', 1799, '- Écran : 7.6\" AMOLED 120Hz \r\n- Processeur : Snapdragon 855\r\n- RAM : 8Go de mémoire vive');

-- --------------------------------------------------------

--
-- Structure de la table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`) VALUES
(6, 7, 1),
(7, 1, 1),
(10, 4, 2),
(11, 8, 5),
(16, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `birthday` varchar(40) DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `pronoun` varchar(10) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `darkmode` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `password`, `nickname`, `birthday`, `gender`, `pronoun`, `avatar`, `darkmode`, `active`, `is_admin`) VALUES
(0, 'visitor', 'visitor', '', '', '', NULL, NULL, NULL, NULL, 0, 0, 0),
(1, 'Gillian', 'Eggerickx', 'eggerickxgillian@gmail.com', '12345678', 'Simply', '', '', '', 'avatar.png', 0, 0, 1),
(2, 'Jean', 'Michel', 'jeanmichel@gmail.com', '12345678', 'JeanDu93', '', '', '', '', 0, 0, 0),
(3, 'pseudo', 'pseudo', 'pseudo@pseudo.com', 'pseudo123', 'Pseudo', NULL, NULL, NULL, 'avatar.png', 0, 0, 0),
(4, 'Marc', 'gefdrf', 'marc@marc.com', '12345678', 'Drlmkt ', NULL, NULL, NULL, 'avatar.png', 0, 0, 0),
(5, 'Fred', 'Frederic', 'fred33@gmail.com', '12345678', 'Fred33', NULL, NULL, NULL, 'avatar.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users_adresses`
--

CREATE TABLE `users_adresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` text NOT NULL,
  `street_number` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `commune` text NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_adresses`
--

INSERT INTO `users_adresses` (`id`, `user_id`, `street`, `street_number`, `city`, `commune`, `zipcode`) VALUES
(1, 1, 'Chauss&eacute;e de Louvain', 920, 'Bruxelles', 'Evere', 1140),
(2, 1, 'Rue des tartes', 31, 'Bruxelles', 'Bruxelles', 1000),
(3, 1, 'fdsfdsf', 31, 'fdsfsd', 'fsdfds', 1140);

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(9, 1, 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `basketline`
--
ALTER TABLE `basketline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_id` (`basket_id`),
  ADD KEY `basketline_ibfk_1` (`product_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `users_adresses`
--
ALTER TABLE `users_adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `basketline`
--
ALTER TABLE `basketline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users_adresses`
--
ALTER TABLE `users_adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `basketline`
--
ALTER TABLE `basketline`
  ADD CONSTRAINT `basketline_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `users_adresses`
--
ALTER TABLE `users_adresses`
  ADD CONSTRAINT `users_adresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
