
<? 
$conn = new mysqli("localhost","root","autoset","korea");

$delidx = $_GET['delidx'];
$idx = $_GET['idx'];
$ch1 = $_GET['ch1'];
$ch2 = $_GET['ch2'];




$SQL = "delete from board0628 where idx='$delidx'";

$result = $conn -> query($SQL);
?>
<script>
    location.href="list1.php?idx=<?=$idx?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>";
    </script>


