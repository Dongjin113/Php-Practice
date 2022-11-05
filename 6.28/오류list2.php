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
<div align=center> <font size=4> <b> 학생 목록 보기(2) </b></font>  </div>    
<div  align=center>
   <br> 
   <?
   
    $page_size = 10;
    $page_list_size = 10;


    if ($_GET['idx'] =="") {
     $idx = 0;
    }else {
     $idx =$_GET['idx'];
    } 

    $ch1 = $_GET['ch1'];
    $ch2 = $_GET['ch2'];

    $conn = new mysqli("localhost","root","autoset","korea") ;



    $SQL = " select * from board2 " ;
    $SQLEnd = " order by idx asc limit $idx, $page_size " ;
    $tc_sql = "select count(*) tc from board2" ;

     if ($ch1 == "") {
       $SQL =  $SQL.$SQLEnd ;
       $tc_sql = $tc_sql ;
    }else if($ch1 == "name") {
       $SQL =  $SQL." where name like '%$ch2%' ".$SQLEnd ;
       $tc_sql = $tc_sql . " where name like '%$ch2%' " ;
     }else if($ch1 == "title") {
       $SQL =  $SQL." where title like '%$ch2%' ".$SQLEnd ;
       $tc_sql = $tc_sql . " where title like '%$ch2%' " ;
     }
    
     $tc_result = $conn -> query($tc_sql);
     $tc_row = $tc_result ->fetch_array() ;
     
     $result = $conn -> query($SQL);
     
    $total_page = ceil($tc_row['tc']/$page_size);
    $now_page = ($idx /$page_size ) + 1 ;

    $start_page = floor(($now_page - 1) / $page_list_size) *  $page_list_size + 1; //floor은 버리는것
    $end_page = $start_page + $page_list_size - 1;

     /* 1 이 스타트 10 이 라스트
     12345678910
     11 12 13 14 15 16 17 18 19 20
     21 22 23 24 25 26 27 28 29 30 

     1, 11, 21 스타트페이지 에 페이지 리스트 10을 더하고 -1을하면  10 20 30
     
     start_page
     만일 햔재 23페이지 -1 /10을하면 2.2에서 floor로 0.2를버리면 2 에서 10읠 곱하면 20 에서1을 더하면 21
     
     
     */
   ?>
   &emsp; 1. 페이지사이즈<?=$page_size?>
   &emsp; 2. 페이지 List사이즈<?=$page_list_size?>
   &emsp; 3. 전체레코드 수<?=$tc_row['tc']?>
   &emsp; 4. 총페이지 수 <br><?$total_page?>
   &emsp; 5. 현재레코드<?=$idx?>
   &emsp; 6. 현재페이지<?=$now_page?>
   &emsp; 7. 하단가로 시작<?=$start_page?>
   &emsp; 8. 하단가로 마지막<?=$end_page?>

   <!--전체레코드수 : <?=$tc_row['tc'] ?>  ( <?=$now_page?> / <?=$total_page?> )-->
   <table  border=1  width=500>
   <tr>
       <td>순번</td><td>번호</td><td>이름</td>
       <td>나이</td><td>제목</td> 
   </tr>
   <? 
   $i = 0;
   // $row = $result ->fetch_assoc() : 칼럼명으로만 출력 가능
   // $row = mysqli_fetch_row($result) : 순서로만 출력 가능.
   // $row = $result ->fetch_array() : 순서와 칼럼명 모두 가능.
   while($row = $result ->fetch_array() ) {  
    $i ++ ;
   ?>
   <tr>
   <td><?=$i ?></td>
       <td><?=$row[0] ?></td>
       <td><?=$row['name'] ?></td>
       <td><?=$row['age'] ?></td>
       <td><?=$row["title"] ?></td> 
   </tr>
   <?}?>

   </table>
   <form>
    <select name=ch1>
      <option value=name>이름</option>
      <option value=title>제목</option>
   </select>
   <input  type=text  name=ch2>
   <input  type=submit value="검색하기" >
   </form>

   <a href=list2.php?idx=0&ch1=<?=$ch1?>&ch2=<?=$ch2?>>처음</a> &emsp;
  
  <? 
   if($idx == 0 ) {
     echo "이전 &emsp;" ;
   } else {
   ?> 
   <a href=list2.php?idx=<?=$idx-$page_size?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>이전</a> &emsp;
   <?
   }
   ?>

    <?
    for($i = $start_page ; $i <= $end_page ; $i++){
        if($i <= $total_page){?>
    <a href=list2.php?idx=<?=($i-1)*$page_size?>><?=$i?></a>
        <?}
    }
    ?>









   
   <? if( $now_page == $total_page ) { ?>
     다음<?=$page_list_size?> &emsp;
   <? } else { ?>
    <a href=list2.php?idx=<?=$end_page*$page_list_size?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>>다음<?=$page_list_size?></a> &emsp;
   <? } ?>
 
   <? 
    $end = ($total_page -1 ) * $page_size ;
   ?>
    <a href=list2.php?idx=<?=$end_page?>&ch1=<?=$ch1?>&ch2=<?=$ch2?>> 마지막 </a>

</div> 
<br>   
</section>
<footer> HRDKOREA Copyrightⓒ2022 ALL rights resources Development Service of Korea    </footer> 
</div>
</body>
</html>