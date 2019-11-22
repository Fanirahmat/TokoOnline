<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1 class="align-center">Haloo . . . .</h1>
<div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Kategori</h2>
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
                        		<div class="col-md-4">
                            	<img src="<?= base_url('asset/team1.png')?>" style="width: 68%;">
                            </div>
                            <div class="col-md-8">
                           
                            	<table class="table table-hover table-striped">
                            		<tr>
                            			<th>NO.</th><th>ID Kategori</th><th>Nama Kategori</th>
                            		</tr>
                                    <?php
                                    $no=0;
                                        foreach ($data_kategori as $dt_kat){
                                            $no++;
                                            echo'<tr>
                                                    <td>'.$no.'</td>
                                                    <td>'.$dt_kat->id_kategori.'</td>
                                                    <td>'.$dt_kat->nama_kategori.'</td>
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
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/kategori/simpan_kategori')?>" method="post">
            <input type="text" name="nama_kategori" class="form-control"><br>
            <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </form>
      </div>
      <div class="modal-footer">
        
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>