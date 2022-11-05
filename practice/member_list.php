<?include "top.php"?>
<?include "DBConn.php"?>
<?

$SQL = "select sno, addr, img from member";


$result = $conn -> query($SQL);
?>
<style>
    table{
        width : 500px;
        text-align:center;
    }
    ch1{
        align:center;
    }
    </style>
<section>
<br>
<div id=section1>회원조회목록</div><br>
<div align=center>
<table border=1 align=center>
    <tr>
    <th>학번</th><th>주소</th><th>파일명</th><th>사진</th>
    </tr>

    <? while($row = $result -> fetch_assoc()){
        

        ?>
        
        <tr>
            <td><?=$row['sno']?></td>
            <td><?=$row['addr']?></td>
            <td><?=$row['img']?></td>
            <td><img src=./img/<?=$row['img']?> width=50 height=50></td>


        </tr>
        
        
        <?}?>

</table>


<form>
<select name=ch1>
    <option value='sno'>학번</option>
    <option value='sname'>이름</option>
    <option value='kor'>국어점수</option>
    </select>
    <input type=text name=ch2>
    <input type=submit value="검색하기">
</form>

    </div>
<br>
    </section>
<?include "bottom.php"?>
