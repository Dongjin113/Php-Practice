<? include $_SERVER["DOCUMENT_ROOT"]."/include/DBConn.php" ?>

<?
$name = $_REQUEST['name'];
$etc = $_POST['etc'];
$mfile = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name']; 
//전역변수 어디에서든지 변형된값을 읽어올수 있음 지역변수
//php 내에서 함수를 만들어쓸때만 지역변수로사용 
//변수 선언을하면 우무대서나 출력해서 확인할수 있음


if ( $mfile =="" ){
    $mfile = 'space.png';
 } else {
    if (file_exists("./files/$mfile")) {
        // 파일의 이름 구하기
        $f_fname = basename($mfile,strrchr($mfile,'.'));
        // 시간 가져오기 (시분초)
        $time = date("His", time());
        // 확장자 가져오기
        $ext = strrchr($mfile,'.') ;
        $mfile = $f_fname."_".$time.$ext ;
        move_uploaded_file($tmp, "./files/$mfile");
    }else{
        move_uploaded_file($tmp, "./files/$mfile");
    }

 }



$SQL ="insert into school (name, etc, file) values('$name','$etc','$mfile')";
$conn -> query($SQL);
?>

<script>
    location.href = "form_list.php"
    </script>