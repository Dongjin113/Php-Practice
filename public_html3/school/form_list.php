<? include $_SERVER["DOCUMENT_ROOT"]."/public_html3/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/public_html3/include/DBConn.php" ?>
<?
$ch1=$_GET['ch1'];
$ch2=$_GET['ch2'];
 
 // 상위 7개의 레코드 가져오기 
 $SQL= " select * from  school ";
 $SQLEnd=  " order by idx desc limit 0, 10 " ;
 if ($ch1=="") {
   $SQL =$SQL .  $SQLEnd ;

 }else if($ch1=="idx"){
    $SQL =$SQL . " where idx like '%$ch2%' " . $SQLEnd ;

 }else if($ch1=="name"){
    $SQL =$SQL . " where name like '%$ch2%' " . $SQLEnd ;
 }
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
 학생목록조회 
</div>
<br>
<div align=center> 
<table border=1>
<tr> <td>순번</td> <td>이름</td><td>파일명</td><td>사진</td>

</tr>
<?
 while( $row = $result ->fetch_assoc() ) {
  
?>

<tr> <td><?=$row['idx']?></td>     
     <td>
      <a href=member_edit.php?sno=<?=$row['idx']?>>
      <?=$row['name']?>
      </a>
     </td>
     <td><?=$row['file']?> </td>     
     <td>
       <a href=form_delete.php?idx=<?=$row['idx']?>>
         <img src=./files/<?=$row['file']?> width=30 height=30>
       </a> 
    </td>
</tr>
<? }  ?>

</table>
<form>
 <select name="ch1"> 
    <option value="idx"> 순번 </option>
    <option value="name">이름 </option>
 </select>   
 <input  type=text  name=ch2>
 <input  type=submit  value="검색하기" >
</form>
<br>
</div>                   
</section>

<? include $_SERVER["DOCUMENT_ROOT"]."/public_html3/include/bottom.php" ?>