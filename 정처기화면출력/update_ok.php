<?
$servername = "localhost" ;
$username = "root";
$password ="autoset";
$dbname="korea";

$conn = new mysqli($servername, $username, $password, $dbname ); 
?>

<?
$sno = $_GET['sno'];
$name = $_GET['name'];
$kor = $_GET['kor'];
$eng = $_GET['eng'];
$math = $_GET['math'];
$his = $_GET['his'];

/*값을 받을수있는것은 get과 post
$sno = $_POST['sno'];           post 값 받아오기
$name = $_POST['name'];         post
$kor = $_REQUEST['kor'];        get과 post 값 모두 받아올수 있다 둘다
$eng = $_REQUEST['eng'];
$math = $_GET['math'];  get으로 보낸 값만 받을수 있다
$his = $_GET['his'];
*/


$SQL ="update examtbl set sname='$sname', kor=$kor, eng=$eng, math=$math, his=$hist";
$SQL = $SQL."where sno='sno'";
echo $SQL;
$conn -> query($SQL);
?>

<script>
location.href="list.php";
</script>