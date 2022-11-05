<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/DBConn.php" ?>
<?
// $SQL = "select  * from board order by idx asc limit 0, 10" ;



if($_GET['idx']==""){
    $idx=0;
}else{
    $idx = $_GET['idx'];
}

$sql_tc ="select count(*) tc from board";
$result_tc = $conn -> query($sql_tc);
$row_tc = $result_tc ->fetch_assoc();


$SQL = "select  * from board order by idx asc limit $idx, 10" ;
$result = $conn -> query($SQL);

$total_page = ceil($row_tc['tc'] / 10) ; //ceil = 올림
$now_page = ($idx / 10) + 1;
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
    전체레코드 수 : <?=$row_tc['tc']?>
    ( 현재 <?=$now_page?>
    / <?=$total_page?> 전체)

<table border=1>
<tr>
     <td>순번</td> <td>이름</td><td>나이</td>
     <td>제목</td><td>특이사항</td>
</tr>
<?
 while( $row = $result ->fetch_assoc() ) {
    
?>

<tr> 
     <td><?=$row['idx']?></td> 
     <td><?=$row['name']?></td> 
     <td><?=$row['age']?></td>
     <td><?=$row['title']?></td>
     <td><?=$row['etc']?></td>

</tr>
<? }  ?>
</table>
<a href=list.php?idx=0>처음</a> &emsp;

<?if($idx <= 0){?>
    <?}else{?>
<a href=list.php?idx=<?=$idx-10?>>이전</a> &emsp;<?}?>


<?if($now_page == $total_page){?>
<?} else {?>
<a href=list.php?idx=<?=$idx+10?>>다음</a>&emsp;
<?}?>


<?
$end_page = ($total_page - 1) * 10 ;
?>
<a href=list.php?idx=<?=$end_page?>>마지막으로</a>


<br>
</div>                   
</section>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>