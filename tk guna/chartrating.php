<?php
  include "dbconnect.php";
  include 'navseller.php'
 
?>
<html>

  <head>
    <h1 style="font-family: Arial;">AVERAGE RATING STUDENTS FOR FOOD</h1>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Food Menu', 'Rating'],
          <?php
           $all = "SELECT AVG(CAST(St_rating AS DECIMAL(4,2))) AS avg , M_name FROM rating GROUP BY M_name ORDER BY avg";

             $result = mysqli_query($conn, $all);
              if(mysqli_num_rows($result) > 0)
              {

                 while ($row = mysqli_fetch_array($result)) 
                 {
                  
                   echo "['".$row["M_name"]."', '".number_format($row['avg'],2)."'],";
                  }
              }?>
        ]);

        var options = {
          title: 'Rating score',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Rating score',
                   subtitle: 'Student rating for each food in Average' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Rating'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>

  </body>
</html>








<!-- <?php
// include "dbconnect.php";

// $all = "SELECT * FROM food_order";

// $result = mysqli_query($conn, $all); 

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>REPORT</title>
 	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Menu Name', 'Sales In Quantity'],

          <?php

          // if(mysqli_num_rows($result) > 0)
          // {

          // 	while ($row = mysqli_fetch_array($result)) {
          // 		# code...
          // 		echo "['".$row['M_code']."', '".$row['order_qty']."'],";
          // 	}
          // }


          ?>
          
        ]);

        var options = {
          chart: {
            title: 'Cafeteria Utem Sales Food',
            subtitle: 'Sales, Menu',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
 </head>
 <body>
 <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
 </body>
 </html> -->