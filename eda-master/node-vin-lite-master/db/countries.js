const addRange = require('../lib/addRange'),
      countries = {};

// Africa
addRange(countries, 'A', 'A','H','South Africa');
addRange(countries, 'A', 'J','N','Ivory Coast');
addRange(countries, 'A', 'P','Z','not assigned');
addRange(countries, 'A', '0','9','not assigned');
addRange(countries, 'B', 'A','E','Angola');
addRange(countries, 'B', 'F','K','Kenya');
addRange(countries, 'B', 'L','R','Tanzania');
addRange(countries, 'B', 'S','Z','not assigned');
addRange(countries, 'B', '0','9','not assigned');
addRange(countries, 'C', 'A','E','Benin');
addRange(countries, 'C', 'F','K','Madagascar');
addRange(countries, 'C', 'L','R','Tunisia');
addRange(countries, 'C', 'S','Z','not assigned');
addRange(countries, 'C', '0','9','not assigned');
addRange(countries, 'D', 'A','E','Egypt');
addRange(countries, 'D', 'F','K','Morocco');
addRange(countries, 'D', 'L','R','Zambia');
addRange(countries, 'D', 'S','Z','not assigned');
addRange(countries, 'D', '0','9','not assigned');
addRange(countries, 'E', 'A','E','Ethiopia');
addRange(countries, 'E', 'F','K','Mozambique');
addRange(countries, 'E', 'L','Z','not assigned');
addRange(countries, 'E', '0','9','not assigned');
addRange(countries, 'F', 'A','E','Ghana');
addRange(countries, 'F', 'F','K','Nigeria');
addRange(countries, 'F', 'L','Z','not assigned');
addRange(countries, 'F', '0','9','not assigned');
addRange(countries, 'G', 'A','Z','not assigned');
addRange(countries, 'G', '0','9','not assigned');
addRange(countries, 'H', 'A','Z','not assigned');
addRange(countries, 'H', '0','9','not assigned');

// Asia
addRange(countries, 'J', 'A','Z','Japan');
addRange(countries, 'J', '0','9','Japan');
addRange(countries, 'K', 'A','E','Sri Lanka');
addRange(countries, 'K', 'F','K','Israel');
addRange(countries, 'K', 'L','R','Korea');
addRange(countries, 'K', 'L','R','Korea (South)');
addRange(countries, 'K', 'S','Z','Kazakhstan');
addRange(countries, 'K', '0','0','Kazakhstan');
addRange(countries, 'L', 'A','Z','China');
addRange(countries, 'L', '0','9','China');
addRange(countries, 'M', 'A','E','India');
addRange(countries, 'M', 'F','K','Indonesia');
addRange(countries, 'M', 'L','R','Thailand');
addRange(countries, 'M', 'S','Z','not assigned');
addRange(countries, 'M', '0','9','not assigned');
addRange(countries, 'N', 'A','E','Iran');
addRange(countries, 'N', 'F','K','Pakistan');
addRange(countries, 'N', 'L','R','Turkey');
addRange(countries, 'N', 'L','R','Turkey');
addRange(countries, 'N', 'S','Z','not assigned');
addRange(countries, 'N', '0','9','not assigned');
addRange(countries, 'P', 'A','E','Philippines');
addRange(countries, 'P', 'F','K','Singapore');
addRange(countries, 'P', 'L','R','Malaysia');
addRange(countries, 'P', 'S','Z','not assigned');
addRange(countries, 'P', '0','9','not assigned');
addRange(countries, 'R', 'A','E','United Arab Emirates');
addRange(countries, 'R', 'F','K','Taiwan');
addRange(countries, 'R', 'L','R','Vietnam');
addRange(countries, 'R', 'S','Z','Saudi Arabia');
addRange(countries, 'R', '0','9','Saudi Arabia');

// Europe
addRange(countries, 'S', 'A','M','United Kingdom');
addRange(countries, 'S', 'N','T','East Germany');
addRange(countries, 'S', 'U','Z','Poland');
addRange(countries, 'S', '1','4','Latvia');
addRange(countries, 'S', '0','0','not assigned');
addRange(countries, 'S', '5','9','not assigned');
addRange(countries, 'T', 'A','H','Switzerland');
addRange(countries, 'T', 'J','P','Czech Republic');
addRange(countries, 'T', 'R','V','Hungary');
addRange(countries, 'T', 'W','Z','Portugal');
addRange(countries, 'T', '1','1','Portugal');
addRange(countries, 'T', '0','0','not assigned');
addRange(countries, 'T', '2','9','not assigned');
addRange(countries, 'U', 'A','G','not assigned');
addRange(countries, 'U', 'H','M','Denmark');
addRange(countries, 'U', 'N','T','Ireland');
addRange(countries, 'U', 'U','Z','Romania');
addRange(countries, 'U', '1','4','not assigned');
addRange(countries, 'U', '5','7','Slovakia');
addRange(countries, 'U', '0','0','not assigned');
addRange(countries, 'U', '8','9','not assigned');
addRange(countries, 'V', 'A','E','Austria');
addRange(countries, 'V', 'F','R','France');
addRange(countries, 'V', 'S','W','Spain');
addRange(countries, 'V', 'X','Z','Serbia');
addRange(countries, 'V', '1','2','Serbia');
addRange(countries, 'V', '3','5','Croatia');
addRange(countries, 'V', '6','9','Estonia');
addRange(countries, 'V', '0','0','Estonia');
addRange(countries, 'W', 'A','Z','West Germany');
addRange(countries, 'W', '0','9','West Germany');
addRange(countries, 'X', 'A','E','Bulgaria');
addRange(countries, 'X', 'F','K','Greece');
addRange(countries, 'X', 'L','R','Netherlands');
addRange(countries, 'X', 'S','W','USSR');
addRange(countries, 'X', 'X','Z','Luxembourg');
addRange(countries, 'X', '1','2','Luxembourg');
addRange(countries, 'X', '3','9','Russia');
addRange(countries, 'X', '0','0','Russia');
addRange(countries, 'Y', 'A','E','Belgium');
addRange(countries, 'Y', 'F','K','Finland');
addRange(countries, 'Y', 'L','R','Malta');
addRange(countries, 'Y', 'S','W','Sweden');
addRange(countries, 'Y', 'X','Z','Norway');
addRange(countries, 'Y', '1','2','Norway');
addRange(countries, 'Y', '3','5','Belarus');
addRange(countries, 'Y', '6','9','Ukraine');
addRange(countries, 'Y', '0','0','Ukraine');
addRange(countries, 'Z', 'A','R','Italy');
addRange(countries, 'Z', 'S','W','not assigned');
addRange(countries, 'Z', 'X','Z','Slovenia');
addRange(countries, 'Z', '1','2','Slovenia');
addRange(countries, 'Z', '3','5','Lithuania');
addRange(countries, 'Z', '3','5','Lithuania');
addRange(countries, 'Z', '6','9','not assigned');
addRange(countries, 'Z', '0','0','not assigned');

// North America
addRange(countries, '1', 'A','Z','United States');
addRange(countries, '1', '0','9','United States');
addRange(countries, '2', 'A','Z','Canada');
addRange(countries, '2', '0','9','Canada');
addRange(countries, '3', 'A','Z','Mexico');
addRange(countries, '3', '1','7','Mexico');
addRange(countries, '3', '8','9','Cayman Islands');
addRange(countries, '3', '0','0','Cayman Islands');
addRange(countries, '4', 'A','Z','United States');
addRange(countries, '4', '0','9','United States');
addRange(countries, '5', 'A','Z','United States');
addRange(countries, '5', '0','9','United States');

// Oceania
addRange(countries, '6', 'A','W','Australia');
addRange(countries, '6', 'X','Z','not assigned');
addRange(countries, '6', '0','9','not assigned');
addRange(countries, '7', 'A','E','New Zealand');
addRange(countries, '7', 'F','Z','not assigned');
addRange(countries, '7', '0','9','not assigned');

// South America
addRange(countries, '8', 'A','E','Argentina');
addRange(countries, '8', 'F','K','Chile');
addRange(countries, '8', 'L','R','Ecuador');
addRange(countries, '8', 'S','W','Peru');
addRange(countries, '8', 'X','Z','Venezuela');
addRange(countries, '8', '1','2','Venezuela');
addRange(countries, '8', '3','9','not assigned');
addRange(countries, '8', '0','0','not assigned');
addRange(countries, '9', 'A','E','Brazil');
addRange(countries, '9', 'F','K','Colombia');
addRange(countries, '9', 'L','R','Paraguay');
addRange(countries, '9', 'S','W','Uruguay');
addRange(countries, '9', 'X','Z','Trinidad & Tobago');
addRange(countries, '9', '1','2','Trinidad & Tobago');
addRange(countries, '9', '3','9','Brazil');
addRange(countries, '9', '0','0','not assigned');

//console.log(countries);

module.exports = countries;
