<?php 

require_once 'db_connect.php';


function showAllUsers(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `users` ';
    try{
        $stmt = $conn->query($selectQuery);
        //echo "success";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function showUsers($username){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `user_info` where User_Name = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addUsers($data){
	$conn = db_conn();
    $selectQuery = "INSERT INTO users( First_Name , Last_Name, Gender,Date_Of_Birth,Religion, Present_Address, Permanent_Address, Phone,Email, Website, User_Name, Password )
VALUES (:Fisrt_Name, :Last_Name, :gender, :Date_Of_Birth, :Religion, :Present_Address, :Permanent_Address, :Phone_Number, :Email, :Website, :User_Name, :Password )";

    
    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Fisrt_Name'               =>    $data['Fisrt Name'],
            ':Last_Name'                   =>     $data['Last Name'],
            ':gender'                        =>     $data['gender'],
            ':Date_Of_Birth'                 =>     $data['dob'],  
            ':Religion'                       =>     $data['Religion'],
            ':Present_Address'                   =>     $data['Present Address'],
            ':Permanent_Address'                   =>     $data['Permanent Address'], 
            ':Phone_Number'                   =>     $data['Phone Number'],  
            ':Email'             =>   $data['Email'],
            ':Website'                   => $data['Website'],     
            ':User_Name'      =>     $data['User Name'],  
            ':Password'     =>     $data['Password']
            
        ]);
        echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



