-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 12:43 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `email` varchar(255) NOT NULL,
  `ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `category_name` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `director` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`category_name`, `ID`, `name`, `price`, `director`, `description`) VALUES
('action', 1, 'The Avengers: Endgame', 14.99, 'Anthony and Joe Russo', 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.'),
('action', 2, 'Zack Snyders Justice League: Justice Is Gray', 30, 'Zack Snyder', 'Fueled by his restored faith in humanity and inspired by Supermans selfless act, Bruce Wayne enlists newfound ally Diana Prince to face an even greater threat. Together, Batman and Wonder Woman work quickly to recruit a team to stand against this newly awakened enemy. Despite the formation of an unprecedented league of heroes -- Batman, Wonder Woman, Aquaman, Cyborg and the Flash -- it may be too late to save the planet from an assault of catastrophic proportions.'),
('comedy', 3, 'The Hangover', 3.99, 'Todd Phillips', 'Two days before his wedding, Doug (Justin Bartha) and three friends (Bradley Cooper, Ed Helms, Zach Galifianakis) drive to Las Vegas for a wild and memorable stag party. In fact, when the three groomsmen wake up the next morning, they can\'t remember a thing; nor can they find Doug. With little time to spare, the three hazy pals try to re-trace their steps and find Doug so they can get him back to Los Angeles in time to walk down the aisle.'),
('comedy', 4, 'Guardians of the Galaxy', 10.92, 'James Gunn', 'A group of intergalactic criminals must pull together to stop a fanatical warrior with plans to purge the universe.'),
('horror', 5, 'Saw', 6.66, 'James Wan', 'Two strangers awaken in a room with no recollection of how they got there, and soon discover they\'re pawns in a deadly game perpetrated by a notorious serial killer.'),
('horror', 26, 'Alien', 7.89, 'Ridley Scott', 'In deep space, the crew of the commercial starship Nostromo is awakened from their cryo-sleep capsules halfway through their journey home to investigate a distress call from an alien vessel. The terror begins when the crew encounters a nest of eggs inside the alien ship. An organism from inside an egg leaps out and attaches itself to one of the crew, causing him to fall into a coma.'),
('thriller', 27, 'Inception', 6.21, 'Christopher Nolan', 'Dom Cobb (Leonardo DiCaprio) is a thief with the rare ability to enter people\'s dreams and steal their secrets from their subconscious. His skill has made him a hot commodity in the world of corporate espionage but has also cost him everything he loves. Cobb gets a chance at redemption when he is offered a seemingly impossible task: Plant an idea in someone\'s mind. If he succeeds, it will be the perfect crime, but a dangerous enemy anticipates Cobb\'s every move.'),
('thriller', 28, 'Knives Out', 8.24, 'Rian Johnson', 'The circumstances surrounding the death of crime novelist Harlan Thrombey are mysterious, but there\'s one thing that renowned Detective Benoit Blanc knows for sure -- everyone in the wildly dysfunctional Thrombey family is a suspect. Now, Blanc must sift through a web of lies and red herrings to uncover the truth.'),
('romance', 29, 'Fifty Shades of Grey', 7.12, 'Sam Taylor-Johnson', 'Literature student Anastasia Steele\'s life changes forever when she meets handsome, yet tormented, billionaire Christian Grey.'),
('romance', 31, 'Monday', 6.99, 'Argyris Papadimitropoulos', 'When Mickey is introduced to Chloe one hot summer night in Athens, the attraction between the pair is immediately palpable -- so palpable that before they know it they\'re waking up naked on the beach on Saturday morning.'),
('fantasy', 32, 'Harry Potter and the Order of the Phoenix', 5.55, 'David Yates', 'Now in his fifth year at Hogwarts, Harry (Daniel Radcliffe) learns that many in the wizarding community do not know the truth of his encounter with Lord Voldemort. Cornelius Fudge, minister of Magic, appoints his toady, Dolores Umbridge, as Defense Against the Dark Arts teacher, for he fears that professor Dumbledore will take his job. But her teaching is deficient and her methods, cruel, so Harry prepares a group of students to defend the school against a rising tide of evil.'),
('fantasy', 33, 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 6.54, 'Andrew Adamson', 'During the World War II bombings of London, four English siblings are sent to a country house where they will be safe. One day Lucy (Georgie Henley) finds a wardrobe that transports her to a magical world called Narnia. After coming back, she soon returns to Narnia with her brothers, Peter (William Moseley) and Edmund (Skandar Keynes), and her sister, Susan (Anna Popplewell). There they join the magical lion, Aslan (Liam Neeson), in the fight against the evil White Witch, Jadis (Tilda Swinton).'),
('sci-fi', 34, 'Star Wars: The Force Awakens', 8.13, 'J.J. Abrams', 'Thirty years after the defeat of the Galactic Empire, Han Solo (Harrison Ford) and his young allies face a new threat from the evil Kylo Ren (Adam Driver) and the First Order.'),
('sci-fi', 35, 'Godzilla vs. Kong', 7.12, 'Adam Wingard', 'Kong and his protectors undertake a perilous journey to find his true home. Along for the ride is Jia, an orphaned girl who has a unique and powerful bond with the mighty beast. However, they soon find themselves in the path of an enraged Godzilla as he cuts a swath of destruction across the globe. The initial confrontation between the two titans -- instigated by unseen forces -- is only the beginning of the mystery that lies deep within the core of the planet.'),
('animation', 37, 'Fantasia 2000', 7.21, 'Eric Goldberg, James Algar, Don Hahn, Hendel Butoy, Pixote Hunt, Gaetan Brizzi, Paul Brizzi, Francis Glebas', '`Fantasia/2000\' continues and builds upon Walt Disney\'s original idea with the creation of a new musical program interpreted by a group of distinguished Disney artists and storytellers. Adding to the fun and entertainment, celebrity hosts from the various arts appear on screen to introduce each of the segments. Included in that prestigious group are Steve Martin, Itzhak Perlman, Bette Midler, Quincy Jones, James Earl Jones, Penn & Teller and Angela Lansbury.'),
('animation', 38, 'The Lion King', 6.12, 'Rob Minkoff, Roger Allers', 'This Disney animated feature follows the adventures of the young lion Simba (Jonathan Taylor Thomas), the heir of his father, Mufasa (James Earl Jones). Simba\'s wicked uncle, Scar (Jeremy Irons), plots to usurp Mufasa\'s throne by luring father and son into a stampede of wildebeests. But Simba escapes, and only Mufasa is killed. Simba returns as an adult (Matthew Broderick) to take back his homeland from Scar with the help of his friends Timon (Nathan Lane) and Pumbaa (Ernie Sabella).'),
('animation', 39, 'The Incredibles', 10.13, 'Brad Bird', 'In this lauded Pixar animated film, married superheroes Mr. Incredible (Craig T. Nelson) and Elastigirl (Holly Hunter) are forced to assume mundane lives as Bob and Helen Parr after all super-powered activities have been banned by the government. While Mr. Incredible loves his wife and kids, he longs to return to a life of adventure, and he gets a chance when summoned to an island to battle an out-of-control robot. Soon, Mr. Incredible is in trouble, and it\'s up to his family to save him.'),
('comedy', 40, 'Meet the Robinsons', 7.12, 'Stephen John Anderson', 'Boy genius Lewis gives up hope of retrieving his latest invention, which was stolen by Bowler Hat Guy, then a young time-traveler named Wilbur Robinson arrives on the scene to whisk Lewis away in his time machine. The boys spend a day in the future with Wilbur\'s eccentric family and uncover an amazing secret at the same time.'),
('action', 41, 'Divergent', 1.11, 'Neil Burger', 'Tris Prior (Shailene Woodley) lives in a futuristic world in which society is divided into five factions. As each person enters adulthood, he or she must choose a faction and commit to it for life. Tris chooses Dauntless -- those who pursue bravery above all else. However, her initiation leads to the discovery that she is a Divergent and will never be able to fit into just one faction. Warned that she must conceal her status, Tris uncovers a looming war which threatens everyone she loves.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(15) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `card_num` varchar(30) NOT NULL,
  `name_on_card` varchar(255) NOT NULL,
  `exp_date` varchar(30) NOT NULL,
  `sec_code` varchar(5) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`full_name`, `email`, `password`, `phone`, `address`, `state`, `city`, `zip`, `card_num`, `name_on_card`, `exp_date`, `sec_code`, `admin`) VALUES
('admin account', 'admin@bluray.com', 'password', '3213212312', '21321d12', '3e123', 'rwarwa', '32123', '1232421232125312', 'rwafawfwa', '92/21', '321', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
