<?php 


	session_start();

		$sqlservername = "localhost";



$sqlusername = "";



$sqlpassword = "";



$sqldatabase = "restream";


	// connect to database

	$db = mysqli_connect($sqlservername, $sqlusername, $sqlpassword, $sqldatabase);



	// variable declaration

	$username 	= "";

	$email    	= "";
	
	$errors   	= array(); 

	
	if (isset($_POST['login_btn'])) {

		login();

	}

	if (isset($_POST['setpass_btn'])) {

		setpass();

	}

	if (isset($_POST['changepass_btn'])) {

		changepass();

	}

	if (isset($_POST['userupdate_btn'])) {

		updateuser();

	}


	if (isset($_POST['bgupdate_btn'])) {

		updatebg();

	}

	if (isset($_POST['bgset_btn'])) {

		setbg();

	}
 
  
  if (isset($_POST['setnekodata_btn'])) {

		setnekodata();

	}


	if (isset($_POST['socialtoggle_btn'])) {

		updatesocialtoggle();

	}

	if (isset($_POST['bioupdate_btn'])) {

		updatebio();

	}

	if (isset($_POST['bioset_btn'])) {

		setbio();

	}

	if (isset($_POST['mcusernameset_btn'])) {

		setmc();

	}

	if (isset($_POST['mcusernameupdate_btn'])) {

		updatemc();

	}

	if (isset($_POST['zenzowalletset_btn'])) {

		setzenzo();

	}

	if (isset($_POST['zenzowalletupdate_btn'])) {

		updatezenzo();

    }
    
    if (isset($_POST['pivxwalletset_btn'])) {

		setpivx();

	}

	if (isset($_POST['pivxwalletupdate_btn'])) {

		updatepivx();

	}




	if (isset($_GET['logout'])) {

		session_destroy();

		unset($_SESSION['user']);

		header("location: ../index.php");

	}


	// return user array from their id

	function getUserById($id){

		global $db;

		$query = "SELECT * FROM profile WHERE id=" . $id;

		$result = mysqli_query($db, $query);



		$user = mysqli_fetch_assoc($result);

		return $user;

	}


    function changepass(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$passwordcorrent = e($_POST['password_correntpass']);

		$passwordchange = e($_POST['password_changepass']);



		// make sure form is filled properly

		if (empty($passwordcorrent)) {

			array_push($errors, "Corrent Password is required");

		}

		if (empty($passwordchange)) {

			array_push($errors, "Change Password is required");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
				if (password_verify($passwordcorrent, $logged_in_user["password"])) {
					
					$changepasscode = password_hash($passwordchange, PASSWORD_DEFAULT);
					
					$queryupdate = "UPDATE profile SET password='$changepasscode' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");


				} else {
					array_push($errors, "Wrong Corrent password combination");
				}


			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}



	function setzenzo(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];


		$setzenzo = e($_POST['walletidznz']);



		// make sure form is filled properly


		if (empty($setzenzo)) {

			array_push($errors, "Missing your zenzo Wallet");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET zenzowallet='$setzenzo' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");



			} else {

				array_push($errors, "Error just Happent");

			}
		}


    }
    



    function setpivx(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$setpivx = e($_POST['walletidpivx']);



		// make sure form is filled properly

		if (empty($setpivx)) {

			array_push($errors, "Missing your pivx Wallet");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET pivxwallet='$setpivx' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");




			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}




	function setbio(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$setbio = e($_POST['bio']);



		// make sure form is filled properly

		if (empty($setbio)) {

			array_push($errors, "Missing Text for BIO");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET bio='$setbio' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");




			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}

	function updatebio(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$updatebio = e($_POST['bio']);



		// make sure form is filled properly

		if (empty($updatebio)) {

			array_push($errors, "Missing Text for BIO");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET bio='$updatebio' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");


			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}

	function setmc(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$setmc = e($_POST['mcusername']);



		// make sure form is filled properly

		if (empty($setmc)) {

			array_push($errors, "Missing Minecraft Username");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					

					$url = "https://minecraft-techworld.com/admin/api/uuid?action=uuid&username=".$setmc;
   					$content = file_get_contents($url);
    				$json = json_decode($content, true);
					
					if ($json['success'] == true) {
						$mcapi = $json['output'];
						$queryupdate = "UPDATE profile SET MCName='$setmc', MCUuid='$mcapi' WHERE username='$username'";
						mysqli_query($db, $queryupdate);
					} else {
						array_push($errors, "Minecraft Account not Found!");
					}

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");


			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}

	function updatemc(){

		global $db, $username, $errors;



				// grap form values

				$username = $_SESSION['user']['username'];
		
				$updatemc = e($_POST['mcusername']);
		
		
		
				// make sure form is filled properly
		
				if (empty($updatemc)) {
		
					array_push($errors, "Missing Minecraft Username");
		
				}
		
		
		
		
				// attempt login if no errors on form
		
				if (count($errors) == 0) {
		
		
					$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";
		
					$results = mysqli_query($db, $query);
		
		
		
					if (mysqli_num_rows($results) == 1) { // user found
						
						// check if user is admin or user
		
						$logged_in_user = mysqli_fetch_assoc($results);
							
		
							$url = "https://minecraft-techworld.com/admin/api/uuid?action=uuid&username=".$updatemc;
							$content = file_get_contents($url);
							$json = json_decode($content, true);
							
							if ($json['success'] == true) {
								$mcapi = $json['output'];
								$queryupdate = "UPDATE profile SET MCName='$updatemc', MCUuid='$mcapi' WHERE username='$username'";
								mysqli_query($db, $queryupdate);
							} else {
								array_push($errors, "Minecraft Account not Found!");
							}



			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}


	function setbg(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$setbg = e($_POST['bgurl']);



		// make sure form is filled properly

		if (empty($setbg)) {

			array_push($errors, "Missing URL for Setting Background");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET backgroundUrl='$setbg' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");



			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}
 
 
  function setnekodata(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$setbg = e($_POST['bg_update']);
    $setpfp = e($_POST['logo_update']);

		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET backgroundUrl='$setbg', avatar='$setpfp' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");



			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}
 

	function updatebg(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$updatebg = e($_POST['bgurl']);



		// make sure form is filled properly

		if (empty($updatebg)) {

			array_push($errors, "Missing URL for update BG");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET backgroundUrl='$updatebg' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");



			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}


	function updatezenzo(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$setzenzo = e($_POST['walletidznz']);



		// make sure form is filled properly

		if (empty($setzenzo)) {

			array_push($errors, "Missing your zenzo Wallet");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET zenzowallet='$setzenzo' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");


			} else {

				array_push($errors, "Error just Happent");

			}
		}


    }
    

    function updatepivx(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$setpivx = e($_POST['walletidpivx']);



		// make sure form is filled properly

		if (empty($setpivx)) {

			array_push($errors, "Missing your pivx Wallet");

		}




		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					
					$queryupdate = "UPDATE profile SET pivxwallet='$setpivx' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");



			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}


function updateuser(){

		global $db, $username, $errors;

		// grap form values

		$usernameold = $_SESSION['user']['id'];

		$username = e($_POST['username_update']);

		$logo = e($_POST['logo_update']);


    $queryuser = "SELECT * FROM profile WHERE id=".$usernameold;

		$resultuser = mysqli_query($db, $queryuser);

		$userstat = mysqli_fetch_assoc($resultuser);

		// make sure form is filled properly
		
		if ($userstat['autoupuser'] == 0){
			if (empty($username)) {

				array_push($errors, "Username is required");

			}
			
			if (empty($logo)) {

				array_push($errors, "Logo URL is required");

			}
		}



		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE id='$usernameold' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
				
				$userid = $logged_in_user['id'];
					
					if (!empty($_POST['updater_checkbox'])){
						$toggle = 1;
					} else {
						$toggle = 0;
					}

					if ($logged_in_user['autoupuser'] == 0){
						$username = e($_POST['username_update']);
						$logo = e($_POST['logo_update']);
 			
					} else {
						$username = $_SESSION['user']['username'];
						$logo = $_SESSION['user']['avatar'];
					}

					$queryupdate = "UPDATE profile SET autoupuser='$toggle', avatar='$logo', username='$username' WHERE id='$userid'";

					mysqli_query($db, $queryupdate);


			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}


function setpass(){

		global $db, $username, $errors;



		// grap form values

		$username = $_SESSION['user']['username'];

		$passwordset = e($_POST['password_set']);



		// make sure form is filled properly

		if (empty($passwordset)) {

			array_push($errors, "Set Password is required");

		}


		// attempt login if no errors on form

		if (count($errors) == 0) {


			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
					
					$changepasscode = password_hash($passwordset, PASSWORD_DEFAULT);
					
					$queryupdate = "UPDATE profile SET password='$changepasscode' WHERE username='$username'";

					mysqli_query($db, $queryupdate);

					//session_destroy();

					//unset($_SESSION['user']);

					//header("location: ../login.php");


			} else {

				array_push($errors, "Error just Happent");

			}
		}


	}



// LOGIN USER

	function login(){

		global $db, $username, $errors;



		// grap form values

		$username = e($_POST['username']);

		$password = e($_POST['password']);



		// make sure form is filled properly

		if (empty($username)) {

			array_push($errors, "Username is required");

		}

		if (empty($password)) {

			array_push($errors, "Password is required");

		}



		// attempt login if no errors on form

		if (count($errors) == 0) {

			//$password = md5($password);
			

			//$query = "SELECT * FROM profile WHERE username='$username' AND password='$password' LIMIT 1";

			$query = "SELECT * FROM profile WHERE username='$username' LIMIT 1";

			$results = mysqli_query($db, $query);



			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user

				$logged_in_user = mysqli_fetch_assoc($results);
				if (password_verify($password, $logged_in_user["password"])) {
				if ($logged_in_user['banned'] == 0) {
				if ($logged_in_user['user_type'] == 'superadmin') {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');		  

				}else if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');

				}else if ($logged_in_user['user_type'] == 'mod') {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');

				}else if ($logged_in_user['user_type'] == 'streamer') {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');

				}else if ($logged_in_user['user_type'] == 'mega') {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');

				}else if ($logged_in_user['user_type'] == 'legend') {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');

				}else if ($logged_in_user['user_type'] == 'premium') {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');

				}else if ($logged_in_user['user_type'] == 'donator') {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');

				}else{

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

					header('location: user/index.php');

				}
			} else {
                		header('location: banned.php');
            		}


			}else {

				array_push($errors, "Wrong username/password combination");

			}
		}

		}

	}



	// LOGIN USER

	function isDONATOR()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'donator' ) {

			return true;

		}else{

			return false;

		}

		

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

    }
    
    // Donator with USER

	function isBANNED()

	{

		if ($_SESSION['user']['banned'] == 1) {

			return true;

		}else{

			return false;

		}

	}
	
	function isPREMIUM()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'premium' ) {

			return true;

		}else{

			return false;

		}

		

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

	}
	
	function isLEGEND()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'legend' ) {

			return true;

		}else{

			return false;

		}

		

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

	}
	
	function isMEGA()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'mega' ) {

			return true;

		}else{

			return false;

		}

		

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

	}
	
	function isSTREAMER()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'streamer' ) {

			return true;

		}else{

			return false;

		}

		

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

	}
 
  function isReseller()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'hostingprovider' ) {

			return true;

		}else{

			return false;

		}

		

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

	}
	
	function isMOD()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'mod' ) {

			return true;

		}else{

			return false;

		}

		

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

	}
	
	function isUser()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'user' ) {

			return true;

		}else{

			return false;

		}

		

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

	}



	function isAdmin()

	{

		if (isset($_SESSION['user'])&& $_SESSION['user']['user_type'] == 'superadmin' ) {

			return true;

		}else{

			return false;

		}

		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {

			return true;

		}else{

			return false;

		}

	}



	// escape string

	function e($val){

		global $db;

		return mysqli_real_escape_string($db, trim($val));

	}



	function display_error() {

		global $errors;



		if (count($errors) > 0){

			echo '<div class="error">';

				foreach ($errors as $error){

					echo $error .'<br>';

				}

			echo '</div>';

		}

	}



?>