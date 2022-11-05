<? include $_SERVER["DOCUMENT_ROOT"]."/public_html3/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/public_html3/include/DBConn.php" ?>
<?
 // 전체 레코드  개수 가져오기  
 $SQLCount = "select count(*) tc  from  member " ;
 $resultCount = $conn -> query($SQLCount);
 $rowCount = $resultCount ->fetch_assoc();

 // 상위 7개의 레코드 가져오기 
 $SQL = "select * from  member order by sno desc limit 0, 7 " ;
 
 $result = $conn -> query($SQL);

?>

<style>
 table{
   width: 650px ;
 } 

 td{
   text-align:center; 
   height: 25px ;
 }
</style>
<section> 
<br>
<div id=section1>   
 회원조회목록  ( <?=$rowCount['tc']?> : 명 )
</div>
<br>
<div align=center> 
<table border=1>
<tr> <td>학번</td> <td>주소</td><td>파일명</td><td>사진</td>

</tr>
<?
 while( $row = $result ->fetch_assoc() ) {
  
?>

<tr> <td><?=$row['sno']?></td>     
     <td>
      <a href=member_edit.php?sno=<?=$row['sno']?>>
      <?=$row['addr']?>
      </a>
     </td>
     <td><?=$row['img']?> </td>     
     <td><img src=<?=$path?>/img/<?=$row['img']?> width=50 height=50> </td>
</tr>
<? }  ?>

</table>
<br>
</div>                   
</section>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>