<?php 

	include('../includes/functions.php');

	include('../includes/dbinfo.php');
 
  $data = $_GET['data'];
  $platform = $_GET['linked']; 
  $unlink = $_GET['unlinked'];

	if (!isAdmin() && !isMOD() && !isSTREAMER() && !isUser() && !isDONATOR() && !isPREMIUM() && !isLEGEND() && !isMEGA() && !isReseller()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: https://apps.chisdealhd.co.uk/apps/restream/login.php');
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
        <link rel="stylesheet" type="text/css" href="https://apps.chisdealhd.co.uk/css/style.css" />
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

.buttontwitch {
  background-color: #b503fc; /* Perple */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  display: inline-block;
  box-sizing: border-box;
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
  margin-right: 6px;
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
                    <h3 id="moobot-page-title">Settings</h3>
                    <p id="moobot-page-description">Your Settings</p>
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
                            <a class="sidebar-menu-item" href="shop.php">
                                <i class="menu-icon fas fa-dollar-sign"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text">Shop</h4>
                                </div>
                            </a>
                        </li>
                        <br />
                        <li>
                            <a class="sidebar-menu-item" href="status.php">
                                <i class="menu-icon fas fa-stopwatch"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text">Status</h4>
                                </div>
                            </a>
                        </li>
                        <br />
                        <li>
                            <a class="sidebar-menu-item" href="transactions.php">
                                <i class="menu-icon fas fa-dollar-sign"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text">Transactions</h4>
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
                                <i class="menu-icon fas fa-cog last active"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text active">Settings</h4>
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

                                <div class="moobot-content">
                                        
                                        <?php if ($row['isMonthSupporter'] == 1 || $row['isDonator'] == 1 || $row['isPremium'] == 1 || $row['isLegend'] == 1 || $row['isMega'] == 1 || $row['hostingprovider'] == 1) { ?>                               
                                        <?php } else { ?>   
                                            <iframe data-aa="1596590" src="//ad.a-ads.com/1596590?size=970x250" scrolling="no" style="width:970px; height:250px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>
                                        <?php } ?>

                                        <div class="container command-list">
                                            <div class="col-lg-6 mb-4">


              <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Auto Update Login</h6>
                </div>
                <div class="card-body">
		<?php if ($row['isDonator'] == 1 || $row['isPremium'] == 1 || $row['isLegend'] == 1 || $row['isMega'] == 1) { ?>
			
      <form method="post" action="settings.php">
					
		<?php echo display_error(); ?>
		<?php if ($row['autoupuser'] == 0) { ?>
			<label>Change Username</label>
			<input type="text" name="username_update" value="<?php echo $row['username']; ?>">
		  <label>Change Avatar</label>
			<input type="text" name="logo_update" value="<?php echo $row['avatar']; ?>"></div>
		<?php } ?>	
    <label>Auto Updater</label>
		<label class="switch">
  			<input type="checkbox" <?php echo $row['autoupuser'] == 1 ? ' checked' : ''; ?> name='updater_checkbox'>
  			<span class="slider round"></span>
		</label>

			<button type="submit" class="btn" name="userupdate_btn">Update</button>
					
				</form>
      
		<?php } else { ?>
   
        <h6 class="m-0 font-weight-bold text-primary">You Dont Have Access this Feature, Only Donator, Premium, Legend, Mega can use This?</h6>
        
		<?php } ?>

                                        </div></div>
          <?php if ($row['autoupuser'] == 0) { ?>
             <?php if ($row['nekobundle'] == 1) { ?>
                 <div class="col-lg-6 mb-4">
                                <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Preset NEKO Pack</h6>
                </div>
                <div class="card-body">
                
                
                   <div class="container-login100-form-btn m-t-32">
						            <a href="#" class="buttontwitch" onclick="document.getElementById(`nekopack1`).style.display=`block`">Pack 1</a> <a href="#" class="buttontwitch" onclick="document.getElementById(`nekopack2`).style.display=`block`">Pack 2</a> <a href="#" class="buttontwitch" onclick="document.getElementById(`nekopack3`).style.display=`block`">Pack 3</a>
                        <br><br>
                        
				           </div>
                
               </div>
             </div>
             
             <?php } else { ?>
             
             
             <div class="col-lg-6 mb-4">
                                <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Preset NEKO Pack</h6>
                </div>
                <div class="card-body">
                
                
                   <div class="container-login100-form-btn m-t-32">
						            <a href="#" class="buttontwitch" onclick="document.getElementById(`buynekopack`).style.display=`block`">Buy NEKO Pack HERE</a>
				           </div>
                                      
                
               </div>
             </div>
             
             <?php } ?>
            <?php } ?>	
                                            
                                </div>
                                
                                <div class="col-lg-6 mb-4">
                                <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">3rd Party OAuth</h6>
                </div>
                <div class="card-body">
                
                <?php if ($row['twitchusername'] == null || $row['twitchusername'] == null) { ?>
                
                   <div class="container-login100-form-btn m-t-32">
						            <a href="https://apps.chisdealhd.co.uk/apps/restream/user/twitchlinkup.php" class="buttontwitch"><img src="https://i.imgur.com/ajPIY6N.png" style="width:30px;height:30px;">Twitch (LINK)</a>
				           </div>
                <?php } else { ?>
                
                   <div class="container-login100-form-btn m-t-32">
						            <a href="https://apps.chisdealhd.co.uk/apps/restream/user/twitchunlink.php" class="buttontwitch"><img src="https://i.imgur.com/ajPIY6N.png" style="width:30px;height:30px;">Twitch (UNLINK)</a>
				           </div>
                  
                <?php } ?>
                
               </div>
             </div>
             </div>
             
             
             
             <div class="col-lg-6 mb-4">
              <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Register new stream</h6>
                </div>
                <div class="card-body">
                    <input type="text" placeholder="in" id="in-str-url-reg"></input>
                    <input type="text" placeholder="out" id="out-str-url-reg"></input>
                    <input type="text" placeholder="name" id="name-reg"></input>
                    <input type="text" placeholder="name" id="uuid-reg" value="<?php echo $discorduserid; ?>" hidden disabled></input>
                    <button id="btn-add-new">AddNew</button>
                    <button id="btn-refrash-list">Refrash</button>
                <p>
                    <ul id="stream-list-ul">
                    </ul>
                </p>
                
               </div>
             </div>
             
             
             
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /#page-content-wrapper -->
        </div>
<?php } } ?>
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
        
        
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="js/main.js?236848153234234"></script>
<?php if ($data == "confirm") { ?>
   <?php if ($platform == "twitch") { ?>

    <script type="text/javascript"> window.onload = function () { alert("Twitch Account has been Linked."); } </script>

    <?php } ?>
    
    <?php if ($unlink == "twitch") { ?>

    <script type="text/javascript"> window.onload = function () { alert("Twitch Account has been Unlinked."); } </script>

    <?php } ?>

<?php } else if ($data == "failed") { ?>
	<script type="text/javascript"> window.onload = function () { alert("Failed to Link Your Account."); } </script>
<?php } else { ?>

<?php } ?>

</body>

</html>
