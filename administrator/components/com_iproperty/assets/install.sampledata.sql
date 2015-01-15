/**
* @version 3.1.3 2013-08-30
* @package Joomla
* @subpackage Intellectual Property
* @copyright (C) 2013 the Thinkery
* @license GNU/GPL see LICENSE.php
*/

--
-- Dumping data for table `#__iproperty_amenities`
--

INSERT INTO `#__iproperty_amenities` (`id`, `title`, `ip_source`, `cat`) VALUES
-- general amen = 0
-- interior amen = 1
-- exterior amen = 2

(1, 'Tennis Court', 0, 2),
(3, 'Swimming Pool', 0, 2),
(4, 'Garage', 0, 2),
(5, 'Fireplace', 0, 0),
(6, 'Dishwasher', 0, 1),
(7, 'Garbage Disposal', 0, 1),
(8, 'Central Air', 0, 1),
(9, 'Carpet Throughout', 0, 1),
(10, 'Washer/Dryer', 0, 1),
(11, 'Gas Fireplace', 0, 1),
(12, 'Gas Stove', 0, 1),
(13, 'Cable TV', 0, 0),
(14, 'Cable Internet', 0, 0),
(15, 'Wood Stove', 0, 1),
(16, 'Jacuzi Tub', 0, 1),
(17, 'Skylights', 0, 0),
(18, 'Burglar Alarm', 0, 1),
(19, 'Handicap Facilities', 0, 1),
(20, 'Pellet Stove', 0, 1),
(21, 'Central Vac', 0, 1),
(22, 'Lawn', 0, 2),
(23, 'Landscaping', 0, 2),
(24, 'Open Deck', 0, 2),
(25, 'Fence', 0, 2),
(26, 'RV Parking', 0, 2),
(27, 'Pasture', 0, 2),
(28, 'Fruit Trees', 0, 2),
(29, 'Satellite Dish', 0, 0),
(30, 'Sprinkler System', 0, 2),
(31, 'Covered Patio', 0, 2),
(32, 'Boat Slip', 0, 2),
(33, 'Exterior Lighting', 0, 2),
(34, 'Spa/Hot Tub', 0, 2),
(35, 'Gazebo', 0, 2),
(36, 'Range/Oven', 0, 1),
(37, 'Refrigerator', 0, 1),
(39, 'Electric Hot Water', 0, 0),
(40, 'Microwave', 0, 1),
(41, 'Washer', 0, 1),
(42, 'Dryer', 0, 1),
(43, 'Water Softener', 0, 0),
(44, 'RO Combo Gas/Electric', 0, 1),
(45, 'Gas Hot Water', 0, 1),
(46, 'Propane Hot Water', 0, 0),
(47, 'Grill Top', 0, 0),
(48, 'Trash Compactor', 0, 1),
(49, 'Freezer', 0, 1);

--
-- Dumping data for table `#__iproperty_countries`
--

INSERT INTO `#__iproperty_countries` (`id`, `title`, `mc_name`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Aland islands', 'AX'),
(3, 'Albania', 'AL'),
(4, 'Algeria', 'DZ'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antigua and Barbuda', 'AG'),
(9, 'Argentina', 'AR'),
(10, 'Armenia', 'AM'),
(11, 'Aruba', 'AW'),
(12, 'Australia', 'AU'),
(13, 'Austria', 'AT'),
(14, 'Azerbaijan', 'AZ'),
(15, 'Bahamas', 'BS'),
(16, 'Bahrain', 'BH'),
(17, 'Bangladesh', 'BD'),
(18, 'Barbados', 'BB'),
(19, 'Belarus', 'BY'),
(20, 'Belgium', 'BE'),
(21, 'Belize', 'BZ'),
(22, 'Benin', 'BJ'),
(23, 'Bermuda', 'BM'),
(24, 'Bhutan', 'BT'),
(25, 'Bolivia', 'BO'),
(26, 'Bosnia and Herzegovina', 'BA'),
(27, 'Botswana', 'BW'),
(28, 'Brazil', 'BR'),
(29, 'Brunei Darussalam', 'BN'),
(30, 'Bulgaria', 'BG'),
(31, 'Burkina Faso', 'BF'),
(32, 'Burundi', 'BI'),
(33, 'Cambodia', 'KH'),
(34, 'Cameroon', 'CM'),
(35, 'Canada', 'CA'),
(36, 'Cape Verde', 'CV'),
(37, 'Central african republic', 'CF'),
(38, 'Chad', 'TD'),
(39, 'Chile', 'CL'),
(40, 'China', 'CN'),
(41, 'Colombia', 'CO'),
(42, 'Comoros', 'KM'),
(43, 'Republic of Congo', 'CG'),
(44, 'The Democratic Republic of the Congo', 'CD'),
(45, 'Costa Rica', 'CR'),
(46, 'Cote d''Ivoire', 'CI'),
(47, 'Croatia', 'HR'),
(48, 'Cuba', 'CU'),
(49, 'Cyprus', 'CY'),
(50, 'Czech Republic', 'CZ'),
(51, 'Denmark', 'DK'),
(52, 'Djibouti', 'DJ'),
(53, 'Dominica', 'DM'),
(54, 'Dominican Republic', 'DO'),
(55, 'Ecuador', 'EC'),
(56, 'Egypt', 'EG'),
(57, 'El salvador', 'SV'),
(58, 'Equatorial Guinea', 'GQ'),
(59, 'Eritrea', 'ER'),
(60, 'Estonia', 'EE'),
(61, 'Ethiopia', 'ET'),
(62, 'Faeroe Islands', 'FO'),
(63, 'Falkland Islands', 'FK'),
(64, 'Fiji', 'FJ'),
(65, 'Finland', 'FI'),
(66, 'France', 'FR'),
(67, 'French Guiana', 'GF'),
(68, 'Gabon', 'GA'),
(69, 'Gambia, the', 'GM'),
(70, 'Georgia', 'GE'),
(71, 'Germany', 'DE'),
(72, 'Ghana', 'GH'),
(73, 'Greece', 'GR'),
(74, 'Greenland', 'GL'),
(75, 'Grenada', 'GD'),
(76, 'Guadeloupe', 'GP'),
(77, 'Guatemala', 'GT'),
(78, 'Guinea', 'GN'),
(79, 'Guinea-Bissau', 'GW'),
(80, 'Guyana', 'GY'),
(81, 'Haiti', 'HT'),
(82, 'Honduras', 'HN'),
(83, 'Hong Kong', 'HK'),
(84, 'Hungary', 'HU'),
(85, 'Iceland', 'IS'),
(86, 'India', 'IN'),
(87, 'Indonesia', 'ID'),
(88, 'Iran', 'IR'),
(89, 'Iraq', 'IQ'),
(90, 'Ireland', 'IE'),
(91, 'Israel', 'IL'),
(92, 'Italy', 'IT'),
(93, 'Jamaica', 'JM'),
(94, 'Japan', 'JP'),
(95, 'Jordan', 'JO'),
(96, 'Kazakhstan', 'KZ'),
(97, 'Kenya', 'KE'),
(98, 'North Korea', 'KP'),
(99, 'South Korea', 'KR'),
(100, 'Kuwait', 'KW'),
(101, 'Kyrgyzstan', 'KG'),
(102, 'Lao People''s Democratic Republic', 'LA'),
(103, 'Latvia', 'LV'),
(104, 'Lebanon', 'LB'),
(105, 'Lesotho', 'LS'),
(106, 'Liberia', 'LR'),
(107, 'Libya', 'LY'),
(108, 'Liechtenstein', 'LI'),
(109, 'Lithuania', 'LT'),
(110, 'Luxembourg', 'LU'),
(111, 'Macedonia', 'MK'),
(112, 'Madagascar', 'MG'),
(113, 'Malawi', 'MW'),
(114, 'Malaysia', 'MY'),
(115, 'Mali', 'ML'),
(116, 'Malta', 'MT'),
(117, 'Martinique', 'MQ'),
(118, 'Mauritania', 'MR'),
(119, 'Mauritius', 'MU'),
(120, 'Mexico', 'MX'),
(121, 'Moldova', 'MD'),
(122, 'Mongolia', 'MN'),
(123, 'Montenegro', 'ME'),
(124, 'Montserrat', 'MS'),
(125, 'Morocco', 'MA'),
(126, 'Mozambique', 'MZ'),
(127, 'Myanmar', 'MM'),
(128, 'Namibia', 'NA'),
(129, 'Nepal', 'NP'),
(130, 'Netherlands', 'NL'),
(131, 'New Caledonia', 'NC'),
(132, 'New Zealand', 'NZ'),
(133, 'Nicaragua', 'NI'),
(134, 'Niger', 'NE'),
(135, 'Nigeria', 'NG'),
(136, 'Norway', 'NO'),
(137, 'Oman', 'OM'),
(138, 'Pakistan', 'PK'),
(139, 'Palau', 'PW'),
(140, 'Palestinian Territories', 'PS'),
(141, 'Panama', 'PA'),
(142, 'Papua New Guinea', 'PG'),
(143, 'Paraguay', 'PY'),
(144, 'Peru', 'PE'),
(145, 'Philippines', 'PH'),
(146, 'Poland', 'PL'),
(147, 'Portugal', 'PT'),
(148, 'Puerto rico', 'PR'),
(149, 'Qatar', 'QA'),
(150, 'Reunion', 'RE'),
(151, 'Romania', 'RO'),
(152, 'Russian Federation', 'RU'),
(153, 'Rwanda', 'RW'),
(154, 'Saint Kitts and Nevis', 'KN'),
(155, 'Saint Lucia', 'LC'),
(156, 'Samoa', 'WS'),
(157, 'Sao Tome and Principe', 'ST'),
(158, 'Saudi Arabia', 'SA'),
(159, 'Senegal', 'SN'),
(160, 'Serbia', 'RS'),
(161, 'Sierra Leone', 'SL'),
(162, 'Singapore', 'SG'),
(163, 'Slovakia', 'SK'),
(164, 'Slovenia', 'SI'),
(165, 'Solomon Islands', 'SB'),
(166, 'Somalia', 'SO'),
(167, 'South Africa', 'ZA'),
(168, 'South Georgia and the South Sandwich Islands', 'GS'),
(169, 'Spain', 'ES'),
(170, 'Sri Lanka', 'LK'),
(171, 'Sudan', 'SD'),
(172, 'Suriname', 'SR'),
(173, 'Svalbard and Jan Mayen', 'SJ'),
(174, 'Swaziland', 'SZ'),
(175, 'Sweden', 'SE'),
(176, 'Switzerland', 'CH'),
(177, 'Syrian Arab Republic', 'SY'),
(178, 'Taiwan', 'TW'),
(179, 'Tajikistan', 'TJ'),
(180, 'Tanzania', 'TZ'),
(181, 'Thailand', 'TH'),
(182, 'Timor-Leste', 'TL'),
(183, 'Togo', 'TG'),
(184, 'Tonga', 'TO'),
(185, 'Trinidad and Tobago', 'TT'),
(186, 'Tunisia', 'TN'),
(187, 'Turkey', 'TR'),
(188, 'Turkmenistan', 'TM'),
(189, 'Turks and Caicos Islands', 'TC'),
(190, 'Uganda', 'UG'),
(191, 'Ukraine', 'UA'),
(192, 'United Arab Emirates', 'AE'),
(193, 'United Kingdom', 'GB'),
(194, 'United States', 'US'),
(195, 'Uruguay', 'UY'),
(196, 'Uzbekistan', 'UZ'),
(197, 'Vanuatu', 'VU'),
(198, 'Venezuela', 'VE'),
(199, 'Viet nam', 'VN'),
(200, 'Virgin Islands, British', 'VG'),
(201, 'Western Sahara', 'EH'),
(202, 'Yemen', 'YE'),
(203, 'Zambia', 'ZM'),
(204, 'Zimbabwe', 'ZW');

--
-- Dumping data for table `#__iproperty_currency`
--

INSERT INTO `#__iproperty_currency` (`id`, `country`, `currency`, `curr_abbreviation`, `curr_code`) VALUES
(1, 'AFGHANISTAN ', 'Afghani ', 'AFN', 971),
(2, 'ÅLAND ISLANDS ', 'Euro ', 'EUR', 978),
(3, 'ALBANIA ', 'Lek ', 'ALL', 8),
(4, 'ALGERIA ', 'Algerian Dinar ', 'DZD', 12),
(5, 'AMERICAN SAMOA ', 'US Dollar ', 'USD', 840),
(6, 'ANDORRA ', 'Euro ', 'EUR', 978),
(7, 'ANGOLA ', 'Kwanza ', 'AOA', 973),
(8, 'ANGUILLA ', 'East Caribbean Dollar ', 'XCD', 951),
(9, 'ANTIGUA AND BARBUDA ', 'East Caribbean Dollar ', 'XCD', 951),
(10, 'ARGENTINA ', 'Argentine Peso ', 'ARS', 32),
(11, 'ARMENIA ', 'Armenian Dram ', 'AMD', 51),
(12, 'ARUBA ', 'Aruban Guilder ', 'AWG', 533),
(13, 'AUSTRALIA ', 'Australian Dollar ', 'AUD', 36),
(14, 'AUSTRIA ', 'Euro ', 'EUR', 978),
(15, 'AZERBAIJAN ', 'Azerbaijanian Manat ', 'AZN', 944),
(16, 'BAHAMAS ', 'Bahamian Dollar ', 'BSD', 44),
(17, 'BAHRAIN ', 'Bahraini Dinar ', 'BHD', 48),
(18, 'BANGLADESH ', 'Taka ', 'BDT', 50),
(19, 'BARBADOS ', 'Barbados Dollar ', 'BBD', 52),
(20, 'BELARUS ', 'Belarussian Ruble ', 'BYR', 974),
(21, 'BELGIUM ', 'Euro ', 'EUR', 978),
(22, 'BELIZE ', 'Belize Dollar ', 'BZD', 84),
(24, 'BERMUDA ', 'Bermudian Dollar', 'BMD', 60),
(25, 'BHUTAN ', 'Ngultrum ', 'BTN', 64),
(26, 'BOLIVIA ', 'Boliviano', 'BOB', 68),
(27, 'BOSNIA AND HERZEGOVINA ', 'Convertible Marks ', 'BAM', 977),
(28, 'BOTSWANA ', 'Pula ', 'BWP', 72),
(29, 'BOUVET ISLAND ', 'Norwegian Krone ', 'NOK', 578),
(30, 'BRAZIL ', 'Brazilian Real ', 'BRL', 986),
(31, 'BRITISH INDIAN OCEAN TERRITORY ', 'US Dollar ', 'USD', 840),
(32, 'BRUNEI DARUSSALAM ', 'Brunei Dollar ', 'BND', 96),
(33, 'BULGARIA ', 'Bulgarian Lev ', 'BGN', 975),
(35, 'BURUNDI ', 'Burundi Franc ', 'BIF', 108),
(36, 'CAMBODIA ', 'Riel ', 'KHR', 116),
(37, 'CAMEROON ', 'CFA Franc BEAC', 'XAF', 950),
(38, 'CANADA ', 'Canadian Dollar ', 'CAD', 124),
(39, 'CAPE VERDE ', 'Cape Verde Escudo ', 'CVE', 132),
(40, 'CAYMAN ISLANDS ', 'Cayman Islands Dollar ', 'KYD', 136),
(41, 'CENTRAL AFRICAN REPUBLIC ', 'CFA Franc BEAC', 'XAF', 950),
(42, 'CHAD ', 'CFA Franc BEAC', 'XAF', 950),
(43, 'CHILE ', 'Chilean Peso', 'CLP', 152),
(44, 'CHINA ', 'Yuan Renminbi ', 'CNY', 156),
(45, 'CHRISTMAS ISLAND ', 'Australian Dollar ', 'AUD', 36),
(46, 'COCOS (KEELING) ISLANDS ', 'Australian Dollar ', 'AUD', 36),
(47, 'COLOMBIA ', 'Colombian Peso', 'COP', 170),
(48, 'COMOROS ', 'Comoro Franc ', 'KMF', 174),
(49, 'CONGO ', 'CFA Franc BEAC', 'XAF', 950),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF ', 'Congolese Franc ', 'CDF', 976),
(51, 'COOK ISLANDS ', 'New Zealand Dollar ', 'NZD', 554),
(52, 'COSTA RICA ', 'Costa Rican Colon ', 'CRC', 188),
(53, 'CÔTE D''IVOIRE ', 'CFA Franc BCEAO', 'XOF', 952),
(54, 'CROATIA ', 'Croatian Kuna ', 'HRK', 191),
(55, 'CUBA ', 'Cuban Peso', 'CUP', 192),
(56, 'CYPRUS ', 'Euro ', 'EUR', 978),
(57, 'CZECH REPUBLIC ', 'Czech Koruna ', 'CZK', 203),
(58, 'DENMARK ', 'Danish Krone ', 'DKK', 208),
(59, 'DJIBOUTI ', 'Djibouti Franc ', 'DJF', 262),
(60, 'DOMINICA ', 'East Caribbean Dollar ', 'XCD', 951),
(61, 'DOMINICAN REPUBLIC ', 'Dominican Peso ', 'DOP', 214),
(62, 'ECUADOR ', 'US Dollar ', 'USD', 840),
(63, 'EGYPT ', 'Egyptian Pound ', 'EGP', 818),
(64, 'EL SALVADOR ', 'El Salvador Colon', 'SVC', 222),
(65, 'EQUATORIAL GUINEA ', 'CFA Franc BEAC', 'XAF', 950),
(66, 'ERITREA ', 'Nakfa ', 'ERN', 232),
(67, 'ESTONIA ', 'Kroon ', 'EEK', 233),
(68, 'ETHIOPIA ', 'Ethiopian Birr ', 'ETB', 230),
(69, 'FALKLAND ISLANDS (MALVINAS) ', 'Falkland Islands Pound ', 'FKP', 238),
(70, 'FAROE ISLANDS ', 'Danish Krone ', 'DKK', 208),
(71, 'FIJI ', 'Fiji Dollar ', 'FJD', 242),
(72, 'FINLAND ', 'Euro ', 'EUR', 978),
(73, 'FRANCE ', 'Euro ', 'EUR', 978),
(74, 'FRENCH GUIANA ', 'Euro ', 'EUR', 978),
(75, 'FRENCH POLYNESIA ', 'CFP Franc ', 'XPF', 953),
(76, 'FRENCH SOUTHERN TERRITORIES ', 'Euro ', 'EUR', 978),
(77, 'GABON ', 'CFA Franc BEAC', 'XAF', 950),
(78, 'GAMBIA ', 'Dalasi ', 'GMD', 270),
(79, 'GEORGIA ', 'Lari ', 'GEL', 981),
(80, 'GERMANY ', 'Euro ', 'EUR', 978),
(81, 'GHANA ', 'Cedi ', 'GHS', 936),
(82, 'GIBRALTAR ', 'Gibraltar Pound ', 'GIP', 292),
(83, 'GREECE ', 'Euro ', 'EUR', 978),
(84, 'GREENLAND ', 'Danish Krone ', 'DKK', 208),
(85, 'GRENADA ', 'East Caribbean Dollar ', 'XCD', 951),
(86, 'GUADELOUPE ', 'Euro ', 'EUR', 978),
(87, 'GUAM ', 'US Dollar ', 'USD', 840),
(88, 'GUATEMALA ', 'Quetzal ', 'GTQ', 320),
(89, 'GUERNSEY ', 'Pound Sterling ', 'GBP', 826),
(90, 'GUINEA ', 'Guinea Franc ', 'GNF', 324),
(91, 'GUINEA-BISSAU ', 'Guinea-Bissau Peso', 'GWP', 624),
(92, 'GUYANA ', 'Guyana Dollar ', 'GYD', 328),
(93, 'HAITI ', 'Gourde', 'HTG', 332),
(94, 'HEARD ISLAND AND MCDONALD ISLANDS ', 'Australian Dollar ', 'AUD', 36),
(95, 'HOLY SEE (VATICAN CITY STATE) ', 'Euro ', 'EUR', 978),
(96, 'HONDURAS ', 'Lempira ', 'HNL', 340),
(97, 'HONG KONG ', 'Hong Kong Dollar ', 'HKD', 344),
(98, 'HUNGARY ', 'Forint ', 'HUF', 348),
(99, 'ICELAND ', 'Iceland Krona ', 'ISK', 352),
(100, 'INDIA ', 'Indian Rupee ', 'INR', 356),
(101, 'INDONESIA ', 'Rupiah ', 'IDR', 360),
(102, 'IRAN, ISLAMIC REPUBLIC OF ', 'Iranian Rial ', 'IRR', 364),
(103, 'IRAQ ', 'Iraqi Dinar ', 'IQD', 368),
(104, 'IRELAND ', 'Euro ', 'EUR', 978),
(105, 'ISRAEL ', 'New Israeli Sheqel ', 'ILS', 376),
(106, 'ITALY ', 'Euro ', 'EUR', 978),
(107, 'JAMAICA ', 'Jamaican Dollar ', 'JMD', 388),
(108, 'JAPAN ', 'Yen ', 'JPY', 392),
(109, 'JERSEY ', 'Pound Sterling ', 'GBP', 826),
(110, 'JORDAN ', 'Jordanian Dinar ', 'JOD', 400),
(111, 'KAZAKHSTAN ', 'Tenge ', 'KZT', 398),
(112, 'KENYA ', 'Kenyan Shilling ', 'KES', 404),
(113, 'KIRIBATI ', 'Australian Dollar ', 'AUD', 36),
(114, 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF ', 'North Korean Won ', 'KPW', 408),
(115, 'KOREA, REPUBLIC OF ', 'Won ', 'KRW', 410),
(116, 'KUWAIT ', 'Kuwaiti Dinar ', 'KWD', 414),
(117, 'KYRGYZSTAN ', 'Som ', 'KGS', 417),
(118, 'LAO PEOPLE''S DEMOCRATIC REPUBLIC ', 'Kip ', 'LAK', 418),
(119, 'LATVIA ', 'Latvian Lats ', 'LVL', 428),
(120, 'LEBANON ', 'Lebanese Pound ', 'LBP', 422),
(121, 'LESOTHO ', 'Rand', 'ZAR', 710),
(122, 'LIBERIA ', 'Liberian Dollar ', 'LRD', 430),
(123, 'LIBYAN ARAB JAMAHIRIYA ', 'Libyan Dinar ', 'LYD', 434),
(124, 'LIECHTENSTEIN ', 'Swiss Franc ', 'CHF', 756),
(125, 'LITHUANIA ', 'Lithuanian Litas ', 'LTL', 440),
(126, 'LUXEMBOURG ', 'Euro ', 'EUR', 978),
(127, 'MACAO ', 'Pataca ', 'MOP', 446),
(128, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF ', 'Denar ', 'MKD', 807),
(129, 'MADAGASCAR ', 'Malagasy Ariary ', 'MGA', 969),
(130, 'MALAWI ', 'Kwacha ', 'MWK', 454),
(131, 'MALAYSIA ', 'Malaysian Ringgit ', 'MYR', 458),
(132, 'MALDIVES ', 'Rufiyaa ', 'MVR', 462),
(133, 'MALI ', 'CFA Franc BCEAO', 'XOF', 952),
(134, 'MALTA ', 'Euro ', 'EUR', 978),
(135, 'MARSHALL ISLANDS ', 'US Dollar ', 'USD', 840),
(136, 'MARTINIQUE ', 'Euro ', 'EUR', 978),
(137, 'MAURITANIA ', 'Ouguiya ', 'MRO', 478),
(138, 'MAURITIUS ', 'Mauritius Rupee ', 'MUR', 480),
(139, 'MAYOTTE ', 'Euro ', 'EUR', 978),
(140, 'MEXICO ', 'Mexican Peso', 'MXN', 484),
(141, 'MICRONESIA, FEDERATED STATES OF ', 'US Dollar ', 'USD', 840),
(142, 'MOLDOVA, REPUBLIC OF ', 'Moldovan Leu ', 'MDL', 498),
(143, 'MONACO ', 'Euro ', 'EUR', 978),
(144, 'MONGOLIA ', 'Tugrik ', 'MNT', 496),
(145, 'MONTENEGRO ', 'Euro ', 'EUR', 978),
(146, 'MONTSERRAT ', 'East Caribbean Dollar ', 'XCD', 951),
(147, 'MOROCCO ', 'Moroccan Dirham ', 'MAD', 504),
(148, 'MOZAMBIQUE ', 'Metical ', 'MZN', 943),
(149, 'MYANMAR ', 'Kyat ', 'MMK', 104),
(150, 'NAMIBIA ', 'Rand', 'ZAR', 710),
(151, 'NAURU ', 'Australian Dollar ', 'AUD', 36),
(152, 'NEPAL ', 'Nepalese Rupee ', 'NPR', 524),
(153, 'NETHERLANDS ', 'Euro ', 'EUR', 978),
(154, 'NETHERLANDS ANTILLES ', 'Netherlands Antillian Guilder ', 'ANG', 532),
(155, 'NEW CALEDONIA ', 'CFP Franc ', 'XPF', 953),
(156, 'NEW ZEALAND ', 'New Zealand Dollar ', 'NZD', 554),
(157, 'NICARAGUA ', 'Cordoba Oro ', 'NIO', 558),
(158, 'NIGER ', 'CFA Franc BCEAO', 'XOF', 952),
(159, 'NIGERIA ', 'Naira ', 'NGN', 566),
(160, 'NIUE ', 'New Zealand Dollar ', 'NZD', 554),
(161, 'NORFOLK ISLAND ', 'Australian Dollar ', 'AUD', 36),
(162, 'NORTHERN MARIANA ISLANDS ', 'US Dollar ', 'USD', 840),
(163, 'NORWAY ', 'Norwegian Krone ', 'NOK', 578),
(164, 'OMAN ', 'Rial Omani ', 'OMR', 512),
(165, 'PAKISTAN ', 'Pakistan Rupee ', 'PKR', 586),
(166, 'PALAU ', 'US Dollar ', 'USD', 840),
(167, 'PANAMA ', 'Balboa', 'PAB', 590),
(168, 'PAPUA NEW GUINEA ', 'Kina ', 'PGK', 598),
(169, 'PARAGUAY ', 'Guarani ', 'PYG', 600),
(170, 'PERU ', 'Nuevo Sol ', 'PEN', 604),
(171, 'PHILIPPINES ', 'Philippine Peso ', 'PHP', 608),
(172, 'PITCAIRN ', 'New Zealand Dollar ', 'NZD', 554),
(173, 'POLAND ', 'Zloty ', 'PLN', 985),
(174, 'PORTUGAL ', 'Euro ', 'EUR', 978),
(175, 'PUERTO RICO ', 'US Dollar ', 'USD', 840),
(176, 'QATAR ', 'Qatari Rial ', 'QAR', 634),
(177, 'RÉUNION ', 'Euro ', 'EUR', 978),
(178, 'ROMANIA ', 'New Leu ', 'RON', 946),
(179, 'RUSSIAN FEDERATION ', 'Russian Ruble ', 'RUB', 643),
(180, 'RWANDA ', 'Rwanda Franc ', 'RWF', 646),
(181, 'SAINT-BARTHÉLEMY ', 'Euro ', 'EUR', 978),
(182, 'SAINT HELENA ', 'Saint Helena Pound ', 'SHP', 654),
(183, 'SAINT KITTS AND NEVIS ', 'East Caribbean Dollar ', 'XCD', 951),
(184, 'SAINT LUCIA ', 'East Caribbean Dollar ', 'XCD', 951),
(185, 'SAINT MARTIN ', 'Euro ', 'EUR', 978),
(186, 'SAINT PIERRE AND MIQUELON ', 'Euro ', 'EUR', 978),
(187, 'SAINT VINCENT AND THE GRENADINES ', 'East Caribbean Dollar ', 'XCD', 951),
(188, 'SAMOA ', 'Tala ', 'WST', 882),
(189, 'SAN MARINO ', 'Euro ', 'EUR', 978),
(190, 'SÃO TOME AND PRINCIPE ', 'Dobra ', 'STD', 678),
(191, 'SAUDI ARABIA ', 'Saudi Riyal ', 'SAR', 682),
(192, 'SENEGAL ', 'CFA Franc BCEAO', 'XOF', 952),
(193, 'SERBIA ', 'Serbian Dinar ', 'RSD', 941),
(194, 'SEYCHELLES ', 'Seychelles Rupee ', 'SCR', 690),
(195, 'SIERRA LEONE ', 'Leone ', 'SLL', 694),
(196, 'SINGAPORE ', 'Singapore Dollar ', 'SGD', 702),
(197, 'SLOVAKIA ', 'Euro ', 'EUR', 978),
(198, 'SLOVENIA ', 'Euro ', 'EUR', 978),
(199, 'SOLOMON ISLANDS ', 'Solomon Islands Dollar ', 'SBD', 90),
(200, 'SOMALIA ', 'Somali Shilling ', 'SOS', 706),
(201, 'SOUTH AFRICA ', 'Rand ', 'ZAR', 710),
(202, 'SPAIN ', 'Euro ', 'EUR', 978),
(203, 'SRI LANKA ', 'Sri Lanka Rupee ', 'LKR', 144),
(204, 'SUDAN ', 'Sudanese Pound ', 'SDG', 938),
(205, 'SURINAME ', 'Surinam Dollar ', 'SRD', 968),
(206, 'SVALBARD AND JAN MAYEN ', 'Norwegian Krone ', 'NOK', 578),
(207, 'SWAZILAND ', 'Lilangeni ', 'SZL', 748),
(208, 'SWEDEN ', 'Swedish Krona ', 'SEK', 752),
(209, 'SWITZERLAND ', 'Swiss Franc', 'CHF', 756),
(210, 'SYRIAN ARAB REPUBLIC ', 'Syrian Pound ', 'SYP', 760),
(211, 'TAIWAN, PROVINCE OF CHINA ', 'New Taiwan Dollar ', 'TWD', 901),
(212, 'TAJIKISTAN ', 'Somoni ', 'TJS', 972),
(213, 'TANZANIA, UNITED REPUBLIC OF ', 'Tanzanian Shilling ', 'TZS', 834),
(214, 'THAILAND ', 'Baht ', 'THB', 764),
(215, 'TIMOR-LESTE ', 'US Dollar ', 'USD', 840),
(216, 'TOGO ', 'CFA Franc BCEAO', 'XOF', 952),
(217, 'TOKELAU ', 'New Zealand Dollar ', 'NZD', 554),
(218, 'TONGA ', 'Pa''anga ', 'TOP', 776),
(219, 'TRINIDAD AND TOBAGO ', 'Trinidad and Tobago Dollar ', 'TTD', 780),
(220, 'TUNISIA ', 'Tunisian Dinar ', 'TND', 788),
(221, 'TURKEY ', 'Turkish Lira ', 'TRY', 949),
(222, 'TURKMENISTAN ', 'Manat ', 'TMT', 934),
(223, 'TURKS AND CAICOS ISLANDS ', 'US Dollar ', 'USD', 840),
(224, 'TUVALU ', 'Australian Dollar ', 'AUD', 36),
(225, 'UGANDA ', 'Uganda Shilling ', 'UGX', 800),
(226, 'UKRAINE ', 'Hryvnia ', 'UAH', 980),
(227, 'UNITED ARAB EMIRATES ', 'UAE Dirham ', 'AED', 784),
(228, 'UNITED KINGDOM ', 'Pound Sterling ', 'GBP', 826),
(229, 'UNITED STATES ', 'US Dollar', 'USD', 840),
(230, 'UNITED STATES MINOR OUTLYING ISLANDS ', 'US Dollar ', 'USD', 840),
(231, 'URUGUAY ', 'Peso Uruguayo', 'UYU', 858),
(232, 'UZBEKISTAN ', 'Uzbekistan Sum ', 'UZS', 860),
(233, 'VANUATU ', 'Vatu ', 'VUV', 548),
(234, 'VENEZUELA ', 'Bolivar Fuerte ', 'VEF', 937),
(235, 'VIET NAM ', 'Dong ', 'VND', 704),
(236, 'VIRGIN ISLANDS (BRITISH) ', 'US Dollar ', 'USD', 840),
(237, 'VIRGIN ISLANDS (U.S.) ', 'US Dollar ', 'USD', 840),
(238, 'WALLIS AND FUTUNA ', 'CFP Franc ', 'XPF', 953),
(239, 'WESTERN SAHARA ', 'Moroccan Dirham ', 'MAD', 504),
(240, 'YEMEN ', 'Yemeni Rial ', 'YER', 886),
(241, 'ZAMBIA ', 'Zambian Kwacha ', 'ZMK', 894),
(242, 'ZIMBABWE ', 'Zimbabwe Dollar ', 'ZWL', 932);

--
-- Dumping data for table `#__iproperty_settings`
--

INSERT INTO `#__iproperty_settings` (`id`) VALUES (1);

--
-- Dumping data for table `#__iproperty_states`
--

INSERT INTO `#__iproperty_states` (`id`, `title`, `mc_name`) VALUES
(1, 'Alabama', 'AL'),
(2, 'Alaska', 'AK'),
(3, 'Arizona', 'AZ'),
(4, 'Arkansas', 'AR'),
(5, 'California', 'CA'),
(6, 'Colorado', 'CO'),
(7, 'Connecticut', 'CT'),
(8, 'Delaware', 'DE'),
(9, 'District of Columbia', 'DC'),
(10, 'Florida', 'FL'),
(11, 'Georgia', 'GA'),
(12, 'Hawaii', 'HI'),
(13, 'Idaho', 'ID'),
(14, 'Illinois', 'IL'),
(15, 'Indiana', 'IN'),
(16, 'Iowa', 'IA'),
(17, 'Kansas', 'KS'),
(18, 'Kentucky', 'KY'),
(19, 'Louisiana', 'LA'),
(20, 'Maine', 'ME'),
(21, 'Maryland', 'MD'),
(22, 'Massachusetts', 'MA'),
(23, 'Michigan', 'MI'),
(24, 'Minnesota', 'MN'),
(25, 'Mississippi', 'MS'),
(26, 'Missouri', 'MO'),
(27, 'Montana', 'MT'),
(28, 'Nebraska', 'NE'),
(29, 'Nevada', 'NV'),
(30, 'New Hampshire', 'NH'),
(31, 'New Jersey', 'NJ'),
(32, 'New Mexico', 'NM'),
(33, 'New York', 'NY'),
(34, 'North Carolina', 'NC'),
(35, 'North Dakota', 'ND'),
(36, 'Ohio', 'OH'),
(37, 'Oklahoma', 'OK'),
(38, 'Oregon', 'OR'),
(39, 'Pennsylvania', 'PA'),
(40, 'Rhode Island', 'RI'),
(41, 'South Carolina', 'SC'),
(42, 'South Dakota', 'SD'),
(43, 'Tennessee', 'TN'),
(44, 'Texas', 'TX'),
(45, 'Utah', 'UT'),
(46, 'Vermont', 'VT'),
(47, 'Virginia', 'VA'),
(48, 'Washington', 'WA'),
(49, 'West Virginia', 'WV'),
(50, 'Wisconsin', 'WI'),
(51, 'Wyoming', 'WY');

--
-- Dumping data for table `#__iproperty_stypes`
--

INSERT INTO `#__iproperty_stypes` (`id`, `name`, `banner_image`, `banner_color`, `state`, `show_banner`, `show_request_form`) VALUES
(1, 'For Sale', '', '', 1, 0, 1),
(2, 'For Lease', '', '', 1, 0, 1),
(3, 'For Sale or Lease', '', '', 1, 0, 1),
(4, 'For Rent', '', '', 1, 0, 1),
(5, 'Sold', 'components/com_iproperty/assets/images/banners/banner_sold.png', '#cc0000', 1, 1, 0),
(6, 'Pending', 'components/com_iproperty/assets/images/banners/banner_pending.png', '#e8ab07', 1, 1, 1);