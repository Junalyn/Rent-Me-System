<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
        $mysql = new PDO("mysql:host=localhost;",'root', '');
        $pstatement = $mysql->prepare("CREATE DATABASE IF NOT EXISTS rental");
        $pstatement->execute();
        $this->db = new PDO("mysql:host=localhost;dbname=rental", 'root', '');
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($username,$firstname,$middlename,$lastname,$password,$address,$contact_no)
	{
		try
		{
			$new_password = password_hash($password, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(username,firstname,middlename,lastname,password,address,contact_no) 
		                                               VALUES(:username, :firstname, :middlename, :lastname , :password , :address, :contact_no)");
												  
			$stmt->bindparam(":username", $username);
            $stmt->bindparam(":firstname", $firstname);
            $stmt->bindparam(":middlename", $middlename);
            $stmt->bindparam(":lastname", $lastname);
			$stmt->bindparam(":password", $new_password);
            $stmt->bindparam(":address", $address);
            $stmt->bindparam(":contact_no", $contact_no);
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($username,$password)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id_user, username, firstname, middlename, lastname, password FROM users WHERE username=:username");
			$stmt->execute(array(':username'=>$username));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($password, $userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['id_user'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
    	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
    
    public function createTable($tableName,$tableStruc){
		try{
			$this->conn->exec("$tableStruc");
			//echo "Table $tableName - Created!<br /><br />";
		}
		catch(Exception $e){
			echo "Table $tableName not successfully created! <br /><br />";
		}
	}
	
	public function insertRecord($insertSql){
		try{
			$this->conn->exec("$insertSql");
			//echo "Table $tableName - Created!<br /><br />";
		}
		catch(Exception $e){
			echo "Insert record not successfully done! <br /><br />";
		}
	}
	
	public function tableExists($table) {

		$db_tables = array_keys($this->conn->query('show tables')->fetchAll (PDO::FETCH_GROUP));

		//echo "<pre>" . var_dump($db_tables) . "</pre>"; // for debugging purposes only
		
		if(in_array($table, $db_tables)) 
		{ 
			//echo "TRUE";	// for debugging purposes only
			return TRUE;
		} else {
			//echo "FALSE";	// for debugging purposes only
			return FALSE;
		}


		
	}
}
?>