<? include  $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php" ?>

<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script> 
<script src="http://code.highcharts.com/modules/data.js"></script>     

<section>
<br>
<div align="center">

<?
    $conn = new mysqli("localhost","root","autoset","korea");
    
    $SQL = "select m1.custno, custname, grade, sum(price) as price from money_tbl_02 m1 join member_tbl_02 m2 on m1.custno = m2.custno group by m1.custno, custname, grade order by sum(price) desc";
    $result = $conn -> query($SQL);

?>
 <div id=body1>
	 <div id = hidden >
	 <!-- 표는 숨겨준다.!!style="display:none"  -->
		 <table border=1  width=550  id='datatable' >
		
		   <tr><td> 이름 </td> <td> 매출 </td></tr> 
           <?  
           while( $row = $result -> fetch_assoc()) {
		   ?>
		   <tr>
            <td> <?=$row["custname"] ?>   </td> 
            <td> <?=$row["price"] ?> </td>
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
      text: '매출조회'   
   };      
   var yAxis = {
      allowDecimals: false,
      title: {
         text: '매출액'
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