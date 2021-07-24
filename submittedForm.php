
<?php
session_start();
?>


<!DOCTYPE html>
<html>

<style>
.error {color: #2BDE1A;}
</style>

<?php
     
     require_once 'model/model.php';

     $data['Fisrt Name']               =     $_SESSION['name'];
     $data['Last Name']                =     $_SESSION['lastname'];
     $data['gender']                   =     $_SESSION['gender'];
     $data['dob']                      =     $_SESSION['dob'];  
     $data['Religion']                 =     $_SESSION['religion'];
     $data['Present Address']          =     $_SESSION['presentAddress'];
     $data['Permanent Address']        =     $_SESSION['permanentAddress'];
     $data['Phone Number']             =     $_SESSION['phone'];  
     $data['Email']                    =     $_SESSION['email']; 
     $data['Website']                  =     $_SESSION['website'];
     $data['User Name']                =     $_SESSION['username'];  
     $data['Password']                 =     $_SESSION['pass'];
     echo 'done';
     addUsers($data);



			
?>
<span class="error"> <b> <h1><?php echo  " The registration successfully completed ";?></h1> </span>

<body>



</body>

</html>