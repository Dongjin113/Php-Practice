<? include $_SERVER["DOCUMENT_ROOT"]."/include/top.php" ?>
<? 
  $sno=$_GET['sno']; //학번에서 value 값으로 받으면 기본값으로들어감
?>


<style>
 table{
   width: 500px ;
   height:250px ; 
 } 

 .td1{
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
</script>    

<section> 
<br><br>
<div id=section1>   
 학생 정보 입력
</div>
<br>
<div align=center>
<form name=f1 action="member_ok.php"  onSubmit="return ck1()"
      method="post"
      enctype="multipart/form-data">
<table border=1>
<tr><td width=100 class="td1">학번</td><td><input  type=text  name=sno value="<?=$row['sno']?>"></td></tr>
<tr><td class="td1">주소</td><td>
<input type="text" name="postcode" id="sample4_postcode" placeholder="우편번호"> <!--name  지정후 값을 받아서변수지정-->
<input type="button" onclick="sample4_execDaumPostcode()" value="우편번호 찾기"><br>
<input type="text" name="roadAddress" id="sample4_roadAddress" placeholder="도로명주소">
<input type="hidden" id="sample4_jibunAddress" placeholder="지번주소">
<span id="guide" style="color:#999;display:none"></span>
<input type="text" name="detailAddress" id="sample4_detailAddress" placeholder="상세주소">
<input type="text" name="extraAddress" id="sample4_extraAddress" placeholder="참고항목"></td></tr>
<tr><td class="td1">사진</td><td  align=center><input  type=file  name=img ></td></tr>

<tr><td colspan=2 align=center><input  type=submit  value="저 장 하 기" ></td></tr>
</table>
</form> 
</div>                   
</section>


<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
    function sample4_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var roadAddr = data.roadAddress; // 도로명 주소 변수
                var extraRoadAddr = ''; // 참고 항목 변수

                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraRoadAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if(data.buildingName !== '' && data.apartment === 'Y'){
                   extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if(extraRoadAddr !== ''){
                    extraRoadAddr = ' (' + extraRoadAddr + ')';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample4_postcode').value = data.zonecode;
                document.getElementById("sample4_roadAddress").value = roadAddr;
                document.getElementById("sample4_jibunAddress").value = data.jibunAddress;
                
                // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
                if(roadAddr !== ''){
                    document.getElementById("sample4_extraAddress").value = extraRoadAddr;
                } else {
                    document.getElementById("sample4_extraAddress").value = '';
                }

                var guideTextBox = document.getElementById("guide");
                // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
                if(data.autoRoadAddress) {
                    var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                    guideTextBox.innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';
                    guideTextBox.style.display = 'block';

                } else if(data.autoJibunAddress) {
                    var expJibunAddr = data.autoJibunAddress;
                    guideTextBox.innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';
                    guideTextBox.style.display = 'block';
                } else {
                    guideTextBox.innerHTML = '';
                    guideTextBox.style.display = 'none';
                }
            }
        }).open();
    }
</script>

<? include $_SERVER["DOCUMENT_ROOT"]."/include/bottom.php" ?>