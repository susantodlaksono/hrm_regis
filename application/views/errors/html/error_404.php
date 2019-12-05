<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>404 Page Not Found</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>lib/dist/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="error-title">404</h1>
                <h3 class="text-uppercase error-subtitle"><?php echo $heading; ?></h3>
                <p class="text-muted m-t-30 m-b-30"><?php echo $message; ?></p>
                <a href="<?php echo site_url() ?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>lib/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>lib/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>lib/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
    $(".preloader").fadeOut();
    </script>
</body>
</html>