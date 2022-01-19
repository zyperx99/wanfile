<?php

include "include/db.php";


$all = "SELECT Rating_bin, COUNT(Rating_bin) AS count FROM rating GROUP BY Rating_bin ORDER BY count";

$result = mysqli_query($con, $all); 



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>REPORT</title>

  <h1 style="font-family: Arial;">BIN RATE</h1>
  <br><br><center>
 	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Grade', 'Rating Number'],

          <?php

          if(mysqli_num_rows($result) > 0)
          {

          	while ($row = mysqli_fetch_array($result)) {
          		# code...
          		echo "['".$row['Rating_bin']."', '".$row['count']."'],";
          	}
          }


          ?>
          
        ]);

        var options = {
          chart: {
            title: 'Bin rate For Cleanliness',
            subtitle: 'Quantity, Grade',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script></center>
 </head>
 <body>
 <div id="columnchart_material" style="width: 500px; height: 500px;"></div>




 </body>
 </html>