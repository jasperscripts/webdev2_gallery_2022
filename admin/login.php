<?php
require_once "./includes/init.php";

$error_message = "";

if (isset($_POST['submit'])) {
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    $user_found = Users::verify_user($username, $password);

    if (!$user_found) {
        $error_message = "Password or Username is incorrect";
    } else {
        $session->login($user_found);
        redirect("index.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    

    <div id="page-wrapper">
        <div class="container-fluid">
        
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Please login</h1>

                    <?php if($error_message) { ?>
                        <h4 class="bg-danger login-error"><?php echo $error_message; ?></h4>
                    <?php } ?>

                    <div class="account-wall">
                        <img class="profile-img" src="css/img/login_pic.png"alt="">

                        

                        <form class="form-signin" action="login.php" method="post">
                            <input type="text" class="form-control" placeholder="Email" required autofocus name="username">
                            <input type="password" class="form-control" placeholder="Password" required name="password">
                            <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit">

                            <label class="checkbox pull-left">
                                <input type="checkbox" value="remember-me">
                                Remember me
                            </label>
                            <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                        </form>

                    </div>
                    <a href="#" class="text-center new-account">Create an account </a>
                </div>
            </div>
        </div>

        </div>
    </div>
    
</body>
</html>
