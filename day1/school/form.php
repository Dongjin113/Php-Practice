<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>

<style>
 table{
   width: 500px ;
   height:250px ; 
 } 

 .td1{
   text-align:center; 
 }
</style>

<script>
  function ck1(){
    if (f1.name.value == "") {
      alert("이름을 입력해 주세요");
      f1.name.focus();
      return false;
    }else{
        alert("입력 되었습니다.");  
    }
  }
</script>    

<section> 
<br><br>
<div id=section1>   
 학생 정보 수집
</div>
<br>
<div align=center>
<form name=f1 action="form_ok.php"  onSubmit="return ck1()"
      method="post"
      enctype="multipart/form-data">
<table border=1>
<tr><td width=100 class="td1">이름</td>
<td>&nbsp;<input  type=text  name=name ></td></tr>
<tr><td class="td1">특이<br>사항</td>
<td>&nbsp;<textarea cols=40 rows=5 name=etc></textarea>
</td>
</tr>
<tr><td class="td1">사진</td><td  align=center><input  type=file  name=file ></td></tr>


<tr><td colspan=2 align=center>
    <input  type=submit  value="저 장 하 기" >
    <input  type=reset  value="다시작성" ></td></tr>
</table>
</form> 
</div>                   
</section>


<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>