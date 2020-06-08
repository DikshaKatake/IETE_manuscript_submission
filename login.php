<?php
	session_start();
?>

<?php require ("dev/vendor/autoload.php");
  
//Step 1: Enter you google account credentials
$g_client = new Google_Client();

$g_client->setClientId("58684035407-7ds3gehf7drj0vfdtq2mue8nf1jpp7qi.apps.googleusercontent.com");
$g_client->setClientSecret("xuUioYHovi5FDxiyLFUyxr40");
$g_client->setRedirectUri("http://localhost:8080/ration/index.php");
$g_client->setScopes("email");

//Step 2 : Create the url
$auth_url = $g_client->createAuthUrl();

//Step 3 : Get the authorization  code
$code = isset($_GET['code']) ? $_GET['code'] : NULL;

//Step 4: Get access token
if(isset($code)) {

    try {

        $token = $g_client->fetchAccessTokenWithAuthCode($code);
        $g_client->setAccessToken($token);

    }catch (Exception $e){
        echo $e->getMessage();
    }




    try {
        $pay_load = $g_client->verifyIdToken();


    }catch (Exception $e) {
        echo $e->getMessage();
    }

} else{
    $pay_load = null;
}

if(isset($pay_load)){


    

}

?>
		<?php
		if(isset($_POST['submit']))
		{
			$username=$_POST['email'];
			$password=$_POST['pass'];
			$con = mysqli_connect("localhost", "root","","iete_journal");


			$query="select * from register WHERE email='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
                while($row = mysqli_fetch_assoc($query_run)) 
                {
                    $_SESSION['current_user_id'] = $row['user_id'];
                    $status = $row['status'];
                    // valid
                    // $_SESSION['user_name']= $username;  
                    // header('location:manuscript_submission.php');
                    if($status == 0) //editor
                    {
                        header('location:editor_allocation.php');
                    }
                    if($status == 1) //reviewer
                    {
                        header('location:reviewer_dashboard.php');
                    }
                    if($status == 2) //author
                    {
                        header('location:author_dashboard.php');
                    }
                }
			}
			else
			{
				// invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		?>


<!-- Default form login -->
<head>
    <!-- Font Awesome -->

    <style>
        .my_container{
            margin:100px 470px !important;
            border-radius: 50px;
        }
    </style>

<?php 
    include('mdb_header.php');
?>
</head>
<body class="aqua-gradient">

<div class = "my_container text-center white">
    <form class="text-center p-5" method="post" action="#">

        <p class="h4 mb-4">Sign in</p>

        <!-- Email -->
        <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" name="pass" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

        <div class="d-flex justify-content-around">
            <div>
                <!-- Remember me -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                </div>
            </div>
            <div>
                <!-- Forgot password -->
                <a href="">Forgot password?</a>
            </div>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" name="submit" type="submit">Sign in</button>

        <!-- Register -->
        <p>Not a member?
            <a href="register.php">Register</a>
        </p>

        <!-- Social login -->
        <p>or sign in with:</p>
          
        <a <?php echo " href='$auth_url'" ?> class="mx-2" role="button" name="sign"><i class="fab fa-google fa-2x"></i></a>
    
    </form>


<?php 
    include('mdb_footer.php');
	
?>

    </body>

<!-- Default form login -->

</html>