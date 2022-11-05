<?
$servername = "localhost" ;
$username = "root";
$password ="autoset";
$dbname="korea";

$conn = new mysqli($servername, $username, $password, $dbname ); 
?>

<?
  $sno = $_REQUEST['sno'];  // post 값 받아오기 
  $sname = $_REQUEST['sname'];  // post 값 받아오기 

  $kor = $_REQUEST['kor']; // get 과 post 값 모두 받아 올수 있다. 
  $eng = $_REQUEST['eng'];

  $math = $_REQUEST['math']; // get 으로 보낸 값만 받을 수있다.
  $hist = $_REQUEST['hist'];

  $SQL ="insert into examtbl values ('$sno', '$sname', $kor, $eng, $math, $hist) " ;
  echo $SQL ;
  $conn -> query($SQL);
?>

<script>
 location.href="list.php";
</script>  
