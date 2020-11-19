<link href="<?=$app_web;?>dist/css/pages/floating-label.css" rel="stylesheet"><div class="row page-titles">
    <style type="text/css">
        .us{
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Ganti Password</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Ganti</li>
            </ol>
        </div>
    </div>
</div>
<?php $log_user = $this->session->userdata('session_user');?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
				<form class="form-horizontal form-material" id="loginform" action="verifi_ganti" autocomplete="off" method="post">
					<?php 
                        if ($this->session->flashdata('msg')!==NULL)
                        { 
                        echo $this->session->flashdata('msg');
                        }
                    ?>
				    <div class="form-group m-t-40">
				        <div class="col-xs-4">
				            <input class="form-control text-center us" type="text" required="" placeholder="Username" name="username" id="username" value="<?=$log_user;?>" readonly="readonly">
				        </div>
				    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <input class="form-control" type="password" required="" placeholder="Password Baru" name="password1" id="password1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4">
                            <input class="form-control" type="password" required="" placeholder="Konfirmasi Password Baru" name="password2" id="password2">
                        </div>
                    </div>
				    <div class="form-group m-t-20">
				        <div class="col-xs-8">
				            <button class="btn btn-info btn-lg text-uppercase btn-rounded" type="submit">Log In</button>
				        </div>
				    </div>
				</form>
			</div>
        </div>
    </div>
</div>
<script src="<?=$app_web;?>dist/js/jquery.validate-1.14.0.min.js" type="text/javascript"></script>
<script src="<?=$app_web;?>dist/js/jquery-validate.bootstrap-tooltip.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$('#loginform').validate({
        // Rules for form validation
        rules : {               
            password1: {required : true},
            password2: {required : true}
        },

        // Messages for form validation
        messages : {
            password1: {required : 'Harap diisi'},
            password2: {required : 'Harap diisi'}
        },
        tooltip_options: {
           password: { placement: 'top' }
        },

        submitHandler : function( form ) {
            $(form).ajaxSubmit({
                success : function() {  
                    // redirect("dashboard");
                }
            });
        },
        
        // Do not change code below
        errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
        }
	});
</script>