<?php	
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







