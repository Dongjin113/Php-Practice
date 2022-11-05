<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<?


    $conn = new mysqli("localhost","root","autoset","korea");
    
    $SQL = "select m1.custno, custname, grade, sum(price) as price from money_tbl_02 m1 join member_tbl_02 m2 on m1.custno = m2.custno group by m1.custno, custname, grade order by sum(price) desc";
    $result = $conn -> query($SQL);


?>
<style>
    table{
        width : 500;
        height : 300;
        text-align : center;
    }
</style>
<section> 
<br>
<div align=center>
<h2>회원매출조회</h2>
</div>

<div align=center>
    <table border = 1>
        <tr>
            <th>회원번호</th>
            <th>회원성명</th>
            <th>고객등급</th>
            <th>매출</th>
        </tr>
        <?while($rw = $result -> fetch_assoc()){
            if( $rw['grade'] == 'A'){
                $gd = "VIP";
            }elseif( $rw['grade'] == 'B'){
                $gd = "일반";
            }elseif( $rw['grade'] == 'C'){
                $gd = "직원";
            }
            ?>
            <tr>
                <td><?=$rw['custno']?></td>
                <td><?=$rw['custname']?></td>
                <td><?=$gd?></td>
                <td><?=number_format($rw['price'])?></td>
            </tr>
            <?}?>

    </table>
        </section> 


<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>


