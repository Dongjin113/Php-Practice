<? include "../top.php" ?>

<script>
   function  ck1(){
      if(f1.sno.value==""){
        alert("학번을 입력해주세요");
        f1.sno.focus();
        return  false;
      }else if(f1.sname.value.length <= 2) {
        alert("이름을 3자 이상 입력해주세요");
        f1.sname.value="";
        f1.sname.focus();
        return  false;
      } else {
        alert("성적입력이 완료 되었습니다.!!");
      }
      
   }

</script>    

<section>
<br><br>    
<div align=center> <font size=4> <b>  성적 입력 하기   </b></font>  </div>    
<div align=center>
   <br> 
   <form name=f1 
         onSubmit="return  ck1()"
         method=post      
         action="form_ok.php" >
   <table border=1>
   <tr> <td> 학 번 </td> <td><input  type=text  name=sno> </td> </tr> 
   <tr> <td> 성 명 </td> <td><input  type=text  name=sname> </td> </tr> 
   <tr> <td> 국 어 </td> <td><input  type=text  name=kor > </td> </tr> 
   <tr> <td> 영 어 </td> <td><input  type=text  name=eng> </td> </tr> 
   <tr> <td> 수 학 </td> <td><input  type=text  name=math> </td> </tr> 
   <tr> <td> 역 사 </td> <td><input  type=text  name=hist> </td> </tr> 
   <tr> <td colspan=2 align=center>
        <input  type=submit  value="성적저장"> 
        </td>  </tr> 
   </table>
   </form>
</div>
<br>
</section>

<? include "../bottom.php" ?>
