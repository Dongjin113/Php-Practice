
<? include $_SERVER["DOCUMENT_ROOT"]."/public_html3/include/DBConn.php" ?>

<?
$idx = $_GET['idx'];
$SQL = "select  *  from  school where  idx= $idx";
$result = $conn -> query($SQL);
$row = $result ->fetch_assoc();
$file=$row['file'];
if ($row['file'] != "space.png" ){
    unlink("./files/$file") ;
}
$SQL = "delete  from  school where  idx= $idx";
$conn -> query($SQL);
?>

<script>
 location.href="form_list.php" ;
</script> 