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
                            <h5>Update Training</h5>
                            <div class="ibox-tools">
                            <a href="<?= base_url('index.php/training_list');?>"><button class="float-right btn btn-md btn-primary">Show Training List</button></a>
                              
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
                        <?php foreach($view_training as $values){
                          
                            ?>
                        
                         <form method="POST" action="<?php echo base_url('index.php/update_training');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">

                              
       
                                  <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Title</label></div>
                                   
                                   <div class="col-md-5">
                                   <input type="text" placeholder="Enter Title" class="form-control" name="title" value="<?php echo $values['title'];?>">
                                   <input type="hidden" name="id" value="<?php echo $values['id'];?>">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('title') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Description</label></div>
                                  
                                   <div class="col-md-5">
                                   <textarea class="form-control" rows="5" id="description" name="description"><?php echo $values['description'];?></textarea>
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
                                   
                                    foreach($user_lists as $lists){
                                    ?>
                                    
                                   <option value="<?php echo $lists['id']; ?>"><?php echo $lists['business_name']; ?></option>
                                    ?>
                                    <?php
                                    }
                                 ?>  
                                   </select>  <br><br>
                               </div>
                               <div id="fn3" hidden class="col-md-12">
                                  <select name="supervisor_id" class="form-control">
                                    <option value="">Select Supervisor</option>
                                    <?php
                                   
                                    foreach($supervisor_lists as $lists){
                                    ?>
                                    
                                   <option value="<?php echo $lists['id']; ?>"><?php echo $lists['name']; ?></option>
                                    ?>
                                    <?php
                                    }
                                 ?>  
                                   </select>  <br><br>
                               </div>
                                   
                           
                               <video width="20" height="20" controls>
                                <source src="../upload/<?php echo $values['video']; ?>" type="video/mp4">
                                </video>
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
                                        <?php echo form_submit(['type'=>'submit','class'=>'btn btn-success','value'=>'Update'])?>
                                 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset'])?>&nbsp;&nbsp;
                                 
                                    </div>
                                </div>
                            </form>
                          <?php
                        }
                        ?>
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
    

    