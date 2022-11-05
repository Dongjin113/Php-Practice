<? include 'DBconn.php'?>
<?
$sno = $_GET['sno'];

$SQL = "delete from examtbl where sno ='$sno' ";

echo $SQL;
$conn ->query($SQL);
?>

<script>
location.href="list.php";
</script>
