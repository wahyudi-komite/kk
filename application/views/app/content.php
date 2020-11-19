<!--alerts CSS -->
<link href="<?=$app_web;?>node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div>

<div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="icon-screen-desktop"></i></h3>
                            <p class="text-muted">JUMLAH JAMAAH</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-primary"><?=$jml_jamaah;?></h2>
                        </div>
                    </div>
                </div>
<!--                 <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 5%; height: 6px;" aria-valuenow="<?=$jml_jamaah;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="icon-note"></i></h3>
                            <p class="text-muted">TOTAL KK</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-cyan"><?=$jml_kk;?></h2>
                        </div>
                    </div>
                </div>
<!--                 <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 8%; height: 6px;" aria-valuenow="<?=$jml_kk;?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

<div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3>PA</h3>
                            <p class="text-muted"> 0 - 13 th</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-primary"><?=$jml_pa;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3>PT</h3>
                            <p class="text-muted">13 - 17 th</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-cyan"><?=$jml_pt;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
     <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3>GP</h3>
                            <p class="text-muted">17 - 35 th<br>[Single]</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-purple"><?=$jml_gp;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
     <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3>PKP</h3>
                            <p class="text-muted">17 - 60 th<br>[Merried Wanita]</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-success"><?=$jml_pkp;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
     <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3>PKB</h3>
                            <p class="text-muted">17 - 60 th<br>[Merried Pria]</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-info"><?=$jml_pkb;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
     <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3>PKLU</h3>
                            <p class="text-muted">>= 06 Th</p>
                        </div>
                        <div class="ml-auto">
                            <h2 class="counter text-warning"><?=$jml_pklu;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive m-t-0">
                    <table id="tbl" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Status</th>
                            	<th>Sektor</th>
                                <th>Nomor KK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Daftar</th>
                                <th>HP</th>
                                <th>Jenis Kelamin</th>
                                <th>Hub. Keluarga</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Tanggal Baptis</th>
                                <th>Tanggal Sidi</th>
                                <th>Tanggal Nikah</th>
                                <th>Pendidikan</th>
                                <th>Profesi</th>
                                <th>Ketrampilan</th>
                                <th>Pengalaman Organisasi</th>
                                <th>KTP</th>
                                <th>KK</th>
                                <th>SIDI</th>
                                <th>BAPTIS</th>
                                <th>SURAT NIKAH</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Comment - chats -->
<!-- ============================================================== -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Jamaah</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Jamaah</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Over Visitor, Our income , slaes different and  sales prediction -->
<!-- ============================================================== -->
<script src="<?=$app_web;?>node_modules/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$app_web;?>node_modules/datatables/dataTables.buttons.min.js"></script>
<script src="<?=$app_web;?>node_modules/datatables/buttons.flash.min.js"></script>
<script src="<?=$app_web;?>node_modules/datatables/jszip.min.js"></script>
<script src="<?=$app_web;?>node_modules/datatables/pdfmake.min.js"></script>
<script src="<?=$app_web;?>node_modules/datatables/vfs_fonts.js"></script>
<script src="<?=$app_web;?>node_modules/datatables/buttons.html5.min.js"></script>
<script src="<?=$app_web;?>node_modules/datatables/buttons.print.min.js"></script>

<!-- Sweet-Alert  -->
<script src="<?=$app_web;?>node_modules/sweetalert/sweetalert.min.js"></script>
<script src="<?=$app_web;?>node_modules/sweetalert/jquery.sweet-alert.custom.js"></script>
<script>
    $(document).ready(function() {
      
	    $('#tbl').DataTable({
	        // "dom": "<'row'<'col-sm-3'B><'col-sm-6'l><'col-sm-3'f>" +
                          // "<'row'<'col-sm-12'tr>>" +
                          // "<'row'<'col-sm-4'i><'col-sm-8'p>>",
            "dom": 'Blfrtip',
	        "buttons": [  'copy', 'excel'
	            
	        ],
	        "processing": true,
	        "serverside": true,
	        "ajax" : { "type" : "post", "url":"<?=base_url();?>Dashboard/json" },
            "order"     :  [[3, "asc"]],
            "columnDefs" : [
                { "sClass": "text-center", "aTargets": [ 0,1,2,6,7,8,9,11,12,13,14,15 ]},
                { "sClass": "text-center", "aTargets": [ 23,19,20,21,22 ],
                                "mRender": function ( data, type, full ) 
                                {

                                  if(data!=''){return '<a href="<?=base_url();?>dashboard/r145c97437bf81a2f991542bf0da3824d/'+data+'" class="btn btn-xs btn-success" target="_blank">OK</a>';}else{return '<button class="btn btn-xs btn-danger">Belum Ada</button>';}
                                  
                                }
                            },
                { "sClass": "text-center", "aTargets": [ 14 ],
                                "mRender": function ( data, type, full ) 
                                {
                                  if(data=='0000-00-00'){return '<button class="btn btn-xs btn-danger">Belum Menikah</button>';}else{return data;}
                                  
                                }
                            },
                { "sClass": "text-center", "aTargets": [ 1 ],
                    "mRender": function ( data, type, full ) 
                    {
                      if(data=='0'){return '<button class="btn btn-xs btn-success">Aktif</button>';}else{return '<button class="btn btn-xs btn-danger">Disable</button>';}
                      
                    }
                }
            ],
	        "columns": [
                {"data": "ac"},
                {"data": "kk_status"},
                {"data": "kk_sektor"},
                {"data": "kk_no"},
                {"data": "kk_nama"},
                {"data": "kk_email"},
                {"data": "kk_daftar"},
                {"data": "kk_telpon"},
                {"data": "kk_jk"},
                {"data": "kk_hubungan"},
                {"data": "kk_lahirtmp"},
                {"data": "kk_lahirtgl"},
                {"data": "kk_baptis"},
                {"data": "kk_sidi"},
                {"data": "kk_nikah"},
                {"data": "kk_pendidikan"},
                {"data": "kk_profesi"},
                {"data": "kk_ketrampilan"},
                {"data": "kk_organisasi"},
                {"data": "kk_ktp"},
                {"data": "kk_kk"},
                {"data": "kk_sertifikatsidi"},
                {"data": "kk_suratbaptis"},
                {"data": "kk_nikahimg"}
            ]
	    });
	});

    function rincian($id) {
        var id = $id;
        var dataURL = "Dashboard/v_e/"+id;
        $('#myModal .modal-body').load(dataURL, function(){
            $('#myModal').modal({show:true});
        });
    }

    function hapus($id) {        
        event.preventDefault();
        var id = $id;        
        var dataURL = "Dashboard/v_x/"+id;
        swal({
            title:"Hapus Member",
            text:"Yakin akan menghapus member ini ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            closeOnConfirm: true,
        },
        function(){
            $.ajax({
                url:"<?php echo base_url();?>"+dataURL,
                type:"post",
                data:{id:id},
                success: function(){
                    // $("tr[data-id='"+id+"']").fadeOut("fast",function(){
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        window.location = "Dashboard";
                    // });
                }
            });
        });
    }
</script>