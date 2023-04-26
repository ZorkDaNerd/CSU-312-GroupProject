LOAD DATA LOCAL INFILE '/s/bach/n/under/zork9898/local_html/m2/assets/csv/colors.csv'
INTO TABLE colors
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
IGNORE 1 LINES
(@dummy, @color_name, @color_code, @dummy, @dummy, @dummy)
SET color_name = @color_name, color_code = @color_code;