<?php

include '../includes/functions.php';

include '../includes/dbinfo.php';

include "common.php";

if (
    !isAdmin() &&
    !isMOD() &&
    !isSTREAMER() &&
    !isUser() &&
    !isDONATOR() &&
    !isPREMIUM() &&
    !isLEGEND() &&
    !isMEGA() && !isReseller()
) {
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
        
        $useriddis = $_SESSION['user']['userid'];
        
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





        </style>
        
        
        <script data-name="BMC-Widget" data-cfasync="false" src="https://cdnjs.buymeacoffee.com/1.0.0/widget.prod.min.js" data-id="chisdealhdyt" data-description="Support me on Buy me a coffee!" data-message="Thank you visit my websites, please if dont mind if enjoy site. please send me a TIP $1 for how much i put into coding / setup sites. it shows good support of my projects i do." data-color="#79D6B5" data-position="Right" data-x_margin="18" data-y_margin="18"></script>
        
<script type="text/javascript">var cmpIsOn = true;</script></head>


<body>
        <nav class="navbar navbar-expand moobot-navbar">
            <a href=""></a>
            <div class="collapse navbar-collapse">
                <a class="navbar-brand" href="index.php"><font color="#ffffff"><h2><i class="fas fa-laugh-wink"></i></h2></font></a>
                <div class="moobot-title d-none d-lg-block">
                    <h3 id="moobot-page-title">Status</h3>
                    <p id="moobot-page-description">Server Status Page</p>
                </div>
                <button type="button" class="btn moobot-toggle-button navbar-toggle collapsed menu-toggle d-md-none"><i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <span class="glyphicon glyphicon-share hidden-xs pull-right share-link" aria-hidden="true"></span>
                </div>
            </div>
            <?php if (isset($_SESSION['user'])): ?>
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
                                <i class="menu-icon fas fa-dollar-sign active"></i>
                                <div class="sidebar-menu-text">
                                    <h4 class="sidebar-text active">Channels</h4>
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

                                <?php  ?>

                                <div class="moobot-top">
                                    <ul class="nav nav-pills moobot-tabs">

                                        <li class="moobot-nav-link nav-item">
                                            <a class="moobot-nav-link tablinks nav-link" onclick="streamersLists(event, 'channels')" href="#">List Channels</a>
                                        </li>
                                        
                                        <li class="moobot-nav-link nav-item">
                                            <a class="moobot-nav-link tablinks nav-link" onclick="streamersLists(event, 'settings')" href="#">Channel Settings</a>
                                        </li>

                                    </ul>
                                </div>

                                <div class="moobot-content">
                                    
                                    <?php if ($row['isMonthSupporter'] == 1 || $row['isDonator'] == 1 || $row['isPremium'] == 1 || $row['isLegend'] == 1 || $row['isMega'] == 1) { ?>                               
                                        <?php } else { ?>   
                                            <iframe data-aa="1596590" src="//ad.a-ads.com/1596590?size=970x250" scrolling="no" style="width:970px; height:250px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>
                                        <?php } ?>
                                    
                                    <div id="channels" class="tabcontent">
                                        <div class="container command-list">
                                            
                                            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Channels Lists || <input type="button" name="" value="+" onclick='document.getElementById(`id02`).style.display=`block`;'/></h6>
                </div>
                <div class="card-body">
                   <div class="row">
                      <div class="col-sm-12">
                         <ul class="list-group list-group-flush">
                         
                         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

                                <table>
<thead>
<tr><th><strong>S.No</strong></th><th><strong>Platform</strong></th><th><strong>Streamkey</strong></th><th><strong>enabled</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from stream_profiles WHERE userid='$useriddis';";
$resultdata = mysqli_query($dbconnect,$sel_query);
while($rowdata = mysqli_fetch_assoc($resultdata)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $rowdata["provider"]; ?></td><td align="center"><?php echo $rowdata["streamkey"]; ?></td>

<?php if ($rowdata["enabled"] == 1) { ?>

<td align="center"><a href="toggleoff.php?id=<?php echo $rowdata["id"]; ?>">Disable</a></td>

<?php } else { ?>

<td align="center"><a href="toggleon.php?id=<?php echo $rowdata["id"]; ?>">Enable</a></td>

<?php } ?>

<td align="center"><a href="delete.php?id=<?php echo $rowdata["id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>

<script>

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

</script>
                         </ul>
                      </div>
                   </div>
               </div>
               </div>
               </div>
               </div>
               </div>
                                 
                      
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.modal {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 1rem 1.5rem;
    width: 24rem;
    border-radius: 0.5rem;
}
.close-button {
    float: right;
    width: 1.5rem;
    line-height: 1.5rem;
    text-align: center;
    cursor: pointer;
    border-radius: 0.25rem;
    background-color: lightgray;
}
.close-button:hover {
    background-color: darkgray;
}
.show-modal {
    opacity: 1;
    visibility: visible;
    transform: scale(1.0);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}

.layer {
    background-color: rgba(123, 4, 93, 0.30);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

      
  </style>
  
<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('nekopack1').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <center><h2>ADD CHANNEL</h2></center>
      </header>
      <div class="w3-container">

<center>	  

<form method="post" action="channels.php">
					
			<h3>Platform</h3>
			<select id="platform" name="platform" required>
          
          <option value="twitch">Twitch</option>
          <option value="vimmtv">VimmTV</option>
          <option value="dlive">Dlive</option>
          <option value="thetatv">ThetaTV</option>
            
      </select>
		  <h3>StreamKey</h3>
			<input id="key" name="key" placeholder="Enter your Stream Key" type="text" maxlength="500" required>
    
      <div class="container-login100-form-btn m-t-32">
			  <button class="buttontwitch" name="setstreamkey_btn">Apply</button>
      </div>
<br>
<div class="container-login100-form-btn m-t-32">
		<button onclick="document.getElementById(`id02`).style.display=`none`">Cancel</button>
</div>
<br>
				</form>
</center>
      </div>
      <footer class="w3-container w3-teal">
        <center><p>NOTE: Tis is on BETA, Will expect Bugs so Please Report, You can Support @ <br><a href="https://apps.chisdealhd.co.uk/profile/?user=chisdealhdyt">DONATE COMMUNITY BY CLICK HERE!</a></p></center>
      </footer>
    </div>
  </div>	  
  
  
  
  
                    
                    
                    <div id="settings" class="tabcontent">
                                        <div class="container command-list">
                                            
                                            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="border-left-warning">
                <div class="card-header py-3">
                  	<h6 class="m-0 font-weight-bold text-primary">Stream DATA</h6>
                </div>
                <div class="card-body">
                   <div class="row">
                      <div class="col-sm-12">
                         <ul class="list-group list-group-flush">

<h1>STATUS TRACKER</h1>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script>


    
    		    let timer = 30;
            let updating = false;
            let lastRefresh = "";

            function updateTimer() {
                if (updating) return;
                timer -= 1;
                if (timer !== 0) {
                    document.getElementById("timer").innerHTML = "Checking in " + timer.toFixed(0) + "s";
                } else {
                
                    document.getElementById("timer").innerHTML = "Checking...";
                    timer = 30;
                    updating = true;
                     $.ajax({
	                      type: "get",
	                      url: "checkrefresh.php?user=<?php echo $useriddis; ?>",
                          success: function(html){
                            
                            var dataResult = JSON.parse(html);
                            
                            
                            if (dataResult.statusCode==200) { 
                            
                                updating = true;
                              
                                document.getElementById("timer").innerHTML = "YOU ARE ONLINE!";
                                
                                document.getElementById("paid").innerHTML = "";
                                
                            
                            } else {
                            
                              document.getElementById("paid").innerHTML = "YOU NOT LIVE!";
                              updating = false;
                              
                            }
	                        }
                    });
                }
            }

            setInterval(updateTimer, 1000);
    
    
    
updateTimer();
</script>
<div id="timer">Checking in 30</div>
<div id="paid"></div></p></center>
<br>
<h2>SERVER INFO</h2>                
                                            
                            <?php 
                            
                            session_start();
try
{
	$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);
} catch(PDOException $e)
{
	http_response_code(401);
	trigger_error($e->getMessage());
	die("Database error!");
}


                            $uname = $_SESSION['user']["username"];
                              try
{
	$sth = $dbh->prepare("SELECT streamkey FROM ".$usertablename." WHERE username = :username");
	$sth->execute(array("username" => $uname));
	$row = $sth->fetch();
} catch(PDOException $e)
{
	http_response_code(401);
	trigger_error($e->getMessage());
	die("Database error!");
}
                             echo "Server URL: " . $streamurl . "<br>Stream Key: " . strtolower($foiehfoieh). "?user=" . strtolower($_SESSION['user']['userid']). "&key=". $row["streamkey"] . "<br>";
                            ?>
                            <br><a href=<?php echo $baseurl;?>/resethash.php>Reset your stream RTMP URL</a><br>

                         </ul>
                      </div>
                   </div>
               </div>
            </div>
        </div>
 </div>                                  
        
        
        <?php } ?>
<?php
}
?>
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

