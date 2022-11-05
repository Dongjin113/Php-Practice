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
<body>
<div id=body>    
<header> 학생 성적처리 프로그램 Ver.1.11 </header>
<nav> &emsp;&emsp;&emsp; 
      <a href=#>학생등록</a>&emsp;  
      <a href=#>학생목록/수정</a>&emsp;  
      <a href=insert.php>빅데이터추가</a>&emsp;  
      <a href=list1.php>페이지나누기1.</a>&emsp;  
      <a href=list2.php>페이지나누기2.</a>&emsp;  
      <a href=index.php>홈으로 </a></nav>
<section> 
<br><br>    
<div align=center> <font size=4> <b> 빅데이터 추가  </b></font>  </div>    
<div align=center>
   <br> 
   <? 
    for ($i=1 ; $i <= 94 ; $i++ ) {

    $nameRand1 = mt_rand(0, 4);
    $nameRand2 = mt_rand(0, 4);
    $name1 = array('하니','똘이','영심이','만수','지효');
    $name2 = array('둘리','하나','애니','민국','누리');  
   
    $titleRand1 = mt_rand(0, 4);
    $titleRand2 = mt_rand(0, 4);
    $title1 =  array(' ASP ',' JSP ',' PHP ',' JAVA ',' C# ');    
    $title2 =  array(' 초급 ',' 중급 ',' 고급 ',' 심화 ',' 실무 ');    

    $etcRand1 = mt_rand(0, 6);
    $etcRand2 = mt_rand(0, 4);
    $etc1 = array('서울','경기','강원','제주','대전','울릉도','독도');
    $etc2 = array('산','바다','강','하늘','땅');

    $name = $name1[$nameRand1].$name2[$nameRand2];
    $age = mt_rand(11, 19);
    $title =$title1[$titleRand1]." ".$title2[$titleRand2] ;
    $etc =$etc1[$etcRand1] ." ". $etc2[$etcRand2];

     $conn = new mysqli("localhost","root","autoset","korea") ;

     $SQL = "insert into board2 (name, age, title, etc) " ;
     $SQL = $SQL . " values('$name', '$age', '$title', '$etc') " ;
     $conn -> query($SQL);
     
     if ($i % 20 == 0) {
        echo "<br>" ;
     } 
     ?>
        <?=$i?> &nbsp; 
     <?
     $conn-> close();
    }
   ?>

   <br> <br> <br> <br> <br> 
   <h1> 빅데이터 저장 완료 !! </h1>

</div> 
<br>   
</section>
<footer>
 HRDKOREA Copyrightⓒ2022 ALL rights resources Development Service of Korea   
 </footer> 
</div>
</body>
</html>