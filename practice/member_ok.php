<?include "DBConn.php"?>
<?
$sno = $_REQUEST['sno'];
$addr = $_REQUEST['postcode'] . " - " . $_REQUEST['roadAddress'] . " - " . $_REQUEST['detailAddress'] . " - " . $_REQUEST['extraAddress'];
$mfile = $_FILES['img']['name'];
$tmp = $_FILES['img']['tmp_name'];

if( $mfile ==""){
    $mfile == 'space.png';
}else{
    if (file_exists("./img/$mfile")){
        $f_fname = basename($mfile,strrchr($mfile,'.'));
        $time = date("His",time());
        $ext = strrchr($mfile,'.');
        $mfile = $f_fname.$time.$ext;
        move_uploaded_file($tmp,"./img/$mfile");

    }
    move_uploaded_file($tmp,"./img/$mfile");
}
$SQL = "insert into member(sno,addr,img) values('$sno','$addr','$img')";
$conn -> query($SQL);
echo $SQL;

?>
<script>
    location.href="member_list.php"
</script>