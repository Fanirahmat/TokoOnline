<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1 class="align-center">TABEL BARANG</h1>
<div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Barang</h2>
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
                            			<th>NO.</th><th>ID Barang</th><th>Nama Barang</th><th>Gambar</th><th>Harga</th><th>Stok</th><th>Nama Kategori</th><th>Action</th>
                            		</tr>
                                    <?php
                                     $no=0;
                                        foreach ($data_barang as $dt_bar) {
                                           $no++;
                                            echo '<tr>
                                                    <td>'.$no.'</td>
                                                    <td>'.$dt_bar->id_barang.'</td>
                                                    <td>'.$dt_bar->nama_barang.'</td>
                                                    <td><img src='.base_url("asset/gambar/$dt_bar->gambar").' width="150px" height="100px"></td>
                                                    <td>'.$dt_bar->harga.'</td>
                                                    <td>'.$dt_bar->stok.'</td>
                                                    <td>'.$dt_bar->nama_kategori.'</td>
                                                    <td><a href="#update_barang" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_bar->id_barang.')">Update</a>
                                                        <a href='.base_url('index.php/barang/hapus_barang/'.$dt_bar->id_barang).' class="btn bg-red" onclick="return confirm(\'anda yakin\')">Delete</a></td>
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
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/barang/simpan_barang')?>" method="post" enctype="multipart/form-data">
            <label>nama barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder=""><br>
            <label>harga barang</label>
            <input type="text" name="harga" class="form-control" placeholder=""><br>
            <label>stok</label>
            <input type="text" name="stok" class="form-control" placeholder=""><br>
            <label>ID Kategori</label><br>
            <select name="id_kategori" class="form-control show-tick">
                <?php foreach ($data_kategori as $kat): 
                     echo"<option value='".$kat->id_kategori."'>".$kat->nama_kategori."</option>";  
                endforeach ?>
            </select>
            <br>
            <label>Upload Gambar</label><br>
            <input type="file" name="gambar" class="form-control"><br>
            <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<div class="modal fade" id="update_barang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Barang</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/barang/update_barang')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_barang" id="id_barang">
            <label>nama barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="" id="nama_barang"><br>
            <label>harga barang</label>
            <input type="text" name="harga" class="form-control" placeholder="" id="harga"><br>
            <label>stok</label>
            <input type="text" name="stok" class="form-control" placeholder="" id="stok"><br>
            <label>ID Kategori</label><br>
            <select name="id_kategori" class="form-control show-tick" id="id_kategori">
                <?php foreach ($data_kategori as $kat): 
                     echo"<option value='".$kat->id_kategori."'>".$kat->nama_kategori."</option>";  
                endforeach ?>
            </select>
            <br>
            <label>Upload Gambar</label><br>
            <input type="file" name="gambar" class="form-control" id="gambar"><br>
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
  function tm_detail(id_barang){
    $.getJSON("<?=base_url()?>index.php/barang/get_detail_barang/"+id_barang,function(data){
       $('#id_barang').val(data['id_barang']);
      $('#nama_barang').val(data['nama_barang']);
      $('#harga').val(data['harga']);
      $('#stok').val(data['stok']);
      $('#id_kategori').val(data['id_kategori']);
      $('#gambar').val(data['gambar']);
    });
  }
</script>
</body>
</html>