<? include "top.php" ?>
<style>
 table{
   width: 400px ;
   height:250px ; 
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
 학생 정보 입력
</div>
<br>
<div align=center>
<form name=f1 action="member_ok.php"  onSubmit="return ck1()"
      method="post"
      enctype="multipart/form-data">
<table border=1>
<tr><td width=100>학번</td><td><input  type=text  name=sno ></td></tr>
<tr><td>주소</td><td><input  type=text  name=addr></td></tr>
<tr><td>사진</td><td  align=center><input  type=file  name=img ></td></tr>

<tr><td colspan=2 align=center><input  type=submit  value="저 장 하 기" ></td></tr>
</table>
</form> 
</div>                   
</section>

<? include "bottom.php" ?>