<h2>Pesanan Anda</h2>

<div class="col-md-12" style="background: white;">
	<div class="row">
		<a href="<?= base_url('index.php/dashboard_user')?>" class="btn btn-primary">Belanja Lagi</a>
		<a href="#bayar" data-toggle="modal" onclick="simpan_list_db()" class="btn btn-warning">Bayar</a>
		<table class="table table-hover table-stripped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Quantity</th>
					<th>Subtotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="tm_pesanan">
				
			</tbody>
		</table>
		<div id="pesan"></div>
	</div>
</div>
 <div class="modal fade" id="bayar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Pembayaran</h4>
      </div>
      <div class="modal-body">
        <h3>Terima Kasih anda telah memesan produk kami </h3>
        <p>Untuk melanjutkan pembelian, silahkan transfer uang sejumlah Rp. <span id="totalnya">0</span> ke rekening berikut:</p>
        <p>BANK BRI : 0987654345678</p>
        jika sudah transfer, silahkan upload bukti transfer di bawah ini;
        <form method="post" id="upload_bukti" enctype="multipart/form-data">
      		  <input type="file" name="bukti" class="form-control"><br>
      		  <input type="hidden" name="id_nota" id="id_nota">   		  
      		  <img src="<?= base_url()?>asset/bukti" id="loading" style="width: 30px;float: left;display: none;">
      		  <input type="submit" name="submit" value="kirim" class="btn btn-success" style="float: left;margin-right: 10px;">
      		  <span id="pesan1"></span>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script type="text/javascript">
	function load_cart(){
		$("#tm_pesanan").html('');
		$.getJSON("<?= base_url()?>index.php/Trans/tm_pesanan",function(hasil){
			var no=0;
			$.each(hasil['data_cart'],function(key,obj){
				no++;
				$("#tm_pesanan").append(
					'<tr>'+
						'<td>'+no+'</td>'+
						'<td>'+obj['name']+'</td>'+
						'<td>'+obj['qty']+'</td>'+
						'<td align="right">'+obj['subtotal']+'</td>'+
						'<td><a href="#" onclick="if(confirm(\'Apakah Yakin?\')){ hapus_cart(\''+obj['rowid']+'\')}"><i class="material-icons">delete</i></a></td>'+
					'</tr>'
					);
			});
			$("#tm_pesanan").append(
				'<tr>'+
					'<td colspan="3">Total Keseluruhan</td>'+
					'<td align="right">'+hasil['total_seluruh']+'</td>'+
					'<td><a href="#" onclick="if (confirm(\'Apakah Anda Yakin Untuk Menghapus Data Ini?\')) {hapus_all()}"><i class="material-icons">delete</i></a></td>'+
				'</tr>'
				);
		});
	}
	load_cart();

	function simpan_list_db(){
		$.getJSON("<?= base_url()?>index.php/Trans/simpan_bayar",function(hasil){
			if (hasil['status']==1) {
				$("#pesan").html('Anda Sukses menyimpan ke nota');
				$("#pesan").show('animate');
				$("#pesan").addClass("alert alert-success");
				setTimeout(function(){
					$("#pesan").hide('animate');
					$("#pesan").removeClass("alert alert-success");
					setTimeout(function(){
						$("#totalnya").html(hasil['total']);
						$("#bayar").modal("show");
						$("#id_nota").val(hasil['id_nota']);
						load_total_cart();
						load_cart();
					}, 500);
				}, 3000);
			}
		});
	}

	$("#upload_bukti").submit(function(event){
		event.preventDefault();
		var url = "<?= base_url()?>index.php/Trans/upload_bukti";
		var formData = new FormData($("#upload_bukti")[0]);
		$.ajax({
			url:url,
			type:"post",
			data:formData,
			contentType: false,
			processData: false,
			dataType:"json",
			beforesend:function(){
				$("#loading").css("display","block");
			},
			success:function(hasil){
				if (hasil['status']==1) {
					$('#loading').css("display","none");
					$('#pesan1').html("bukti telah terupload");
					$('#pesan1').show("fade");
					$('#pesan1').addClass("aler alert-success");
					setTimeout(function(){
						$('#pesan1').hide("fade");
						setTimeout(function(){
							$('#bayar').modal("hide");
							$('#pesan1').removeClass("alert alert-success");
						}, 500);
					}, 2000);
				}
				else
				{
					$('#loading').css("display","none");
					$('#pesan1').html("bukti gagal terupload");
					$('#pesan1').show("fade");
					$('#pesan1').addClass("alert alert-danger");
					setTimeout(function(){
						$('#pesan1').hide("fade");
						setTimeout(function(){
							$('#bayar').modal("hide");
							$('#pesan1').removeClass("alert alert-danger ");
						}, 500);
					}, 2000);
				}
			}
		});
	});
</script>