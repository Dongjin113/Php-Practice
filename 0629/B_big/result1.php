<? include  $_SERVER["DOCUMENT_ROOT"]."/D_include/top.php" ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">


        <section>
            <div align="center">
            <br>
            <div class="chart-div" align=center >
            <canvas id="pieChartCanvas" width="400px" height="300px"></canvas>
            </div>

                <br>
                <h2> 전공학생 과 비전공학생 비율 </a> </h2>

                <?php
                    $servername="localhost";
                    $username="root";
                    $password="autoset";
                    $dbname="korea";


                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT count(title) as tc1 FROM board0628 where title='자바초급'";
                    $result = $conn->query($sql);
                    $row1 = $result->fetch_assoc();

                    $sql = "SELECT count(title) as tc2 FROM board0628 where title='ASP 중급'";
                    $result = $conn->query($sql);
                    $row2 = $result->fetch_assoc();

                    $sql = "SELECT count(title) as tc3 FROM board0628 where title='C#'";
                    $result = $conn->query($sql);
                    $row3 = $result->fetch_assoc();

                    $sql = "SELECT count(title) as tc4 FROM board0628 where title='ASP'";
                    $result = $conn->query($sql);
                    $row4 = $result->fetch_assoc();

                    $sql = "SELECT count(title) as tc5 FROM board0628 where title='JSP'";
                    $result = $conn->query($sql);
                    $row5 = $result->fetch_assoc();

                    $sql = "SELECT count(title) as tc6 FROM board0628 where title='JAVA'";
                    $result = $conn->query($sql);
                    $row6 = $result->fetch_assoc();

                    $p1 = $row1['tc1'];
                    $p2 = $row2['tc2'];
                    $p3 = $row1['tc3'];
                    $p4 = $row2['tc4'];            
                    $p5 = $row2['tc5'];
                    $p6 = $row2['tc6'];


                         
                    $conn->close();
                ?>

            </div>
        </section>


        <script>
					window.onload = function () {
						pieChartDraw();
					}
					 var data_tbl = {
						  table: 'listtable'
					   };

					let pieChartData = {
						labels: ['자바초급', 'ASP 중급','C#', 'ASP','JSP', 'JAVA'],
						datasets: [{
							data: [<?=$p1?>,<?=$p2?>,<?=$p3?>,<?=$p4?>,<?=$p5?>,<?=$p6?>],
							backgroundColor: ['rgb(255, 255, 250)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(153, 102, 255)']
						}] 
					};

					let pieChartDraw = function () {
						let ctx = document.getElementById('pieChartCanvas').getContext('2d');
						
						window.pieChart = new Chart(ctx, {
							type: 'pie',
							data: pieChartData,
							options: {
								responsive: false
							}
						});
					};

        </script>
<? include $_SERVER["DOCUMENT_ROOT"]."/D_include/bottom.php" ?>
