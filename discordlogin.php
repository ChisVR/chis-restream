<?php
require __DIR__ . '/vendor/autoload.php';
include('./includes/dbinfo.php');
include('./includes/functions.php');

$provider = new \Wohali\OAuth2\Client\Provider\Discord([
    'clientId' => '',
    'clientSecret' => '',
    'redirectUri' => 'https://restream.chisdealhd.co.uk/discordlogin.php'
]);

error_reporting(0);
if (! isset($_GET['code'])) {
	$options = [
		'scope' => ['identify'] // array or string
	];

        header("Location: ".$provider->getAuthorizationUrl($options));

} else {
	
	
    // Step 2. Get an access token using the provided authorization code
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Step 3. (Optional) Look up the user's profile with the provided token
    try {

        $user = $provider->getResourceOwner($token);

        $disID = $user->getId();

        $result = mysqli_query($dbconnect,"SELECT * FROM profile WHERE userid='$disID'");
        
        if (mysqli_num_rows($result) > 0) {
            
            $logged_in_user = mysqli_fetch_assoc($result);

            if ($logged_in_user['banned'] == 0) {
				       if ($logged_in_user['user_type'] == 'superadmin') {


					      $_SESSION['user'] = $logged_in_user;

					      $_SESSION['success']  = "You are now logged in";

                        if ($logged_in_user['autoupuser'] == 1 ) {
                            $username = $user->getUsername();
                            $avatar = "https://cdn.discordapp.com/avatars/" . $user->getId() . "/" . $user->getAvatarHash() . ".png";
                        } else {
                            $username = $logged_in_user['username'];
                            $avatar = $logged_in_user['avatar'];
                        }
                        $discordtag = $user->getDiscriminator();
                        $queryupdater = "UPDATE profile SET username='$username', avatar='$avatar', tag='$discordtag' WHERE userid='$disID'";
                    
                    
                        if (mysqli_query($dbconnect, $queryupdater)) {
                            //printf('Record updated successfully');
                        } else {
                            //printf('Error updating record: ' . mysqli_error($con));;
                        }

					header('location: https://restream.chisdealhd.co.uk/user/index.php');		  

				}else if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;

                    $_SESSION['success']  = "You are now logged in";
                    
                    if ($logged_in_user['autoupuser'] == 1 ) {
                        $username = $user->getUsername();
                        $avatar = "https://cdn.discordapp.com/avatars/" . $user->getId() . "/" . $user->getAvatarHash() . ".png";
		            } else {
                        $username = $logged_in_user['username'];
                        $avatar = $logged_in_user['avatar'];
                    }
                    $discordtag = $user->getDiscriminator();
                
                    $queryupdater = "UPDATE profile SET username='$username', avatar='$avatar', tag='$discordtag' WHERE userid='$disID'";
                    
                    
                    if (mysqli_query($dbconnect, $queryupdater)) {
                        //printf('Record updated successfully');
                    } else {
                        //printf('Error updating record: ' . mysqli_error($con));;
                    }

					header('location: https://restream.chisdealhd.co.uk/user/index.php');		  

				}else if ($logged_in_user['user_type'] == 'mod') {


					$_SESSION['user'] = $logged_in_user;

                    $_SESSION['success']  = "You are now logged in";
                    
                    if ($logged_in_user['autoupuser'] == 1 ) {
                        $username = $user->getUsername();
                        $avatar = "https://cdn.discordapp.com/avatars/" . $user->getId() . "/" . $user->getAvatarHash() . ".png";
		            } else {
                        $username = $logged_in_user['username'];
                        $avatar = $logged_in_user['avatar'];
                    }
                    $discordtag = $user->getDiscriminator();
                    $queryupdater = "UPDATE profile SET username='$username', avatar='$avatar', tag='$discordtag' WHERE userid='$disID'";
                    
                    
                    if (mysqli_query($dbconnect, $queryupdater)) {
                        //printf('Record updated successfully');
                    } else {
                        //printf('Error updating record: ' . mysqli_error($con));;
                    }

					header('location: https://restream.chisdealhd.co.uk/user/index.php');

				}else if ($logged_in_user['user_type'] == 'streamer') {

					
					$_SESSION['user'] = $logged_in_user;

                    $_SESSION['success']  = "You are now logged in";

		            if ($logged_in_user['autoupuser'] == 1 ) {
                        $username = $user->getUsername();
                        $avatar = "https://cdn.discordapp.com/avatars/" . $user->getId() . "/" . $user->getAvatarHash() . ".png";
		            } else {
                        $username = $logged_in_user['username'];
                        $avatar = $logged_in_user['avatar'];
                    }
                    
                    $discordtag = $user->getDiscriminator();
                    $queryupdater = "UPDATE profile SET username='$username', avatar='$avatar', tag='$discordtag' WHERE userid='$disID'";
                    
                    
                    if (mysqli_query($dbconnect, $queryupdater)) {
                        //printf('Record updated successfully');
                    } else {
                        //printf('Error updating record: ' . mysqli_error($con));;
                    }

					header('location: https://restream.chisdealhd.co.uk/user/index.php');

				} else {

					$_SESSION['user'] = $logged_in_user;

					$_SESSION['success']  = "You are now logged in";

                    //$email = $user->getEmail();
                    $username = $user->getUsername();
                    $discordtag = $user->getDiscriminator();
                    $avatar = "https://cdn.discordapp.com/avatars/" . $user->getId() . "/" . $user->getAvatarHash() . ".png";
                    $queryupdater = "UPDATE profile SET username='$username', avatar='$avatar', tag='$discordtag' WHERE userid='$disID'";
                    
                    if (mysqli_query($dbconnect, $queryupdater)) {
                        //printf('Record updated successfully');
                    } else {
                        //printf('Error updating record: ' . mysqli_error($con));;
                    }

					header('location: https://restream.chisdealhd.co.uk/user/index.php');

                }
            } else {
                header('location: https://restream.chisdealhd.co.uk/user/banned.php');
            }
        } else {

            $user_type = "user";
            $username = $user->getUsername();
            $discordtag = $user->getDiscriminator();
            $avatar = "https://cdn.discordapp.com/avatars/" . $user->getId() . "/" . $user->getAvatarHash() . ".png";
            $query = "INSERT INTO profile (username, user_type, avatar, tag, userid) 

            VALUES('$username', '$user_type', '$avatar', '$discordtag', '$disID')";
            
            mysqli_query($dbconnect, $query);
            
            
            if (mysqli_connect_errno()) {
              printf("Connect failed: %s\n", mysqli_connect_error());
              exit();
            }

            $logged_in_user_id = mysqli_insert_id($con);

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session

			      $_SESSION['success']  = "You are now logged in";
            header('location: https://restream.chisdealhd.co.uk/user/index.php');
        }
        
        
        
        mysqli_close($con);

    } catch (Exception $e) {

        // Failed to get user details
        exit('Oh dear...');

    }
}

?>
