<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<?
    $conn = new mysqli("localhost","root","autoset","korea");

    
    $ch1 = $_GET['ch1'];
    $ch2 = $_GET['ch2'];
    //1. 페이지사이즈 
    $page_size = 10;
    //2. 페이지리스트사이즈
    $page_List_size = 10;
    if ($_GET['idx'] == ""){
        $idx = 0 ;
    }else {
        $idx = $_GET['idx'];
    }

    $SQL1 = "select idx,name,age,title,etc from board0628";
    
    if($ch1==""){
        $SQL = $SQL1 . " order by idx desc limit $idx, $page_size" ;
        $SQL_tc = "select count(*) as tc from board0628";

    }else if( $ch1 == "name"){
        $SQL = $SQL1 . " where name like '%$ch2%' order by idx desc limit $idx, $page_size" ;
        $SQL_tc = "select count(*) as tc from board0628 where name like '%$ch2%' ";

    }else if( $ch2 == "title"){
        $SQL = $SQL1 . " where title like '%$ch2%' order by idx desc limit $idx, $page_size" ;
        $SQL_tc = "select count(*) as tc from board0628 where title like '%$ch2%' ";

    }

    #echo $SQL . "<br>";
    #echo $SQL_tc;


    $result_tc = $conn -> query($SQL_tc);
    $rs_tc = $result_tc -> fetch_assoc();
    //3.전체레코드수
    $tc = $rs_tc['tc'];
    //4.총페이지수
    $total_page = ceil($tc / $page_size);
    //5.현재레코드
    $now_record = $idx +1;
    //6.현재페이지
    $now_page = ceil($now_record / $page_size);
    $result = $conn -> query($SQL);
    //7.하단가로 시작
    $start_page=floor(($now_page-1)/$page_List_size) * $page_List_size +1;

    //8.하단가로 마지막
    $end_page = $start_page + $page_List_size -1;



?>
<section> 
<br><br>    
<div align=center> <font size=4> <b> 목록보기 (페이지나누기2) </b></font>  

</div>
<div align=center>
   <br>
   1.페이지사이즈 <?=$page_size?> &emsp;
   2.페이지List사이즈 <?=$page_List_size?> &emsp;
   3.전체레코드수  <?=$tc?> &emsp;
   4.총페이지수 <?=$total_page?><br> &emsp;
   5.현재레코드 <?=$now_record?> &emsp;
   6.현재페이지 <?=$now_page?> &emsp;
   7.하단가로시작 <?= $start_page?>
   8.하단가로마지막 <?=  $end_page?>
   
   <table border = 1 width=500>
   <tr><td>순번</td><td>번호</td><td>이름</td><td>나이</td><td>제목</td><td>특이사항</td></tr>

    <?
    $i=1;
    
   while($rs = $result -> fetch_assoc()){
    
    ?>


    <tr>
        <td><?=$i?></td>
        <td><?=$rs['idx']?></td>
        <td><?=$rs['name']?></td>
        <td><?=$rs['age']?></td>
        <td><?=$rs['title']?></td>
        <td><a href=delete.php?delidx=<?=$rs['idx']?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>&idx=<?=$idx?>><?=$rs['etc']?></td>
   </tr>
  <?
    $i++;
   }
   ?>
   </table>
</div> 
<br>
<div  align=center>
<form>
    <select name="ch1">
   <option value="name">이름</option>
   <option value="title">제목</option>
    </select>
    <input type="text" name="ch2">
    <input type="submit" value="검 색 하 기">

</div>
</form>
<div align=center>
<a href=list2.php?idx=0&ch1=<?=$ch1?>&ch2=<?=$ch2?>>
처음&emsp;</a>




<?if($start_page == 1){?>이전<?=$page_List_size?>페이지&emsp;
<?}else{?>
<a href=list2.php?idx=<?=($start_page-2)*$page_size?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>이전<?=$page_List_size?>페이지&emsp;
<?}?>
</a>





<?for ($i = $start_page ; $i<=$end_page ; $i++){
    if($i <= $total_page) {
        ?>
        <a href=list2.php?idx=<?=($i-1)*$page_size?>><?=$i?></a>
        <?
    }  
}
    ?>






<?if($end_page < $total_page){?>
<a href=list2.php?idx=<?=$end_page*$page_size?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>다음<?=$page_List_size?>페이지&emsp;</a>   
    <?
}else{?>
다음10페이지&emsp;
<?}?>

<?$endPage = ($total_page - 1) * $page_size;
?>
<a href=list2.php?idx=<?=$endPage?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>마지막&emsp;</a>
</div>

</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>


<!--세션
:세션은 한번 변수에 값을 발생 시키면
세션을 종료시키든지 아니면 브라우즈를 닫을때까지 값을 유지-->