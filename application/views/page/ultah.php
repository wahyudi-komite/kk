<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Data Ulang Tahun</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Happy Birthday</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="text-decoration: underline;">Daftar Ulang Tahun Kelahiran</h4>
                <div class="table-responsive m-t-0">
                    <table id="tbl" class="display nowrap table table-hover table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th width="60%">Nama</th>
                                <th width="10%">Tanggal<br>Lahir</th>
                                <th width="5%">Usia</th>
                                <th width="5%">Hari<br>Lagi</th>
                                <th width="5%" style="background-color: deepskyblue"></th>
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="text-decoration: underline;">Daftar Ulang Tahun Pernikahan</h4>
                <div class="table-responsive m-t-0">
                    <table id="tbl1" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="60%">Nama</th>
                                <th width="10%">Tanggal<br>Nikah</th>
                                <th width="5%">Usia<br>Perkawinan</th>
                                <th width="5%">Hari<br>Lagi</th>
                                <th width="5%" style="background-color: deepskyblue"></th>
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
<!-- Modal -->
<!-- <div class="modal fade modal-lg" id="myModal" role="dialog"> -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Jamaah</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Over Visitor, Our income , slaes different and  sales prediction -->
<!-- ============================================================== -->

<script src="<?=$app_web;?>node_modules/datatables/jquery.dataTables.min.js"></script>

<script>     
    $(document).ready(function() {
        
        $('#myModal').on('hidden.bs.modal', function() {
            $(this).removeData('bs.modal');
        });

	    $('#tbl').DataTable({
	        "dom": "<'row'<'col-sm-6'f><'col-sm-1'><'col-sm-5'>>" +
                          "<'row'<'col-sm-12'tr>>" +
                          "<'row'<'col-sm-6'i><'col-sm-6'p>>",
	        "buttons": [
	            
	        ],
	        "processing": true,
	        "serverside": true,
            "order"     :  [[3, "asc"]],
	        "ajax" : { "type" : "post", "url":"<?=base_url();?>Ultah/json" },
            "columnDefs" : [
                { "sClass": "text-center", "aTargets": [ 1,2,3,4 ]},
                {   "aTargets": [ 2 ],
                    "mRender": function (data, type, full ) 
                    {
                        return '<b>'+data+'</b> thn' ;
                    }
                }
            ],
	        "columns": [
                {"data": "kk_nama"},
                {"data": "kk_lahirtgl"},
                {"data": "usia"},
                {"data": "tang"},
                {"data": "ac"}
            ]
            
	    });

        $('#tbl1').DataTable({
            "dom": "<'row'<'col-sm-6'f><'col-sm-1'><'col-sm-5'>>" +
                          "<'row'<'col-sm-12'tr>>" +
                          "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "buttons": [
                
            ],
            "processing": true,
            "serverside": true,
            "order"     :  [[3, "asc"]],
            "ajax" : { "type" : "post", "url":"<?=base_url();?>Ultah/json_nikah" },
            "columnDefs" : [
                { "sClass": "text-center", "aTargets": [ 1,2,3,4 ]},
                {   "aTargets": [ 2 ],
                    "mRender": function (data, type, full ) 
                    {
                        return '<b>'+data+'</b> thn' ;
                    }
                }
            ],
            "columns": [
                {"data": "kk_nama"},
                {"data": "kk_nikah"},
                {"data": "nikah"},
                {"data": "tang"},
                {"data": "ac"}
            ]
        });
	});

    function rincian($id) {
        var id = $id;
        var dataURL = "Ultah/v_o/"+id;
        $('#myModal .modal-body').load(dataURL, function(){
            $('#myModal').modal({show:true});
        });
    }
</script>