
<?include "DBconn.php"?>
<?
$ch1=$_GET['ch1'];
$ch2=$_GET['ch2'];
$sno = $_GET['sno'];

$SQL="delete from examtbl where sno = '$sno' "; 
$conn -> query($SQL);

?>

<script>
location.href="list.php?ch1=<?=$ch1?>&ch2=<?=$ch2?>";
//list.php로 이동시켜줌
</script>