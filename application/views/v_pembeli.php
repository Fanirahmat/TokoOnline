<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1 class="align-center">TABEL PEMBELI</h1>
<div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Datail</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                <span class="m-r-10 font-12">Tambah Data</span>
                                     <button type="button" href="#tambah" data-toggle="modal" class="btn bg-blue btn-circle waves-effect waves-circle waves-float btn btn-primary">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                        <div class="body">
                        	<div class="row">
                        		
                            <div class="col-md-12">
                           
                            	<table class="table table-hover table-striped">
                            		<tr>
                            			<th>NO.</th><th>ID Pembeli</th><th>Nama Pembeli</th><th>Alamat</th><th>No. Telepon</th><th>Username</th><th>Password</th><th>Action</th>
                            		</tr>
                                    <?php
                                    $no=0;
                                      foreach ($data_pembeli as $dt_pem) {
                                        $no++;
                                        echo '<tr>
                                                <td>'.$no.'</td>
                                                <td>'.$dt_pem->id_pembeli.'</td>
                                                <td>'.$dt_pem->nama_pembeli.'</td>
                                                <td>'.$dt_pem->alamat.'</td>
                                                <td>'.$dt_pem->no_telp.'</td>
                                                <td>'.$dt_pem->username.'</td>
                                                <td>'.$dt_pem->password.'</td>
                                                <td><a href="#update_pembeli" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_pem->id_pembeli.')">Update</a>  <a href='.base_url('index.php/pembeli/delete_pembeli/'.$dt_pem->id_pembeli).' class="btn bg-red" onclick="return confirm(\'anda yakin untuk menghapus data dari list\')">Delete</a></td>

                                              </tr>';
                                      }
                                    ?>
                            		
                            		
                            	</table>
                               <?php if ($this->session->flashdata('pesan')!=null): ?>
                                   <div class="alert alert-danger">
                                       <?= $this->session->flashdata('pesan')?>
                                   </div>
                               <?php endif ?>
                            	
                            </div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Pembeli</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/pembeli/simpan_pembeli')?>" method="post" >
            <label>nama pembeli</label>
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
            <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<div class="modal fade" id="update_pembeli">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Pembeli</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/pembeli/update_pembeli')?>" method="post" >
            <input type="hidden" name="id_pembeli" id="id_pembeli">
            <label>nama pembeli</label>
            <input type="text" name="nama_pembeli" class="form-control" placeholder="" id="nama_pembeli"><br>
            <label>alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="" id="alamat"><br>
            <label>no. telepon</label>
            <input type="text" name="no_telp" class="form-control" placeholder="" id="no_telp"><br>
            <label>Username</label><br>
            <input type="text" name="username" class="form-control" id="username">
            <br>
            <label>Password</label><br>
            <input type="text" name="password" id="password" class="form-control"><br><br>
            <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</div><!-- /.modal -->
<script>
  function tm_detail(baru){
    $.getJSON("<?=base_url()?>index.php/pembeli/get_detail_pembeli/"+baru,
      function(data){
       $('#id_pembeli').val(data['id_pembeli']);
      $('#nama_pembeli').val(data['nama_pembeli']);
      $('#alamat').val(data['alamat']);
      $('#no_telp').val(data['no_telp']);
      $('#username').val(data['username']);
      $('#password').val(data['password']);
    });
  }
</script>
</body>
</html>