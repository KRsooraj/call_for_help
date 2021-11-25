<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
        // CHECKING THAT SOMETHING IS POSTED
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)){
            //Read from database
            include("include/dbconnect.php");
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ? LIMIT 0,1");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $password);
            $stmt->execute();
            $usercount = $stmt->rowCount();
			      if ($usercount > 0) {
              $user_rows = $stmt->fetch(PDO::FETCH_ASSOC);
              $_SESSION["user_token"] = $user_rows['token'];
              header("Location:index.php");
              die; 
            }
            echo "wrong credentials";
            

        }else{
            echo "entered input is wrong";
        }
    }

    ?>