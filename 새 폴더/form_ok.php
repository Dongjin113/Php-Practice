<? include 'DBconn.php'?>
<?
$sno = $_GET['sno'];
$sname = $_GET['sname'];
$kor = $_GET['kor'];
$eng = $_GET['eng'];
$math = $_GET['math'];
$hist = $_GET['hist'];

$SQL = "insert into examtbl(sno, sname, kor, eng, math, hist)";
$SQL = $SQL . " values ('$sno', '$sname', '$kor', '$eng', '$math', '$hist') ";

echo $SQL;
$conn ->query($SQL);
?>

<script>
location.href="list.php";
</script>
