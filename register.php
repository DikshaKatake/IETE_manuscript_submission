
<?php
//insert.php
// print_r($_POST);
//  echo 'AT Start';
if(isset($_POST['submit']))
{
$val1=$_POST["name"];
$val2=$_POST["email"];
$val3=$_POST["des"];
$val4=$_POST["aff"];
$val5=$_POST["phone"];
$val6=$_POST["pass"];
$connect = mysqli_connect("localhost", "root","","iete_journal");

$query = "INSERT INTO register(name,designation,affiliation,phone,email,password,status) VALUES ('{$val1}','{$val3}','{$val4}','{$val5}','{$val2}','{$val6}',2)";
if(mysqli_query($connect, $query))
{
    // echo 'Data Inserted';
    header('Location: login.php');
}
else
{
    // echo 'try again';
	header('Location: register.php');
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
    <form class="text-center p-5" method="post" action="#!">

        <p class="h4 mb-4">Sign up</p>



        <input type="name" name="name" id="defaultRegisterFormName" class="form-control mb-4" placeholder="Name">

	   <input type="email" name="email" id="defaultRegisterEmail" class="form-control mb-4" placeholder="E-mail">


       <input type="Designation"  name="des" id="defaultRegisterDesignation" class="form-control mb-4" placeholder="Designation">

       <input type="Affiliation"  name="aff" id="defaultRegisterAffiliation" class="form-control mb-4" placeholder="Affiliation">
 
       <input type="phone" name="phone" id="defaultRegisterphone" class="form-control mb-4" placeholder="Phone No">
 

        <input type="password" name="pass" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

        
         <button class="btn btn-info btn-block my-4" name=" submit" id="submit" type="submit">Register</button>

<?php 
    include('mdb_footer.php');
	
?>
</form>

    </body>

<!-- Default form login -->

</html>