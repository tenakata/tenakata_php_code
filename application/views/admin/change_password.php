    <?php
if ($this->session->userdata['email'] == TRUE)
        {
            //do something
        }
        else
        {
            redirect('index.php/login_admin'); //if session is not there, redirect to login page
        }
   include('header.php');?>
  <?php include('sidebar.php');?>
  <style>
  .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
.error
 {
     color:red;
}
</style>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Change Password</h5>
                           
                        </div>
                          <?php $msg = $this->session->userdata('message'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
                        <div class="ibox-content">
                         <form method="POST" id="myFormId" action="<?php echo base_url('index.php/change_password');?>"  class="form-horizontal">

                                <div class="form-group"><label class="col-sm-2 control-label">Old Password</label>
                              <div class="col-md-5">
                                  <input id="password-field" type="password" class="form-control" name="oldpass" placeholder="Old Password" >
                                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                  <div class="col-md-5">
                                  <?php echo form_error('oldpass') ?>
                                  </div>
                              </div>
       
                                  <div class="form-group">
                                  <label class="col-sm-2 control-label">New password</label>
                                   <div class="col-md-5">
                                  <input id="password-field1" type="password" class="form-control" name="newpass" placeholder="New Password" >
                                  <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
                                </div>
                                 <div class="col-md-5">
                                  <?php echo form_error('newpass') ?>
                                 </div>
                                </div>
                                 <div class="form-group">
                                  <label class="col-sm-2 control-label">Confirm password</label>
                                   <div class="col-md-5">
                                  <input id="password-field2" type="password" class="form-control" name="passconf" placeholder="Confirm Password" >
                                  <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                                </div>
                                <div class="col-md-5">
                                 <?php echo form_error('passconf') ?>
                                </div>
                                </div>
                              
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <?php echo form_submit(['type'=>'submit','id' => 'formSubmit' ,'class'=>'btn btn-success','value'=>'Submit'])?>
                                 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset'])?>
                                  
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php include 'footer.php';?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
        $( document ).ready(function(){
           $('.delete_msg').delay(3000).slideUp();
        });
    </script>

<script type="text/javascript">
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script type="text/javascript">
    $(".toggle-password1").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script type="text/javascript">
    $(".toggle-password2").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script type="text/javascript">
        document.getElementById('myFormId').onsubmit = function() {
            document.getElementById("formSubmit").disabled = true;
        }
    </script>
