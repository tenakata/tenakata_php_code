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
                            <h5>Add Supervisor</h5>
                            <div class="ibox-tools">
                            <a href="<?= base_url('index.php/supervisor_list');?>"><button class="float-right btn btn-md btn-primary">Show Supervisor List</button></a>
                              
                            </div>
                        </div>
                           <?php $msg = $this->session->userdata('message'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
                        <div class="ibox-content">
                        <?php foreach($view_supervisor as $values){
                          $enc_charges_id = str_replace("/","-",$this->encryption->encrypt($values['id']));
                        ?>
                        
                         <form method="POST" action="<?php echo base_url('index.php/update_supervisor');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">

                              
       
                                  <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Name</label></div>
                                   
                                   <div class="col-md-5">
                                   <input type="text" placeholder="Enter Name" class="form-control" name="name" value="<?php echo $values['name'];?>">
                                   <input type="hidden" name="id" value="<?php echo $values['id'];?>">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('name') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Email</label></div>
                                  
                                   <div class="col-md-5">
                                   <input type="email" placeholder="Enter Email" class="form-control" name="email" value="<?php echo $values['email'];?>">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('email') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Phone</label></div>
                                  
                                   <div class="col-md-5">
                                   <input type="number" placeholder="Enter Phone" class="form-control" name="phone" value="<?php echo $values['phone'];?>">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('phone') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Country Code</label></div>
                                  
                                   <div class="col-md-5">
                                   <input type="text" placeholder="Enter Country Code" class="form-control" name="country_code" value="<?php echo $values['country_code'];?>">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('country_code') ?>
                                 </div>
                                </div>
                             
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Role</label></div>
                                  
                                   <div class="col-md-5">
										 <input type="text" placeholder="Enter Role" class="form-control"  readonly  name="role" value="<?php echo $values['role'];?> ">

                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('role') ?>
                                 </div>
                                </div>
                                   <td><img src="<?php echo base_url();?>upload/<?php echo $values['image'];?>" width="80" height="80"></td>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Select Image</label></div>
                                  <div class="col-md-5">
                                 <?php echo form_error('image') ?>
                                   <input type="file"  name="image">
                                </div>
                                 <div class="col-md-5">

                                 </div>
                                </div>
                               
                                </div>
                                
                                
                                 <div class="form-group">
                                
                                <div class="col-md-5">
                                
                                </div>
                               
                                
                                 <div class="col-md-12">
                                                                
                               

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <?php echo form_submit(['type'=>'submit','class'=>'btn btn-success','value'=>'Update'])?>

                                 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset'])?>&nbsp;&nbsp;
                                 <a href="<?php  echo base_url().'index.php/supervisor_password/'.$enc_charges_id ?>" target="_blank">Change Password</a>
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
    <?php include 'footer.php';?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
        $( document ).ready(function(){
           $('.delete_msg').delay(3000).slideUp();
        });
    </script>

    

    