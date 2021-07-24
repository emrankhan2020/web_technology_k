

<?php 

    session_start();

    if(isset($_POST["submit"])){

        $_SESSION['username'] = $_REQUEST['username'];
        $_SESSION['password'] = $_REQUEST['password'];
    }

?>

<?php  
    require_once 'dbRead.php';

        if(isset($_REQUEST['username'])){
                $users = fetchAllUsers();
        }
?>

<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>

<?php
  

	
	$username = $password = "";
	$usernameErr = $passwordErr = "";
	$check = 0;
	

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		//username validation
		if (empty($_POST["username"])) {
	        $usernameErr = "Name is required";
	      } 
    else
    {
      $username = test_input($_POST["username"]);
      //validating alphabet
      if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
        $usernameErr = "User Name must contain at least two (2) characters and can contain alpha numeric characters, period, dash or underscore only";
      }
      else
        $check++; 
    }


    //password validation
    if (empty($_POST["password"])) {
	        $passwordErr = "Name is required";
	      } 
    else
    {
      $password = test_input($_POST["password"]);
      //validating alphabet
      if (!preg_match("/^[0-9a-zA-Z@%#$]+$/",$password)) {
        $passwordErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
      }
      else
        $check++; 
    }

        foreach($users as $row)  
        { 
        	
            //echo $_SESSION['username'];
             if($username==$row["User_Name"] && $password==$row["Password"])
             {  
                    $flag=1;
                    header('Location:test.php');
             }else
                    $flag=0;

        }
        if($flag==0)    
                echo '<p><br></p><p><br></p><p><br></p><h2 align="center" style="color: red;" >Please enter the current information </h2>';
              



	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}



?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <legend  > <b> Login:</legend><br>
	User Name: 
	<input type="text" name="username"><br><br>
	<span class="error">* <?php echo $usernameErr;?></span><br><br>
	Password : &nbsp; 
	<input type="Password" name="password" minlength="8"><br><br>
	<span class="error">* <?php echo $passwordErr;?></span><br><br>

	<input type="submit" value="submit">&nbsp;&nbsp;
  </fieldset>
</form>

<body>


</body>
</html>