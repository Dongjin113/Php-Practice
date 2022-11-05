<?session_start();?> <!--최고위에사용-->

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<section align=center> 
    <br><br>
<?
$id = $_GET['id'];
$pwd = $_GET['pwd'];


if ($id == "admin"){
    if($pwd=="1234"){
    $_SESSION["id"] = "admin";

      
?>
<script> alert('로그인 성공!!') 
location.href="<?=$path?>/C_admin/Refresh.php"
</script>
<?
  exit;
    }else{
?>
<script>
alert('로그인 (암호)실패');
location.href="login.php";
</script>
<?
    }
}else{
    ?>
    <h1>로그인 실패 (id확인)</h1>
    <a href="<?=path?>/login.php">로그인</a>
    <?
}
?>
<br>   
</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>