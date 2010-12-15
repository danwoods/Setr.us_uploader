<?php
//allow out buffering
ob_start();
//begin session
session_start();

//turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require('../config/db_login.php');

//$showJSON = $_POST['showJSON'];
$showJSON = json_decode($_POST['showJSON'], true);

//$show = json_decode($showJSON, true);
$show = $showJSON["show"];
$songs = $show["show"]["songs"];
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

$error = false;

//connect to database
$con = mysql_connect($db_host, $db_username, $db_pass);

if (!$con){
  $error = true;
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($db_database, $con);
//end connecting to database
  
//loop through
foreach ($songs as $song){
  //and create record
  
  echo "<br />";
  echo "song id = ".$song["song"]["id"]." song name = ".$song["song"]["title"];
  //$sql= "INSERT INTO songs (unique_song_id, file_location, artist, date, city, state, name, set_num, set_position, part_of_a_sugue, setOrEncore, notes)
				//VALUES('$song[\"id\"]','$song[\"filepath\"]','$artist','$show[\"date\"]','$show[\"city\"]','$show[\"state\"]','$song[\"song\"][\'title\']','$song[\"song\"][\"set_num\"]','$song[\"song\"][\"song_num\"]', $partOfASeuge, '$setOrEncore', ''$song[\"song\"][\"add_info\"]'')";
	
  /*			
  //check to see if the query went through
	if (!mysql_query($sql,$con)){
	  echo 0;
  	die('Error: ' . mysql_error());
  }
  */
}
        
mysql_close($con);//close mysql connection

if(!$error)
  echo 1;
else
  echo 0;

?>
