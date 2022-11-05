<? include $_SERVER["DOCUMENT_ROOT"]."/include/DBConn.php" ?>

<?
for($i=1 ; $i <= 53 ; $i++ ){
//난수발생기
$randomName = mt_rand(0,9); // 배열 난수는 0~9사이 숫자
$randomAge = mt_rand(0,3);
$randomtitle1 = mt_rand(0,4);
$randomtitle2 = mt_rand(0,4);
$randometc1 = mt_rand(0,4);
$randometc2 = mt_rand(0,4);
$randometc3 = mt_rand(0,4);



$name = array('하니','똘이','영심이','만수','지효','둘리','하나','애니','민국','앨라'); //array라는게 배열 
$age = array('11','12','13','14','15');
$title1 = array('ASP','JSP','PHP','JAVA','C#');
$title2 = array('초급','중급','고급','심화','실무');
$etc = array('산','바다','강','하늘','땅');


$name = $name[$randomName];
$age = $age[$randomAge];
$title = $title1[$randomtitle1] .",".$title2[$randomtitle2];
$etc = $etc[$randometc1].",". $etc[$randometc2] .",". $etc[$randometc3] ;


$SQL = "insert into board(name, age, title, etc) values('$name','$age','$title','$etc')";
$conn -> query($SQL);

;}
$conn -> close()
?>
<script>
location.href="list.php"
</script>