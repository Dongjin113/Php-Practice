

<html>
<head>
  <title> 정보처리기능사 연습 </title>  
  <style>
  header{
    background-color : blue;
    height:80px;
    line-height:80px;
    color:#ffffff; 
    font-size:28px;
    text-align:center;
  }
  nav{
    background-color : #00aaff;
    height:30px;
    line-height:30px;
    color:#ffffff; 
    font-size:14px;
  }
  section{
    background-color : #cccccc;
    min-height:500px;

  }
  footer{
    background-color : #0033ff;
    height:40px;
    line-height:40px;
    color:#ffffff; 
    font-size:17px;
    text-align:center;
  }
  #section1{
    font-size:25px;
    text-align:center;
  }

  #body{
    width: 80% ;
    margin:auto;
  } 
</style>
</head>

<?
  $host=$_SERVER['HTTP_HOST'];
  $path="http://".$host;
  // echo $path;
  // echo "<br>" ;
  $server=$_SERVER["DOCUMENT_ROOT"];
?>

<body>
<div id=body>
<header> (과정평가형 정보처리기능사)성적조회 프로그램 Ver1.0 </header>
<nav>
    &emsp;&emsp;<a href='<?=$path?>/public_html3/jungbo/form.php'>성적입력</a>
    &emsp;<a href='<?=$path?>/public_html3/jungbo/list.php'>성적조회</a>
    &emsp;<a href='<?=$path?>/public_html3/member/member.php'>회원가입</a>
    &emsp;<a href='<?=$path?>/public_html3/member/member_list.php'>회원조회</a>
    &emsp;<a href='<?=$path?>/public_html3/join/join_list.php'>테이블조인</a>
    &emsp;<a href='<?=$path?>/public_html3/school/form.php'>학생등록</a>
    &emsp;<a href='<?=$path?>/public_html3/school/form_list.php'>학생목록</a>
    &emsp;<a href='<?=$path?>/public_html3/index.php'>홈으로</a>  
</nav>