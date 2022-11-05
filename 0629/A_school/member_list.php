<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>

<style>
    table{
        text-align:center;
        width : 800;
        height: 300;
    }
</style>
<?


    $conn = new mysqli("localhost","root","autoset","korea");
    $SQL = "select custno, custname, phone, address, joindate, grade, city from member_tbl_02";
    $result = $conn -> query($SQL);



?>
<section> 
<br>
<div align=center>
<h2>회원목록조회/수정</h2>
</div>

<div align=center>

<table border=1>

<tr>
    <th>회원번호</th>
    <th>회원성명</th>
    <th>전화번호</th>
    <th>주소</th>
    <th>가입일자</th>
    <th>고객등급</th>
    <th>거주지역</th>
</tr>

<? while ($rw = $result -> fetch_assoc()) {
    if( $rw['grade'] == 'A'){
        $gd = "VIP";
    }elseif( $rw['grade'] == 'B'){
        $gd = "일반";
    }elseif( $rw['grade'] == 'C'){
        $gd = "직원";
    }

    $date = substr($rw['joindate'],0,4) . "년 " . substr($rw['joindate'],5,2)."월 ". substr($rw['joindate'],8,2) ."일 ";



    ?>
<tr>
    <td><?=$rw['custno']?></td>
    <td><?=$rw['custname']?></td>
    <td><?=$rw['phone']?></td>
    <td><?=$rw['address']?></td>
    <td><?=$date?></td>
    <td><?=$gd?></td>
    <td><?=$rw['city']?></td>

</tr>

<? } ?>

</table>






</div>

</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>


