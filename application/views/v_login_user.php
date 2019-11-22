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
            <a href="javascript:void(0);">Daftar<b>.COM</b></a>
            <small>Silahkan Masuk</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in untuk memulai pengalaman</div>
                    <div id="pesan" class="alert alert-warning"></div>
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
                        <div class="col-xs-6">
                            <a href="#daftar" data-toggle="modal" class="btn btn-block bg-green waves-effect">Daftar</a>
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
 <div class="modal fade" id="daftar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah User</h4>
      </div>
      <div class="modal-body">
        <form id="proses_daftar" method="post" action="#">
           <label>nama</label>
            <input type="text" name="nama_pembeli" class="form-control" placeholder=""><br>
            <label>alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder=""><br>
            <label>no. telepon</label>
            <input type="text" name="no_telp" class="form-control" placeholder=""><br>
            <label>username</label><br>
            <input type="text" name="username" class="form-control">
            <br>
            <label>password</label><br>
            <input type="text" name="password" class="form-control">
            <br>
            <button name="simpan" value="Simpan" class="btn btn-success">Daftar</button>
            <p id="msg"></p>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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

    <script type="text/javascript">
        $('#proses_daftar').submit(
            function(event){
                event.preventDefault();
            var data_input = $('#proses_daftar').serialize();
            $('#msg').html("<ul><li>Sedang memeriksa...</li></ul>");
            $.ajax({
                url:"<?= base_url()?>index.php/login_user/simpan",
                type:"post",
                data:data_input,
                dataType:"json",
                success:function(hasil){
                    if (hasil['status']=1) {
                        $('#msg').html(hasil['keterangan']);
                        $("[name=nama_pembeli]").val("");
                        $("[name=alamat]").val("");
                        $("[name=no_telp]").val("");
                        $("[name=username]").val("");
                        $("[name=password]").val("");
                        setTimeout(function(){
                            $('daftar').modal("hide");
                        },3000);
                    }
                    else{
                        $('#msg').html(hasil['keterangan']);
                    }
                }
              });
            }
        );

        $('#sign_in').submit(function(event){
            event.preventDefault();
            var datalogin=$('#sign_in').serialize();
            $('#pesan').html("loading...");
            $.ajax({
                url:"<?= base_url()?>index.php/login_user/proses",
                data:datalogin,
                type:"post",
                dataType:"json",
                success:function(hasil){
                    if (hasil['status']==1) {
                        $('#pesan').html("Anda sukses Login");
                        setTimeout(function(){
                            location.href="<?= base_url()?>index.php/dashboard_user";
                            },3000);
                        }
                       else{
                        $('#pesan').html("Username password tidak cocok");
                       }
                }
            })
        })
    </script>
</body>

</html>