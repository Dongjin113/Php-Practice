<? include  $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php" ?>

<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script> 
<script src="http://code.highcharts.com/modules/data.js"></script>     

<section>
<br>
<div align="center">

<?
$servername = "localhost" ;
$username = "root";
$password ="autoset";
$dbname="korea";

$conn = new mysqli($servername, $username, $password, $dbname ); 
$SQL = "select sname, kor, eng , math, hist, round((kor+eng+math+hist)/4,0) as avgT from examtbl order by sno asc " ;
$result = $conn -> query($SQL);

?>
 <div id=body1>
	 <div id = hidden >
	 <!-- 표는 숨겨준다.!!style="display:none"  -->
		 <table border=1  width=550  id='datatable' >
		
		   <tr><td> 학생 </td> <td> 국어 </td>  <td> 영어 </td>   <td> 수학 </td> <td> 역사 </td></tr> 
           <?  
           while( $row = $result -> fetch_assoc()) {
		   ?>
		   <tr>
            <td> <?=$row["sname"] ?>   </td> 
            <td> <?=$row["kor"] ?> </td>  
            <td> <?=$row["eng"] ?> </td>  
            <td> <?=$row["math"] ?> </td>  
            <td> <?=$row["hist"] ?> </td>  



        </tr>
		
		   <? 
		     }
		   ?>
		</table>
	</div>
</div>
<br>
<div id="container" style="width: 700px; height: 430px; margin: 0 auto;"></div>
<script language="JavaScript">
$(document).ready(function() { 
   var data = {
      table: 'datatable'
   };
   var chart = {
      type: 'column'
   };
   var title = {
      text: '2022년 학생 기말고사 성적(학번 오름차순 정렬)'   
   };      
   var yAxis = {
      allowDecimals: false,
      title: {
         text: '100점 만점'
      }
   };
   var tooltip = {
      formatter: function () {
         return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name.toLowerCase();
      }
   };
   var credits = {
      enabled: false
   };  
      
   var json = {};   
   json.chart = chart; 
   json.title = title; 
   json.data = data;
   json.yAxis = yAxis;
   json.credits = credits;  
   json.tooltip = tooltip;  
   $('#container').highcharts(json);
});
</script>
</div>
<br>
</section>

<? include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php" ?>