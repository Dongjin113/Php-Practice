<? session_start ?>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<section> 
<br><br>    
<div align=center> <font size=4> <b> 로그아웃 </b></font>  </div>    
<div align=center>
<br> <br><br><br>
   <h1>로그아웃 완료 !!!</h1>
    <?
    $_SESSION['id']=""; // 값을 공백으로 변경
    session_unset(); //세션비우기
    session_destroy();//세션제거하기
    header('Location:http://127.0.0.1/index.php');
    exit;
    ?>








</div> 
<br>   
</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>