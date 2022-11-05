
<?include "DBconn.php"?>
<?
$sno = $_GET['sno'];
$SQL = "select * from member where sno=$sno";
$result = $conn -> query($SQL);
$row = $result -> fetch_assoc();
$img = $row['img'];


if ($img != 'space.png') {
    unlink("./img/$img");

}


$SQL="delete from examtbl where sno = '$sno' "; 
$conn -> query($SQL);

 
?>

<script>
location.href="member_list.php";
//list.php로 이동시켜줌
</script>