<link href="<?=$app_web;?>dist/css/pages/floating-label.css" rel="stylesheet">
<link href="<?=$app_web;?>node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?=$app_web;?>node_modules/dropify/dist/css/dropify.min.css">

<style type="text/css">
	body{
		color: #98a8d4;
	}
 	em{
 		color: red;
 		font-size: 12px;
 	}
 	.select2{
 		width: 300px;
 		padding-top: 10px;
 	}
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tambah Data Jamaah</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            	
                <form class="form-material row" autocomplete="off" method="POST" action="<?=base_url();?>add/simpan" id="checkout-form" novalidate="novalidate" enctype="multipart/form-data">
                	<div class="form-group m-b-10 col-md-3 pilih" >
                    	<button type="button" id="tbh_ang" class="btn btn-danger">Tambahkan Anggota Keluarga</button>
                    </div>
                    <div class="form-group m-b-10 col-md-9 pilih" >
                        <button type="button" id="tbh_kel" class="btn btn-info">Membuat Keluarga Baru</button>
                    </div>
                	<div class="form-group m-b-10 col-md-2" id="d_sektor">
                    	<label class="m-b-0">Sektor</label>
                        <?=$kk_sektor;?> <input type="hidden" name="trigger" id="trigger" value="0">
                    </div>

                    <div class="form-group m-b-10 col-md-4" id="kk">
                    	<label class="m-b-0">Cek Nomor KK</label>
                        <?=$kk_no;?>
                        
                    </div>
                	<div class="col-md-12 kk_detail" id="table_kk"></div>
	                <div class="form-group m-b-10 col-md-3 kk_detail" >
	                	<button type="button" id="tbh_" class="btn btn-info">Tambahkan Anggota Keluarga</button>
                    </div>
                    <div class="form-group m-b-10 col-md-3 kk_detail" >
                        <button type="button" id="btl" class="btn btn-danger">Batal</button>
                    </div>
                    
                    <div class="row" id="reg">
                    	<hr style="width: 100%">
		                    <div class="form-group m-b-10 col-md-12">
		                    	<label class="m-b-0">Nama</label>
		                        <?=$kk_nama;?>                        
		                    </div>
	                    <div class="form-group m-b-10 col-md-2">
	                    	<label class="m-b-0">Jenis Kelamin</label>
	                        <?=$kk_jk;?>
	                    </div>
	                    <div class="form-group m-b-10 col-md-4">
	                    	<h5 class="m-b-0">Tempat Lahir</h5>
	                        <?=$kk_lahirtmp;?>                        
	                    </div>
	                    <div class="form-group m-b-10 col-md-6">
	                    	<label class="m-b-0">Tanggal Lahir</label>
	                        <?=$kk_lahirtgl;?>
	                    </div>
	                    <div class="form-group m-b-10 col-md-12">
	                    	<label class="m-b-0">Alamat</label>
	                        <?=$kk_alamat;?>
	                    </div>
	                     <div class="form-group m-b-10 col-md-12">
	                    	<label class="m-b-0">Domisili</label>
	                        <?=$kk_domisili;?>
	                    </div>
	                     <div class="form-group m-b-10 col-md-3">
	                        <label class="m-b-0">Hubungan Dalam Keluarga</label>
	                        <?=$kk_hubungan;?>                        
	                    </div>
	                    <div class="form-group m-b-10 col-md-2">
	                    	<label class="m-b-0">Nomor Telepone</label>
	                        <?=$kk_telpon;?>
	                    </div>
	                    
	                    <div class="form-group m-b-10 col-md-5">
	                        <label class="m-b-0">Email</label>
	                        <?=$kk_email;?>                        
	                    </div>
	                    <div class="form-group m-b-10 col-md-4">
	                        <label class="m-b-0">Tanggal Baptis</label>
	                        <?=$kk_baptis;?>
	                    </div>
	                    <div class="form-group m-b-10 col-md-4">
	                        <label class="m-b-0">Tanggal Sidi</label>
	                        <?=$kk_sidi;?>                        
	                    </div>
	                    <div class="form-group m-b-10 col-md-4">
	                        <label class="m-b-0">Tanggal Pernikahan</label>
	                        <?=$kk_nikah;?>
	                    </div>
	                    <div class="form-group m-b-10 col-md-12">
	                    	<label class="m-b-0">Pendidikan</label>
	                        <?=$kk_pendidikan;?>
	                    </div>
	                    <div class="form-group m-b-10 col-md-12">
	                        <label class="m-b-0">Profesi</label>
	                        <?=$kk_profesi;?>
	                    </div>
	                    <div class="form-group m-b-10 col-md-12">
	                        <label class="m-b-0">Ketrampilan</label>
	                        <?=$kk_ketrampilan;?>
	                    </div>
	                    <div class="form-group m-b-10 col-md-12">
	                    	<label class="m-b-0">Pengalaman Organisasi</label>
	                        <textarea class="form-control" rows="4" id="kk_organisasi" name="kk_organisasi"></textarea>                                        
	                    </div>
	                    <div class="form-group m-b-3 col-md-2">
	                        <label class="m-b-0">Upload KTP</label>
	                        <input type="file" id="kk_ktp" name="kk_ktp" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" />
	                    </div>
	                    <div class="form-group m-b-3 col-md-2">
	                        <label class="m-b-0">Upload KK</label>
	                        <input type="file" id="kk_kk" name="kk_kk" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" />
	                    </div>
	                    <div class="form-group m-b-3 col-md-2">
	                        <label class="m-b-0">Upload Sertifikat SIDI</label>
	                        <input type="file" id="kk_sertifikatsidi" name="kk_sertifikatsidi" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" />
	                    </div>
	                    <div class="form-group m-b-3 col-md-2">
	                        <label class="m-b-0">Upload Surat Baptis</label>
	                        <input type="file" id="kk_suratbaptis" name="kk_suratbaptis" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" />
	                    </div>
	                    <div class="form-group m-b-3 col-md-2">
	                        <label class="m-b-0">Upload Surat Nikah</label>
	                        <input type="file" id="kk_nikahimg" name="kk_nikahimg" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" />
	                    </div>

	                    <div class="form-group m-b-10 col-md-3" >
	                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
	                    <button type="reset" class="btn btn-danger waves-effect waves-light m-r-10" id="btl__">Batal</button>
	                	</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?=$app_web;?>node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

<script src="<?=$app_web;?>dist/js/jquery.validate-1.14.0.min.js" type="text/javascript"></script>
<script src="<?=$app_web;?>dist/js/jquery-validate.bootstrap-tooltip.min.js" type="text/javascript"></script>
<script src="<?=$app_web;?>node_modules/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#d_sektor,#kk, .kk_detail, #reg").hide();
		$(".select2").select2();
		$('.dropify').dropify();
		$("#tbh_ang").click(function(){
			$("#d_sektor").show();
			$(".pilih").hide();
			
		});

		$("#tbh_kel").click(function(){
			$("#d_sektor").show();
			$(".pilih").hide();
			$("#trigger").val(2);
		});

		$("#btl").click(function(){
			$(".pilih").show();
			$("#d_sektor, #kk, .kk_detail, #reg").hide();
		});

		$("#btl__").click(function(){
			$(".pilih").show();
			$("#d_sektor, #kk, .kk_detail, #reg").hide();
		});

		$("#tbh_").click(function(){
			$("#reg").show();
			$("#kk_nama").focus();
		});

		$("#kk_sektor").change(function(){
			var trigger = $('#trigger').val();
			if( trigger == 2)
			{
				$("#reg").show();
			}
			else
			{
				var value = $(this).val();
				if(value != '')
				{
					$.ajax({
						type:"POST",
						url: "<?php echo base_url('add/get_kk') ?>",
						cache: false,
						data:{id:value},
						success: function(respond)
						{
							$("#kk_no").html(respond);
							$("#kk").show();
							$(".kk_detail, #table_kk").hide();
						}
					})
				}else{
					$("#kk, #reg").hide();
				}
			}
		});

		$("#kk_no").change(function(){
			var value = $(this).val();
			if(value != '')
			{
				$.ajax({
					type:"POST",
					url: "<?php echo base_url('add/get_kkdetail') ?>",
					cache: false,
					data:{id:value},
					success: function(respond)
					{
						$("#table_kk").html(respond);
						$(".kk_detail").show();
					}
				})
			}else{
				$(".kk_detail, #table_kk").hide();
			}
		});
	});

	$('#checkout-form').validate({
        // Rules for form validation
        rules : {               
            kk_sektor: {required : true},
            kk_no		: {required : true},
            kk_nama		:{ required : true},
            kk_jk		: {required : true},
            kk_lahirtmp	: {required : true},
            kk_lahirtgl	: {required : true},
            kk_hubungan	: {required : true},
            kk_telpon	: {required : true},
            kk_email	: {required : true}
        },

        // Messages for form validation
        messages : {
            kk_sektor: {required : 'Pilih salah satu'},
            kk_no: {required : 'Pilih salah satu'},
            kk_nama: {required : 'Tidak boleh kosong'},
            kk_jk: {required : 'Tidak boleh kosong'},
            kk_lahirtmp: {required : 'Tidak boleh kosong'},
            kk_lahirtgl: {required : 'Tidak boleh kosong'},
            kk_hubungan: {required : 'Tidak boleh kosong'},
            kk_telpon: {required : 'Tidak boleh kosong'},
            kk_email: {required : 'Tidak boleh kosong'}
        },
        tooltip_options: {
           kk_nama: { placement: 'top' }
        },

        submitHandler : function( form ) {
            $(form).ajaxSubmit({
                success : function() {  
                    redirect("dashboard");
                }
            });
        },
        
        // Do not change code below
        errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
        }
	});

</script>