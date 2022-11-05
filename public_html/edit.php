<? include "../top.php" ?>

<?
$servername = "localhost" ;
$username = "root";
$password ="autoset";
$dbname="korea";

$conn = new mysqli($servername, $username, $password, $dbname ); 
?>

<?php
 $sno = $_REQUEST['sno'];

   $SQL = "select  *  from examtbl where sno = $sno " ;
   $result = $conn -> query($SQL);
   $row = $result -> fetch_assoc();
   $sno=$row['sno']; 
   $sname=$row['sname']; 
   $kor=$row['kor']; 
   $eng=$row['eng']; 
   $math=$row['math']; 
   $hist=$row['hist']; 
?>

<section>
<br><br>    
<div align=center> <font size=4> <b>  성적 수정 하기   </b></font>  </div>    
<div align=center>
   <br> 
   <form name=f1 
         onSubmit="return  ck1()"
         method=post      
         action="update_ok.php" >
   <table border=1>
   <tr> <td> 학 번 </td> <td><input  type=text  name=sno   value="<?=$sno?>"   > </td> </tr> 
   <tr> <td> 성 명 </td> <td><input  type=text  name=sname value="<?=$sname?>" > </td> </tr> 
   <tr> <td> 국 어 </td> <td><input  type=text  name=kor   value="<?=$kor?>"  > </td> </tr> 
   <tr> <td> 영 어 </td> <td><input  type=text  name=eng   value="<?=$eng?>"  > </td> </tr> 
   <tr> <td> 수 학 </td> <td><input  type=text  name=math  value="<?=$math?>" > </td> </tr> 
   <tr> <td> 역 사 </td> <td><input  type=text  name=hist  value="<?=$hist?>" > </td> </tr> 
   <tr> <td colspan=2 align=center>
        <input  type=submit  value="성적수정"> 
        </td>  </tr> 
   </table>
   </form>
</div>
<br>
</section>

<? include "../bottom.php" ?>
