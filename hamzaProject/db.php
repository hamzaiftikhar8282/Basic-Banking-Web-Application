<?php
$server='localhost';
$serverName='root';
$pass='';
$dbname='crud';
$con=new mysqli($server,$serverName,$pass,$dbname);
if($con->connect_error){
    die ('connectionm error ').$con->connect_error;
}
?>
