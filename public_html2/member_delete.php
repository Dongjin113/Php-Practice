<? include "DBConn.php" ?>
<?
  $sno = $_GET['sno'];
  $SQL = "select  *  from  member where sno='$sno'";
  $result = $conn -> query($SQL);
  $row = $result ->fetch_assoc();
  $img = $row['img'];

  if ($img != 'space.png') {
    unlink("./img/$img") ;
  }

$SQL ="delete from member where sno ='$sno' " ;
$conn -> query($SQL);
?>
<script>
 location.href="member_list.php" ;
</script>    

