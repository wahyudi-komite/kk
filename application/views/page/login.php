<link href="<?=$app_web;?>dist/css/pages/floating-label.css" rel="stylesheet"><div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Halaman Login</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Login</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
				<form class="form-horizontal form-material" id="loginform" action="<?=base_url();?>Login/verifi" autocomplete="off" method="post">
					<?php 
                        if ($this->session->flashdata('msg')!==NULL)
                        { 
                        echo $this->session->flashdata('msg');
                        }
                    ?>
				    <div class="form-group m-t-40">
				        <div class="col-xs-4">
				            <input class="form-control" type="text" required="" placeholder="Username" name="username" id="username">
				        </div>
				    </div>
				    <div class="form-group">
				        <div class="col-xs-4">
				            <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password">
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
            username: {required : true},
            password: {required : true}
        },

        // Messages for form validation
        messages : {
            username: {required : 'Harap diisi'},
            password: {required : 'Harap diisi'}
        },
        tooltip_options: {
           username: { placement: 'top' }
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