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
      .tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;}
      .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;border-top-width:1px;border-bottom-width:1px;}
      .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background-color:#f38630;border-top-width:1px;border-bottom-width:1px;}
      .tg .tg-gpad{background-color:#fff6ea;color:#000000;vertical-align:top}
      .tg .tg-slju{background-color:#ffce93;color:#000000;text-align:center;vertical-align:top}
      .tg .tg-50c1{font-size:11px;background-color:#ffce93;color:#000000;text-align:center;vertical-align:top}
      </style>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#total").hide();
          $("#quan").hide();
        })
      </script>
      <script type="text/javascript">

        function link($id) {
          var quan = document.getElementById($id).value;
          location.href = "editadd2cart?quan="+quan+"&id="+$id;
        }
    </script>
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
          <li class="active">ตระกร้าสินค้า</li>
        </ol>
        <div class="panel panel-default">
        <div class="row">
          <div class="col-md-7">
          <table class="tg" style="undefined;table-layout: fixed; width: 100%;">
            <colgroup>
              <col style="width: 150px">
              <col style="width: 200px">
              <col style="width: 100px">
              <col style="width: 100px">
            </colgroup>
            <tr>
              <th colspan="2">รายละเอียดสินค้า</th>
              <th>ราคาสินค้า</th>
              <th>จำนวน</th>
              <th></th>
            </tr>
            <form  method="post" action="<?php if((isset($_SESSION["username"])?$_SESSION["username"]:'')){echo site_url('controller_gs/order');}else{echo site_url('controller_gs/alert');}?>">
            <?php
              $i=1;
              if((isset($_SESSION['pro_id'])?$_SESSION['pro_id']:'')){
                foreach($_SESSION['pro_id'] as $key){
                  echo '<tr>
                            <td class="tg-yw4l"><img height="100" width="150" src="'.base_url().''.$_SESSION['pro_pic'][$key].'"></td>
                            <td class="tg-yw4l">'.$_SESSION['pro_name'][$key].'</td>
                            <td align="center" class="tg-yw4l">ราคา :'.$_SESSION['pro_price'][$key].'</td>
                            <td align="center" class="tg-yw4l">จำนวน :
                            <select id="'.$_SESSION['pro_id'][$key].'" name="" require="require" onchange="link(id)">';
                            foreach($all->result_array() as $row){
                              if($_SESSION['pro_id'][$key] == $row["idProduct"]){
                                for($i=1;$i<=$row["quantityProduct"];$i++){
                                  if($i == $_SESSION['pro_quantity'][$key]){
                                    echo '<option selected="'.$_SESSION['pro_quantity'][$key].'" value="'.$_SESSION['pro_id'][$key].'">'.$i.'</option>';
                                  }
                                  else{
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                  }
                                }
                              }
                            }
                      echo  '</select>
                            </td>
                            <td><a href="'.site_url("controller_gs/del_cart?id=".$_SESSION['pro_id'][$key]).'" style=" font-size:13px;bold;color: black;">ลบ</a></td>
                        </tr>';
                        $i++;}
                      }
                  ?>
          </table>
          </div>
          <div class="col-md-5">
          <table class="tg" style="width: 100%;">
            <tr>
              <td class="tg-yw4l">สรุปการสั่งซื้อ</td>
            </tr>
            <tr>
              <td class="tg-yw4l">ราคาสุทธิ      :</td>
              <td class="tg-yw4l">
                <?php
                  if((isset($_SESSION['pro_id'])?$_SESSION['pro_id']:'')){
                    $total = 0;
                    foreach($_SESSION['pro_id'] as $key1){
                      $total = $total+$_SESSION['pro_total'][$key1];
                    }
                    echo $total."  บาท".'<input id="total" name="total" value="'.$total.'"></p>';
                  }
                  else{
                    echo "0";
                  }
                ?>
              </td>
              <tr>
            <td class="tg-yw4l">จำนวนสินค้า      :</td>
            <td class="tg-yw4l">
              <?php
              $i=0;
              if((isset($_SESSION['pro_id'])?$_SESSION['pro_id']:'')){
                  foreach($_SESSION['pro_id'] as $key){
                        $i=$_SESSION['pro_amount'][$key]+$i;
                      }
                      echo $i.'       '.'ชิ้น';
                    ?>
                <?php }
                else {
                  echo $i.'      '.'ชิ้น';
                }
                echo '<input id="quan" name="quantity" value="'.$i.'"></p>';
                  ?>
            </td>
          </tr>
          <tr>
      </tr>
        </table>
          <div class="col-sm-offset-4"><button style="color:White; background-color:#EE7600;"class="btn">ดำเนินการชำระเงิน</button></div>
        </form>
      </div>
        </div>
        <form id="myform" method="post" action="<?php echo site_url('controller_gs/del_all_cart')?>">
          <button class="btn btn-3">ลบรายการทั้งหมด</button>
        </form>
      </div>
    </div>
    </div>
</body>
</html>
