<? include "top.php" ?>
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
</script>    

<section> 
<br><br>
<div id=section1>   
 학생 성적 입력
</div>
<br>
<div align=center>
<form name=f1 action=form_ok.php onSubmit="return  ck1()"  method=get >
<table border=1>
<tr><td>학 번</td><td><input  type=text  name=sno > </td></tr>
<tr><td>이 름</td><td>  <input  type=text  name=sname ></td></tr>
<tr><td>국 어</td><td>  <input  type=text  name=kor ></td></tr>
<tr><td>영 어</td><td>  <input  type=text  name=eng ></td></tr>
<tr><td>수 학</td><td>  <input  type=text  name=math ></td></tr>
<tr><td>역 사</td><td>  <input  type=text  name=hist ></td></tr>
<tr><td colspan=2 align=center><input  type=submit  value="성 적 저 장" ></td></tr>
</table>
</form>
 
</div>                   
</section>

<? include "bottom.php" ?>