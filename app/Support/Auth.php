<?php 
	namespace Edu\Board\Support;
	use Edu\Board\Support\Database;
	use PDO;


	/**
	 * Login system
	 */
	class Auth extends Database
	{
		public function userLoginSystem($email_uname,$pass)
		{
			$data=$this->usernameEmailCheck($email_uname);
			$num=$data['num'];
			$user_login_data=$data['data']->fetch(PDO::FETCH_ASSOC);
			if ($num==1) {
				if (password_verify($pass, $user_login_data['pass'])) {
					header('location:../admin/dashboard.php');
				}else{
					return '<p class="alert alert-warning" >Password did not matched !<button class="close" data-dismiss="alert">&times;</button></p>';
				}
			}else{
				return '<p class="alert alert-danger" >Username or E-mail is not valid !<button class="close" data-dismiss="alert">&times;</button></p>';
			}


			
		}
		/**
		 * user email / username checking from Database table
		 */
		public function usernameEmailCheck($value)
		{
			return $this->check('users',$value);
			
		}
	}



















?>