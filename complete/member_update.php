<? include "DBConn.php" ?>
<?

$sno=$_POST['sno'];
$addr=$_POST['addr'];
$oldimg=$_POST['oldimg'];
$mfile=$_FILES['img']['name']; // 파일명 ( 코난.png )
$tmp=$_FILES['img']['tmp_name'];

$SQL = "select  *  from  member where sno='$sno'";
$result = $conn -> query($SQL);
$row = $result ->fetch_assoc();
$img = $row['img'];

if($mfile ==""){
    // 1.
    // 파일 첨부가 없으면 실행 
    $SQL ="update member set addr='$addr' where sno='$sno'" ;
    $conn -> query($SQL);
    echo "====> 1" . $SQL ;
}else{   
    // 2
    // 파일 첨부가 있으면 실행
    if ($oldimg =="space.png") {
    
        if (file_exists("./img/$mfile")) {
            // 2-1.    
            // 기본에 파일이 존재 하면 실행.
            $f_fname = basename($mfile,strrchr($mfile,'.'));
            $time = date("His", time());
            $ext = strrchr($mfile,'.') ;
            $mfile = $f_fname."_".$time.$ext ;
            move_uploaded_file($tmp, "./img/$mfile");
            $SQL ="update member set addr='$addr' , img ='$mfile' where sno='$sno'" ;
            $conn -> query($SQL);
            echo "====> 2-1-1"  . $SQL;
        }else{
            // 기본 파일이 존재 하지 않으면 실행 
            move_uploaded_file($tmp, "./img/$mfile");
            $SQL ="update member set addr='$addr' , img ='$mfile' where sno='$sno'" ;
            $conn -> query($SQL);
            echo "====> 2-1-2" . $SQL ;
        }    

    }else{
    // 2-2.    
    // 기본에 파일이 존재 한다. 
    if ($img != 'space.png') {
        unlink("./img/$img") ;
    }
        if (file_exists("./img/$mfile")) {
            $f_fname = basename($mfile,strrchr($mfile,'.'));
            $time = date("His", time());
            $ext = strrchr($mfile,'.') ;
            $mfile = $f_fname."_".$time.$ext ;
            move_uploaded_file($tmp, "./img/$mfile");
            $SQL ="update member set addr='$addr' , img ='$mfile' where sno='$sno'" ;
            $conn -> query($SQL);
            echo "====> 2-2-1" . $SQL ;
        }else{
            move_uploaded_file($tmp, "./img/$mfile");
            $SQL ="update member set addr='$addr' , img ='$mfile' where sno='$sno'" ;
            $conn -> query($SQL);
            echo "====> 2-2-2" . $SQL ;
        }
    }
}

?>
<script>
 location.href="member_list.php" ;
</script>   