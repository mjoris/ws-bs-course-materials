SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `demo-webapi`;
CREATE DATABASE `demo-webapi`
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_unicode_ci;
USE `demo-webapi`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `products` (`id`, `title`, `description`, `price`, `quantity`, `added_on`) VALUES
(1, 'Kenwood MX271 Patissier', 'Als jouw keuken vaak veel weg heeft van een bakkerskeuken, dan is de Kenwood MX271 Patissier een zeer geschikte mixer. De meegeleverde mixopzetstukken zorgen er namelijk voor dat je goed voorbereid je taart, gebak of pizza maakt. Zo maak je deeg met de deeghaak voor bijvoorbeeld pizza- of brooddeeg. Of klop je ingrediënten tot een luchtig geheel met de klopper en garde. Je bewerkt de ingrediënten in de RVS mengkom met een inhoud van 4 liter. Dit doe je daarbij op een van de 12 standen waardoor je ingrediënten altijd op de optimale snelheid bewerkt.', 176.99, 3, '2019-01-15 22:01:44'),
(2, 'DeLonghi Icona Vintage Blauw Broodrooster','De Icona Vintage-lijn van DeLonghi is gebaseerd op de nostalgie van de jaren vijftig. Dit is terug te zien in de vormgeving met retro kenmerken, kleuraccenten en chromen details. Onderdeel van de DeLonghi Icona Vintage ontbijtlijn is de broodrooster. Rooster je brood tot de voor jou gewenste kleur door de verschillende bruiningsstanden. Door de automatische centralisatie wordt brood altijd gelijkmatig aan beide kanten gebruind. De DeLonghi Icona Vintage broodrooster heeft ook een eenzijdige roosterfunctie voor het bereiden van de lekkerste bagels.', 89.99, 10, '2019-01-15 22:02:38'),
(4, 'Koelkast Bosch KSL20AR30', 'De Bosch KSL20AR30 brengt de jaren ''50 terug naar jouw keuken. Deze retro koelkast heeft namelijk het uiterlijk van vroeger, maar de techniek van het heden. En die technische snufjes liegen er niet om. In de 139 liter ruime koelruimte zorgt de luchtcirculatie voor een constante temperatuur waardoor eten langer vers blijft. Ook groente en fruit blijft tot 2 keer langer vers in de speciale HydroFresh-groentelade.', 799.00, 1,  '2019-01-15 22:03:16'),
(6, 'Ariete 1389 Vintage - Pistonmachine - Lichtblauw', 'Een beauty in de keuken is de Retro Espresso Machine in Vintage Sky Blue van het Italiaanse merk Ariete. Deze leuke retro espresso machine maakt espresso en koffie klaar door gemalen koffie of pads te gebruiken. Kies er daarnaast voor om een maxi capuccino te maken en top de koffie af met een perfecte schuimlaag.', 171.99, 0, '2019-01-15 22:15:08'),
(7, 'View Quest Hepburn Mk II Draagbare radio', 'Ben je opzoek naar een radio of Bluetooth speaker? Je kunt natuurlijk voor een eenvoudige radio gaan, maar je kan ook kiezen voor een radio van View Quest. Dit Britse merk haalt de inspiratie uit het eigen land. Dit land staat tenslotte bekend om speakers met unieke designs en een uitstekende geluidskwaliteit. Kleur en design zijn belangrijke onderdelen bij het uitstralen van wie jij bent. Dus waarom zou je dan niet voor het allermooiste gaan in jouw huis?', 149.99, 3, '2019-01-15 22:19:02')
;

ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;