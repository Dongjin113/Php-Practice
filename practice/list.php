<?include "top.php"?>
<?include "DBConn.php"?>
<?
$ch1 = $_GET['ch1'];
$ch2 = $_GET['ch2'];

$SQL = "select sno, sname, kor, eng, math, hist,  ";
$SQL = $SQL . "(kor+eng+math+hist) as ssum, round((kor+eng+math+hist)/4,1) as savg from examtbl ";

if ($ch1 == ""){
    $SQL = $SQL . " order by sno desc";

} else if ($ch1 == "sno"){
    $SQL = $SQL . " where sno like '%$ch2%' order by sno desc";
    
}  else if ($ch1 == "sname"){
    $SQL = $SQL . " where sname like '%$ch2%' order by sno desc";

}   else if ($ch1 == "kor"){
    $SQL = $SQL . " where kor like '%$ch2%' order by sno desc";
}



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
<div id=section1>성적조회목록</div><br>
<div align=center>
<table border=1 align=center>
    <tr>
    <th>순번</th><th>학번</th><th>이름</th><th>국어</th><th>영어</th><th>수학</th><th>역사</th><th>합계</th><th>평균</th><th>평점</th>
    </tr>

    <? while($row = $result -> fetch_assoc()){;
        
        if($row['savg'] >= 90){
            $A = 'A';
        }else if($row['savg'] >= 80){
            $A = 'B';
        }else if($row['savg'] >= 70){
            $A = 'C';
        }else{
            $A = 'F';
        }
        
        $i= $i + 1;

        $s_kor = $s_kor + $row['kor'];
        $s_eng = $s_eng + $row['eng'];
        $s_math = $s_math + $row['math'];
        $s_hist = $s_hist + $row['hist'];
        $s_ssum = $s_ssum + $row['ssum'];
        $s_savg = $s_savg + $row['savg'];



        ?>
        
        <tr>
            <td><?=$i?></td>
            <td><a href=edit.php?sno=<?=$row['sno']?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>
            <?=$row['sno']?></a></td>
            <td><?=$row['sname']?></td>
            <td><?=$row['kor']?></td>
            <td><?=$row['eng']?></td>
            <td><?=$row['math']?></td>
            <td><?=$row['hist']?></td>
            <td><?=$row['ssum']?></td>
            <td><?=$row['savg']?></td>
            <td><?=$A?></td>


        </tr>
        
        
        <?}?>
        <tr>
            <td></td>
            <td colspan=2>총점</td>
            <td><?=$s_kor?></td>
            <td><?=$s_eng?></td>
            <td><?=$s_math?></td>
            <td><?=$s_hist?></td>
            <td><?=$s_ssum?></td>
            <td><?=$s_savg?></td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td colspan=2>평균(<?=$i?>명)</td>
            <td><?=round($s_kor/$i,1)?></td>
            <td><?=round($s_eng/$i,1)?></td>
            <td><?=round($s_math/$i,1)?></td>
            <td><?=round($s_hist/$i,1)?></td>
            <td><?=round($s_ssum/$i,1)?></td>
            <td><?=round($s_savg/$i,1)?></td>
            <td></td>
        </tr>

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
