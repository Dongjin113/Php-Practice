<? include "top.php" ?>
<? include "DBConn.php" ?>
<? 
  $sno=$_GET['sno'];
  $ch1=$_GET['ch1'];
  $ch2=$_GET['ch2'];

  $SQL = " select *  from examtbl where sno=$sno "; 
  $result = $conn -> query($SQL);
  $row = $result ->fetch_assoc();

?>


<style>
 table{
   width: 350px ;
   height:300px ; 
 } 

 td{
   text-align:center; 
 }
</style>

<script>
  function ck1(){
    if (f1.sno.value == "") {
      alert("학번을 입력해 주세요");
      f1.sno.focus();
      return false;
    }else{
        alert("학생 성적이 입력 되었습니다.");  
    }
  }

  function ck2(sno, ch1, ch2){

    location.href="delete.php?sno="+sno+"&ch1="+ch1+"&ch2="+ch2;
     
  }

</script>    

<section> 
<br><br>
<div id=section1>   
 학생성적수정하기
</div>
<br>
<div align=center>
<form name=f1 action=update_ok.php onSubmit="return  ck1()"  method=get >
<input  type=hidden  name=ch1 value="<?=$ch1?>" >
<input  type=hidden  name=ch2 value="<?=$ch2?>" >
<table border=1>
<tr><td>학 번</td><td><input  type=text  name=sno value="<?=$row['sno']?>" > </td></tr>
<tr><td>이 름</td><td>  <input  type=text  name=sname  value="<?=$row['sname']?>" ></td></tr>
<tr><td>국 어</td><td>  <input  type=text  name=kor  value="<?=$row['kor']?>" ></td></tr>
<tr><td>영 어</td><td>  <input  type=text  name=eng  value="<?=$row['eng']?>" ></td></tr>
<tr><td>수 학</td><td>  <input  type=text  name=math  value="<?=$row['math']?>" ></td></tr>
<tr><td>역 사</td><td>  <input  type=text  name=hist  value="<?=$row['hist']?>" ></td></tr>
<tr><td colspan=2 align=center><input  type=submit  value="수정하기" >
    <input  type=button  value="삭제하기" onClick="ck2('<?=$sno?>','<?=$ch1?>','<?=$ch2?>')" >
    </td></tr>
</table>
</form>
 
</div>                   
</section>

<? include "bottom.php" ?>