<h1>Selamat Datang Di Toko Online</h1>
<div class="col-md-6">
	<div class="row">
		<input type="text" name="cari" id="cari" placeholder="cari disini" class="form-control"><br>
	</div>
</div>
<div class="col-md-12">
	
	<div class="row">
  		<div id="tampil_barang">
  			
	</div>
</div>
</div>

<div class="modal fade" id="detail_barang">
<div class="modal-dialog modal-lg">
  				<div class="modal-content">
  					<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">
  						<span aria-hidden="true"></span>
  						<span class="sr-only">Close</span>
  						</button>
  						<h4 class="modal-title">Detail Barang</h4>
  					</div>
  					<div class="modal-body">
  						<div class="row">
  							<div class="col-md-6">
  								<div id="gambar"></div>
  							</div>
  							<div class="col-md-6">
  								<div id="deskripsi"></div>
  								<div id="jumlah"></div>
  								<br>
  								<div id="btn"></div>
  								<br>
  								<div id="pesan"></div>
  							</div>
  						</div>
  						
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  					</div>
  				</div>
  			</div>
  		</div>
  		</div>
<script type="text/javascript">
//menampilkan semua barang
	$.getJSON("<?= base_url()?>index.php/get_barang",function(data){
		var datanya="";
		$.each(data,function(key,dt){
			datanya+=
			'<div class="col-xs-6 col-md-3"><a href="#detail_barang" class="thumbnail text-center" data-toggle="modal" onclick="tm_detail('+dt['id_barang']+')" style="text-decoration:none"><img style="height:100px" src="<?= base_url('asset/gambar/')?>'+dt['gambar']+'" alt="...">'+dt['nama_barang']+'<br>'+dt['harga']+'</a></div>';
		});
		$('#tampil_barang').html(datanya);
	});

//caribarang
	$("#cari").on('keyup',function(){
		$.getJSON("<?= base_url()?>index.php/get_barang/cari/"+$("#cari").val(),function(data){
				var datanya="";
		$.each(data,function(key,dt){
			datanya+=
				'<div class="col-xs-6 col-md-3"><a href="#detail_barang" class="thumbnail text-center" data-toggle="modal" onclick="tm_detail('+dt['id_barang']+')" style="text-decoration:none"><img style="height:100px" src="<?= base_url('asset/gambar/')?>'+dt['gambar']+'" alt="...">'+dt['nama_barang']+'<br>'+dt['harga']+'</a></div>';
			});
			$("#tampil_barang").html(datanya);
	});
});

//tampilan detail barang
function tm_detail(id_barang){
	$.getJSON("<?= base_url()?>index.php/get_barang/detail/"+id_barang,function(data){
		$('#gambar').html(
			'<img src="<?= base_url()?>asset/gambar/'+data['gambar']+'" style="width:100%">'
			);
		$('#deskripsi').html(
		'<table class="table table-hover table-striped">'+
			'<tr><td>Nama Barang</td><td>'+data['nama_barang']+'</td></tr>'+
			'<tr><td>Harga Barang</td><td>'+data['harga']+'</td></tr>'+
			'<tr><td>Stok Barang</td><td>'+data['stok']+'</td></tr>'+
			'<tr><td>Nama Kategori</td><td>'+data['nama_kategori']+'</td></tr>'+
		'</table>'
			);

		$('#jumlah').html(
			'<input type="number" id="jumlah_item" value="1" class="form-control">'
			);
		$('#btn').html(
				'<button id="beli" onclick="beli('+data['id_barang']+')" class="btn btn-info">BELI</button>'+
				'<a href="<?= base_url()?>index.php/Trans" class="btn btn-danger">CHECK OUT</a>'
			);
	});
}

//menambahkan barang ke keranjang
function beli(id_barang){
	var jumlah=$('#jumlah_item').val();
	$('#pesan').hide();
	$('#pesan').removeClass("alert alert-success");
	$.getJSON("<?= base_url()?>index.php/trans/tambah_cart/"+id_barang+"/"+jumlah,function(hasil){

		$('#cart').html(hasil['total_cart']);
		$('#pesan').html("item anda ditambahkan ke cart");
		$('#pesan').addClass('alert alert-success');
		$('#pesan').show('animate');
		setTimeout(function(){
			$('#pesan').hide('fade');
		}, 3000);
	});
}
</script>