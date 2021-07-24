

<?php
  session_start();
?>



<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>

<?php

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $birthdateErr= $degreeErr = $religionErr = $newpassErr = $renewpassErr = $usernameErr =$lastName=$nameErr2=$phoneErr="";

    $name = $email = $gender = $birthdate = $degree1 = $degree2 = $degree3 = $degree4= $religion =$newpass = $renewpass = $username =$phone= "";

    $check=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
      
      //name validation//first name validation//name validation
      if (empty($_POST["name"])) {
        $nameErr = "Fisrt Name is required";
      } 
      else {
        $name = test_input($_POST["name"]);
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-\ ][\ a-zA-Z.\-\_]+/",$name)) {
          $nameErr = "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }




      //name validation//last name validation//name validation
      if (empty($_POST["name2"])) {
        $nameErr2 = "Last Name is required";
      } 
      else {
        $lastName = test_input($_POST["name2"]);
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-\ ][\ a-zA-Z.\-\_]+/",$lastName)) {
          $nameErr = "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }



      //name validation//last name validation//name validation
      if (empty($_POST["religion"])) {
        $religionErr = "Religion is required";
      } 
      else {
          $check++;
      }




      //email validation//email validation//email validation
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Must be a valid email_address : anything@example.Com";
        }
        else
          $check++;
      }
      
      //username username   
      if (empty($_POST["username"])) {
        $usernameErr = "username is required";
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



      //password validation//password validation//password validation

      if(empty($_POST["newpass"])){
        $newpassErr=" must need to fill password";
      }else
        $newpass=test_input($_POST["renewpass"]);


      if(empty($_POST["renewpass"])){
        $renewpassErr=" must need to fill confirm password";
      }else
        $renewpass=test_input($_POST["renewpass"]);
      

      if (!preg_match("/^[0-9a-zA-Z@%#$]+$/",$newpass)) {
            $newpassErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
      }else if($_POST["newpass"]==$_POST["renewpass"]){
          $check++; 
      }
      else
        $renewpassErr="didn't macth the password ";





      //gender validation//gender validation//gender validation

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } 
      else {
        $gender = test_input($_POST["gender"]);
        $check++;
      }
      

    



      //date validation 
      if(empty($_POST["birthdate"])){
        $birthdateErr = " select up year, month, date ";
      }
      else{
        $birthdate = test_input($_POST["birthdate"]);
        $check++;
      }
      

      //form changing 
      if ($check == 8) {
          $_SESSION['name']=$_REQUEST['name'];
          $_SESSION['lastname']=$_REQUEST['name2'];
          $_SESSION['religion']=$_REQUEST['religion'];
          $_SESSION['presentAddress']=$_REQUEST['presentAddress'];
          $_SESSION['permanentAddress']=$_REQUEST['permanentAddress'];
          $_SESSION['phone']=$_REQUEST['phone'];
          $_SESSION['email']=$_REQUEST['email'];
          $_SESSION['website']=$_REQUEST['website'];
          $_SESSION['username']=$_REQUEST['username'];
          $_SESSION['pass']=$_REQUEST['newpass'];
          $_SESSION['dob']=$_REQUEST['birthdate'];
          $_SESSION['gender']=$_REQUEST['gender'];
          header('location:submittedForm.php');
      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<body>

<h1 style="color: red;">Basic Information </h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

  <span class="error">(*) must need to fill </span><br>
  <fieldset>
    <legend  > <b> FIRST NAME:</legend><br>
		<input type="text" name="name"><br><br>
    <span class="error">* <?php echo $nameErr;?></span>
  </fieldset><br><br>

  <fieldset>
    <legend  > <b> LAST NAME:</legend><br>
    <input type="text" name="name2"><br><br>
    <span class="error">* <?php echo $nameErr2;?></span>
  </fieldset><br><br>



  <fieldset>
    <legend  > <b> GENDER :</legend><br>
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span><br><br>
  </fieldset><br><br>




  <fieldset>
    <legend  > <b> DATE OF BIRTH:</legend><br>
  	<input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="birthdate"><br><br>
    <span class="error">* <?php echo $birthdateErr;?></span><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b> Religion :</legend><br>
    <select id="religion" name="religion">
      <option value="">Select</option>
      <option value="Islam">Islam</option>
      <option value="Hinduism">Hinduism</option>
      <option value="Buddhism">Buddhism</option>
      <option value="Christianity">Christianity</option>
    </select>
    <br><br>
    <span class="error">* <?php echo $religionErr;?></span><br><br> 
  </fieldset><br><br>





  <h1 style="color: red;">Contact Information </h1>

  <fieldset>
    <legend  > <b> Present Address :</legend><br>

    <textarea rows="2" cols="50" name="presentAddress"> Enter Present Address here...</textarea>
  </fieldset><br><br>

  <fieldset>
    <legend  > <b> Permanent Address :</legend><br>
      
    <textarea rows="2" cols="50" name="permanentAddress"> Enter Present Address here...</textarea>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b> Phone :</legend><br>
    <input type="tel" name="phone" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required" ><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b> EMAIL :</legend><br>
    <input type="text" name="email"><br><br>
    <span class="error">* <?php echo $emailErr;?></span>
    
  </fieldset><br><br>


  <fieldset>
    <legend  > <b> Personal Website Link :</legend><br>
    <input type="url" name="website"><br><br>
  </fieldset><br><br>


  <h1 style="color: red;">Account Information </h1>

  <fieldset>
    <legend  > <b>  User Name:</legend><br> 
    <input type="text" name="username"><br><br>
    <span class="error">* <?php echo $usernameErr;?></span><br><br> 
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>Password :</legend><br>
      <input type="Password" name="newpass" minlength="8"><br><br>
    <span class="error">* <?php echo $newpassErr;?></span><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>Confirm Password :</legend><br>
    <input type="Password" name="renewpass" minlength="8"><br><br>
    <span class="error">* <?php echo $renewpassErr;?></span>
  </fieldset><br><br>






  



  

    <input type="submit" value="submit">&nbsp;&nbsp;

</form>



</body>
</html>