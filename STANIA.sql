-- Base de donnes de SUPER BOWL 

--
-- Table structure for table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `j1` int(11) NOT NULL,
  `j2` int(11) NOT NULL,
  `j3` int(11) NOT NULL,
  `j4` int(11) NOT NULL,
  `j5` int(11) NOT NULL,
  `j6` int(11) NOT NULL,
  `j7` int(11) NOT NULL,
  `j8` int(11) NOT NULL,
  `j9` int(11) NOT NULL,
  `j10` int(11) NOT NULL,
  `j11` int(11) NOT NULL
);

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `pays`, `j1`, `j2`, `j3`, `j4`, `j5`, `j6`, `j7`, `j8`, `j9`, `j10`, `j11`) VALUES
(1, 'Real', 'USA', 15, 4, 4, 3, 6, 2, 4, 3, 1, 1, 1),
(2, 'React', 'USA', 19, 1, 2, 4, 1, 1, 1, 1, 1, 1, 1),
(3, 'Barcelona', 'Angleterre', 4, 7, 9, 2, 15, 13, 2, 2, 1, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `historique_mise`
--

CREATE TABLE `historique_mise` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_match` varchar(20) NOT NULL,
  `Montant_mise` double NOT NULL,
  `Equipe_mise` varchar(30) NOT NULL,
  `resultat` varchar(20) NOT NULL
);

--
-- Dumping data for table `historique_mise`
--

INSERT INTO `historique_mise` (`id`, `date`, `id_match`, `Montant_mise`, `Equipe_mise`, `resultat`) VALUES
(1, '2023-09-21', 'Real VS React', 100, '3', 'En cours');

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE `joueur` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `numero` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `prenom`, `numero`) VALUES
(1, 'Mohamed', 'bouno', '1'),
(2, 'ayoub', 'ziach', '2'),
(3, 'john', 'doe', '3'),
(5, 'michael', 'brown', '5'),
(6, 'sarah', 'wilson', '6'),
(7, 'david', 'martinez', '7'),
(8, 'william', 'MESSI', '8'),
(9, 'william', 'MESSI', '9'),
(10, 'olivia', 'brown', '10'),
(11, 'james', 'davis', '11'),
(12, 'emma', 'lee', '12'),
(13, 'benjamin', 'harris', '13'),
(14, 'ava', 'miller', '14'),
(15, 'daniel', 'moore', '15'),
(16, 'chloe', 'walker', '16'),
(17, 'matthew', 'rodriguez', '17'),
(18, 'mia', 'gonzalez', '18'),
(19, 'joseph', 'lopez', '19'),
(20, 'sophia', 'perez', '20'),
(21, 'andrew', 'taylor', '21'),
(22, 'grace', 'campbell', '22'),
(23, 'Cristiano', 'Ronaldo', '7'),
(24, 'Mbappe', 'kylian', '23');

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `team1` varchar(30) NOT NULL,
  `team2` varchar(30) NOT NULL,
  `score1` int(11) NOT NULL DEFAULT '0',
  `score2` int(11) NOT NULL DEFAULT '0',
  `match_day` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time DEFAULT NULL,
  `meteo` varchar(10) NOT NULL,
  `cote1` float NOT NULL,
  `cote2` float NOT NULL
);

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`id`, `team1`, `team2`, `score1`, `score2`, `match_day`, `status`, `heure_debut`, `heure_fin`, `meteo`, `cote1`, `cote2`) VALUES
(1, '1', '3', 10, 0, '2023-09-07', 'En attente', '21:43:00', NULL, 'Cloud', 2.09, 1.78),
(3, '1', '2', 0, 3, '2023-01-03', 'En attente', '00:01:00', '30:43:31', 'Pluie', 0.09, 0.09),
(5, '3', '2', 0, 2, '2023-09-29', 'En attente', '16:26:00', NULL, 'Soleil', 2.3, 6.4);

-- --------------------------------------------------------

--
-- Table structure for table `mise`
--

CREATE TABLE `mise` (
  `id` int(16) NOT NULL,
  `date` date NOT NULL,
  `match` varchar(30) NOT NULL,
  `montant` double NOT NULL,
  `equipe_mise` varchar(20) NOT NULL,
  `Resultat` varchar(20) NOT NULL
);

--
-- Dumping data for table `mise`
--

INSERT INTO `mise` (`id`, `date`, `match`, `montant`, `equipe_mise`, `Resultat`) VALUES
(1, '2024-06-27', '3', 345, '2', 'en cours');

-- --------------------------------------------------------

--
-- Table structure for table `pairs`
--

CREATE TABLE `pairs` (
  `id` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `pwd` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
);

--
-- Dumping data for table `pairs`
--

INSERT INTO `pairs` (`id`, `Nom`, `Prenom`, `username`, `Email`, `pwd`, `role`) VALUES
(2, 'Ali', 'Ahmed', 'Ali Ahmed', 'ali@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(3, 'Ayoub', 'Amine', 'Ayoub Amine', 'ayoub@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(4, 'hola', 'hola', 'hola hola', 'hola@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(20, 'admin', 'admin', 'admin', 'admin@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1),
(21, 'test', 'test', 'test test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(22, 'Abdou', 'Mohamed', 'Abdou Mohamed', 'abdou_admin@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historique_mise`
--
ALTER TABLE `historique_mise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mise`
--
ALTER TABLE `mise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pairs`
--
ALTER TABLE `pairs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `historique_mise`
--
ALTER TABLE `historique_mise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mise`
--
ALTER TABLE `mise`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pairs`
--
ALTER TABLE `pairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;
