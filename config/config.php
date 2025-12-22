<?php
$host="localhost";
$user="root";
$password="";
$dbname="fginalproject";

try{
    $conn=new PDO("mysql:host=$host;dbname=$dbname, $user, $password");
}catch(Exeption $e){
    echo "Something went wrong"l
}


?>