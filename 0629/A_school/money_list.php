<? include  $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php" ?>

<?
$servername = "localhost" ;
$username = "root";
$password ="autoset";
$dbname="korea";

$conn = new mysqli($servername, $username, $password, $dbname ); 
?>

<?
   $SQL = "select  m1.custno k1, custname k2 , grade k3, sum(price) k4
   from member_tbl_02 m1 join  money_tbl_02 m2
   on m1.custno = m2.custno
   group  by  m1.custno, custname, grade
   order by sum(price) desc " ;
   $result  = $conn -> query($SQL);
   $result2 = $conn -> query($SQL);
?>

<style>
#tr1{
    background-color:#ffaaaa;
}
#tr2{
    background-color:#ffccaa;
}
tr{
    text-align:center;
}
</style>  

<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script> 
<script src="http://code.highcharts.com/modules/data.js"></script>     

<section>
<br><br>    
<div align=center> <font size=5> <b> 회원 매출 조회  </b></font>  </div>    
<div align=center>
   <br> 
 
   <table border=1  width=400  height=150>
     <tr> 
     <th> 회원번호 </th> <th> 회원성명 </th>
     <th> 고객등급 </th>  <th> 매출 </th>
 
     </tr> 
     
     <? 
     while( $row = $result -> fetch_assoc()) {
        if ($row['k3'] == "A") {
            $grade = "VIP" ;
        }else if ($row['k3'] == "B") {
            $grade = "일반" ;
        }else if ($row['k3'] == "C") {
            $grade = "직원" ;
        }

     ?>

     <tr  >

     <td> <?=$row['k1']?> </td>
     <td><?=$row['k2']?> </td> 
     <td><?=$grade?> </td>
     <td><?=number_format($row['k4'])?> </td>
     </tr>

     <? } ?>
    </table> 

    <div id=body1>
	 <div id = hidden style="display:none" > 
	 <!-- 표는 숨겨준다.!!  -->
		 <table border=1  width=400  id='datatable' >
		
		    <tr><td> 회원성명 </td>  <td> 회원성명 </td></tr> 
            <? 
            while( $row2 = $result2 -> fetch_assoc()) {
            ?>

		    <tr><td> <?=$row2['k2']?>  </td>   <td><?=$row2['k4']?> </td> </tr>
           <? } ?>
		</table>
	</div>
</div>
<br>
<div id="container" style="width: 400px; height: 230px; margin: 0 auto;"></div>
<script language="JavaScript">
$(document).ready(function() { 
   var data = {
      table: 'datatable'
   };
   var chart = {
      type: 'column'
   };
   var title = {
      text: '회원매출조회'   
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
</section>
<? include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php" ?>