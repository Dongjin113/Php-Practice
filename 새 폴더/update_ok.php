<? include 'DBconn.php'?>
<?
$sno = $_GET['sno'];
$sname = $_GET['sname'];
$kor = $_GET['kor'];
$eng = $_GET['eng'];
$math = $_GET['math'];
$hist = $_GET['hist'];

$SQL = "update examtbl set sname = '$sname' ," ;
$SQL = $SQL . "kor ='$kor', " ;
$SQL = $SQL . "eng ='$eng', " ;
$SQL = $SQL . "math ='$math', " ;
$SQL = $SQL . "hist ='$hist' where sno= '$sno' " ;


$SQL = $SQL . " values ('$sno', '$sname', '$kor', '$eng', '$math', '$hist') ";

echo $SQL;
$conn ->query($SQL);
?>

<script>
//location.href="list.php";
</script>
