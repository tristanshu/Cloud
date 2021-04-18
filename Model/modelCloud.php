<?php


Class modelCloud {
	
	public $conn;
	
	function __construct(){	
	
		$this->conn = new mysqli("localhost", "root", "", "cloud");	
		
	}
	
	function registerUser ($email, $password, $firstname, $lastname ){
		 
		
		$sql = "INSERT INTO user (email, password, firstname, lastname)
        VALUES ('$email', '$password', '$firstname', '$lastname')"; 



		if ($this->conn->query($sql) === TRUE) {
		echo "Registered Successfully";
		} else {
		echo "Error: could not register";
		}


		$this->conn->close(); // close DB connection		
		
	}

		function loginUser($email, $password){
	
			$sql = "SELECT firstname, lastname FROM user where email = '$email' AND password = '$password'";
	
			$result = $this->conn->query($sql);


			if ($result->num_rows > 0) {

			  echo " Successfully Logged in: ";
			
			  while($row = $result->fetch_assoc()) {
				  
				  $firstname = $row["firstname"];
				  $lastname = $row["lastname"];
	
				
				  echo " $firstname &nbsp;&nbsp; $lastname <br>";
				
				}				
				
			} else {
				echo "Incorrect email or password";
			}
		}
		
		function loginEmployee($username, $password){
	
			$sql = "SELECT firstname, lastname FROM employee where username = '$username' AND password = '$password'";
	
			$result = $this->conn->query($sql);


			if ($result->num_rows > 0) {

			  echo " Successfully Logged in: ";
			
			  while($row = $result->fetch_assoc()) {
				  
				  $firstname = $row["firstname"];
				  $lastname = $row["lastname"];
	
				
				  echo " $firstname &nbsp;&nbsp; $lastname <br>";
				
				}				
				
			} else {
				echo "Incorrect user name or password";
			}

		}
	}
	



?>