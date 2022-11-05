<? include $_SERVER["DOCUMENT_ROOT"]."/public_html3/include/DBConn.php" ?>

<?
 $name =$_REQUEST['name'];
 $etc=$_POST['etc'];
 $mfile = $_FILES['file']['name'];
 $tmp =  $_FILES['file']['tmp_name'];
 
 if ($mfile == "") {
    $mfile =="space.png";
 } else {

    if(file_exists("./files/$mfile")) {

        $f_fname = basename($mfile,strrchr($mfile,'.'));
        $time = date("His", time());
        $ext = strrchr($mfile,'.') ;
        $mfile = $f_fname."_".$time.$ext ;

        move_uploaded_file($tmp, "./files/$mfile");
        
    }else{

        move_uploaded_file($tmp, "./files/$mfile");    
    }
}

$SQL = "insert  into school (name, etc, file) values('$name','$etc','$mfile') ";
$conn -> query($SQL);

?>
<script>
location.href="form_list.php" ;
</script>   