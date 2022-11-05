<? include "top.php"?>


<script>
    function ck1(){
        if(f1.sno.value==""){
            alert("학번을 입력해주세요");
            f1.sno.focus();
            return false;
        }else if(f1.name.value.length <=2){
            alert("이름을 3자 이상 입력해주세요");
            f1.name.value="";
            f1.name.focus();
            return false;
        }else{
            alert("성적입력이 완료되었습니다")
        }
    }
</script>


        <section>
            <br><br>
            <div align=center>
            <font size=4 ><b>학생성적 입력하기<b></font>
            </div>
            <div align=center>
                <br>
                <form name=f1 onSubmit="return ck1()"  
                method=post  
                action="form_ok.php">  <!
                -- form 안에 onsubmit은 하나밖에 올수가없음 데이터가 form_ok.php로 넘어감 
                method=get 을안쓰면 default 값이 get이다-->
                <table border=1 >
                    <tr><td>학 번</td><td><input type="text" name="sno" size="9" value></td></tr>
                    <tr><td>성 명</td><td><input type="text" name="name" size="9"></td></tr>
                    <tr><td>국 어</td><td><input type="text" name="kor" size="9"></td></tr>
                    <tr><td>영 어</td><td><input type="text" name="eng" size="9"></td></tr>
                    <tr><td>수 학</td><td><input type="text" name="math" size="9"></td></tr>
                    <tr><td>역 사</td><td><input type="text" name="his" size="9"></td></tr>
                    <tr><td colspan="2" align=center>
                        <input type=submit value="성적저장">  <!-- form 안에 onsubmit은 하나밖에 올수가없음-->
                        <input type=button value="버튼저장" onClick="ck2();"> <!-- 자스안에 버튼을불러올때는 onClick을사용-->
                    </td></tr>
                </table>
                </form>

            </div>
            <br>
        </section>        

        <? include "bottom.php"?>
