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
    .field-icon
    {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
    .container
    {
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
                            <h5>Assign Supervisor </h5>
                            <div class="ibox-tools">
                            <a href="<?= base_url('index.php/supervisor_list');?>"><button class="float-right btn btn-md btn-primary">Supervisor List</button></a>
                              
                            </div>
                          <?php $msg = $this->session->userdata('message'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
                        <div class="ibox-content">
                <form method="POST" action="<?php echo base_url('index.php/update_assign_supervisor');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                      <?php
                      foreach($business_ids as $b_id)
                      {
                      ?>
                               <input type="hidden" name="id" value="<?php echo $b_id['id'];?>"> 
                           <div class="form-group">
                                  <div class="col-md-5"><label class="control-label">Supervisor Assign</label>
                                    <select name="supervisor_id" class="form-control">
                                    <option value="">Select Supervisor Assign</option>
                                    <?php
                                   
                                    foreach($supervisor_list_data as $lists){
                                    ?>
                                    
                                   <option value="<?php echo $lists['id']; ?>"><?php echo $lists['name']; ?></option>
                                    ?>
                                    <?php
                                    }
                                 ?>  
                                   </select>
                               </div>
                              </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <?php echo form_submit(['type'=>'submit','class'=>'btn btn-success','value'=>'Submit'])?>
                                 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset'])?>&nbsp;&nbsp;
                                 
                                    </div>
                                </div>
                            </form>
                        <?php
                      }
                      ?>
                          
                        </div>
                    </div>
                </div>
            </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
        $( document ).ready(function(){
           $('.delete_msg').delay(3000).slideUp();
        });
    </script>

   