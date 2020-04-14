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
                            <h5>Terms Conditions</h5>
                            <div class="ibox-tools">
                          
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
                       
                        
                         <form method="POST" action="<?php echo base_url('add_terms_conditions');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
							<input type="hidden" name="id" value="<?php echo $terms_conditions[0]['id'];?>">
                              
       
                                  <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Title</label></div>
                                   
                                   <div class="col-md-5">
                                  <input type="text" name="title" class="form-control" placeholder="Enter Title"  required value="<?php echo $terms_conditions[0]['title'];?>">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('name') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Description</label></div>
                                  
                                   <div class="col-md-5">
                                   <textarea class="form-control" rows="10" name="description" id="comment"><?php echo $terms_conditions[0]['description'];?></textarea>
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

    