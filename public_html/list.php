<? include "../top.php" ?>

<?
$servername = "localhost" ;
$username = "root";
$password ="autoset";
$dbname="korea";

$conn = new mysqli($servername, $username, $password, $dbname ); 
?>

<?
   $SQL = "select  *  from examtbl order by sno desc" ;
   $result = $conn -> query($SQL);
?>

<style>
#tr1{
    background-color:#ffaaaa;
}
#tr2{
    background-color:#ffffaa;
}
tr{
    text-align:center;
}
</style>  


<section>
<br><br>    
<div align=center> <font size=4> <b> 성적 목록 보기  </b></font>  </div>    
<div align=center>
   <br> 
   <table border=1>
     <tr> <th> 순번 </th> <th> 학년 </th> <th> 반 </th><th> 번호 </th>
          <th> 이름 </th> <th> 국어 </th> 
          <th> 영어 </th> <th> 수학 </th> <th> 역사 </th>
          <th> 합계 </th> <th> 평균 </th> <th> 평점 </th>
     </tr>      
     <? 
        $sum = 0;  $avg = 0.0 ;  $i =1 ;
        $skor=0; $seng=0 ; $smath=0; $shist=0;
        $ssum=0 ; $savg=0;

        $askor=0; $aseng=0 ; $asmath=0; $ashist=0;
        $assum=0 ; $asavg=0;

        while( $row = $result -> fetch_assoc()) {
               
        if ($i %2 == 1) {
           $bg = 'tr1' ;  
        } else{
            $bg = 'tr2' ; 
        }

        $sum = $row['kor'] + $row['eng'] + $row['math']+ $row['hist'];
        $avg = round( $sum / 4 , 1) ;  

        $skor = $skor + $row['kor'];
        $seng = $seng + $row['eng'];
        $smath = $smath+ $row['math'];
        $shist = $shist + $row['hist'];
        $ssum = $ssum + $sum;
        $savg = $savg + $avg ;

        $askor = round($skor / $i ,2);
        $aseng = round($seng  / $i,2);
        $asmath = round($smath / $i,2);
        $ashist =round( $shist  / $i,2);
        $assum =round( $ssum  / $i,2);
        $asavg = round($savg  / $i,2) ;

        if ($avg >= 90){
          $G ='A' ;
        } else if ($avg >= 80) {
          $G ='B' ;
        } else if ($avg >= 70){
          $G ='C' ;
        } else {
          $G ='F' ;
        }

     ?>
     <tr id="<?=$bg?>" >
     <td> &nbsp;A<?=$i?>  </td>
     <td> &nbsp;<?=substr($row['sno'],0,1)?>  </td>
     <td> &nbsp;<?=substr($row['sno'],1,2)?>  </td>
     <td> &nbsp;<?=substr($row['sno'],3,2)?>  </td>
     <td> 
       <a href="edit.php?sno=<?=$row['sno']?>" >
         <?=$row['sname']?> 
       </a>
     </td>
     <td><?=$row['kor']?> </td> <td><?=$row['eng']?> </td><td> <?=$row['math']?></td>
     <td><?=$row['hist']?> </td>
     <td><?=$sum?> </td>
     <td><?=$avg?> </td>
     <td><?=$G?> </td>
     </tr>

    <? 
       $i = $i + 1 ; 
       }
    ?>

     <tr  >
     <td> &nbsp;  </td>
     <td> &nbsp;  </td>
     <td> &nbsp;  </td>
     <td> &nbsp;  </td>
       <td> 총점 </td>
     <td><?=$skor?> </td>      <td><?=$seng?> </td>
     <td><?=$smath?></td>      <td><?=$shist?> </td>
     <td><?=$ssum?> </td>      <td><?=$savg?> </td>
     <td>&nbsp; </td>
     </tr>

     <tr  >
     <td> &nbsp;  </td>
     <td> &nbsp;  </td>
     <td> &nbsp;  </td>
     <td> &nbsp;  </td>
     <td> 총평균 </td>
     <td><?=$askor?> </td>      <td><?=$aseng?> </td>
     <td><?=$asmath?></td>      <td><?=$ashist?> </td>
     <td><?=$assum?> </td>      <td><?=$asavg?> </td>
     <td>&nbsp; </td>
     </tr>

    </table>

</div>
<br>
</section>

<? include "../bottom.php" ?>
