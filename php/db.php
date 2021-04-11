<?php
$host ='localhost';
$usrename='root';
$password='';
$dbname='librarysyatem';
$connect=mysqli_connect($host,$usrename,$password,$dbname)  ;
if(!$connect)
{
    echo "There is a proble with the connnection with the database";
    die(mysqli_error($connect));
}

?>