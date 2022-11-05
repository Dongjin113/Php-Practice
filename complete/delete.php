<? include "DBConn.php" ?>
<?
  $sno = $_GET['sno'];
  $ch1 = $_GET['ch1'];
  $ch2 = $_GET['ch2'];

$SQL ="delete from examtbl  where sno ='$sno' " ;
$conn -> query($SQL);
?>
<script>
 location.href="list.php?ch1=<?=$ch1?>&ch2=<?=$ch2?>" ;
</script>    



