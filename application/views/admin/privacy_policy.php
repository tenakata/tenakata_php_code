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
                            <h5>Privacy Policy</h5>
                            <div class="ibox-tools">
                          
                            </div>
                        </div>
                        <?php $msg = $this->session->userdata('message'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
                        <div class="ibox-content">
                       
                        
                         <form method="POST" action="<?php echo base_url('index.php/add_privacy_policy');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
							<input type="hidden" name="id" value="<?php echo $privacy_policy[0]['id'];?>">
                              
       
                                  <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Title</label></div>
                                   
                                   <div class="col-md-5">
                                  <input type="text" name="title" class="form-control" placeholder="Enter Title" required value="<?php echo $privacy_policy[0]['title'];?>">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('name') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Description</label></div>
                                  
                                   <div class="col-md-5">
                                   <textarea class="ckeditor" rows="10" name="description" id="comment"><?php echo $privacy_policy[0]['description'];?></textarea>
                                </div>
                                 <div class="col-md-5">
                                
                                 </div>
                                </div>
                         
                             
                                <div class="col-md-12">
                                                                
                               

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <?php echo form_submit(['type'=>'submit','class'=>'btn btn-success','value'=>'Submit'])?>
                                 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset'])?>&nbsp;&nbsp;
                                 
                                    </div>
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

    