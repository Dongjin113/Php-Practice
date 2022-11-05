<?include "DBConn.php"?>

<?
$sno = $_GET['sno'];

$SQL = "delete from examtbl where sno='$sno'";
echo $SQL;
$conn -> query($SQL);


?>