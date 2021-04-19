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

		function updatePassword($password, $confirm_password, $name,$flag){
		
			if($password == $confirm_password && $flag=="USER"){
				
				$query = "UPDATE user SET password = '$password' WHERE email = '$name'";
				$this->updatePasswordFromDB($query);
			}elseif($password == $confirm_password && $flag=="EMPLOYEE"){

				$query = "UPDATE employee SET password = '$password' WHERE username = '$name'";
				$this->updatePasswordFromDB($query);

			}else{
				echo "Passwords do not match";
			}

		}

		// implement forgot password for user either user or Employee
		public function updatePasswordFromDB($query)
		{

			if ($this->conn->query($query) === TRUE) {
				echo "<br>Password Successfully updated";
				} else {
				echo "<br>Error: could not update password";
				}
		
				$this->conn->close(); // close DB connection		
				
		}

	}
	



?>