<?
$host =$_SERVER['HTTP_HOST'];
$path = "http://".$host;


if($_SESSION["id"] != "admin"){
    Header("Location:$path/D_include/error.php");
}    
    
    ?>