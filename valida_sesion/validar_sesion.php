<?php

include('../database.php');

$conn->set_charset("utf8"); 
    date_default_timezone_set('America/Mexico_City');
session_start();
$correo=$_POST['User'];
$password=$_POST['Password'];
$query="SELECT * FROM `log` WHERE correo='".$correo."' ";
     $result=mysqli_query($conn,$query);
     if(!$result){
         echo "0";
     }else{
        foreach($result as $log){
            if($password==$log['contrasena']){
                echo "1";
                $_SESSION['Usuario']=$log['correo'];
                $_SESSION['ID_Usuario']=$log['ID_Usuario'];
                $_SESSION['TIME']=3600;
                $_SESSION['Tiempo']=time()+$_SESSION['TIME'];//36000 date("H:i:s")
                
            }
            else{
                echo "2";
            }
        }
     }
?>