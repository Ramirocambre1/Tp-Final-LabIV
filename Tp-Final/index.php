<?php
 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require "Config/Autoload.php";
	require "Config/Config.php";

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
		
	Autoload::start();

	session_start();

	require_once(VIEWS_PATH."header.php");

	Router::Route(new Request());

	require_once(VIEWS_PATH."footer.php");

	$connect = mysqli_connect("localhost", "root", "", "Utn"); //Connect PHP to MySQL Database

  $queryCareer = "SELECT * FROM Career";

// execute query 
$resultCareer = mysqli_query($connect,$queryCareer); 

// see if any rows were returned 
if (mysqli_num_rows($resultCareer) > 0) { 
}else {
/* Career API */
  $opt = array(
    "http" => array(
      "method" => "GET",
      "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
    )
  );

  $ctx = stream_context_create($opt);

  $data=file_get_contents("https://utn-students-api.herokuapp.com/api/Career", false, $ctx);

  $jsonArray = json_decode($data,true);

  foreach($jsonArray as $row)
  {
     $sql= "INSERT INTO Career(careerId,description,active) VALUES('".$row["careerId"]."','".$row["description"]."','".$row["active"]."') ";

     mysqli_query($connect,$sql);
  }

}


$queryJobPosition = "SELECT * FROM JobPosition";
  
$resultJob = mysqli_query($connect,$queryJobPosition);  

if (mysqli_num_rows($resultJob) > 0) { 
 
}
else{
  $opt = array(
    "http" => array(
      "method" => "GET",
      "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
    )
  );
  
  $ctx = stream_context_create($opt);
  
  $data=file_get_contents("https://utn-students-api.herokuapp.com/api/JobPosition", false, $ctx);
  
  $jsonArray = json_decode($data,true);
  
  foreach($jsonArray as $row)
  {
     $sql= "INSERT INTO JobPosition(jobPositionId,careerId,description) VALUES('".$row["jobPositionId"]."','".$row["careerId"]."','".$row["description"]."') ";
  
     mysqli_query($connect,$sql);
  }
  

}

$queryStudent = "SELECT * FROM Student";
  
$resultStudent = mysqli_query($connect,$queryStudent); 

if (mysqli_num_rows($resultStudent) > 0) { 
  
 }else
 {

  $opt = array(
    "http" => array(
      "method" => "GET",
      "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
    )
  );
  
  $ctx = stream_context_create($opt);
  
  $data=file_get_contents("https://utn-students-api.herokuapp.com/api/Student", false, $ctx);
  
  $jsonArray = json_decode($data,true);
  
  foreach($jsonArray as $row)
  {
     $sql= "INSERT INTO Student(studentId,careerId,firstName,lastName,dni,fileNumber,gender,birthDate,email,phoneNumber,active) VALUES(
       '".$row["studentId"]."','".$row["careerId"]."','".$row["firstName"]."','".$row["lastName"]."','".$row["dni"]."',
     '".$row["fileNumber"]."','".$row["gender"]."','".$row["birthDate"]."','".$row["email"]."','".$row["phoneNumber"]."','".$row["active"]."') ";
  
     mysqli_query($connect,$sql);
  }

 }
 
 








/*------------------------------------------- */


?>