<?php 

	include('../includes/functions.php');

	include('../includes/dbinfo.php');

	if (!isAdmin() && !isMOD() && !isSTREAMER() && !isUser() && !isDONATOR() && !isPREMIUM() && !isLEGEND() && !isMEGA() && !isReseller()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
        
$foiehfoieh = $_SESSION['user']['username'];

    $query = "SELECT * FROM profile WHERE username='$foiehfoieh'";

			$results = mysqli_query($dbconnect, $query);
			if ($results->num_rows > 0) {
    			// output data of each row
    			while($row = $results->fetch_assoc()) {
	

        if ($row['user_type'] == "superadmin") {
        	$rank = "ADMIN";        
        } else if ($row['user_type'] == "admin") {
        	$rank = "ADMIN";        
        } else if ($row['user_type'] == "mod") {
        	$rank = "MOD";        
        } else if ($row['user_type'] == "streamer") {
        	$rank = "STREAMER";    
        } else if ($row['isMonthSupporter'] == 1) {
        	$rank = "MEMBERSHIP SUPPORTER";
        } else if ($row['isTwitchSub'] == 1) {
        	$rank = "Twitch Subscriber";
        } else if ($row['isNitro'] == 1) {
        	$rank = "NITRO SUPPORTER";          
        } else if ($row['isMega'] == 1) {
        	$rank = "MEGA";        
        } else if ($row['isLegend'] == 1) {
        	$rank = "LEGEND";        
        } else if ($row['isPremium'] == 1) {
        	$rank = "PREMIUM";        
        } else if ($row['isDonator'] == 1) {
        	$rank = "DONATOR";        
        } else {
        	$rank = "USER";        
        }

    $discorduserid = $_SESSION['user']['userid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AlloyXuast - (<?php echo $rank; ?>) Dashboard</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="https://restream.chisdealhd.co.uk/css/style.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,800" rel="stylesheet" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <style>
            @import url(https://fonts.googleapis.com/css?family=Source + Sans + Pro:400, 900);

            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;

                border-top: none;
            }

            img{border-radius:50%;}






input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=password], select, password {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

button[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}






*{
	-webkit-box-sizing: border-box;
  	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.cf{
	zoom:1
}

.cf:before,.cf:after{
	content:"";
	display:table
}

.cf:after{
	clear:both
}

.fl-l{
	float:left
}

.fl-r{
	float:right
}


.wrapper{
	list-style:none;
	margin:0;
	padding:0;
	width:790px;
	margin:30px auto 0;
	text-align:left;
}

.product{
	width:250px;
	margin-right:20px;
	background-color:#FFFFFF;
	position:relative;
}

.product:last-of-type{
	margin-right:0;
}

.container-prod{
	height:350px;
	overflow:hidden;
	position:relative;
	-moz-box-shadow: 0px 0px 0px 0px #F2F2F2;
	-webkit-box-shadow:  0px 0px 0px 0px #F2F2F2;
	box-shadow: 0px 0px 0px 0px #F2F2F2;
	-webkit-transition:all 0.3s ease;
	-moz-transition:all 0.3s ease;
	-o-transition:all 0.3s ease;
	transition:all 0.3s ease;
}

.container-prod:hover, .container-prod.information, .container-prod.social-sharing{
	-moz-box-shadow: 0px 0px 5px 0px #333;
	-webkit-box-shadow:  0px 0px 5px 0px #333;
	box-shadow: 0px 0px 5px 0px #333;
}

.image{
	height:270px;
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
	-webkit-transition:all 1s ease;
	-moz-transition:all 1s ease;
	-o-transition:all 1s ease;
	transition:all 1s ease;
}

.information .image{
	height:150px;
}

.container-information{
	height:40px;
	overflow:hidden;
	-webkit-transition:all 1s ease;
	-moz-transition:all 1s ease;
	-o-transition:all 1s ease;
	transition:all 1s ease;
	background-color:#031E16;
	color:#FFFFFF;
}

.information .container-information{
	height:160px;
}

.container-information .title{
	height:40px;
	line-height:40px;
	padding:0 10px;
	background-color:#5DBA9D;
	color:#FFFFFF;
	font-size:20px;
	font-weight:bold;
	position:relative;
}

.close{
	width:40px;
	height:40px;
	text-align:center;
	line-height:40px;
	background-color:#11956c;
	position:absolute;
	right:-40px;
	-webkit-transition:all 1s ease;
	-moz-transition:all 1s ease;
	-o-transition:all 1s ease;
	transition:all 1s ease;
	color:#FFFFFF;
}

.information .close{
	right:0;
}

.container-information .description{
	padding:10px;
	height:120px;
	overflow-x:hidden;
	overflow-y:auto;
}

.sharing{
	text-align:center;
	width:100%;
	position:absolute;
	bottom:-50px;
	overflow:hidden;
	-webkit-transition:all 1s ease;
	-moz-transition:all 1s ease;
	-o-transition:all 1s ease;
	transition:all 1s ease;
	background-color:#031E16;
	z-index:1;
}

.social-sharing .sharing{
	bottom:40px;
}

.sharing a{
	color:#FFFFFF;
	font-size:20px;
	width:25%;
	height:40px;
	line-height:40px;
}

.sharing a:hover{
	color:#5DBA9D;
}

.sharing a:hover{
	color:#5DBA9D;
}


.payments{
	text-align:center;
	width:100%;
	position:absolute;
	bottom:-50px;
	overflow:hidden;
	-webkit-transition:all 1s ease;
	-moz-transition:all 1s ease;
	-o-transition:all 1s ease;
	transition:all 1s ease;
	background-color:#031E16;
	z-index:1;
}

.social-payments .payments{
	bottom:40px;
}

.payments a{
	color:#FFFFFF;
	font-size:20px;
	width:25%;
	height:40px;
	line-height:40px;
}

.payments a:hover{
	color:#5DBA9D;
}

.payments a:hover{
	color:#5DBA9D;
}

.buttons{
	position:relative;
	z-index:2;
}

.buttons a{
	text-align:center;
	width:25%;
	height:40px;
	line-height:40px;
	background-color:#11956c;
	color:#FFFFFF;
	text-decoration:none;
	position:relative;
	overflow:hidden;
}

.buttons a > span > span{
	position:relative;
	z-index:3;
	display:block;
	width:100%;
}

.buttons a > span:before{
	content:"";
	background-color:rgba(0,0,0,0);
	width:100%;
	height:40px;
	position:absolute;
	top:40px;
	left:0;
	z-index:1;
	-webkit-transition:all 0.3s ease;
	-moz-transition:all 0.3s ease;
	-o-transition:all 0.3s ease;
	transition:all 0.3s ease;
}

.buttons a:hover > span:before, .information .buttons a.more > span:before , .social-sharing .buttons a.share > span:before{
	top:0;
	background-color:rgba(0,0,0,0.5);
}

.information .buttons a.more > span:before , .social-sharing .buttons a.share > span:before{
	top:0;
	background-color:rgba(0,0,0,0.8);
}

.buttons a.cart.added > span:before{
	top:0;
	background-color:rgba(255,255,255,0.8);
}

.buttons a.cart > span > span.check{
	width:100%;
	height:40px;
	position:absolute;
	top:40px;
	left:0;
	-webkit-transition:all 0.3s ease;
	-moz-transition:all 0.3s ease;
	-o-transition:all 0.3s ease;
	transition:all 0.3s ease;
}

.buttons a.cart.added > span > span.check{
	top:0;
	color:#11956c;
}

.buttons a.cart > span > span.add{
	width:100%;
	height:40px;
	position:absolute;
	top:0;
	left:0;
	-webkit-transition:all 0.3s ease;
	-moz-transition:all 0.3s ease;
	-o-transition:all 0.3s ease;
	transition:all 0.3s ease;
}

.buttons a.cart.added > span > span.add{
	top:-40px;
}

.buttons a i{
	font-size:20px;
}

.buttons a:first-of-type{
	width:50%;
}




        </style>
        
        <script data-name="BMC-Widget" data-cfasync="false" src="https://cdnjs.buymeacoffee.com/1.0.0/widget.prod.min.js" data-id="chisdealhdyt" data-description="Support me on Buy me a coffee!" data-message="Thank you visit my websites, please if dont mind if enjoy site. please send me a TIP $1 for how much i put into coding / setup sites. it shows good support of my projects i do." data-color="#79D6B5" data-position="Right" data-x_margin="18" data-y_margin="18"></script>
        
</head>


<body>
        <nav class="navbar navbar-expand moobot-navbar">
            <a href=""></a>
            <div class="collapse navbar-collapse">
                <a class="navbar-brand" href="index.php"><font color="#ffffff"><h2><i class="fas fa-laugh-wink"></i></h2></font></a>
                <div class="moobot-title d-none d-lg-block">
                    <h3 id="moobot-page-title">Shop / Store</h3>
                    <p id="moobot-page-description">You Buy Stuff HERE!</p>
                </div>
                <button type="button" class="btn moobot-toggle-button navbar-toggle collapsed menu-toggle d-md-none"><i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <span class="glyphicon glyphicon-share hidden-xs pull-right share-link" aria-hidden="true"></span>
                </div>
            </div>
            <?php  if (isset($_SESSION['user'])) : ?>
            <div class="form-inline my-2 my-md-0">
                <img src="<?php echo $row['avatar']; ?>" width="48" hight="48"/>
                <div class="profile-info">
                    <h3 id="username"><?php if ($row['user_type'] == "superadmin") { echo "<font color='red'>".$row['username']."</font>"; } else if ($row['user_type'] == "admin") { echo "<font color='red'>".$row['username']."</font>"; } else if ($row['user_type'] == "mod") { echo "<font color='perple'>".$row['username']."</font>"; } else if ($row['user_type'] == "streamer") { echo "<font color='yellow'>".$row['username']."</font>"; } else if ($row['isMega'] == 1) { echo "<font color='red'>".$row['username']."</font>"; } else if ($row['isLegend'] == 1) { echo "<font color='gold'>".$row['username']."</font>"; } else if ($row['isPremium'] == 1) { echo "<font color='greem'>".$row['username']."</font>"; } else if ($row['isDonator'] == 1) { echo "<font color='#F733FF'>".$row['username']."</font>"; } else { echo "<font color='gray'>".$row['username']."</font>";}?></h3>

                    <h4 id="followers">Role: 

                    <?php echo $rank; ?>


                    </h4>
                    
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle moobot-nav-button" type="button" id="btnDropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnDropdownUser">
                        <a class="dropdown-item" href="index.php?logout='1'">Log out</a>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </nav>

        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="sidebar-nav">
                    <ul class="sidebar-menu">
                        <li>
                            <a class="sidebar-menu-item" href="index.php">
                                <i class="menu-icon fas fa-home"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text">Home</h4>
                                </div>
                            </a>
                        </li>
                        <br />
                        <li>
                            <a class="sidebar-menu-item" href="channels.php">
                                <i class="menu-icon fas fa-dollar-sign"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text">Channels</h4>
                                </div>
                            </a>
                        </li>
                        <br />
                        <li>
                            <a class="sidebar-menu-item" href="shop.php">
                                <i class="menu-icon fas fa-dollar-sign active"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text active">Shop</h4>
                                </div>
                            </a>
                        </li>
                        <br />
                        <?php if ($row['user_type'] == "superadmin" || $row['user_type'] == "admin") { ?>
                        <li>
                            <a class="sidebar-menu-item" href="admin.php">
                                <i class="menu-icon fas fa-user"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text">Admin</h4>
                                </div>
                            </a>
                        </li>
                        <br />
                        <?php } ?>
                        <li>
                            <a class="sidebar-menu-item" href="settings.php">
                                <i class="menu-icon fas fa-cog last"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text">Settings</h4>
                                </div>
                            </a>
                        </li>
                        
                        <li>
                            <a class="sidebar-menu-item" href="#">
                                <i class="fas"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text"></h4>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->
                <!-- Page Content -->
                <div id="page-content-wrapper">
                    
                    
                    <div class="container">
                        <div class="row">
                            <div class="col">

                                <?php


                                ?>

                                <div class="moobot-top">
                                    <ul class="nav nav-pills moobot-tabs">

                                        <li class="moobot-nav-link nav-item">
                                            <a class="moobot-nav-link tablinks nav-link" onclick="streamersLists(event, 'twitchstore')" href="#">Twitch Store</a>
                                        </li>

                                        <!-- <li class="moobot-nav-link nav-item">
                                            <a class="moobot-nav-link tablinks nav-link" onclick="streamersLists(event, 'gamestore')" href="#">Game Codes</a>
                                        </li> -->
                                        
                                        <li class="moobot-nav-link nav-item">
                                            <a class="moobot-nav-link tablinks nav-link" onclick="streamersLists(event, 'rankstore')" href="#">Supporter Ranks</a>
                                        </li>

                                        <li class="moobot-nav-link nav-item">
                                            <a class="moobot-nav-link tablinks nav-link" onclick="streamersLists(event, 'redeem')" href="#">Redeem Code</a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="moobot-content">
                                        
                                        <?php if ($row['isMonthSupporter'] == 1 || $row['isDonator'] == 1 || $row['isPremium'] == 1 || $row['isLegend'] == 1 || $row['isMega'] == 1 || $row['hostingprovider'] == 1) { ?>                               
                                        <?php } else { ?>
                                            <iframe data-aa="1596590" src="//ad.a-ads.com/1596590?size=970x250" scrolling="no" style="width:970px; height:250px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>
                                        <?php } ?>
                                        
                                                                          
                                        
                                         <div id="rankstore" class="tabcontent">
                                        <div class="container command-list">

                                                  <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Support Community by Buying Ranks</h6>
                </div>
                <div class="card-body">


<ul class="wrapper cf">
	<li class="product fl-l">
    	<div class="container-prod">
        	<div class="image" style="background-image:url('avatargifmine.gif');"></div>
            <div class="container-information">
            	<div class="title">
                	<center>DONATOR</center>
                    <a href="javascript:void(0)" class="more close"><i class="fa fa-times"></i></a>                
                </div>
                <div class="description">$5 (ONE TIME)<br>NO ADS<br>ACCESS TO DONATOR ROLE ON DISCORD<br>SHOWING GOOD SUPPORTER<br>ACCESS TO SET GIF LOGOS / CUSTOM BACKGROUND</div>
            </div>
            <div class="sharing cf">
            	  <a href="https://tools.chisdealhd.co.uk/payments/zenzo/?price=5&item=Donator&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/znz_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/flits/?price=5&item=Donator&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/fls_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/pivx/?price=5&item=Donator&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/pivx_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/hives/?price=5&item=Donator&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/hive-logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/bitcoin/?price=5&item=Donator&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/bitcoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecoin/?price=5&item=Donator&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/litecoin/?price=5&item=Donator&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/litecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecash/?price=5&item=Donator&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecash_logo.png" width="30" height="30"></a>
                
            </div>
            
            <div class="buttons cf">
            	<a href="javascript:void(0)" class="share fl-l"><span><span><i class="fa fa-shopping-cart"></span></i></span></a>
            	<a href="javascript:void(0)" class="more fl-l"><span><span><i class="fa fa-plus"></i></span></span></a>
              <a href="#" class="more fl-l"><span><span><i class="fa fa-discord"></i></span></span></a>
            </div>
        </div>
	</li>
 
 
 <li class="product fl-l">
    	<div class="container-prod">
        	<div class="image" style="background-image:url('avatargifmine.gif');"></div>
            <div class="container-information">
            	<div class="title">
                	<center>PREMIUM</center>
                    <a href="javascript:void(0)" class="more close"><i class="fa fa-times"></i></a>                
                </div>
                <div class="description">$10 (ONE TIME)<br>NO ADS<br>ACCESS TO PREMIUM ROLE ON DISCORD<br>SHOWING GOOD SUPPORTER<br>ACCESS TO SET GIF LOGOS / CUSTOM BACKGROUND<br>ACCESS OUR GAMING SERVER WHITELIST</div>
            </div>
            <div class="sharing cf">
            	  <a href="https://tools.chisdealhd.co.uk/payments/zenzo/?price=10&item=Premium&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/znz_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/flits/?price=10&item=Premium&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/fls_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/pivx/?price=10&item=Premium&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/pivx_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/hives/?price=10&item=Premium&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/hive-logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/bitcoin/?price=10&item=Premium&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/bitcoin_logo.png" width="30" height="30"></a>
                
                <a href="https://tools.chisdealhd.co.uk/payments/dogecoin/?price=10&item=Premium&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/litecoin/?price=10&item=Premium&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/litecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecash/?price=10&item=Premium&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecash_logo.png" width="30" height="30"></a>
                
                
            </div>
            
            <div class="buttons cf">
            	<a href="javascript:void(0)" class="share fl-l"><span><span><i class="fa fa-shopping-cart"></span></i></span></a>
            	<a href="javascript:void(0)" class="more fl-l"><span><span><i class="fa fa-plus"></i></span></span></a>
              <a href="#" class="more fl-l"><span><span><i class="fa fa-discord"></i></span></span></a>
            </div>
        </div>
	</li>
 
 
 
 <li class="product fl-l">
    	<div class="container-prod">
        	<div class="image" style="background-image:url('avatargifmine.gif');"></div>
            <div class="container-information">
            	<div class="title">
                	<center>LEGEND</center>
                    <a href="javascript:void(0)" class="more close"><i class="fa fa-times"></i></a>                
                </div>
                <div class="description">$15 (ONE TIME)<br>NO ADS<br>ACCESS TO LEGEND ROLE ON DISCORD<br>SHOWING GOOD SUPPORTER<br>ACCESS TO SET GIF LOGOS / CUSTOM BACKGROUND<br>ACCESS OUR GAMING SERVER WHITELIST<br>ACCESS EARLY MUSIC TO WEBSITE</div>
            </div>
            <div class="sharing cf">
            	  <a href="https://tools.chisdealhd.co.uk/payments/zenzo/?price=15&item=Legend&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/znz_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/flits/?price=15&item=Legend&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/fls_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/pivx/?price=15&item=Legend&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/pivx_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/hives/?price=15&item=Legend&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/hive-logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/bitcoin/?price=15&item=Legend&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/bitcoin_logo.png" width="30" height="30"></a>
                
                <a href="https://tools.chisdealhd.co.uk/payments/dogecoin/?price=15&item=Legend&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/litecoin/?price=15&item=Legend&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/litecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecash/?price=15&item=Legend&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecash_logo.png" width="30" height="30"></a>
                
            </div>
            
            <div class="buttons cf">
            	<a href="javascript:void(0)" class="share fl-l"><span><span><i class="fa fa-shopping-cart"></span></i></span></a>
            	<a href="javascript:void(0)" class="more fl-l"><span><span><i class="fa fa-plus"></i></span></span></a>
              <a href="#" class="more fl-l"><span><span><i class="fa fa-discord"></i></span></span></a>
            </div>
        </div>
	</li>
 
 
</ul>

<br>

<ul class="wrapper cf">
	<li class="product fl-l">
    	<div class="container-prod">
        	<div class="image" style="background-image:url('avatargifmine.gif');"></div>
            <div class="container-information">
            	<div class="title">
                	<center>MEGA</center>
                    <a href="javascript:void(0)" class="more close"><i class="fa fa-times"></i></a>                
                </div>
                <div class="description">$20 (ONE TIME)<br>NO ADS<br>ACCESS TO MEGA ROLE ON DISCORD<br>SHOWING GOOD SUPPORTER<br>ACCESS TO SET GIF LOGOS / CUSTOM BACKGROUND<br>ACCESS OUR GAMING SERVER WHITELIST<br>ACCESS EARLY MUSIC TO WEBSITE<br>ACCEPT DONATIONS TABS</div>
            </div>
            <div class="sharing cf">
            	  <a href="https://tools.chisdealhd.co.uk/payments/zenzo/?price=20&item=Mega&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/znz_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/flits/?price=20&item=Mega&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/fls_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/pivx/?price=20&item=Mega&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/pivx_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/hives/?price=20&item=Mega&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/hive-logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/bitcoin/?price=20&item=Mega&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/bitcoin_logo.png" width="30" height="30"></a>
                
                <a href="https://tools.chisdealhd.co.uk/payments/dogecoin/?price=20&item=Mega&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/litecoin/?price=20&item=Mega&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/litecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecash/?price=20&item=Mega&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecash_logo.png" width="30" height="30"></a>
                
            </div>
            
            <div class="buttons cf">
            	<a href="javascript:void(0)" class="share fl-l"><span><span><i class="fa fa-shopping-cart"></span></i></span></a>
            	<a href="javascript:void(0)" class="more fl-l"><span><span><i class="fa fa-plus"></i></span></span></a>
              <a href="#" class="more fl-l"><span><span><i class="fa fa-discord"></i></span></span></a>
            </div>
        </div>
	</li>
 
 <li class="product fl-l">
    	<div class="container-prod">
        	<div class="image" style="background-image:url('avatargifmine.gif');"></div>
            <div class="container-information">
            	<div class="title">
                	<center>MONTHLY</center>
                    <a href="javascript:void(0)" class="more close"><i class="fa fa-times"></i></a>                
                </div>
                <div class="description">$10 (1 MONTH)<br>NO ADS<br>ACCESS TO MEMBERSHIP ROLE ON DISCORD<br>SHOWING GOOD SUPPORTER<br>ACCESS TO SET GIF LOGOS / CUSTOM BACKGROUND<br>ACCESS OUR GAMING SERVER WHITELIST<br>ACCESS EARLY MUSIC TO WEBSITE<br>ACCEPT DONATIONS TABS<br>EARLY ACCESS FEATURES</div>
            </div>
            <div class="sharing cf">
            	  <a href="https://tools.chisdealhd.co.uk/payments/zenzo/?price=10&item=Monthly&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/znz_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/flits/?price=10&item=Monthly&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/fls_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/pivx/?price=10&item=Monthly&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/pivx_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/hives/?price=10&item=Monthly&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/hive-logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/bitcoin/?price=10&item=Monthly&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/bitcoin_logo.png" width="30" height="30"></a>
                
                <a href="https://tools.chisdealhd.co.uk/payments/dogecoin/?price=10&item=Monthly&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/litecoin/?price=10&item=Monthly&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/litecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecash/?price=10&item=Monthly&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecash_logo.png" width="30" height="30"></a>
                
            </div>
            
            <div class="buttons cf">
            	<a href="javascript:void(0)" class="share fl-l"><span><span><i class="fa fa-shopping-cart"></span></i></span></a>
            	<a href="javascript:void(0)" class="more fl-l"><span><span><i class="fa fa-plus"></i></span></span></a>
              <a href="#" class="more fl-l"><span><span><i class="fa fa-discord"></i></span></span></a>
            </div>
        </div>
	</li>
 
 
</ul>


                </div>

                                        </div>


                                    </div></div>
                                        
                                        
                                
                                
                                
                                
                                
                                
                                <div id="twitchstore" class="tabcontent">
                                        <div class="container command-list">

                                                  <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">YOU ARE PAYING FOR POINTS (STREAMELEMENTS BOT) | REQUIRES LINK YOUR TWITCH ACCOUNT IN SETTINGS</h6>
                </div>
                <div class="card-body">

<?php if (!$row['twitchusername'] == null || !$row['twitchuserid'] == null) { ?>
<ul class="wrapper cf">
	<li class="product fl-l">
    	<div class="container-prod">
        	<div class="image" style="background-image:url('avatargifmine.gif');"></div>
            <div class="container-information">
            	<div class="title">
                	<center>1000 Points</center>
                    <a href="javascript:void(0)" class="more close"><i class="fa fa-times"></i></a>                
                </div>
                <div class="description">$5 (ONE TIME)<br>WHEN BUY THIS POINTS GOES TO YOUR TWITCH ACCOUNT ON STREAMELEMENTS BOT TO USE STUFF LIKE MINECRAFT INTERACTIVE AND MANY MORE</div>
            </div>
            
            <div class="sharing cf">
            	  <a href="https://tools.chisdealhd.co.uk/payments/zenzo/?price=5&item=1000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/znz_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/flits/?price=5&item=1000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/fls_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/pivx/?price=5&item=1000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/pivx_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/hives/?price=5&item=1000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/hive-logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/bitcoin/?price=5&item=1000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/bitcoin_logo.png" width="30" height="30"></a>
                
                <a href="https://tools.chisdealhd.co.uk/payments/dogecoin/?price=5&item=1000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/litecoin/?price=5&item=1000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/litecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecash/?price=5&item=1000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecash_logo.png" width="30" height="30"></a>
                
            </div>
            
            <div class="buttons cf">
            	<a href="javascript:void(0)" class="share fl-l"><span><span><i class="fa fa-shopping-cart"></span></i></span></a>
            	<a href="javascript:void(0)" class="more fl-l"><span><span><i class="fa fa-plus"></i></span></span></a>
              <a href="#" class="more fl-l"><span><span><i class="fa fa-discord"></i></span></span></a>
            </div>
            
        </div>
        
	</li>
 
 
 <li class="product fl-l">
    	<div class="container-prod">
        	<div class="image" style="background-image:url('avatargifmine.gif');"></div>
            <div class="container-information">
            	<div class="title">
                	<center>5000 Points</center>
                    <a href="javascript:void(0)" class="more close"><i class="fa fa-times"></i></a>                
                </div>
                <div class="description">$10 (ONE TIME)<br>WHEN BUY THIS POINTS GOES TO YOUR TWITCH ACCOUNT ON STREAMELEMENTS BOT TO USE STUFF LIKE MINECRAFT INTERACTIVE AND MANY MORE</div>
            </div>
            <div class="sharing cf">
            	  <a href="https://tools.chisdealhd.co.uk/payments/zenzo/?price=10&item=5000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/znz_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/flits/?price=10&item=5000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/fls_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/pivx/?price=10&item=5000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/pivx_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/hives/?price=10&item=5000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/hive-logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/bitcoin/?price=10&item=5000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/bitcoin_logo.png" width="30" height="30"></a>
                
                
                <a href="https://tools.chisdealhd.co.uk/payments/dogecoin/?price=10&item=5000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/litecoin/?price=10&item=5000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/litecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecash/?price=10&item=5000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecash_logo.png" width="30" height="30"></a>
                
            </div>
            
            <div class="buttons cf">
            	<a href="javascript:void(0)" class="share fl-l"><span><span><i class="fa fa-shopping-cart"></span></i></span></a>
            	<a href="javascript:void(0)" class="more fl-l"><span><span><i class="fa fa-plus"></i></span></span></a>
              <a href="#" class="more fl-l"><span><span><i class="fa fa-discord"></i></span></span></a>
            </div>
        </div>
	</li>
 
 
 
 <li class="product fl-l">
    	<div class="container-prod">
        	<div class="image" style="background-image:url('avatargifmine.gif');"></div>
            <div class="container-information">
            	<div class="title">
                	<center>10000 Points</center>
                    <a href="javascript:void(0)" class="more close"><i class="fa fa-times"></i></a>                
                </div>
                <div class="description">$15 (ONE TIME)<br>WHEN BUY THIS POINTS GOES TO YOUR TWITCH ACCOUNT ON STREAMELEMENTS BOT TO USE STUFF LIKE MINECRAFT INTERACTIVE AND MANY MORE</div>
            </div>
            <div class="sharing cf">
            	  <a href="https://tools.chisdealhd.co.uk/payments/zenzo/?price=15&item=10000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/znz_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/flits/?price=15&item=10000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/fls_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/pivx/?price=15&item=10000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/pivx_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/hives/?price=15&item=10000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/hive-logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/bitcoin/?price=15&item=10000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/bitcoin_logo.png" width="30" height="30"></a>
                
                
                <a href="https://tools.chisdealhd.co.uk/payments/dogecoin/?price=15&item=10000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/litecoin/?price=15&item=10000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/litecoin_logo.png" width="30" height="30"></a>
                <a href="https://tools.chisdealhd.co.uk/payments/dogecash/?price=15&item=10000Points&userid=<?php echo $discorduserid; ?>&return=apps&partner=chisdealhdyt" class="fl-l" target="_blank"><img src="https://tools.chisdealhd.co.uk/proxyimg/png.php?img=https://tools.chisdealhd.co.uk/wall/logos/dogecash_logo.png" width="30" height="30"></a>
                
            </div>
            
            <div class="buttons cf">
            	<a href="javascript:void(0)" class="share fl-l"><span><span><i class="fa fa-shopping-cart"></span></i></span></a>
            	<a href="javascript:void(0)" class="more fl-l"><span><span><i class="fa fa-plus"></i></span></span></a>
              <a href="#" class="more fl-l"><span><span><i class="fa fa-discord"></i></span></span></a>
            </div>
        </div>
	</li>
 
 
</ul>
         
<script>
(function($) {
  $(".wrapper .more").click(function(show) {
    var showMe = $(this)
      .closest(".product")
      .find(".container-prod");
    $(this)
      .closest(".wrapper")
      .find(".container-prod")
      .not(showMe)
      .removeClass("information");
    $(".container-prod").removeClass("social-sharing");
    showMe
      .stop(false, true)
      .toggleClass("information")
      .removeClass("social-sharing");
    show.preventDefault();
  });

  $(".wrapper .share").click(function(share) {
    var showMe = $(this)
      .closest(".product")
      .find(".container-prod");
    $(this)
      .closest(".wrapper")
      .find(".container-prod")
      .not(showMe)
      .removeClass("social-sharing");
    $(".container-prod").removeClass("information");
    showMe
      .stop(false, true)
      .toggleClass("social-sharing")
      .removeClass("information");
    share.preventDefault();
  });

  $(".wrapper .add").click(function(share) {
    var showMe = $(this)
      .closest(".product")
      .find(".cart");
    showMe.stop(false, true).addClass("added");
    var showMe = $(this)
      .closest(".product")
      .find(".container-prod");
    showMe
      .stop(false, true)
      .removeClass("social-sharing")
      .removeClass("information");
    share.preventDefault();
  });
})(jQuery);

</script>

                </div>
<?php } else { ?>
            
                 <h3>Your Twitch Account not Linked, Please link it @ <a href="https://apps.chisdealhd.co.uk/user/settings.php">HERE</a></h3>
            
            <?php } ?>
                                        </div>


                                    </div></div>
                                
                                
                                
                                        
                                        
                                        
                                        
                                    <div id="mcstore" class="tabcontent">
                                        <div class="container command-list">

                                                  <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Minecraft Store</h6>
                </div>
                <div class="card-body">
		

            </div>

                                        </div>


                                    </div></div>
                                    
                                    
                                    
                                    <div id="gamestore" class="tabcontent">
                                        <div class="container command-list">

                                                  <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Game Codes Store</h6>
                </div>
                <div class="card-body">
		

            </div>

                                        </div>


                                    </div></div>


              <div id="redeem" class="tabcontent">
                                        <div class="container command-list">

                                                  <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Redeem CODE</h6>
                </div>
                <div class="card-body">
		            
                            
    <div class="form-group">
      <label for="promo_code">Apply Redeemcode:</label>
      <input type="text" class="form-control" id="coupon_code" placeholder="Apply Redeemcode" name="coupon_code">
	  <b><span id="message" style="color:green;"></span></b>
    </div>
    
    <button id="apply" class="btn btn-default">Redeem</button>
                            

            </div>

                                        </div>


                                    </div></div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /#page-content-wrapper -->
        </div>
        <?php } ?>
<?php } ?>
        <script>
            function streamersLists(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>

        <script>
            $(".menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        
        <script>
	$("#apply").click(function(){
		if($('#promo_code').val()!=''){
			$.ajax({
						type: "POST",
						url: "redeemcodes.php",
						data:{
							coupon_code: $('#coupon_code').val(),
              discordid: "<?php echo $_SESSION['user']['userid']; ?>"
						},
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
                                                                  
                if (dataResult.message == "Already got it") return $('#message').html("Already got This Item!");
                                                                  
								$('#coupon_code').val("");
                                                                   
                if (dataResult.message == "MinecraftError") {
                
                  $('#message').html("Your Minecraft Account not Linked! Please link it to use this REDEEM! @ <a href='https://panel.chisdealhd.co.uk/user/profile.php'>HERE</a>");
                
                } else
                if (dataResult.value == "Monthly") {
								
                  $('#message').html("Redeemcode applied successfully, You got 1 Month Membership for "+dataResult.dateexpires+"!");
                
                } else if (dataResult.value == "MinecraftAccess") {
								
                  $('#message').html("Redeemcode applied successfully, You got 1 Month Minecraft Server Access for "+dataResult.dateexpires+"!");
                
                } else {
                
                  $('#message').html("Redeemcode applied successfully, You got "+dataResult.value+"!");
                
                }
								
							}
							else if(dataResult.statusCode==201){
								$('#message').html("Invalid Redeemcode or Already been Used!");
       
							} else if(dataResult.statusCode==210){
								$('#message').html("Your Minecraft Account not Linked! Please link it to use this REDEEM! @ <a href='https://panel.chisdealhd.co.uk/user/profile.php'>HERE</a>");
       
							}
						}
			});
		}
		else{
			$('#message').html("Redeemcode can not be blank .Enter a Valid Redeemcode!");
		}
	});
</script>



</body>

</html>