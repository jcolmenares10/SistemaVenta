<?php

//error_reporting(0);

session_start();
$user=$_SESSION['Usuario'];

      date_default_timezone_set('America/Mexico_City');
      
 error_reporting(0);
// $TIEMPO=$TIEMPO+$_GET["ID"];
$_SESSION["Tiempo"]=$_SESSION["Tiempo"]+$_GET["ID"];
$_SESSION["TiempoE"]=($_SESSION["Tiempo"]-time());
//echo '<div>tiempo a ingresar:'.$_SESSION["Tiempo"].' tiempo de ingreso: '.time().' resta: '.$_SESSION["TiempoE"].'</div>';

$Z=(((float)$_SESSION["TiempoE"]*100)/$_SESSION["TIME"]);
$Z1=round($Z);
  if($_GET["ID"]){
echo'<div class=\'progress\'><div class=\'progress-bar progress-bar-striped ';if($Z1<=10){echo'bg-danger';}else if($Z1<=25){ echo'bg-warning';}else if( $Z1<=50){ echo'bg-info';}   echo' progress-bar-animated\' role=\'progressbar\'valuenow=\''.$Z1.'\' aria-valuemin=\'0\' aria-valuemax=\'100\' style=\'width: '.$Z1.'%\'>'.$Z1.'%</div></div>';

  }
  else if($_GET["ID"]==0){
      echo'<script>
      $("#time").empty();
      $("#time").append("<div class=\'progress\'><div class=\'progress-bar progress-bar-striped ';if($Z1<=10){echo'bg-danger';}else if($Z1<=25){ echo'bg-warning';}else if( $Z1<=50){ echo'bg-info';}   echo' progress-bar-animated\' role=\'progressbar\'valuenow=\''.$Z1.'\' aria-valuemin=\'0\' aria-valuemax=\'100\' style=\'width: '.$Z1.'%\'>'.$Z1.'%</div></div>");

      </script>';
}
// echo "  tiempo a ingresar:".$_SESSION["Tiempo"]." tiempo de ingreso :".time();
if(isset($_SESSION["Tiempo"])){
      if(time() > $_SESSION["Tiempo"]){ 
        // echo '<script>			$("#time").empty();
        // </script>';
                echo'<script type="text/javascript">alert("Su sesión ha expirado por inactividad, vuelva a iniciar para continuar");';      
          echo'window.location.href="../index.php";</script>';
    
  
            $_SESSION = array();
          unset($_SESSION["Tiempo"]); 
          // unset($_SESSION["Login"]); 
         session_unset();
         session_destroy(); 
              // setcookie('user', $idUser,1);
 
      } 

//       else if($TIEMPO<=20) {
//               echo'<script>
//               muestra_Alert("Error al inicion de Sesion" , "El correo no existe" , 4);
//               </script>';
//       }

         }else{
        echo"no autenticado";
     header("Location: ../index.php");

         }


//          session_start();
// $user=$_SESSION['Usuario'];

//       date_default_timezone_set('America/Mexico_City');
      
//       $date2 = new DateTime($_SESSION["Tiempo"]);//12:00
// $date1 = new DateTime(date("H:i:s")); //12:10 10 30

// $diff = $date2->diff($date1);
// // will output 2 days

// get_format($diff);
// function get_format($df) {

//     $str = '';
//     $str .= ($df->invert == 1) ? ' - ' : '';
//     if ($df->d > 0) {
//         // days
//         $str .= ($df->d > 1) ? $df->d . ' Days ' : $df->d . ' Day ';
//     } if ($df->h > 0) {
//         // hours
//         $str .= ($df->h > 1) ? $df->h . ' Hours ' : $df->h . ' Hour ';
//     } if ($df->i > 0) {
//         // minutes
//         if($df->i==1){
//             echo"

//             Tiempo esta por terminarse
//             ";
//         }
//         $str .= ($df->i > 1) ? $df->i . ' Minutes ' : $df->i . ' Minute ';
//     } if ($df->s > 0) {
//         // seconds
//         $str .= ($df->s > 1) ? $df->s . ' Seconds ' : $df->s . ' Second ';
//     }

//      echo $str;
// }

 ?>
