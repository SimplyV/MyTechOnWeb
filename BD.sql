-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 25 fév. 2022 à 17:12
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `MyTechOnWeb`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_categories` varchar(200) NOT NULL,
  `product_image` varchar(400) NOT NULL,
  `product_description` text NOT NULL,
  `product_num_sell` int(255) NOT NULL,
  `product_promo_price` int(100) NOT NULL,
  `product_stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_street` text NOT NULL,
  `user_street_number` int(100) DEFAULT NULL,
  `user_city` varchar(200) NOT NULL,
  `user_commune` text NOT NULL,
  `user_zipcode` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `password`, `user_street`, `user_street_number`, `user_city`, `user_commune`, `user_zipcode`) VALUES
(1, 'Gillian', 'Eggerickx', 'eggerickxgillian@gmail.com', '12345678', 'Rue des tartes', 31, 'Bruxelles', 'Evere', 1140),
(2, 'Jean', 'Michel', 'jeanmichel@gmail.com', '12345678', '', 0, '', '', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
