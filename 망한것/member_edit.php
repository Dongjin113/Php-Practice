<? include "top.php"?>
<? include "DBConn.php"?>
<?
$sno = $_GET['sno'];

$SQL = "select * from member where sno=$sno";
$result = $conn -> query($SQL);
$row = $result ->fetch_assoc();

$img = $row['img'];
$addr = $row['addr'];
$sno = $row['sno'];





?>
<style>
    table{
        width: 400px;
        height: 300px;
    }
    td{
        text-align:center;
    }
</style>
<script>
    function ck1(){
        if (f1.sno.value == ""){
        alert("학번을 입력해 주세요!!");
        f1.sno.focus();
        return false;
        }else{
            alert("학생 성적이 입력 되었습니다.");
        }
    }
</script>

    <section> 
        <br><br>
        <div id=section1>
        학생 정보 입력
        </div>
        <br>
        <div align=center>
        <form action=member_update.php onSubmit="return ck1()"
        method=post
        enctype="multipart/form-data">

        <table border=1> 
            <input type=hidden name=olding calue=<?=$img?>
    <tr><td colspan=2 align=center><img src=./img/<?=img?> width=400 height=150> </td></tr>
    <tr><td width=100>학번  </td><td>  <input type=text name=sno values="<?=$sno?>"></td></tr>
    <tr><td>주소    </td><td><input type=test name=addr values="<?=$addr?>"></td></tr>
    <tr><td>사진    </td><td> &nbsp; <input type=file name=img></td></tr>
    
    <tr><td colspan=2 align=center><input type=submit value="수정하기"></td></tr>
    </table>
        </form>
        </div>

    </section>
    <? include "bottom.php"?>





<!--
    <form name=f1 action=member_ok.php onSubmit="return ck1()" method=post
        enctype="multipart/form-data"> 자료실을 사용하려면 무조건 post enctype="multipart/form-data" 필수
           <table border=1 >
            <tr><td>학 번 </td><td><input type=text name=sno></td></tr>
            <tr><td>주 소 </td><td><input type=text name=addr></td></tr>
            <tr><td>사 진 </td><td><input type=file name=img></td></tr> <!--사진첨부는 file 자료실을 사용하려면
            <tr><td colspan=2 align=center><input type=submit value="회원가입"></td></tr>
            </table>
        </form> 값을넘길려면 form 안에있어야하난다
        get 소량
        post 대량 , 바이

        submit을 받으면 action 으로넘어감
-->