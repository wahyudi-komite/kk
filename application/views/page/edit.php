<link href="<?=$app_web;?>dist/css/pages/floating-label.css" rel="stylesheet">
<link href="<?=$app_web;?>node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?=$app_web;?>node_modules/dropify/dist/css/dropify.min.css">
<style type="text/css">
    label{ 
        /*font-weight: bold;*/
        color: blue;
    }
    .select2{
        width: 250px;
        padding-top: 5px;
    }
</style>
<form class="form-material row" autocomplete="off" method="POST" action="<?=base_url();?>dashboard/simpan" id="checkout-form" novalidate="novalidate" enctype="multipart/form-data">

    <div class="form-group m-b-10 col-md-2" id="d_sektor">
        <label class="m-b-0">Sektor</label>
        <?=$kk_sektor;?> <input type="hidden" name="trigger" id="trigger" value="0">
    </div>
    <?=$kk_id;?>
    <div class="form-group m-b-10 col-md-4" id="kk">
        <label class="m-b-0">Nomor KK <?=$kk_status;?></label>
        <?=$kk_no;?>
    </div>
   
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label">Status</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="kk_status" value="0" class="custom-control-input" <?php if ($kk_status == '0'){ echo 'checked';}else{ echo "";}?> >
                <label class="custom-control-label" for="customRadio1">Aktif</label>
            </div>

        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label"> &nbsp</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="kk_status" value="1" class="custom-control-input"  <?php if ($kk_status == '1'){ echo 'checked';}else{ echo "";}?> >
                <label class="custom-control-label" for="customRadio2">Disable</label>
            </div>
        </div>
    </div>
    
        <div class="form-group m-b-10 col-md-12">
            <label class="m-b-0">Nama</label>
            <?=$kk_nama;?>                        
        </div>
        <div class="form-group m-b-10 col-md-2">
            <label class="m-b-0">Jenis Kelamin</label>
            <?=$kk_jk;?>
        </div>
        <div class="form-group m-b-10 col-md-4">
           <h5> <label class="m-b-0">Tempat Lahir</label></h5>
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
         <div class="form-group m-b-10 col-md-4">
            <label class="m-b-0">Hubungan Dalam Keluarga</label>
            <?=$kk_hubungan;?>                        
        </div>
        <div class="form-group m-b-10 col-md-3">
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
        <div class="form-group m-b-10 col-md-3">
            <label class="m-b-0">Tanggal Sidi</label>
            <?=$kk_sidi;?>                        
        </div>
        <div class="form-group m-b-10 col-md-5">
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
        <div class="row">
            <div class="form-group m-b-10 col-md-12">
                <label class="m-b-0">Pengalaman Organisasi</label>
                <textarea class="form-control" rows="4" id="kk_organisasi" name="kk_organisasi"></textarea>                                        
            </div>
            <div class="form-group m-b-4 col-md-4">
                <label class="m-b-0">Upload KTP</label>
                <input type="file" id="kk_ktp" name="kk_ktp" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" data-default-file="<?=$app_web;?>images/ktp/<?=$kk_ktp;?>" />
            </div>
            <div class="form-group m-b-4 col-md-4">
                <label class="m-b-0">Upload KK</label>
                <input type="file" id="kk_kk" name="kk_kk" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" data-default-file="<?=$app_web;?>images/ktp/<?=$kk_kk;?>" />
            </div>
            <div class="form-group m-b-4 col-md-4">
                <label class="m-b-0">Upload Sertifikat SIDI</label>
                <input type="file" id="kk_sertifikatsidi" name="kk_sertifikatsidi" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" data-default-file="<?=$app_web;?>images/ktp/<?=$kk_sertifikatsidi;?>" />
            </div>
            <div class="form-group m-b-4 col-md-4">
                <label class="m-b-0">Upload Surat Baptis</label>
                <input type="file" id="kk_suratbaptis" name="kk_suratbaptis" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" data-default-file="<?=$app_web;?>images/ktp/<?=$kk_suratbaptis;?>" />
            </div>
            <div class="form-group m-b-4 col-md-4">
                <label class="m-b-0">Upload Surat Nikah</label>
                <input type="file" id="kk_nikahimg" name="kk_nikahimg" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf gif jpg png jpeg" data-default-file="<?=$app_web;?>images/ktp/<?=$kk_nikahimg;?>" />
            </div>
        </div>
        <div class="form-group m-b-10 col-md-3" >
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
            <button type="reset" class="btn btn-danger waves-effect waves-light m-r-10" id="btl__" data-dismiss="modal">Batal</button>
        </div>
    </div>
</form>

<script src="<?=$app_web;?>node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

<script src="<?=$app_web;?>dist/js/jquery.validate-1.14.0.min.js" type="text/javascript"></script>
<script src="<?=$app_web;?>dist/js/jquery-validate.bootstrap-tooltip.min.js" type="text/javascript"></script>
<script src="<?=$app_web;?>node_modules/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.dropify').dropify();
    });
    
    $(".select2").select2();
    $('#checkout-form').validate({
        // Rules for form validation
        rules : {               
            kk_sektor: {required : true
                        
                        },
            kk_no       : {required : true},
            kk_nama     :{ required : true},
            kk_jk       : {required : true},
            kk_lahirtmp : {required : true},
            kk_lahirtgl : {required : true},
            kk_hubungan : {required : true},
            kk_telpon   : {required : true},
            kk_email    : {required : true}
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