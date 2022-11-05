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
a{
    text-decoration-line:none;
    } /*링크에 줄빼기 */
    a:link, a:visited{
        color: #ffffff;
        text-decoration:none
    }/*,는 or */
    a:hover, a:active{
        color: #000000;
        text-decoration:underline;
    }
</style>
</head>
<body>
<div id=body>    
<header> 학생 성적처리 프로그램 Ver.1.11 </header>
<nav> &emsp;&emsp;&emsp; 
    <a href=#>학생등록</a>&emsp;  
    <a href=#>학생목록/수정</a>&emsp;  
    <a href=insert.php> 빅데이터추가 </a>&emsp; 
    <a href=list1.php> 페이지나누기1. </a>&emsp; 
    <a href=list2.php> 페이지나누기2. </a>&emsp; 
    <a href=index.php>홈으로 </a>

</nav>
<section> 
<br><br>    
<div align=center> <font size=4> <b> 학생목록보기1 </b></font>  </div>    
<div align=center>
   <br> 
   <?
    
    $page_size = 10;


    if($_GET['idx']==""){
        $idx = 0;
    }else {
        $idx = $_GET['idx'];
    }
    
    $ch1 = $_GET['ch1'];
    $ch2 = $_GET['ch2'];

    $conn = new mysqli("localhost","root","autoset","korea") ;


 



    $SQL = "select * from board2 " ;
    $SQLEnd = "order by idx desc limit $idx, $page_size";
    $tc_sql = "select count(*) as tc from board2";

    

    if( $ch1 == ""){
        $SQL = $SQL . $SQLEnd;
        $tc_sql = $tc_sql;
        

    }else if( $ch1 == "name"){

        $SQL = $SQL . "where name like '%$ch2%'" . $SQLEnd ;
        $tc_sql =  $tc_sql . " where name like '%$ch2%";
        
    }else if( $ch1 == "title"){

        $SQL = $SQL . "where title like '%$ch2%'" . $SQLEnd ;
        $tc_sql = $tc_sql . "where title like '%$ch2%";

    }

    $tc_result = $conn -> query($tc_sql);
    
    echo $tc_sql;
    echo "<br>". $SQL;
    $tc_row = $tc_result -> fetch_array();


    $result = $conn -> query($SQL);

    $total_page =celi($tc_row['tc'] / $page_size);
    $now_page = ($idx/$page_size) + 1;
   ?>
   전체레코드수 : <?=$tc_row['tc']?> (<?=$now_page?>/<?=$total_page?>)
   <table border=1 width=400>
    <tr>
        <td>순번</td><td>번호</td><td>이름</td><td>나이</td><td>제목</td>
    </tr>
    <?
    $i=0;
    // $row = $result -> fetch_assoc() : 칼럼명으로만 출력가능
    // $row = mysqli_fetch_row($result) : 순서로만 출력 가능.
    while($row = $result ->fetch_assoc()){
        $i ++;
    ?>
    <tr>
        <td><?=$i?></td>
        <td><?=$row['idx']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['age']?></td>
        <td><?=$row['title']?></td>

    </tr>
    <?}?>
</table>

    <form >
        <select name=ch1>
        <option value="name">이름</option>
        <option value="title">제목</option>
        </select>
        <input type= text name=ch2>
    <input type= submit value="검색하기">
    </form>
    
    <a href=list1.php?idx=0&ch1=<?=$ch1?>&<?=$ch2?>>처음</a>&emsp;
    <?if($idx == 0){}else{?>
    <a href=list1.php?idx=<?=$idx-$page_size?>&ch1=<?=$ch1?>&<?=$ch2?>>이전</a>&emsp;
    <?}?>

    <?if($now_page == $totla_page){?>
        <?} else {?>
    <a href=list1.php?idx=<?=$idx+$page_size?>&ch1=<?=$ch1?>&<?=$ch2?>>다음</a>&emsp;
            <?}?>
        </a>
        <?
        $end_page = ($total_page -1) * $page_size;
        ?>
        <a href=list1.php?idx=<?=$end_page?>&ch1=<?=$ch1?>&<?=$ch2?>>마지막</a>&emsp;

</div> 
<br>   
</section>
<footer> 
  HRDKOREA Copyrightⓒ2022 ALL rights resources Development Service of Korea  
</footer> 
</div>
</body>
</html>