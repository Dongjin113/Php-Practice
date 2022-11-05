<? include 'top.php'?>
<? include 'DBconn.php'?>
<?
    $sno = $_GET['sno'];
    $SQL = "select sno, sname, kor, eng, math, hist from examtbl where sno= '$sno'";
    /*두줄로사용하고싶을시에는 "select sno, sname, kor, eng, math, hist" ;
     "from examtbl where sno= '$sno'";로 사용가능*/
    $result = $conn -> query($SQL);
    $row = $result -> fetch_assoc();

    $sno=$row['sno'];
    $sname=$row['sname'];
    $kor=$row['kor'];
    $eng=$row['eng'];
    $math=$row['math'];
    $hist=$row['hist'];

?>
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
<h2> 학생 성적 수정 </h2>
<form action=update_ok.php>  
<table border=1>
    <tr> <td>학&nbsp;번</td><td> <input type=text name=sno value="<?=$sno?>" > </td> </tr>
    <tr> <td>성&nbsp;명</td><td> <input type=text name=sname value="<?=$sname?>"> </td> </tr>
    <tr> <td>국&nbsp;어</td><td> <input type=text name=kor value="<?=$kor?>"> </td> </tr>
    <tr> <td>영&nbsp;어</td><td> <input type=text name=eng value="<?=$eng?>"> </td> </tr>
    <tr> <td>수&nbsp;학</td><td> <input type=text name=math value="<?=$math?>"> </td> </tr>
    <tr> <td>역&nbsp;사</td><td> <input type=text name=hist value="<?=$hist?>"> </td> </tr>
    <tr> <td colspan=2 align=center> 
         <input type=submit value="성적저장">
    </td> </tr>


</table>
</form>
</div>
<br> 
</section>
<? include 'bottom.php'?>