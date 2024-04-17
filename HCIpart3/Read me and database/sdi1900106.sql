-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 08:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atlas`
--

-- --------------------------------------------------------

--
-- Table structure for table `aggelies`
--

CREATE TABLE `aggelies` (
  `id` int(11) NOT NULL,
  `Τμήμα` varchar(50) NOT NULL,
  `Θέση` varchar(50) NOT NULL,
  `Περιοχή` varchar(50) NOT NULL,
  `Διάρκεια` varchar(50) NOT NULL,
  `Ωράριο` varchar(50) NOT NULL,
  `Μισθός` int(11) NOT NULL,
  `Περιγραφή` text NOT NULL,
  `Ημ/νία` date NOT NULL DEFAULT current_timestamp(),
  `Κατάσταση` varchar(50) NOT NULL,
  `Θέσεις` int(11) NOT NULL,
  `id_forea` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aggelies`
--

INSERT INTO `aggelies` (`id`, `Τμήμα`, `Θέση`, `Περιοχή`, `Διάρκεια`, `Ωράριο`, `Μισθός`, `Περιγραφή`, `Ημ/νία`, `Κατάσταση`, `Θέσεις`, `id_forea`) VALUES
(18, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Προγραμματιστή', 'Μαρούσι', '3', 'Πλήρης Απασχόληση', 550, 'Μία εταιρεία με οικογενειακό κλίμα που θεωρεί τους υπαλλήλους της σαν οικογένεια.\r\nΨάχνουμε κάποιους φοιτητές για πρακτική άσκηση που ελπίζουμε να τους αρέσει και να συνεχίσουν την εργασία τους στην εταιρεία μας.', '2023-01-22', 'Υποβολή', 2, 123456789),
(19, 'Τμήμα Πληροφορικής', 'Web Developer', 'Μαρούσι', '3', 'Μερική Απασχόληση', 550, '', '2023-01-22', 'Προσωρινή Αποθήκευση', 2, 123456789),
(20, 'Τμήμα Οικονομικών', 'Λογιστής', 'Μαρούσι', '3', 'Πλήρης Απασχόληση', 450, 'Μία εταιρεία πληροφορικής, ωστόσο χρειαζόμαστε έναν φοιτητή για πρακτική άσκηση για το λογιστήριο της εταιρείας.', '2023-01-22', 'Υποβολή', 0, 123456789),
(21, 'Τμήμα Ψυχολογίας', 'Ψυχολόγο', 'Νέα Σμύρνη', '3', 'Μερική Απασχόληση', 450, 'Ψάχνουμε ένα ψυχολόγο για το τμήμα Ανθρωπίνου Δυναμικού της εταιρείας μας', '2023-01-22', 'Υποβολή', 1, 987654321),
(22, 'Τμήμα Οικονομικών', 'Λογιστής', 'Νέα Σμύρνη', '3', 'Πλήρης Απασχόληση', 450, 'Ψάχνουμε νέους ανθρώπους που έχουν όρεξη να μάθουν οι οποίοι μετά το πέρας της πρακτικής τους άσκησης ελπίζουμε να παραμείνουν στην εταιρεία μας ως εργαζόμενοι.', '2023-01-22', 'Υποβολή', 2, 987654321),
(23, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Web Developer', 'Νέα Σμύρνη', '6', 'Πλήρης Απασχόληση', 550, 'Ψάχνουμε ένα προγραμματιστή για την συντήρηση της ιστοσελίδας μας.', '2023-01-22', 'Προσωρινή Αποθήκευση', 1, 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `aitiseis`
--

CREATE TABLE `aitiseis` (
  `id_aitisis` int(11) NOT NULL,
  `id_forea` bigint(11) NOT NULL,
  `id_foititi` bigint(11) NOT NULL,
  `id_aggelias` int(11) NOT NULL,
  `Περιγραφή` varchar(400) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Εκκρεμεί',
  `katastash` varchar(50) NOT NULL,
  `Αιτιολογία` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aitiseis`
--

INSERT INTO `aitiseis` (`id_aitisis`, `id_forea`, `id_foititi`, `id_aggelias`, `Περιγραφή`, `status`, `katastash`, `Αιτιολογία`) VALUES
(33, 123456789, 1115201400092, 18, 'Είμαι φοιτητής του τμήματος Πληροφορικής και Τηλεπικοινωνιών του ΕΚΠΑ, είμαι στο 4ο έτος της σχολής μου και μου απομένουν λίγα μαθήματα για τη κατωχύρ', 'Εγκρίθηκε', 'Υποβολή', ''),
(34, 987654321, 1115201400092, 21, 'Δεν εχω ιδέα από ψυχολογία απλά είχα πάρει ένα ελέυθερο μάθημα στη σχολή μου ', 'Εκκρεμεί', 'Προσωρινή Αποθήκευση', ''),
(35, 123456789, 1115201900106, 20, 'Είμαι ο καλύτερος λογιστής που υπάρχει. Δεν παίζομαι σας λέω, ΄εχω καταφέρει να γλυτώσω χιλιάρικα και χιλιάρικα στο πατέρα μου από την εφορία!!! Είμαι άπαιχτος!!', 'Εγκρίθηκε', 'Υποβολή', ''),
(36, 987654321, 1115201900106, 22, 'Χρωστάω όλα τα μαθήματα του 3ου και 4ου έτους γιατί εργαζόμουν και θα ήθελα να βρω λίγη εργασιακή εμπειρία πάνω στο αντικείμενο σπούδασης μου για να μ', 'Εκκρεμεί', 'Προσωρινή Αποθήκευση', ''),
(37, 987654321, 1115201400092, 22, '', 'Εκκρεμεί', 'Υποβολή', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) DEFAULT 'foititis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `usertype`) VALUES
(123456789, 'foreas1@gmail.com', 'Διαμαντόπουλος Ι.Κ.Ε.', '123456789', 'foreas'),
(987654321, 'foreas2@gmail.com', 'Ανώνυμοι Α.Ε.', '123456789', 'foreas'),
(1115201400092, 'sdi1400092@di.uoa.gr', 'Αντώνης Μαζέρας', '123456789', 'foititis'),
(1115201900106, 'sdi1900106@di.uoa.gr', 'Ιωάννης-Χρήστος Μάλλιος', '123456789', 'foititis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aggelies`
--
ALTER TABLE `aggelies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_forea` (`id_forea`);

--
-- Indexes for table `aitiseis`
--
ALTER TABLE `aitiseis`
  ADD PRIMARY KEY (`id_aitisis`),
  ADD KEY `id_forea` (`id_forea`,`id_foititi`),
  ADD KEY `id_aggelias` (`id_aggelias`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aggelies`
--
ALTER TABLE `aggelies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `aitiseis`
--
ALTER TABLE `aitiseis`
  MODIFY `id_aitisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
