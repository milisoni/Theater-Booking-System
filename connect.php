<?php

session_start();

$conn = mysqli_connect('localhost','root','','dbmovies');
if(!$conn){
   die('Cannot establish database');
}
?>