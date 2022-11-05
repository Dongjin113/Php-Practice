<? include "top.php" ?>
<? include "DBConn.php" ?>
<?
$ch1 ="" ; $ch2 = "";
$ch1 = $_GET['ch1'];
$ch2 = $_GET['ch2'];
$SQL = "select  sno, sname, kor, eng, math, hist , " ;
$SQL =$SQL . " kor+eng+math+hist as ssum, " ;
$SQL =$SQL . " round((kor+eng+math+hist)/4,1) as savg " ; 

if ( $ch1 =="") {

    $SQL =$SQL . " from  examtbl order by  sno  desc  " ;
    $result = $conn -> query($SQL);

}else if( $ch1 =="sno"){
    $SQL =$SQL . " from  examtbl where sno like '%$ch2%'order by  sno  desc  " ;
    $result = $conn -> query($SQL);

}else if( $ch1 == "sname"){
    $SQL =$SQL . " from  examtbl where sname like '%$ch2%'order by  sno  desc  " ;
    $result = $conn -> query($SQL);

}else if( $ch1 == "kor"){
    $SQL =$SQL . " from  examtbl where kor like '%$ch2%'order by  sno  desc  " ;
    $result = $conn -> query($SQL);

}



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
<tr> <td>학번</td> <td>이름</td><td>국어</td>
     <td>영어</td><td>수학</td><td>역사 </td>
     <td>합계 </td><td>평균 </td><td>평점 </td>
</tr>
<? while( $row = $result ->fetch_assoc() ) {   

    if($row['savg'] >= 90){
        $A = "A";
    }else if($row['savg'] >= 80){
        $A = "B";
    }else if($row['savg'] >= 70){
        $A = "C";
    }else{
        $A = "F";
    }
    
    $i = $i +1;
    $s_kor= $s_kor+$row['kor'];
    $s_eng= $s_kor+$row['eng'];
    $s_math= $s_kor+$row['math'];
    $s_hist= $s_kor+$row['hist'];
    $s_ssum= $s_kor+$row['ssum'];
    $s_savg= $s_kor+$row['savg'];

    ?>
<tr> <td><?=$row['sno']?></td> 
    <td><a href="edit.php?sno=<?=$row['sno']?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>">
     <?=$row['sname']?></td></a>
     <td><?=$row['kor']?></td>
     <td><?=$row['eng']?></td><td>
    <?=$row['math']?></td>
     <td><?=$row['hist']?> </td>
     <td><?=$row['ssum']?> </td>     
     <td><?=$row['savg']?> </td>
     <td><?=$A?> </td>
</tr>
<? }  ?>
<tr>
    <td colspan=2>총점</td>
    <td><?=$s_kor?></td>
    <td><?=$s_eng?></td>
    <td><?=$s_math?></td>
    <td><?=$s_hist?></td>
    <td><?=$s_ssum?></td>
    <td><?=$s_savg?></td>
    <td></td>
</tr>

<tr>
    <td colspan=2>평균(<?=$i?> 명)</td>
    <td><?=$s_kor / 10?></td>
    <td><?=$s_eng / 10?></td>
    <td><?=$s_math/ 10?></td>
    <td><?=$s_hist/ 10?></td>
    <td><?=$s_ssum/ 10?></td>
    <td><?=$s_savg/ 10?></td>
    <td></td>
</tr>


</table>
<form>
    <select name=ch1>
        <option value = "sno"> 학번</option>   <!-- 칼럼명을기준으로 생성 -->
        <option value = "sname"> 이름</option>
        <option value = "kor"> 국어점수</option>
    </select>
    <input type=text name=ch2>
    <input type=submit value="검색하기">

</form>

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