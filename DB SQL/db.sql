-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 18 mai 2022 à 16:18
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
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_on` datetime NOT NULL,
  `confirmed_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `basketline`
--

CREATE TABLE `basketline` (
  `id` int(11) NOT NULL,
  `basket_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `cover_list_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `cover_image`, `cover_list_image`) VALUES
(1, 'Smartphone', 'smartphone.jpg', 'smartphone-cat-header.jpg'),
(2, 'Ordinateur', 'ordinateur.jpeg', 'ordinateur-cat-header.jpg'),
(3, 'Tablette', 'tablette.jpeg', 'tablet-cat-header.jpg'),
(4, 'Accessoires', 'accessoires.jpeg', 'accessories-cat-header.jpg'),
(5, 'Périphériques', 'peripheriques.jpeg', 'peripherals-cat-header.jpg'),
(6, 'Écrans', 'screen.jpeg', 'screen-cat-header.jpg'),
(7, 'Imprimantes', 'imprimante.jpeg', 'printer-cat-header.jpg');

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
  `brand` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `introduction`, `description`, `price`, `brand`) VALUES
(1, 'Apple iPhone 13', 'Apple est de retour avec son nouveau smartphone ! l\'iPhone 13 !', 'En exclusivité, le nouvel iPhone d\'Apple, l\'iPhone 13 !', 999, 'Apple'),
(2, 'Produit', 'Apple est de retour avec son nouveau smartphone ! l\'iPhone 13 !', 'Ceci est une description d\'un produit.', 12, 'Apple'),
(3, 'Produit', 'Apple est de retour avec son nouveau smartphone ! l\'iPhone 13 !', 'Ceci est une description d\'un produit.', 12, 'Apple'),
(4, 'HP Omen 15\"', 'Les ordinateurs portables HP Omen sont des ordinateurs portables haut de gamme conçu pour le gaming.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dolor dui, lobortis ac turpis nec, scelerisque pulvinar justo. Curabitur eget ipsum commodo, tristique neque in, finibus mauris. Donec at scelerisque dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur viverra euismod tellus non ultrices. Donec dapibus elit vel erat cursus posuere. Vestibulum et orci ligula. Quisque vitae quam in neque accumsan lacinia ut egestas risus.\r\n\r\nUt euismod, justo in dapibus sagittis, nibh quam euismod massa, eu venenatis leo metus a elit. Nulla eu sem est. Aenean efficitur libero eu egestas ornare. Cras volutpat sagittis lectus in sodales. Integer posuere neque et est finibus, in semper tellus sollicitudin. Pellentesque lobortis sapien sit amet neque efficitur hendrerit. Praesent odio ex, varius id bibendum eu, sollicitudin id massa. Nulla facilisi.\r\n\r\nUt vestibulum mauris nec felis pharetra pretium. Donec pulvinar ullamcorper ante, hendrerit euismod velit volutpat at. Maecenas nunc erat, iaculis et viverra vitae, convallis et massa. Suspendisse dictum eleifend sodales. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer ornare sed odio sed viverra. Cras sodales leo at vestibulum aliquet. Ut interdum metus', 1749, 'HP'),
(5, 'Hp', 'Introduction', 'Description', 149, 'HP'),
(6, 'Produti', 'Produit intro', 'Produit dfec-fk^skdf^dsf', 1334, 'Produit'),
(7, 'Samsung S22', 'Le Samsung S22 est le nouveau fleuron de Samsung', 'Le Samsung S22 est le nouveau fleuron de Samsung', 1249, 'Samsung');

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
(1, 5, 7),
(4, 6, 6),
(6, 7, 1),
(7, 1, 1),
(8, 2, 3),
(9, 3, 6),
(10, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product_images`
--

INSERT INTO `product_images` (`id`, `id_product`, `image`) VALUES
(1, 0, 'location-icon.png'),
(2, 0, 'avatar.png'),
(3, 0, 'jason-goodman-bzqU01v-G54-unsplash.jpg'),
(4, 7, 'Galaxy-S22-S22-pr_main1.jpeg'),
(5, 7, 'téléchargement.jpeg'),
(6, 1, 'iphone-13-og-2021.jpeg'),
(7, 1, 'p1022463-scaled.jpeg'),
(8, 1, 'Apple_iphone13_hero_geo_09142021_inline.jpg.large.jpg'),
(9, 2, 'smartphone-cat-header.jpg'),
(10, 2, 'téléchargement.jpeg'),
(11, 2, 'tv-1.jpg'),
(12, 3, 'xiaomi.jpeg'),
(13, 3, 'xiaomimi-10-pro.jpeg'),
(14, 3, '152589-phones-review-review-image3-2ymrklopi5.jpeg'),
(15, 4, 'HP.jpeg'),
(16, 4, 'omen.jpeg'),
(17, 5, 'jason-goodman-bzqU01v-G54-unsplash.jpg'),
(18, 5, 'dining-slider-img5.jpg'),
(19, 5, 'smartphone-cat-header.jpg'),
(20, 6, 'az.jpeg'),
(21, 6, 'teaser4zu3.jpeg'),
(22, 6, 'razer.jpeg');

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
  `passworduser` varchar(100) NOT NULL,
  `user_street` text NOT NULL,
  `user_street_number` int(100) DEFAULT NULL,
  `user_city` varchar(200) NOT NULL,
  `user_commune` text NOT NULL,
  `user_zipcode` int(100) DEFAULT NULL,
  `nickname` varchar(100) NOT NULL,
  `birthday` varchar(40) NOT NULL,
  `gender` char(10) NOT NULL,
  `pronoun` varchar(10) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `darkmode` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `passworduser`, `user_street`, `user_street_number`, `user_city`, `user_commune`, `user_zipcode`, `nickname`, `birthday`, `gender`, `pronoun`, `avatar`, `darkmode`, `active`) VALUES
(1, 'Gillian', 'Eggerickx', 'eggerickxgillian@gmail.com', '12345678', 'Rue des tartes', 31, 'Bruxelles', 'Evere', 1140, 'Simply', '', '', '', '', 0, 0),
(2, 'Jean', 'Michel', 'jeanmichel@gmail.com', '12345678', '', 0, '', '', 0, 'JeanDu93', '', '', '', '', 0, 0);

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
(4, 1, 3),
(5, 1, 2);

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
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
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
-- Index pour la table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `basketline`
--
ALTER TABLE `basketline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `basketline_ibfk_1` FOREIGN KEY (`basket_id`) REFERENCES `basket` (`id`),
  ADD CONSTRAINT `basketline_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

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
-- Contraintes pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
