<?php
if ($this->session->userdata['email'] == TRUE)
{
    //do something
}
else
{
    redirect('login_admin'); //if session is not there, redirect to login page
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
                            <a href="<?= base_url('user_list');?>"><button class="float-right btn btn-md btn-primary">Show Bussiness List</button></a>
                              
                            </div>
                        </div>
                          <?php if($this->session->flashdata('message')){?>
                         <div class="alert alert-success">
                        <?php
                            echo $this->session->flashdata('message');
                        ?>
                         </div>
                        <?php
                            }
                            ?>
                        <div class="ibox-content">
                <form method="POST" action="<?php echo base_url('update_assign_user');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                      <?php
                      foreach($business_id as $b_id)
                      {
                         
                      ?>

                               <input type="hidden" name="id" value="<?php echo $b_id['id'];?>"> 
                               <input type="hidden" name="present_supervisor_id" value="<?php echo $b_id['supervisor_id'];?>"> 
                               
                           <div class="form-group">
                                  <div class="col-md-5"><label class="control-label">Available Supervisors</label>
                                    <select name="supervisor_id" class="form-control">
                                    <option value="">Select Supervisor </option>
                                    <?php
                                   
                                    foreach($supervisor_lists as $lists){
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

   