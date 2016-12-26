<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <title>GS-Corner</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/blog.css">
    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery.1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/cart.css">
    <script type="text/javascript" src="<?php echo base_url()?>/js/cart.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/jss/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/jss/jquery-ui.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/css/style_manu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style type="text/css">
      .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
      .tg td{font-family:Arial, sans-serif;font-size:14px;padding:20px 20px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;border-top-width:1px;border-bottom-width:1px;}
      .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:20px 20px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;border-top-width:1px;border-bottom-width:1px;}
      .tg .tg-baqh{text-align:center;vertical-align:top}
      .tg .tg-yw4l{vertical-align:top}
      .tg .tg-b7b8{background-color:#f9f9f9;vertical-align:top}
      .tg .tg-dzk6{background-color:#f9f9f9;text-align:center;vertical-align:top}
    </style>
  </head>
  <body>
    <div class="section">
      <br>
      <div class="container">
        <br>
        <ol class="breadcrumb list-inline">
          <li>
            <a href="<?php echo site_url('controller_gs/index')?>" style="color: #FF9900; text-decoration: none;">Home</a>
          </li>
          <li class="active">Order Detail</li>
        </ol>
        <div class="panel panel-default">
        <div class="row">
          <div class="col-md-9">
            <table class="tg" style="undefined;table-layout: fixed; width: 1075px">
              <colgroup>
                <col style="width: 151px">
                <col style="width: 151px">
                <col style="width: 151px">
                <col style="width: 151px">
                <col style="width: 151px">
              </colgroup>
              <tr>
                <th class="tg-baqh">ID Order</th>
                <th class="tg-baqh">ID Order Detail</th>
                <th class="tg-baqh">ID Product</th>
                <th class="tg-baqh">Quantity</th>
                <th class="tg-baqh">Amount Total</th>
              </tr>
                <?php
                    foreach($order_detail->result_array() as $row){
                      echo '<tr>
                      <td class="tg-baqh">'.$row["idOrder"].'</td>
                      <td class="tg-baqh">'.$row["idorderdetail"].'</td>
                      <td class="tg-baqh">'.$row["idProduct"].'</td>
                      <td class="tg-baqh">'.$row["quantity"].'</td>
                      <td class="tg-baqh">'.$row["amount"].'</td>
                      </tr>';
                    }
                ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
