<?php

require_once('admin_config.php');

class ADMIN;

{
	private $conn2;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn2 = $db;
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
	
	
	public function saveCont($firstname,$lastname $middlename,$contact_no, $address)
	{
		try
		{
			$stmt = $this->conn->prepare("");/*FUNCTION HERE*/
			$stmt->execute();
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function saveCat ($description, $quantity, $profile_pic)
	{
		try
		{
			$stmt = $this->conn->prepare("");/*FUNCTION HERE*/
			$stmt->execute();
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	
    	

   


		
	
}
?>