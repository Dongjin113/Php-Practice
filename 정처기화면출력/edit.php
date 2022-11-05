<? include "top.php"?>

<?
$servername = "localhost" ;
$username = "root";
$password ="autoset";
$dbname="korea";

$conn = new mysqli($servername, $username, $password, $dbname ); 
?>


<?
$sno = $_REQUEST['sno'];

$SQL = "select * from examtbl where sno = $sno";
$result = $conn -> query($SQL);
$row = $result -> fetch_assoc();

$sname = $row['sname'];
$eng = $row['eng'];
$kor = $row['kor'];
$math=$row['math'];
$hist=$row['hist'];
?>


        <section>
            <br><br>
            <div align=center>
            <font size=4 ><b>학생성적 수정하기<b></font>
            </div>
            <div align=center>
                <br>
                <form name=f1 onSubmit="return ck1()"  
                method=post  
                action="update_ok.php">  
                <!-- form 안에 onsubmit은 하나밖에 올수가없음 데이터가 form_ok.php로 넘어감 
                method=get 을안쓰면 default 값이 get이다-->
                <table border=1 >
                    <tr><td>학 번</td><td><input type="text" name="sno" size="9" value="<?=$sno?>"></td></tr>
                    <tr><td>성 명</td><td><input type="text" name="name" size="9" value="<?=$sname?>"></td></tr>
                    <tr><td>국 어</td><td><input type="text" name="kor" size="9" value="<?=$kor?>"></td></tr>
                    <tr><td>영 어</td><td><input type="text" name="eng" size="9" value="<?=$eng?>"></td></tr>
                    <tr><td>수 학</td><td><input type="text" name="math" size="9" value="<?=$math?>"></td></tr>
                    <tr><td>역 사</td><td><input type="text" name="his" size="9" value="<?=$hist?>"></td></tr>
                    <tr><td colspan="2" align=center>
                        <input type=submit value="성적저장">  <!-- form 안에 onsubmit은 하나밖에 올수가없음-->
                        <input type=button value="버튼저장" onClick="ck2();"> <!-- 자스안에 버튼을불러올때는 onClick을사용-->
                    </td></tr>
                </table>
                </form>

            </div>
            <br>
        </section>        

        <? include "bottom.php"?>
