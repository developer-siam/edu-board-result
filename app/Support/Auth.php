<?php 
	namespace Edu\Board\Support;
	require_once "../vendor/autoload.php";
	require_once "../config.php";
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
					$_SESSION['id']=$user_login_data['id'];
					$_SESSION['name']=$user_login_data['name'];
					$_SESSION['role']=$user_login_data['role'];
					$_SESSION['email']=$user_login_data['email'];
					$_SESSION['cell']=$user_login_data['cell'];
					$_SESSION['photo']=$user_login_data['photo'];

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
		public function userLogout()
		{
			session_destroy();
			header("location:index.php");
		}





	}
