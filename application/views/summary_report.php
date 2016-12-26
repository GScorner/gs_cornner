<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <title>GS-Corner</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/blog.css">
    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery.1.11.1.min.js"></script>
    <script type=" text/javascript" src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/cart.css">
    <script type="text/javascript" src="<?php echo base_url()?>/js/cart.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/jss/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/jss/jquery-ui.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/css/bs_leftnavi.css">
    <script src="<?php echo base_url()?>/js/bs_leftnavi.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/css/style_manu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
      $(function () {
          $('#container').highcharts({
              chart: {
                  type: 'column'
              },
              title: {
                  text: 'Report Summary per Day'
              },
              subtitle: {
                  text: 'Order by :<?php foreach($order_date->result_array() as $row2){echo $row2["dateOrdate"];}?>'
              },
              xAxis: {
                  categories: [
                      'Jan'
                  ],
                  crosshair: true
              },
              yAxis: {
                  min: 0,
                  title: {
                      text: 'all price(baht)'
                  }
              },
              tooltip: {
                  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                      '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                  footerFormat: '</table>',
                  shared: true,
                  useHTML: true
              },
              plotOptions: {
                  column: {
                      pointPadding: 0.2,
                      borderWidth: 0
                  }
              },
              series: [{
                  name: 'Tokyo',
                  data: [49.9]

              }, {
                  name: 'New York',
                  data: [83.6]

              }, {
                  name: 'London',
                  data: [48.9]

              }, {
                  name: 'Berlin',
                  data: [42.4]

              }]
          });
      });
    </script>
  </head>
  <body>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <form action="<?php echo site_url("controller_gs/go_chart")?>" method="post">
        <select>
        <?php
          foreach($order_date->result_array() as $row){
            echo '<option name="idorder" value="'.$row["idOrder"].'">'.$row["dateOrdate"].'</option>';
          }
        ?>
        </select>
       <button class="btn" type="submit">go chart</button>
    </form>
   </body>
 </html>
