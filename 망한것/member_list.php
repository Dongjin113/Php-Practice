<? include "top.php" ?>
<? include "DBConn.php" ?>
<?
$SQL = "select * from member";
$result = $conn -> query($SQL);

?>

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
<div id=section1>   
 성적조회목록
</div>
<br>
<div align=center> 
<table border=1>
<tr> <td>학번</td> <td>주소</td><td>파일명</td><td>사진</td>
</tr>
<? while( $row = $result ->fetch_assoc() ) {   

    ?>
<tr> <td>
     <td><?=$row['sno']?> </td>
     <td><a href="member_delete.php?sno=<?=$row['sno']?>"><?=$row['addr']?> </a></td>     
     
     <td><?=$row['img']?> </td>
     <td><img src=./img/<?=$row['img']?> width=50 height=50> </td>

</tr>
<? }  ?>

</table>

</div>                   
</section>

<? include "bottom.php" ?>

<!-- 
/*
 $ch1 = "" ; $ch2 ="" ;

 $ch1 = $_GET['ch1'];
 $ch2 = $_GET['ch2'];

 if ( $ch1 == "") {
    $SQL = "select  sno, sname, kor, eng, math, hist , " ;
    $SQL =$SQL . " kor+eng+math+hist as ssum, " ;
    $SQL =$SQL . " round((kor+eng+math+hist)/4,1) as savg " ; 
    $SQL =$SQL . " from  examtbl order by  sno  desc  " ;
    $result = $conn -> query($SQL);

 }else if($ch1 == "sno") {

    $SQL = "select  sno, sname, kor, eng, math, hist , " ;
    $SQL =$SQL . " kor+eng+math+hist as ssum, " ;
    $SQL =$SQL . " round((kor+eng+math+hist)/4,1) as savg " ; 
    $SQL =$SQL . " from  examtbl where sno like '%$ch2%' order by  sno  desc  " ;
     // echo $SQL ;
    $result = $conn -> query($SQL);

 }else if($ch1 == "sname"){

    $SQL = "select  sno, sname, kor, eng, math, hist , " ;
    $SQL =$SQL . " kor+eng+math+hist as ssum, " ;
    $SQL =$SQL . " round((kor+eng+math+hist)/4,1) as savg " ; 
    $SQL =$SQL . " from  examtbl where sname like '%$ch2%' order by  sno  desc  " ;
     // echo $SQL ;
    $result = $conn -> query($SQL);
 }

?>    



<form>
    <select name=ch1>
    <option value="sno"> 학번  </option>  
    <option value="sname"> 이름 </option>  
    </select>     
    <input type=text  name=ch2>
    <input  type=submit value="검색하기" >
</form>-->