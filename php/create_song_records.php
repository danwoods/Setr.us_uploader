<?php
//allow out buffering
ob_start();
//begin session
session_start();

//turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require('../config/db_login.php');

$showJSON = $_POST['showJSON'];

$show = json_decode($showJSON, true);
/*
$showId = $_POST['showId'];
$artist = $_POST['artist'];
$abb = $_POST['abb'];
$showDate = $_POST['showDate'];
$city = $_POST['city'];
$state = $_POST['state'];
$venue = $_POST['venue'];
$setOrEncore = $_POST['setOrEncore'];
$setNum = $_POST['setNum'];
$songNum = $_POST['songNum'];
$songId = $_POST['songId'];
$partOfASeuge = $_POST['partOfASegue'];
$songName = $_POST['songName'];
$addInfo = $_POST['addInfo'];
*/

//connect to database
$con = mysql_connect($db_host, $db_username, $db_pass);

if (!$con)
  die('Could not connect: ' . mysql_error());

mysql_select_db($db_database, $con);
//end connecting to database
  
//loop through
foreach ($show["songs"] as $song){
  //and create record
  //add show information to database
  $sql= "INSERT INTO songs (unique_song_id, file_location, artist, date, city, state, name, set_num, set_position, part_of_a_sugue, setOrEncore, notes)
				VALUES('$song[\"id\"]','$file_path','$artist','$showDate','$city','$state','$songName','$setNum','$songNum', $partOfASeuge, '$setOrEncore', '$addInfo')";
				
  //check to see if the query went through
	if (!mysql_query($sql,$con)){
	  echo 0;
  	die('Error: ' . mysql_error());
  }
  
  if(!(rename($dir.$song["current_file_name"], $dir.$song["new_file_name"])))
    $error = true;
}
    
  
        
  mysql_close($con);//close mysql connection
        
}

if(!$error)
  echo 1;
else
  echo 0;

?>
