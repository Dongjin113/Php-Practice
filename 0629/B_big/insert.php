<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<section> 
<br><br>    
<div align=center> <font size=4> <b> 빅데이터 등록 </b></font>  </div>    
<div align=center>
   <br><br>
   <?
   for($i=0 ; $i <= 53; $i++){
    $name_rand = mt_rand(0,9);
    $name_array = array('하니','똘이','영심이','만수','지효','둘리','하나','애니','민국','앨라');
    $name = $name_array[$name_rand];

    $age = mt_rand(11,25);

    $title_rand = mt_rand(0,4);
    $title_array = array('ASP 중급','ASP 중급','자바초급','자바초급','자바초급');
    $title = $title_array[$title_rand];


    $etc_rand = mt_rand(0,1);
    $etc_array = array('전공학생','비전공학생');
    $etc=$etc_array[$etc_rand];

    $conn = new mysqli("localhost","root","autoset","korea");
    $SQL = "insert into board0628(name,age,title,etc) values('$name','$age','$title','$etc')";
    $conn -> query($SQL);
    echo $i. "&nbsp;";
    $conn -> close();
   }
   
   ?>
</div> 
<br>   
</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>
