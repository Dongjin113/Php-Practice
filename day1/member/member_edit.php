<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? include $_SERVER["DOCUMENT_ROOT"]."/include/DBConn.php" ?>
<?
  $sno = $_GET['sno']; 
  $SQL = "select  *  from  member where sno='$sno'";
  $result = $conn -> query($SQL);
  $row = $result ->fetch_assoc();

  $sno = $row['sno'];
  $addr = $row['addr'];
  $img = $row['img'];

?>

<style>
 table{
   width: 400px ;
   height:250px ; 
 } 

 td{
   text-align:center; 
 }
</style>

<script>
  function ck1(){
    if (f1.sno.value == "") {
      alert("학번을 입력해 주세요");
      f1.sno.focus();
      return false;
    }else{
        alert("학생 성적이 입력 되었습니다.");  
    }
  }

  function ck2(sno){
    alert("확인"+ sno)
    location.href="member_delete.php?sno="+sno;
    }
  
  
</script>    

<section> 
<br><br>
<div id=section1>   
 학생 정보 수정 하기
</div>
<br>
<div align=center>
<form name=f1 action="member_update.php"  onSubmit="return ck1($sno)"
      method="post"
      enctype="multipart/form-data">

    
<table border=1>
<input  type=hidden  name=oldimg value=<?=$img ?>  >  
<tr><td colspan=2 align=center><img src=<?=$path?>/img/<?=$img?> width=360  height=150 ></td></tr>
<tr><td width=100>학번</td><td><input  type=text  name=sno  value="<?=$sno?>" ></td></tr>
<tr><td>주소</td><td><input  type=text  name=addr  value="<?=$addr?>"></td></tr>
<tr><td>사진</td><td  align=center><input  type=file  name=img ></td></tr>

<tr><td colspan=2 align=center><input  type=submit  value="수정하기" ></td></tr>
<input type=submit value="수정하기">
<input type=button value="삭제하기" onClick="ck2('<?=$sno?>')">

</table>
</form> 
</div>  
<br>                 
</section>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>