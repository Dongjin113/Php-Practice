
<?include "top.php"?>
<?include "DBConn.php"?>
<?$sno = $_GET['sno'];
$ch1 = $_GET['ch1'];
$ch2 = $_GET['ch2'];


$SQL = "select * from examtbl where sno=$sno";
$result = $conn -> query($SQL);
$row = $result -> fetch_assoc();

?>
<script>
function ck1(){
    if (f1.sno.value == ""){
        alert("학번을 입력해주세요")
        f1.sno.focus();
        return false;
    }else{
      alert("학생 성적이 입력되었습니다")
    }
}

  function ck2(sno , ch1 , ch2){
    location.href="delete.php?sno="+sno+"&ch1="+ch1+"&ch2="+ch2;
    
  }
    
    
</script>


<style>
 table{
   width: 500px ;
 } 

 td{
   text-align:center; 
   height: 25px ;
 }
 </style>
<section>
<br>
<div id=section1>학생 성적 수정</div><br>
<div align=center>
    <form name=f1 action=update_ok.php onSubmit="return ck1()" method=get>
      <input type=hidden name=ch1 value="<?=$ch1?>">
      <input type=hidden name=ch2 value="<?=$ch2?>">

      



<table border=1 align=center>
    <tr><td width=100 height=50>학번</td><td width=200><input type=text name=sno value=<?=$sno?>></td></tr>
    <tr><td>이름</td><td><input type=text name=sname value=<?=$row['sname']?>></td></tr>
    <tr><td>국어</td><td><input type=text name=kor value=<?=$row['kor']?>></td></tr>
    <tr><td>영어</td><td><input type=text name=eng value=<?=$row['eng']?>></td></tr>
    <tr><td>수학</td><td><input type=text name=math value=<?=$row['math']?>></td></tr>
    <tr><td>역사</td><td><input type=text name=hist value=<?=$row['hist']?>></td></tr>
    <tr><td colspan=2><input type=submit value="성 적 수 정"> 
        <input type=button value="삭 제 하 기" onClick="ck2('<?=$sno?>')"></td></tr>


    </table>
</form>
</div>
</section>


</section>
<?include "bottom.php"?>
