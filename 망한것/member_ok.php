<? include "DBconn.php" ?>

<?
$sno=$_POST['sno'];
$addr=$_POST['addr'];
$mfile=$_FILES['img']['name'];// 파일명 maju.png
$tmp=$_FILES['img']['tmp_name'];



echo $sno . ":" . $addr.  ":" . $mfile . ":" .$tmp;

if($mfile ==""){
    echo "빈파일";
    $mfile = 'space.png';
}else{
    if(file_exists("./img/$mfile")){ 
        //echo "<br>파일중복" ; 
        //파일의 이름 구하기
        $f_fname = basename($mfile,strrchr($mfile,'.')); 
        // strrchr($mfile,'.') mfile명에서 맨마지막 끝에있는 .부터 반환 확장자를 빼기
        //echo "<br> $f_fname";

        //시간가져오기 (시분초)
        $time = date("His", time());
        //echo "<br> $time";

        //확장자 받아오기
        $ext = strrchr($mfile,'.'); 
        //echo "<br> $ext";

        //echo"<br>" . $f_fname."_".$time.$ext;
        $mfile = $f_fname."_".$time.$ext;
        move_uploaded_file($tmp,"./img/$mfile");

    }else{
    echo $mfile;
    move_uploaded_file($tmp,"./img/$mfile");
    }
}

$SQL="insert into member(sno, addr, img) values('$sno','$addr','$mfile')";
$conn -> query($SQL);
echo $SQL;


?>

<script>
location.href="list.php";
//list.php로 이동시켜줌
</script>