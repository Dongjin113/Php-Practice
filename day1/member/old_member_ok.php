<? include $_SERVER["DOCUMENT_ROOT"]."/include/DBConn.php" ?>
<?
  $sno = $_REQUEST['sno'];
  $addr = $_REQUEST['addr'];

  $mfile = $_FILES['img']['name'];
  $tmp = $_FILES['img']['tmp_name'];

  if ( $mfile =="") {
    $mfile='space.jpg' ; 
  } else {
    if(file_exists("./img/$mfile")) {
       // basename($mfile) : 파일명만 출력 
       // basename($mfile, 'jpg') : 확장자도 제외하고 출력
       // strrchr($mfile,".") : 마지막 . 을 찾아 점 부터 그 이하를 반환
       // 파일명만 가지고 올 수 있다.
       $f_fname = basename($mfile, strrchr($mfile,"."));
          
       $randomNum = date("His",time());

       // 파일의 정보 분석 하기 
       $fileinfo = pathinfo($mfile);
       // 파일의 확장자 가져오기
       $ext = $fileinfo['extension']; 

       /*
       echo $fileinfo['dirname'], "\n";
       echo $fileinfo['basename'], "\n";
       echo $fileinfo['extension'], "\n";
       echo $fileinfo['filename'], "\n"; // since PHP 5.2.0
      */
      
       $mfile = $f_fname."_".$randomNum.".".$ext;
       move_uploaded_file($tmp, "./img/$mfile");
    } else{
       move_uploaded_file($tmp, "./img/$mfile");
    }
  }

$SQL ="insert  into  member (sno, addr, img) " ;
$SQL = $SQL . " values ('$sno','$addr' ,'$mfile')" ;

$conn -> query($SQL);
echo $SQL;
?>
<script>
// location.href="list.php" ;
</script>    



