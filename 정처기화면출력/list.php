<? include "top.php"?>

<?
$servername = "localhost";
$username = "root";
$password = "autoset";
$dbname = "korea";

$conn = new mysqli($servername, $username, $password, $dbname);
//$conn = new mysqli("localhost", "root", "autoset", "korea"); 라고 사용해도 가능하다
?>
<?
$SQL = "select * from examtbl order by sno desc";
$result = $conn -> query($SQL);

?>

<style>
#tr1{
    background-color:#ffaaaa;
}
#tr2{
    background-color:#ffffaa;
}
tr{
    text-align:center;
}

</style>


</style>
        <section>
            <br><br>
            <div align=center>
            <font size=4 ><b>학생성적 목록보기<b></font>
            </div>
            <div align=center>
                <br>
                <table border = 1>
                    <tr>
                        <th>순번</th>
                        <th>학년</th>
                        <th>반</th>
                        <th>번호</th>
                        <th>학번</th>
                        <th>이름</th>
                        <th>국어</th>
                        <th>영어</th>
                        <th>수학</th>
                        <th>역사</th>
                        <th>합계</th>
                        <th>평균</th>
                        <th>평점</th>
                        

                    </tr>
                    <?
                    $sum=0; $avg=0; $i=0; $skor=0; $seng=0; $smath=0; $shist=0; $ssum=0; $savg=0;
                        while( $row = $result -> fetch_assoc()){

                            $i = $i + 1;
                            $sum = $row['kor'] +$row['eng'] + $row['math'] + $row['hist'];
                            $avg = round($sum/4,1);

                            $skor = $skor + $row['kor'];
                            $seng = $seng + $row['eng'];
                            $smath = $smath + $row['math'];
                            $shist = $shist + $row['hist'];
                            $ssum = $ssum + $sum;
                            $savg = $savg + $avg;

                            $askor = round($skor / $i,2);
                            $aseng = round($seng  / $i,2);
                            $asmath = round($smath / $i,2);
                            $ashist = round($shist / $i,2);
                            $assum = round($ssum  / $i,2);
                            $asavg = round($savg / $i,2);


                            if ($i % 2 ==1 ) {
                                $bg= 'tr1';
                                
                            } else{
                                $bg= 'tr2';
                            }

                            if ($avg >=90){
                                $pg='A';
                            }else if($avg >=80){
                                $pg='B';
                            }else if($avg >=70){
                                $pg='C';
                            }else{
                                $pg='D';
                            }
                            

                    ?>
                    
                    <tr  id="<?=$bg?>">
                        <td>A<?=$i?></td>
                        <td><?=substr($row['sno'],0,1)?></td>
                        <td><?=substr($row['sno'],1,2)?></td>
                        <td><?=substr($row['sno'],3,2)?></td>
                        <td><?=$row['sno']?></td>
                        
                        <td> 
                        <a href="edit.php?sno=<?=$row['sno']?>">  
                        <?=$row['sname']?> 
                        </a>
                        </td>
                        <td><?=$row['kor']?></td>
                        <td><?=$row['eng']?></td>
                        <td><?=$row['math']?></td>
                        <td><?=$row['hist']?></td>
                        <td><?=$sum?></td>
                        <td><?=$avg?></td>
                        <td><?=$pg?></td>



                        
                    </tr> <!--누적값구하기-->
        <!--  <a href="edit.php?sno=<?=$row['sno']?>"  가구분주 ?앞에는 이동할위치 뒤는 값-->
                    <?
                }
                ?>
                <tr>
                    <td colspan="5"></td>
                    <td>총점</td>
                    <td><?=$skor?></td>
                    <td><?=$seng?></td>
                    <td><?=$smath?></td>
                    <td><?=$shist?></td>
                    <td><?=$ssum?></td>
                    <td><?=$savg?></td>
                    <td>&nbsp;</td>

                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>총평균</td>
                    <td><?=$askor?></td>
                    <td><?=$aseng?></td>
                    <td><?=$asmath?></td>
                    <td><?=$ashist?></td>
                    <td><?=$assum?></td>
                    <td><?=$asavg?></td>
                    <td>&nbsp;</td>

                </tr>
                </table>

            </div>
            <br>
        </section>        

        <? include "bottom.php"?>

        <!--<style>
#tr1{
    background-color:#ffaaaa;
}
#tr2{
    background-color:#ffffaa;
}

</style>
        <section>
            <br><br>
            <div align=center>
            <font size=4 ><b>학생성적 목록보기<b></font>
            </div>
            <div align=center>
                <br>
                <table border = 1>
                    <tr>
                        <th>학번</th>
                        <th>이름</th>
                        <th>국어</th>
                        <th>영어</th>
                        <th>수학</th>
                        <th>역사</th>
                    </tr>
                    <? 
                    $x = 0;
                    for($i=1 ; $i<=6; $i++){ 

                        if ($i % 2 == 0 ) {
                            $bg = 'tr1';//짝수값 받아오기
                        }else{
                            $bg = 'tr2';//홀수값 받아오기
                        }    
                    ?>
                    
                    <tr  id=<?="$bg"?>>
                        <td>&nbsp;<?=$i?></td>
                        <td>&emsp;</td>
                        <td>&emsp;</td>
                        <td>&emsp;</td>
                        <td>&emsp;</td>
                        <td>&emsp;</td>
                    </tr>
                    <? $x= $x + $i;  } ?> <!--누적값구하기-->
                </table>
                누적합 <?=$x?>

            </div>
            <br>
        </section>        
-->