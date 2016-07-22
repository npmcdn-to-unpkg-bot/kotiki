<?php
	//Класс пользователя админа
	class Tusr
	{
		public $email;
		public $pass;
		public $id;
		public $bAuth;
		public $db;


		public function __construct($pdb,$pemail,$ppass)
		{
			$this->db=$pdb;
			$this->email=$pemail;
			$this->pass=$ppass;
			$this->bAuth=false;
			$this->id=0;
		}

		//Проверка авторизации админа
		public function chk_usr_auth()
		{
			$this->bAuth = false;
			if(isset($_COOKIE['id']))	$_SESSION['id']=$_COOKIE['id'];
			if(!isset($_SESSION['id'])) return false;
			$result = $this->db->mysqli->query("SELECT * FROM usr_admin WHERE id=\"".$_SESSION['id']."\"");
			if(!$result)return false;
			if($result->num_rows==1)
			{
				if($obj = $result->fetch_object())
				{
					$this->bAuth=true;
					$this->id=$obj->id;
					$this->email=$obj->email;
					$this->pass=$obj->pass;
				}
			}
			$result->close();
			return $this->bAuth;
		}


		//Авторизация админа по post
		public function usr_auth_post()
		{
			if(!empty($_POST["email"]) && !empty($_POST["pass"]))
			{
				return $this->usr_auth($_POST["email"],$_POST["pass"],(isset($_POST["remember"])?true:false));
			}
			return false;
		}


		//Авторизация админа
		public function usr_auth($email="",$pass="",$remember_cookies=true)
		{
			if($email=="") $email=$this->email;
			if($pass=="") $pass=$this->pass;
			$result = $this->db->mysqli->query("SELECT * FROM usr_admin WHERE email=\"".$email."\" AND pass=\"".$pass."\" LIMIT 1");
			if(!$result)return false;
			if($result->num_rows==1)
			{
				if($obj = $result->fetch_object())
				{
					$this->id=$obj->id;
					$this->bAuth=true;
					$_SESSION['id']=$obj->id;
					if($remember_cookies)
					{
						//2 недели
						setcookie("id", $this->id, time()+(3600*24*14));
					}
					$this->email=$obj->email;
					$this->pass=$obj->pass;
				}
				else
					$this->bAuth = false;
			}
			$result->close();
			return $this->bAuth;
		}


		//Выход / Деавторизация
		public function logout()
		{
			$this->bAuth = false;
			if(isset($_SESSION['id'])) 
			{
				$_SESSION['id']=null;
				unset($_SESSION['id']);
				unset($_COOKIE['id']);
				setcookie('id', null, -1);
			}
		}
	}
?>