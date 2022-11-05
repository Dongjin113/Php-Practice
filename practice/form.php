
<?include "top.php"?>
<?include "DBConn.php"?>
<script>
function ck1(){
    if (f1.sno.value == ""){
        alert("학번을 입력해주세요")
        f1.sno.focus();
        return false;
    }
    
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
<div id=section1>학생 성적 입력</div><br>
<div align=center>
    <form name=f1 action=form_ok.php onSubmit="return ck1()" method=get>
<table border=1 align=center>
    <tr><td width=100 height=50>학번</td><td width=200><input type=text name=sno></td></tr>
    <tr><td>이름</td><td><input type=text name=sname></td></tr>
    <tr><td>국어</td><td><input type=text name=kor></td></tr>
    <tr><td>영어</td><td><input type=text name=eng></td></tr>
    <tr><td>수학</td><td><input type=text name=math></td></tr>
    <tr><td>역사</td><td><input type=text name=hist></td></tr>
    <tr><td colspan=2><input type=submit value="성 적 저 장"></td></tr>
    </table>
</form>
</div>
</section>


</section>
<?include "bottom.php"?>
