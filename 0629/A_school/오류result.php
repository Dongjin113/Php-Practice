<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>

  <section>
<br>
<div align="center">

<html>

  <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://code.highcharts.com/highcharts.js"></script> 
  <script src="http://code.highcharts.com/modules/data.js"></script>     

<body>
<section>
<div align=center>

<?
$conn = new mysqli($servername, $username, $password, $dbname ); 

$SQL = "select sname, round((kor+eng+math+hist)/4,1) as avgT from  examtbl " ; 

$result = $conn -> query($SQL);

?>

 <div id=body1>
	 <div id = hidden style="display:none"> 
	 <!-- 표는 숨겨준다.!!  -->
		 <table border=1  width=550  id='datatable' >
		
		   <tr><td>학생 </td>  <td> 성적 </td> </tr>  
		   <?
           while( $row = $result -> fetch_assoc()){
           ?>
		   
		   <tr><td> <?=$row['sname']?>   </td> <td> <?=$row['avgT']?> </td>  </tr>
		
		   <?}
           ?>
		</table>
	</div>
<br>

</div>
<br><br>
<div id="container" style="width: 600px; height: 500px; margin: 0 auto;"></div>
<script language="JavaScript">
$(document).ready(function() { 
   var data = {
      table: 'datatable'
   };
   var chart = {
      type: 'column'
   };
   var title = {
      text: '학생성적목록보기'   
   };      
   var yAxis = {
      allowDecimals: false,
      title: {
         text: 'Vote Number'
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
</section>
</body>
</html>

</div>
</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>


