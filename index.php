<?php
//  Connection Section ..
// Connection With LocalHost .. 

$Lusername="phpmyadmin";//change username 
$Lpassword="Vivek@7840"; //change password
$Lhost="localhost";

$Ldb_name="MyDb"; //change databasename

$connectLhost=mysqli_connect($Lhost,$Lusername,$Lpassword,$Ldb_name); 


//  Connection With Server.. 

// $username="id13918522_mrvivek_db";//change username 
// $password="Mr.Vivek@7840"; //change password
// $host="localhost";

// $db_name="id13918522_mrunkn"; //change databasename

// $connectServer=mysqli_connect($host,$username,$password,$db_name); 



// Connection Section Complete..
// ---____--___--___-___--___--___--__---__----__----_______---__



//  Check table is preseint or not

$query = "CREATE TABLE IF NOT EXISTS `MyDb`.`REGISTER`(`SR` INT NOT NULL  PRIMARY KEY AUTO_INCREMENT ,`NAME` TEXT(15) NOT NULL,`MOBILE` Text(12)  ,`EMAIL` VARCHAR(20) NOT NULL , `PASSWORD` VARCHAR(20) NOT NULL)";

//  Create Table If Not Present 

// if(mysqli_query($connectLhost, $query)){
//     echo "done Table";
// }else{
//     echo mysqli_connect_error();
// }

// Bhava sang yala table krych ka update ka create ka delete... 
$action =  $_POST['query']; 
// $action = "fetchData"; 


//---___--____---____--___-_____---____--____---____---____--___--____---___--___--______--___- 


if($action == "AddData"){
    $name =  $_POST['fullname'];
    $email =   $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $queryInsert = "INSERT INTO `REGISTER`(`NAME` , `MOBILE`, `EMAIL`,`PASSWORD`) VALUES('$name','$mobile', '$email','$password')"; 
    $results = mysqli_query($connect, $queryInsert); 

    if($results){
        
    }else{
        echo mysqli_connect_error();
    }
}else{
    echo mysqli_connect_error();
}


//  --___---____---___-__----___---___---___---__---___--__--___--___--___--__--___-___--__-


//  FETCH DATA  FRON SERVER FOR LOGIN ..

if($action == 'fetchData'){
   $fetchQuery = "SELECT `NAME` , `PASSWORD` FROM `REGISTER`";
   $FetchResult = mysqli_query($connectLhost , $fetchQuery);
   $data = array();
   if($FetchResult->num_rows > 0){
    while($row = $FetchResult->fetch_assoc()){
        $data[]  = $row;  
    } 
   echo json_encode($data);
   }else{
    echo "Cant FetchData";
   }
}                

?> 