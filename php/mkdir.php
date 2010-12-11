<?php
/*
 *      mkdir.php
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

$showId = $_POST['showId'];
$abb = $_POST['abb'];

//resolve where the file should be stored
$band_dir = "/opt/lampp/htdocs/Setr.us/music_directory/" . $abb;
$file_dir = "/opt/lampp/htdocs/Setr.us/music_directory/" . $abb . "/" . $showId . "/";

//check if the neccessary directory exist, if not create it
if(!is_dir($band_dir)){
  mkdir($band_dir);
}
if(!is_dir($file_dir)){
	mkdir($file_dir);
}
if(is_dir($file_dir))
  echo 1;
else
  echo 0;
?>
