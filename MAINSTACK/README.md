Application Mainstack:

Type: R - Read
Language: PHP, JS, HTML

DataBase: MySQL
DB Name: msdb
Tables: main - host all the application data, imported / loaded from a .csv file.


The application inititaly developed to run in Cloud thru a PHP boilerplate display information from a MySQL database in a table.

The table uses a JS tool allowing filters. Also, it is possible to export the information to MS-EXCEL using another JS tool for this purpose.

The best point from the application are few different REPORT options:

- Select several options using CHECK BOXES;
- Making queries using a TEXT FIELD;


Other important feature is the cool Front-End design.

The DB is feed from a .CSV file that is imported (LOADED) to the MySQL. The CSV file is opened checking:

- Separated by:
Tab, Comma, Semicolon, Text delimiter: "

Command used to LOAD the data from the .CSV:

MySQL [msdb]> LOAD DATA LOCAL INFILE "/home/rgaiotto/Desktop/Mainstack_DB_Example.csv" INTO TABLE main FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (VCSAC2,SSCDQ,LPAR,HOSTF,HOST,LNXVER,ZVMVER,SLID,VMID,CLASSG,IP,STATUS,LOCATION,SLL,FLL,IM1,IM2);




DataBase Details:

mysql -u admin -p --host sl-us-south-1-portal.8.dblayer.com --port 40725 --ssl=true --local-infile


NBZAZABSRGEAMUDM

--------------------------------------

MySQL [(none)]> show databases;
+--------------------+
| Database           |
+--------------------+
| msdb               |
+--------------------+

--------------------------------------

MySQL [(none)]> use msdb;

--------------------------------------

MySQL [msdb]> show tables;
+----------------+
| Tables_in_msdb |
+----------------+
| main           |
+----------------+


--------------------------------------

MySQL [msdb]> describe main;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| ID         | int(4)       | NO   | PRI | NULL    | auto_increment |
| VCSAC2     | varchar(50)  | YES  |     | NULL    |                |
| SSCDQ      | varchar(50)  | YES  |     | NULL    |                |
| LPAR       | varchar(10)  | YES  |     | NULL    |                |
| HOSTF      | varchar(50)  | YES  |     | NULL    |                |
| HOST       | varchar(50)  | YES  |     | NULL    |                |
| LNXVER     | varchar(30)  | YES  |     | NULL    |                |
| ZVMVER     | varchar(30)  | YES  |     | NULL    |                |
| SLID       | varchar(30)  | YES  |     | NULL    |                |
| VMID       | varchar(20)  | YES  |     | NULL    |                |
| CLASSG     | varchar(20)  | YES  |     | NULL    |                |
| IP         | varchar(30)  | YES  |     | NULL    |                |
| STATUS     | varchar(30)  | YES  |     | NULL    |                |
| LOCATION   | varchar(50)  | YES  |     | NULL    |                |
| APPDETAILS | varchar(300) | YES  |     | NULL    |                |
| SLL        | varchar(100) | YES  |     | NULL    |                |
| FLL        | varchar(100) | YES  |     | NULL    |                |
| IM1        | varchar(100) | YES  |     | NULL    |                |
| IM2        | varchar(100) | YES  |     | NULL    |                |
| SUBACCT    | varchar(100) | YES  |     | NULL    |                |
