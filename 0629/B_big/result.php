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

$sql = "SELECT count(title) as tc1 FROM board0628 where title='자바초급'";
$result = $conn->query($sql);
$row1 = $result->fetch_assoc();


$sql = "SELECT count(title) as tc2 FROM board0628 where title='ASP 중급'";
$result = $conn->query($sql);
$row2 = $result->fetch_assoc();

$sql = "SELECT count(title) as tc3 FROM board0628 where title='C#'";
$result = $conn->query($sql);
$row3 = $result->fetch_assoc();

$sql = "SELECT count(title) as tc4 FROM board0628 where title='ASP'";
$result = $conn->query($sql);
$row4 = $result->fetch_assoc();

$sql = "SELECT count(title) as tc5 FROM board0628 where title='JSP'";
$result = $conn->query($sql);
$row5 = $result->fetch_assoc();

$sql = "SELECT count(title) as tc6 FROM board0628 where title='JAVA'";
$result = $conn->query($sql);
$row6 = $result->fetch_assoc();

?>
 <div id=body1>
	 <div id = hidden style="display:none">
	 <!-- 표는 숨겨준다.!!style="display:none"  -->
		 <table border=1  width=500  id='datatable' >
		
		    <tr>
            <td> 자바초급 </td>
            <td> ASP 중급 </td> 
            <td> C# </td>   
            <td> ASP </td> 
            <td> JSP </td>
            <td> JAVA </td>

            </tr> 

		   <tr>
            <tr><td>자바초급</td><td> <?=$row1["tc1"] ?> </td> </tr>
            <tr> <td>ASP중급</td><td> <?=$row2["tc2"] ?> </td>  </tr>
            <tr> <td>C#</td><td> <?=$row3["tc3"] ?> </td>  </tr>
            <tr>   <td>ASP</td> <td> <?=$row4["tc4"] ?> </td>  </tr>
            <tr>  <td>JSP</td><td> <?=$row5["tc5"] ?> </td>  </tr>
            <tr> <td>JAVA</td><td> <?=$row6["tc6"] ?> </td>  </tr>




        </tr>
		
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
      text: '과목별수강생수'   
   };      
   var yAxis = {
      allowDecimals: false,
      title: {
         text: '학생수'
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