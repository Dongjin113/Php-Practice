
<?include "DBconn.php"?>
<?

$sno = $_REQUEST['sno'];
$addr = $_REQUEST['addr'];
$mfile = $_FILES['img']['name'];
$tmp = $_FILES['img']['tmp_name']; //파일을받아올때$mfile = $_FILES['img']['name']; $tmp = $_FILES['img']['tmp_name']; 두가지가필요

if($mfile =="") {
    $mfile='space.jpg';
} else {
    if(file_exists("./img/$mifle")){
        $f_fname = basename($mfile, strrchr($mfile,"."));
        $randomNum = date("His",time());
        $fileinfo = pathinfo($mfile);
        $ext = $fileinfo['extension'];
        $mfile = $f_fname."_".$randomNum.".".$ext;
        move_uploaded_file($tmp,"./img/$mfile");

    }else{
        move_uploaded_file($tmp,"./img/$mfile");
    }
}

$SQL="insert into member(sno, addr, img)";
$SQL=$SQL . "values('$sno','$addr','$mfile')";
$conn -> query($SQL);
echo $SQL;

?>

<script>
//location.href="list.php";
//list.php로 이동시켜줌
</script>


