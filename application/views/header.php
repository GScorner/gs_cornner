<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <script>
      function window_close()
      {
        window.close()
        window.opener.location.reload();
      }
      </script>
    <style type="text/css">
      body{
            	 background:#202020;
            	 font:bold 12px Arial, Helvetica, sans-serif;
            	 margin:0;
            	 padding:0;
            	 min-width:960px;
            	 color:#bbbbbb;
            }
            .btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

            #mask {
            	display: none;
            	background: #000;
            	position: fixed; left: 0; top: 0;
            	z-index: 10;
            	opacity: 0.8;
            	z-index: 999;
            }

            .login-popup{
              width: 500px;
              height: 180px;
            	display:none;
            	background: #333;
            	padding: 10px;
            	border: 2px solid #ddd;
            	float: left;
            	font-size: 1.2em;
              text-align: center;
              color: #EE7600;
            	position: fixed;
            	top: 50%; left: 50%;
            	z-index: 99999;
            	box-shadow: 0px 0px 20px #999;
            	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
                -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
            	border-radius:3px 3px 3px 3px;
                -moz-border-radius: 3px; /* Firefox */
                -webkit-border-radius: 3px; /* Safari, Chrome */
            }

            img.btn_close {
            	float: right;
            	margin: -28px -28px 0 0;
            }
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
            	$('a.login-window').click(function() {

            		// Getting the variable's value from a link
            		var loginBox = $(this).attr('href');

            		//Fade in the Popup and add close button
            		$(loginBox).fadeIn(300);

            		//Set the center alignment padding + border
            		var popMargTop = ($(loginBox).height() + 24) / 2;
            		var popMargLeft = ($(loginBox).width() + 24) / 2;

            		$(loginBox).css({
            			'margin-top' : -popMargTop,
            			'margin-left' : -popMargLeft
            		});

            		// Add the mask to body
            		$('body').append('<div id="mask"></div>');
            		$('#mask').fadeIn(300);

            		return false;
            	});

            	// When clicking on the button close or the mask layer the popup closed
            	$('a.close, #mask').live('click', function() {
            	  $('#mask , .login-popup').fadeOut(300 , function() {
            		$('#mask').remove();
            	});
            	return false;
            	});
            });
    </script>

    <link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/login-box-modal-dialog-window/index.html">
    <title></title>
  </head>
  <body>
    <div style="margin:auto;width:100%;">
      <div class="blog-masthead">
        <form action="<?php if((isset($_SESSION['username'])?$_SESSION['username']:'')){echo site_url("controller_gs/logout");}else{echo site_url("controller_gs/signin");}?>" method="POST">
        <nav class="blog-nav">
          <a href="<?php echo site_url('controller_gs/index')?>"><img src="<?php echo base_url()?>/img/logo.png"></a>
            <?php
                if((isset($_SESSION['username'])?$_SESSION['username']:'')){
                  echo '<nav class="navbar-right" style="margin-top:15px;">
                              <button class="btn"><img height="20" width="20" src="http://i.imgur.com/z75Zas1.png">'.$_SESSION["fname"].'   '.$_SESSION["lname"].'</button>
                              <button class="btn">SIGN OUT</button>
                          </nav>';
                }else{
                  echo '<nav class="navbar-right" style="margin-top:15px; margin-left:15px;">
                        <a href="#login-box" class="login-window"><button style="color:black; text-align:right;" class="btn"><img height="20" width="20" src="http://i.imgur.com/z75Zas1.png">SIGN IN/SIGN UP  </button></a>
                        <div id="login-box" class="login-popup" style="display:none;">
                        <p>Username :<input type="text" name="username" placeholder="username"/></p><br>
                          <p>Password :<input type="password" name="password" placeholder="password"/></p><br>
                          <p class="btn"><a style ="color: #FF9900"; href="'.site_url('controller_gs/view_register').'">SIGN UP</a></p><br>
                          <button class="btn"><img height="20" width="20" src="http://i.imgur.com/z75Zas1.png">SIGN IN</button>
                      </div>
                  </nav>';
                }
            ?>
        </nav>
        </form>
        <?php
        if((isset($_SESSION['username'])?$_SESSION['username']:'')){
          if($_SESSION["idtype_user"] == 'u001'){
        echo '<form action="'.site_url('controller_gs/order_all').'">
                <nav style="">
                      <button class="btn">View Order</button>
                </nav>
        </form>'; }}
        ?>
      </div>
  </div>
  </body>
</html>
