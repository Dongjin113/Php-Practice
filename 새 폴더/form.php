<? include 'top.php'?>
<? include 'DBconn.php'?>
<style>
 
    table{
        width: 300px;
        height : 300px;
    }
    tr {
        text-align: center;
    }

</style>
<section>
    <br>
<div align=center>  
<h2> 학생 성적 입력 </h2>
<form action=form_ok.php>  
<table border=1>
    <tr> <td>학&nbsp;번</td><td> <input type=text name=sno> </td> </tr>
    <tr> <td>성&nbsp;명</td><td> <input type=text name=sname> </td> </tr>
    <tr> <td>국&nbsp;어</td><td> <input type=text name=kor> </td> </tr>
    <tr> <td>영&nbsp;어</td><td> <input type=text name=eng> </td> </tr>
    <tr> <td>수&nbsp;학</td><td> <input type=text name=math> </td> </tr>
    <tr> <td>역&nbsp;사</td><td> <input type=text name=hist> </td> </tr>
    <tr> <td colspan=2 align=center> 
         <input type=submit value="성적저장">
    </td> </tr>


</table>
</form>
</div>
<br> 
</section>
<? include 'bottom.php'?>