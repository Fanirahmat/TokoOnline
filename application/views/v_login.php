<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url()?>asset/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url()?>asset/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url()?>asset/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url()?>asset/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url()?>asset/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Login<b>.COM</b></a>
            <small>Silahkan Masuk</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="<?= base_url()?>index.php/login/proses_login">
                    <div class="msg">Sign in untuk memulai pengalaman</div>
                    <?php if ($this->session->flashdata('pesan')!=null): ?>
                            <div class="alert alert-warning">
                                <?= $this->session->flashdata('pesan')?>
                            </div>  
                    <?php endif ?>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url()?>asset/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url()?>asset/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url()?>asset/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url()?>asset/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url()?>asset/js/admin.js"></script>
    <script src="<?= base_url()?>asset/js/pages/examples/sign-in.js"></script>
</body>

</html>