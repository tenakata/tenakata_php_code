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
.err
 {
     color:red;
}
</style>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Training</h5>
                            <div class="ibox-tools">
                            <a href="<?= base_url('index.php/training_list');?>"><button class="float-right btn btn-md btn-primary">Show Training List</button></a>
                              
                            </div>
                        </div>
                        <?php $msg = $this->session->userdata('message'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
                        <div class="ibox-content">
                       
                        
                         <form method="POST" action="<?php echo base_url('index.php/add_training');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">

                              
       
                                  <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Title</label></div>
                                   
                                   <div class="col-md-5">
                                   <?php echo form_input(['class'=>'form-control','type'=>'title','placeholder'=>'Enter Title','name'=>'title','value'=>set_value('title')])?>
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('title') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Description</label></div>
                                  
                                   <div class="col-md-5">
                                   <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('description') ?>
                                 </div>
                                </div>
                               <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Check Role Name</label></div>
                                   
                                   <div class="col-md-5">
                                     <div class="radio">
                                    <label><input type="radio" name="role" value="user"  id="button4">User</label>
                                    </div>
                                    <div class="radio">
                                    <label><input type="radio" name="role"  value="supervisor" id="button5">Supervisor</label>
                                    </div>
                                   
                                    <div class="col-md-6"><label class="control-label"></label></div>
                                  
                                 
                                
                                 
                                <div class="col-md-5"><label class="control-label"></label></div>
                                  
                                  <div id="fn4" hidden class="col-md-12" >
                                  <select name="user_id" class="form-control">
                                    <option value="">Select User</option>
                                    <?php
                                   
                                    foreach($user_lists as $lists)
                                    {
                                    ?>
                                    
                                   <option value="<?php echo $lists['id']; ?>"><?php echo $lists['business_name']; ?></option>
                                    ?>
                                    <?php
                                    }
                                 ?>  
                                   </select>
                               </div>
                               <div id="fn3" hidden class="col-md-12">
                                  <select name="supervisor_id" class="form-control">
                                    <option value="">Select Supervisor</option>
                                    <?php
                                   
                                    foreach($supervisor_lists as $lists)
                                    {
                                    ?>
                                    
                                   <option value="<?php echo $lists['id']; ?>"><?php echo $lists['name']; ?></option>
                                    ?>
                                    <?php
                                    }
                                 ?>  
                                   </select>
                               </div>
                                   
                             

                               <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Select Video</label></div>
                                  
                                   <div class="col-md-5">
                                   <input type="file"  name="video">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('video') ?>
                                 </div>
                                </div>
                               
                                </div>
                                
                                
                                 <div class="form-group">
                                
                                <div class="col-md-5">
                                
                                </div>
                               
                                
                                 <div class="col-md-12">
                                                                
                               

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <?php echo form_submit(['type'=>'submit','class'=>'btn btn-success','value'=>'Submit'])?>
                                 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset'])?>&nbsp;&nbsp;
                                 
                                    </div>
                                </div>
                            </form>
                          
                        </div>
                    </div>
               
  <div class="footer">
                    
                    <div>
                        <center><strong>Copyright Tenakata &copy; <?php echo date('Y');?> </strong></center>
                    </div>
                </div>
    <script src="<?= base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script>



$("#button5").click(function() {
  $("#fn3").show();
  
});
$("#button4").click(function() {
  $("#fn3").hide();
});

$("#button4").click(function() {
  $("#fn4").show();
});

$("#button5").click(function() {
  $("#fn4").hide();
});
 </script>
   <?php include 'footer.php';?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
        $( document ).ready(function(){
           $('.delete_msg').delay(3000).slideUp();
        });
    </script>
    

    