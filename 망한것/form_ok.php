
<?include "DBconn.php"?>
<?
$ch1 = $_GET['ch1'];
$ch2 = $_GET['ch2'];




$sno = $_GET['sno'];
$sname = $_GET['sname'];
$kor = $_GET['kor'];
$eng = $_GET['eng'];
$math = $_GET['math'];
$hist = $_GET['hist'];

$SQL="insert into examtbl(sno, sname, kor, eng, math, hist)";
$SQL=$SQL . "values('$sno','$sname',$kor,$eng,$math,$hist)";
$conn -> query($SQL);

?>

<script>
location.href="list.php";
//list.php로 이동시켜줌
</script>


