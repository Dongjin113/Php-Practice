
<?include "DBconn.php"?>
<?

$ch1=$_GET['ch1'];
$ch2=$_GET['ch2'];

$sno = $_GET['sno'];
$sname = $_GET['sname'];
$kor = $_GET['kor'];
$eng = $_GET['eng'];
$math = $_GET['math'];
$hist = $_GET['hist'];

$SQL="update examtbl set sname = '$sname', kor=$kor, eng=$eng, math=$math, hist=$hist where sno=$sno "; 
$conn -> query($SQL);

?>

<script>
location.href="list.php?ch1=<?=$ch1?>&ch2=<?=$ch2?>";
//list.php로 이동시켜줌
</script>


