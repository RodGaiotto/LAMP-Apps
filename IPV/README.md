Application IGA Patching Verification:

Type: CRUD
Language: PHP, JS, HTML

DataBase: MySQL
DB Name: ipvdb
Tables:
auth - Used to registry user and password
ipvtable - General information

The application inititaly developed to run in Cloud thru a PHP boilerplate display information from a MySQL database in a table.

The table uses a JS tool allowing filters. Also, it is possible to export the information to MS-EXCEL using another JS tool for this purpose.

One nice improvement in this application is the "Management" session protected by USER and PASSWORD. In the session we have options to change the activity to COMPLETED (boolean: yes / no) and change the issues DESCRIPTION.

If the record be set with COMPLETED: YES, it is not shown in the main table / dashboard.



DataBase Details:

mysql -u admin -p --host sl-us-south-1-portal.54.dblayer.com --port 24179 --ssl=true --local-infile
QIFKWOYBCZWUWHHE

--------------------------------------

MySQL [(none)]> show databases;
+--------------------+
| Database           |
+--------------------+
| ipvdb              |
+--------------------+

--------------------------------------

MySQL [(none)]> use ipvdb;

--------------------------------------

MySQL [ipvdb]> show tables;
+-----------------+
| Tables_in_ipvdb |
+-----------------+
| auth            |
| ipvtable        |
+-----------------+

--------------------------------------

MySQL [ipvdb]> describe auth;
+--------+--------------+------+-----+---------+----------------+
| Field  | Type         | Null | Key | Default | Extra          |
+--------+--------------+------+-----+---------+----------------+
| iduser | int(5)       | NO   | PRI | NULL    | auto_increment |
| name   | varchar(100) | YES  |     | NULL    |                |
| pass   | varchar(100) | YES  |     | NULL    |                |
| email  | varchar(100) | YES  |     | NULL    |                |
| admin  | varchar(2)   | YES  |     | NULL    |                |
+--------+--------------+------+-----+---------+----------------+

---------------------------------------

MySQL [ipvdb]> describe ipvtable;
+-------------+--------------+------+-----+-------------------+----------------+
| Field       | Type         | Null | Key | Default           | Extra          |
+-------------+--------------+------+-----+-------------------+----------------+
| ID          | int(4)       | NO   | PRI | NULL              | auto_increment |
| CREATION    | timestamp    | NO   |     | CURRENT_TIMESTAMP |                |
| SERVER      | varchar(50)  | YES  |     | NULL              |                |
| DUEDATE     | date         | YES  |     | NULL              |                |
| DUE         | varchar(50)  | YES  |     | NULL              |                |
| SEV         | varchar(50)  | YES  |     | NULL              |                |
| ADVISORY    | varchar(50)  | YES  |     | NULL              |                |
| DESCRIPTION | varchar(200) | YES  |     | NULL              |                |
| COMPLETED   | varchar(10)  | YES  |     | NULL              |                |
+-------------+--------------+------+-----+-------------------+----------------+
