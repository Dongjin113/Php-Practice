<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/login_check.php"?>

<?
    $conn = new mysqli("localhost","root","autoset","korea");

    
    $ch1 = $_GET['ch1'];
    $ch2 = $_GET['ch2'];

    $page_size = 10;

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
    $tc = $rs_tc['tc'];

    $total_page = ceil($tc / $page_size);
    $now_page = $idx / $page_size +1;
    
    $result = $conn -> query($SQL);




?>
<section> 
<br><br>    
<div align=center> <font size=4> <b> 목록보기 (페이지나누기1) </b></font>  
전체레코드 :   <?=$tc?>  &emsp; 현재페이지 <?=$now_page?>/ <?=$total_page?>전체페이지

</div>
<div align=center>
   <br>
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
<a href=list1.php?idx=0&ch1=<?=$ch1?>&ch2=<?=$ch2?>>
처음&emsp;</a>
<?if($idx == 0){?>이전&emsp;
<?}else{?>
<a href=list1.php?idx=<?=$idx-$page_size?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>이전&emsp;
<?}?>
</a>

<?if($now_page==$total_page){?>
    다음&emsp;
    <?
}else{?>
<a href=list1.php?idx=<?=$idx+$page_size?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>다음&emsp;</a>
<?}?>

<?$endPage = ($total_page - 1) * $page_size;
?>
<a href=list1.php?idx=<?=$endPage?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>마지막&emsp;</a>
</div>

</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>


