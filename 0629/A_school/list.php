<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<?


    $conn = new mysqli("localhost","root","autoset","korea");

    
    $ch1 = $_GET['ch1'];
    $ch2 = $_GET['ch2'];

    $SQL = "select  sno, sname, kor, eng, math, hist , " ;
    $SQL =$SQL . " kor+eng+math+hist as ssum, " ;
    $SQL =$SQL . " round((kor+eng+math+hist)/4,1) as savg from  examtbl " ; 
   
       if ( $ch1  =="" ) {
           $SQL =$SQL . "  order by  sno  desc  " ;
    
       } else if ( $ch1  =="sno") {
            $SQL =$SQL . "  where sno like '%$ch2%' order by  sno  desc  " ;
   
       } else if ( $ch1  =="sname") {
           $SQL =$SQL . "  where sname like '%$ch2%' order by  sno  desc  " ;
   
       } else if( $ch1  =="kor") {
            $SQL =$SQL . " where kor like '%$ch2%' order by  sno  desc  " ;
       }
   
       $result = $conn -> query($SQL);

?>
<section> 
<br>
<div align=center>
<h2>학생목록/수정</h2>
</div>

<div align=center>
<table border=1>
<tr> <td>학번</td> <td>이름</td><td>국어</td>
     <td>영어</td><td>수학</td><td>역사 </td>
     <td>합계 </td><td>평균 </td><td>평점 </td>
</tr>
<?
 $i = 0; $s_kor=0 ;  $s_eng=0 ; $s_math=0;
 $s_hist =0; $s_ssum =0;  $s_savg =0;
 while( $row = $result ->fetch_assoc() ) {
     if ( $row['savg'] >= 90) {
       $GG = "A" ;
     }else if ( $row['savg'] >= 80) {
        $GG = "B" ;
     }else if( $row['savg'] >= 70){
        $GG = "C" ;
     }else {
        $GG = "F" ;
     }
    
    $i = $i + 1 ; 

    $s_kor=$s_kor+$row['kor'];
    $s_eng=$s_eng+$row['eng'];
    $s_math=$s_math+$row['math'];
    $s_hist=$s_hist+$row['hist'];
    $s_ssum=$s_ssum+$row['ssum'];
    $s_savg=$s_savg+$row['savg'];
?>

<tr> <td><?=$row['sno']?></td> 
     <td><?=$row['sname']?></td>
     <td><?=$row['kor']?></td>
     <td><?=$row['eng']?></td><td><?=$row['math']?></td>
     <td><?=$row['hist']?> </td>
     <td><?=$row['ssum']?> </td>     
     <td><?=$row['savg']?> </td>
     <td><?=$GG?> </td>
</tr>
<? }  ?>

<tr> <td> </td> <td>총점</td>
     <td><?=$s_kor?></td>
     <td><?=$s_eng?></td>
     <td><?=$s_math?></td>
     <td><?=$s_hist?> </td>
     <td><?=$s_ssum?> </td>     
     <td><?=$s_savg?> </td>
     <td> </td>
</tr>
<tr> <td> </td> <td>평균(<?=$i?> 명)</td>
     <td><?=round($s_kor / $i ,1)?></td>
     <td><?=round($s_eng / $i ,1)?></td>
     <td><?=round($s_math / $i ,1)?></td>
     <td><?=round($s_hist / $i ,1)?> </td>
     <td><?=round($s_ssum / $i ,1)?> </td>     
     <td><?=round($s_savg / $i ,1)?> </td>
     <td> </td>
</tr>
</table>
<br>
<form>
    <select name="ch1" >
        <option value="sno">학번</option>
        <option value="sname">이름</option>
    </select>
    <input type=text name="ch2">
    <input type=submit value="검색하기">
</form>




</div>

</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>


