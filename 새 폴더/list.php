<? include 'top.php'?>
<? include 'DBconn.php'?>
<style>
 
    table{
        width: 600px;
    }

</style>
<section>
    <div align=center>  
    <br>
    <h2> 학생 성적 목록 보기 </h2>

<?
// 2. sql문 작성하기
$SQL = "select sno, sname, kor, eng, math, hist from examtbl";


// 3. SQL문 실행하기
$result = $conn -> query($SQL);   //result 는 SQL문을 실행한것
?>

<table border = 1>
<tr>
<td>순번</td><td>학번</td> <td>이름 </td><td>국어 </td><td>영어</td>
<td>수학</td><td>역사</td><td>합계</td><td>평균</td><td>평점</td>
</tr>
<?

$ksum = 0; $esum = 0; $msum = 0; $hsum = 0; $ssum = 0; $asum = 0; $count = 0;

// row는 칼럼값을 받아올때만 사용
// 4.while 문 에서 컬럼 출력하기
while ( $row = $result -> fetch_assoc() ){    
    $sum = $row['kor'] +$row['eng'] + $row['math'] + $row['hist'] ;
    $avg = round($sum / 4,1);

    $count = $count + 1;

    $ksum = $ksum +$row['kor'];
    $esum = $ksum +$row['eng'];
    $msum = $ksum +$row['math'];
    $hsum = $ksum +$row['hist'];
    $ssum = $ssum +$sum;
    $asum = $asum +$avg;

    $kavg = round($ksum /$count,1);
    $eavg = round($esum /$count,1);
    $mavg = round($msum /$count,1);
    $havg = round($hsum /$count,1);
    $savg = round($ssum /$count,1);
    $aavg = round($asum /$count,1);

    $bgcolor="#cccccc";

    if ($avg >=90) {
        $grade ="A" ;
    } else if ($avg >= 80){
        $grade ="B";
    } else if ($avg >= 70){
        $grade ="c" ;
    }else {
        $grade ="f" ;
        $bgcolor="#ff0000";
    }


     //?는 파일명이랑 값을 구분한것 <a href=del.php?sno=<?=$row['sno']?> > <?=$avg?></td>  
    

    ?>
    <tr bgcolor="<?=$bgcolor?>">
        <td><?=$count?></td>
        <td>
            <a href="edit.php?sno=<?=$row['sno']?>" >
            <?=$row['sno']?>
        </td> 
        
        <td><?=$row['sname']?></td>
        <td><?=$row['kor']?></td> <td><?=$row['eng']?></td>
        <td><?=$row['math']?></td> <td><?=$row['hist']?></td>
        <td><?=$sum?></td>
        <td>
            <a href="del.php?sno=<?=$row['sno']?>" > <?=$avg?></td>  
        <td><?=$grade?></td>
    </tr>
    <?
    }
    //반복되는 구간이아님으로 {}바깥쪽에 작성  <br>은 공백생성
    ?> 
    <tr>
    <td colspan=3> &nbsp;누적합 </td> 
    <td><?=$ksum?></td> <td><?=$esum?></td>
    <td><?=$msum?></td> <td><?=$hsum?></td>
    <td><?=$ssum?></td><td><?=$asum?></td><td></td>
    </tr>
    <tr>
    <td colspan=3> &nbsp;누적평균( <?=$count?> 명) </td> 
    <td><?=$kavg?></td> <td><?=$eavg?></td>
    <td><?=$mavg?></td> <td><?=$havg?></td>
    <td><?=$savg?></td><td><?=$aavg?></td><td></td>
    </tr>

</table>
</div>
<br> 
</section>
<? include 'bottom.php'?>
