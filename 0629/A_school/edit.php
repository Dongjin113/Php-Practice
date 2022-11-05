<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<?
    $conn = new mysqli("localhost","root","autoset","korea");

    
    $ch1 = $_GET['ch1'];
    $ch2 = $_GET['ch2'];
    

    $result = $conn -> query($SQL);
?>
<section> 
<br>
<div align=center>
<h2>학생목록/수정</h2>
</div>

<div align=center>
<table border=1>
<tr>
    <th>학번</th><th>이름</th><th>국어</th><th>영어</th><th>수학</th><th>역사</th>
</tr>

<?while($rw = $result -> fetch_assoc()){?>

<tr>
    <td><a href=edit.php?sno=<?=$rw['sno']?>>
    <?=$rw['sno']?></td>
    <td><?=$rw['sname']?></td>
    <td><?=$rw['kor']?></td>
    <td><?=$rw['eng']?></td>
    <td><?=$rw['math']?></td>
    <td><?=$rw['hist']?></td>
</tr>
<?}?>
</table>
<br>



</div>

</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>


