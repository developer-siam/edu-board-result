## Education board result system

This is a learning purpose project for calculate and search student's board results.we use some programming languages here.

#### Used Languages

-HTML 5
-CSS 3
-Bootstrap
-JavaScript
-jQuery
-PHP
-MySql
-OOP(structure)
-PDO(connection)

#### Database class design

````php
namespace Edu\Board\Support;
	require_once "../../config.php"; 
	use PDO;
	/**
	 * Database management(Database connection,Data add,Data delete,Data show,Data edit)
	 */
	abstract class Database 
	{
		/**
		 * server information
		 */		
		private $host= HOST;
		private $user= USER;
		private $pass= PASS;
		private $db= DB;
		private $connection;
		/**
		 * Database connection
		 */
		private function connection(){
			$connection = new PDO('mysql:host='.$this->host.';db_name='.$this->db,$this->user,$this->pass);
		}
	}
````