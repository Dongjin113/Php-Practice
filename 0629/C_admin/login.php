<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php"?>
<section> 
<br><br>    
<div align=center> <font size=4> <b> 로그인 </b></font>  </div>    
<div align=center>
   <br>
   <form action="login_ok.php">
   <table border=1 width=300 height=150> 
   <tr><td>아이디</td><td><input type=text name=id></td></tr>
   <tr><td>암호</td><td><input type=text name=pwd></td></tr>
   <tr><td colspan=2 align=center><input type=submit value="로그인"></td></tr>

</table>
   </form>
</div> 
<br>   
</section>

<?include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php"?>