<?php
/*
 *      renameFiles.php
 *      
 *      Copyright 2010 Dan Woodson <woodson.dan@gmail.com>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */

//allow out buffering
ob_start();
//begin session
session_start();

//turn on error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$error = false;

$dir = $_POST['dir_for_files'];
$file_name_json = $_POST['song_filename_pairs'];

//decode json
$song_filename_pairs = json_decode($file_name_json, true);

//loop through
foreach ($song_filename_pairs["song_name_pairings"] as $song){
  //and rename
  if(!(rename($dir.$song["current_file_name"], $dir.$song["new_file_name"])))
    $error = true;
}

if(!$error)
  echo 1;
else
  echo 0;

?>
