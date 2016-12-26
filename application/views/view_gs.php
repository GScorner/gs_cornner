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

        function type($type){

          location.href="index?type="+$type;
        }
        function cate($cate){

          location.href="index?cate="+$cate;
        }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="blog-sidebar col-md-12">
        <div class="blog-header col-md-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active">
                      <img class="slide-image" src="<?php echo base_url()?>/img/1.jpg">
                    </div>
                    <?php
                        foreach($all->result_array() as $row3){
                          echo '<div class="item">
                                <img class="slide-image" src="'.base_url().''.$row3["picture_list"].'">
                      </div>';
                  }
                  ?>
                  </div>
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                  <span class="glyphicon glyphicon-chevron-left"></span>
                              </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                  <span class="glyphicon glyphicon-chevron-right"></span>
                              </a>
                </div>
        </div>
      </div>
      <!-- /.blog-sidebar -->
      <div class="blog-sidebar col-sm-3 text-left">
        <ul class="mainmenu">
          <?php
              foreach($type->result_array() as $row){
                  if($row["activeflag"]!='0'){
                    echo '<li style="color:white;"><p style="font-size:20px; text-align:center;"class="btn btn-3"><span id="'.$row["idtype"].'" onclick="type(id)">'.$row["nameType"].'</span></p></li>
                      <ul class="submenu" draggable="true">
                        <div class="expand-triangle"></div>';
                        foreach($cate->result_array() as $row2){
                          if($row2["activeflag"]!='0'){
                            if($row["idtype"] == $row2["idtype"]){
                              echo '<li><span id="'.$row2["idcategory"].'" onclick="cate(id)">'.$row2["nameCategory"].'</span></li>';
                            }
                          }
                        }
                  echo '</ul>';
                  }
              }
          ?>
        </ul>
        <p style="color:#EE7600; text-align:center">------------------------------------</p>
        <form action="<?php echo site_url("controller_gs/search_name")?>" method="post">
        <img class="slide-image" src="https://askinow.com/images/search0.png"><input size="23" type="name" class="form" name="name_search" placeholder="ค้นหาชื่อสินค้า" value="<?php echo $name?>">
        <div class="col-sm-offset-5">
          <button class="btn" type="submit">ค้นหา</button>
        </div>
      </form>
        <p style="color:#EE7600; text-align:center">------------------------------------</p>
        <?php foreach($maxmin->result_array() as $mm){
            $max = $mm["max"];
            $min = $mm["min"];
          }?>
        <form oninput="level.value = flevel.valueAsNumber" action="<?php echo site_url("controller_gs/search_lavel")?>" method="post">
          <p style="font-size:15px; color:white; text-align:center">ค้นหาตามงบประมาณ</p>
            <input name="flevel" id="flying" type="range" <?php echo  'min="'.$min.'" max="'.$max.'" value="'.$max.'"'; ?>>
            <output style="font-size:15px; color:white; text-align:center" for="flying" name="level"><?php echo $max; ?></output>
            <div class="col-sm-offset-5">
              <button class="btn" type="submit">ค้นหา</button>
				 		</div>
              <p style="color:#EE7600; text-align:center">-----------------------------------</p>
            </form>
        <script src="<?php echo base_url()?>/js/script.js"></script>
        <script src="<?php echo base_url()?>/js/retina.min.js"></script>
      </div>
      <div class="col-sm-9 blog-main">
           <div class="panel panel-default">
             <div class="panel-body">
               <div class="row">
                 <?php
                     foreach($all->result_array() as $row3){
                      echo '<div class="col-sm-6 col-md-4">
                              <div class="thumbnail" style="height: 370px!important;">
                              <img style="height: 200px!important;" id="0" src="'.base_url().''.$row3["picture_box"].'" alt="'.$row3["nameProduct"].'">
                                <div class="caption">
                                  <a href="'.site_url("controller_gs/show_detail?id=".$row3['idProduct']).'" style=" font-size:13px;bold;color: black;">'.$row3["nameProduct"].'</a>
                                  <p style="font-size: 13px;font-weight: bold;color: red;">ราคา :'.$row3["price"].'บาท</p>
                                  <p style="font-size: 13px;">หมวดหมู่ :'.$row3["nameCategory"].'</p>
                                  <form id="myform" method="post" action="'.site_url('controller_gs/add2cart').'">
                                  <input type="hidden" name="pro_id" value="'.$row3['idProduct'].'">
                                  <input type="hidden" name="pro_price" value="'.$row3['price'].'">
                                  <input type="hidden" name="pro_name" value="'.$row3['nameProduct'].'">
                                  <input type="hidden" name="pro_pic" value="'.$row3["picture_box"].'">
                                  <div style="text-align:center;height: 50px!important;">
                                  <select id="browsers" name="pro_quantity" require="require">';
                                  for($i=1;$i<=$row3["quantityProduct"];$i++){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                  }
                                    echo '</select>
                                  <input type="hidden" name="add_to_cart"><button class="add-to-cart btn" type="submit" style="background-color:#EE7600;"><img src="http://i.imgur.com/UUjQp3Z.png">Add to cart</button></div>
                                </form>
                                </div>
                              </div>
                            </div>';
                        } ?>
               </div>
             </div>
           </div>
         </div>
         <!-- /.blog-main -->
       </div>
       <!-- /.row -->
       <a href="<?php echo site_url('controller_gs/view_product') ?>" class="btn btn-3">
       <div id="cart">
           <section>
             <img src="<?php echo base_url()?>/img/cart1.png">
             <span class="badge">
         <?php
         $i=0;
         if((isset($_SESSION['pro_id'])?$_SESSION['pro_id']:'')){
             foreach($_SESSION['pro_id'] as $key){
                   $i=$_SESSION['pro_amount'][$key]+$i;
                 }
                 echo $i;
               ?>
           <?php }
           else {
             echo $i;
           }?>
         </span>
       </section>
     </div>
     </a>
     </li>
     </ul>
     </div>
   </body>
 </html>
