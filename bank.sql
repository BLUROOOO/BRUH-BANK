-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Mar 2023, 21:54
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `accounts_data`
--

CREATE TABLE `accounts_data` (
  `user_ID` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `accounts_data`
--

INSERT INTO `accounts_data` (`user_ID`, `login`, `password`) VALUES
(4, 'student', '$2y$10$iNZCXsb1Yl823osvbvJaietByzZro7UKIJ03O0J4DFVotjDfW6Ha.'),
(5, 'student2', '$2y$10$W1WxuDvTS9tvfINdq0Dg1OlKEsiPuxCMw9yAKRuD.c1F6AjXEcroW'),
(6, 'student3', '$2y$10$wyFMnusgO5LD/6U.Icymfu5xAcikyauOPiPdu3jSitWtJNdhfslae'),
(7, 'qwe', '$2y$10$sPXCI.Lo4faUqnPnqvtcG.LVIftJqNhdD34PtB9IrxGWZvkgpSDvS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `account_type`
--

CREATE TABLE `account_type` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `type` enum('private','company') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `account_type`
--

INSERT INTO `account_type` (`ID`, `user`, `type`) VALUES
(1, 4, 'private'),
(2, 5, 'private'),
(3, 6, 'company'),
(4, 7, 'company');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history`
--

CREATE TABLE `history` (
  `transaction_ID` int(11) NOT NULL,
  `value` decimal(65,4) NOT NULL,
  `pay_in` tinyint(1) NOT NULL,
  `pay_out` tinyint(1) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `history`
--

INSERT INTO `history` (`transaction_ID`, `value`, `pay_in`, `pay_out`, `user_ID`, `title`, `transaction_date`) VALUES
(4, '111.0000', 0, 1, 5, 'abc', '2023-03-25 18:40:49'),
(5, '111.0000', 1, 0, 4, 'abc', '2023-03-25 18:40:49');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `second_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `pesel` decimal(11,0) DEFAULT NULL,
  `post_code` decimal(5,0) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `name`, `second_name`, `last_name`, `pesel`, `post_code`, `city`, `mail`, `create_date`) VALUES
(4, 'Patryk', 'Władysław', 'Pieniążek', '2231212121', '33300', 'Nowy Sącz', 'projekt@agh.com', '2023-03-25 18:20:35'),
(5, 'Adam', 'Kamil', 'Kowalski', '12345678911', '33213', 'Kamianna', 'pieniazekpatryk1@gmail.com', '2023-03-25 18:23:42'),
(6, 'Adam', 'Władysław', 'Pieniążek', '2230611111', '12354', 'Kraków', 'abc@abc.com', '2023-03-25 20:07:28'),
(7, 'Joanna', 'Adrianna', 'Małostka', '12345678901', '23523', 'Kurzaje', 'qwe@qwe.com', '2023-03-25 20:08:49');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wallet`
--

CREATE TABLE `wallet` (
  `wallet_ID` int(11) NOT NULL,
  `balance` decimal(65,2) NOT NULL,
  `debt` decimal(65,2) NOT NULL,
  `number` decimal(26,0) NOT NULL,
  `credit_card` decimal(16,0) NOT NULL,
  `funny3` decimal(3,0) NOT NULL,
  `Length` int(11) NOT NULL,
  `start_dept` decimal(65,2) NOT NULL,
  `instalment` decimal(65,2) NOT NULL,
  `debt_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wallet`
--

INSERT INTO `wallet` (`wallet_ID`, `balance`, `debt`, `number`, `credit_card`, `funny3`, `Length`, `start_dept`, `instalment`, `debt_date`) VALUES
(4, '4188.00', '4200.00', '580523505104082044640746', '4952039179114073', '610', 0, '0.00', '0.00', '2023-03-25'),
(5, '2012.00', '2000.00', '19813092008186223257962383', '0', '0', 10, '2500.00', '250.00', '2023-03-25'),
(6, '0.00', '0.00', '37333290741955781989196303', '0', '0', 0, '0.00', '0.00', '2023-03-25'),
(7, '0.00', '0.00', '58402545886287398021023117', '0', '0', 0, '0.00', '0.00', '2023-03-25');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `accounts_data`
--
ALTER TABLE `accounts_data`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indeksy dla tabeli `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user` (`user`);

--
-- Indeksy dla tabeli `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `account_type`
--
ALTER TABLE `account_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `history`
--
ALTER TABLE `history`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `accounts_data`
--
ALTER TABLE `accounts_data`
  ADD CONSTRAINT `accounts_data_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`);

--
-- Ograniczenia dla tabeli `account_type`
--
ALTER TABLE `account_type`
  ADD CONSTRAINT `account_type_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`ID`);

--
-- Ograniczenia dla tabeli `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`);

--
-- Ograniczenia dla tabeli `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`wallet_ID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
