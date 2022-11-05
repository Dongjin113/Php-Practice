<? include $_SERVER["DOCUMENT_ROOT"]."/public_html3/include/DBConn.php" ?>
<?

 $sno=$_POST['sno'];
 $addr=$_POST['postcode'] .":". $_POST['roadAddress'] ;
 echo $addr;

 $mfile=$_FILES['img']['name']; // 파일명 ( 코난.png )
 $tmp=$_FILES['img']['tmp_name'];
 
 if ( $mfile =="" ){
    $mfile = 'space.png';
 } else {
    if (file_exists("$path/img/$mfile")) {
        // 파일의 이름 구하기
        $f_fname = basename($mfile,strrchr($mfile,'.'));
        // 시간 가져오기 (시분초)
        $time = date("His", time());
        // 확장자 가져오기
        $ext = strrchr($mfile,'.') ;
        $mfile = $f_fname."_".$time.$ext ;
        move_uploaded_file($tmp, "$path/img/$mfile");
    }else{
        move_uploaded_file($tmp, "$path/img/$mfile");
    }

 }

 $SQL ="insert into member(sno,addr,img) values('$sno','$addr','$mfile')" ;
 $conn -> query( $SQL);
 echo $SQL;
?>
<script>
 location.href="member_list.php" ;
</script>   