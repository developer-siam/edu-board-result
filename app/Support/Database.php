<?php	
	namespace Edu\Board\Support;
	// require_once "../config.php"; 
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
			return $this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->user,$this->pass);
		}
		/**
		 * user email / username checking from Database table
		 */
		public function check($table,$data)
		{
			$stmt=$this->connection()-> prepare("SELECT * FROM $table WHERE uname='$data'||email='$data'");
			$stmt->execute();
			$num=$stmt->rowCount();
			return[
				'num' => $num,
				'data' => $stmt
			];			
		}
	}







