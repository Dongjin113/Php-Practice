<?session_start();?>
<html>
<head>
<title> 성적처리 프로그램 </title>
<style>
header {
        background-color:blue;
        height:63px;  
        line-height:63px ;
        color:#ffffff;
        font-size:28px;
        text-align:center;
       }
nav {
    background-color:#00aaff;
    height:30px;  
    line-height:30px ;
    color:#ffffff;
    font-size:14px;
    }
section {
         background-color:#cccccc;
         min-height:530px;  
         }
footer {
        background-color:blue;
        height:45px;  
        line-height:45px ;
        color:#ffffff;
        font-size:16px;
        text-align:center;
        }
#body{
   width:90%;
   margin:auto;
} 

a:link, a:visited  
{
    color: #ffffff;
    text-decoration: none;
}
a:hover, a:active{
   color: #000000;
   text-decoration-line: underline;  
}

</style>
</head>
<?
$host = $_SERVER['HTTP_HOST'];
$path = "http://".$host;
$rootPath = $_SERVER["DOCUMENT_ROOT"];
?>
<body>
<div id=body>    
<header> 학생 성적처리 프로그램 Ver.1.11 </header>
<nav> &emsp;&emsp;&emsp; 
    [ <a href="<?=$path?>/A_school/form.php">학생등록</a>&emsp;  
      <a href="<?=$path?>/A_school/list.php">학생목록/수정</a>&emsp;  
      <a href="<?=$path?>/A_school/result.php">성적그래프</a> ]&emsp;



     [ <a href="<?=$path?>/A_school/money_list.php">매출조회</a>&emsp;  
      <a href="<?=$path?>/A_school/member_list.php">회원목록</a> ]&emsp;





      <?if($_SESSION["id"] == "admin"){?> <!--id가 admin이면 보이고 아니면 보이지말라-->
      <a href="<?=$path?>/B_big/insert.php">빅데이터추가 </a>&emsp; 
      <a href="<?=$path?>/B_big/list1.php">페이지나누기1 </a>&emsp; 
      <a href="<?=$path?>/B_big/list2.php">페이지나누기2 </a>&emsp; 
      <a href="<?=$path?>/B_big/result.php">성적그래프</a>&emsp;  

       <?}?>

        <?if($_SESSION['id'] != "admin"){?><!--id가 admin이아니면 보이고 아니면 보이지말라-->
      <a href="<?=$path?>/C_admin/login.php">로그인 </a>&emsp; 
      <?}else{?><!--id가 admin이면 보여라-->
      <a href="<?=$path?>/C_admin/logout.php">로그아웃 </a> &emsp;
      <?}?>

      <a href="<?=$path?>/index.php">홈으로 </a></nav>
    </nav>




