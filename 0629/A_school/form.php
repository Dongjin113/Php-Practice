<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<?
    $conn = new mysqli("localhost","root","autoset","korea");
    
?>
<style>
    table{
        text-align:center;
    }
    </style>

    <script>
        function ck1(){
            
        }
    </script>
<section> 
<br>
<div align=center> <h2>학생등록</h2> </div>

<div align=center >
<table border=1>
    <form name=f1 action="form_ok.php" onSubmit="return ck1()" >
    <tr><td width= 100>학번</td><td><input type=text name=sno></td></tr>
    <tr><td>이름</td><td><input type=text name=sname></td></tr>
    <tr><td>국어</td><td><input type=text name=kor></td></tr>
    <tr><td>영어</td><td><input type=text name=eng></td></tr>
    <tr><td>수학</td><td><input type=text name=math></td></tr>
    <tr><td>역사</td><td><input type=text name=hist></td></tr>
    <tr><td colspan=2 align=center><input type=submit value="저 장 하 기"></td></tr>

    </form>
</table>
<br>



</div>

</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>


