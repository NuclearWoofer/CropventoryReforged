  --below is mostly user input, cropEstHarvest  & cropEstSell would be auto based on cropName
CREATE TABLE IF NOT EXISTS crops (
	cropId INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        cropName VARCHAR(50) DEFAULT NULL, --name chosen on dropdown
        cropPlanted DATE, --date planted
        cropQty INT, --how many of said plant
        
        
  

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;


     /*  cropEstSell FLOAT, --estimated sell = qty 
        category VARCHAR(50),
        subCategory VARCHAR(50),
         */