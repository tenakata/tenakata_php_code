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
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>
         <!-- Registration Form -->
      </h2>
      <ol class="breadcrumb">
         <li>
            Admin
         </li>
         
        
         <li class="active">
            <strong>Profile</strong>
         </li>
        
      </ol>
   </div>
   <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <!-- <h4>Creators Lists</h4> -->
               <div class="panel-body">
                  <div class="col-lg-12">
                     <div class="ibox col-lg-8" style="margin-left:180px;">
                     <?php if(!empty($this->session->flashdata('msg'))){ ?>
                            <div class="alert alert-success delete_msg pull" style="width: 157%;margin-left: -212px;" id="del"> <?php echo $this->session->flashdata('msg'); ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>  
                
                <?php } ?>
                        <!-- <form method="post" enctype="multipart/form-data" action="<?php echo base_url('auth/update');?>" autocomplete="off"> -->
                           <?php echo form_open_multipart('index.php/Admin/updateProfile','autocomplete="off" id="frm"'); ?>
                           <div class="product" style="margin-left:260px; margin-top:10px;">
                              <?php if(!empty($showdata_data[0]['image'])){ ?>
                              <img alt="image" class="img-circle" src="<?php echo $showdata_data[0]['image'];?>" width="260px;" height="260px;" alt="Profile" id="f_image" />
                           <?php }else{ ?>

                                 <img alt="image2" class="img-circle" src="<?php echo base_url();?>assets/download.png" width="260px;" height="260px;" alt="Profile" id="f_image"/>

                           <?php } ?>
                              <input type="file" onchange="showSelectedImage(this);" name="image" id="file" class="btn  btn-outline btn-primary" style="margin-top: 10px;margin-left:23px;width: 41%;"/><br>
                              <!-- <label for="file" class="btn  btn-outline btn-primary" style="margin-left: 81px; margin-top:20px;">Choose File</label> -->
                           </div>
                           <br><br>
                           <div class="panel-body">
                              <div class="col-md-12 col-sm-12">
                                 <div class="form-group col-md-6 col-sm-6">
                                    <label for="identity">First Name:</label>
                                    <input type="hidden" name="id" <?php if(isset($showdata_data)){?> value="<?php echo $showdata_data[0]['id'];?>" <?php } ?> >
                                    <input type="text" class="form-control input-sm" id="identity" pattern="[a-zA-Z][a-zA-Z0-9\s]*" required=""  name="fname" placeholder="First Name" <?php if(isset($showdata_data)){?> value="<?php echo $showdata_data[0]['fname'];?>" <?php } ?>>
                                 </div>
                                 <div class="form-group col-md-6 col-sm-6">
                                    <label for="lname">Last Name:</label>
                                    <!-- <label><?php if(isset($showdata)){  echo ucfirst($showdata[0]['lname']);} ?></label> -->
                                    <input type="text" class="form-control input-sm" id="lname" pattern="[a-zA-Z][a-zA-Z0-9\s]*" name="lname" placeholder="Last Name" <?php if(isset($showdata_data)){?> value="<?php echo $showdata_data[0]['lname'];?>" <?php } ?>>
                                 </div>
                                 <div class="form-group col-md-6 col-sm-6">
                                    <label for="email">Email ID:</label>
                                    <!-- <label><?php if(isset($showdata)){  echo $showdata[0]['email'];} ?></label> -->
                                    <input type="email" class="form-control input-sm" id="email" name="email" placeholder="Email ID" <?php if(isset($showdata_data)){?> value="<?php echo $showdata_data[0]['email'];?>" <?php } ?> readonly >
                                 </div>
                                 <div class="form-group col-md-6 col-sm-6">
                                    <label for="mobile_no">Mob:</label>
                                    <!-- <label><?php if(isset($showdata_data)){  echo $showdata_data[0]['phone'];} ?></label> -->
                                    <input type="text" class="form-control input-sm mobile_no" id="mobile_no" pattern="[6789][0-9]{9}" name="phone" required="" placeholder="Mobile Number" maxlength="10" title="Please Enter Correct Entry" <?php if(isset($showdata_data)){?> value="<?php echo $showdata_data[0]['phone'];?>" <?php } ?>>
                                 </div>
                              </div>
                              <div class="product">
                                 <div class="m-t text-righ">
                                    <input type="submit" class="btn btn-primary" value="Update" id='submit' style="margin-left: 30px;"> 
                                 </div>
                              </div>
                        <?php echo form_close();?><br>
                       
                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="footer">
   <div class="pull-right">
      <!-- 10GB of <strong>250GB</strong> Free -->
   </div>
   <div>
      <strong>Copyright</strong> Tenakata &copy; <?php echo date('Y');?>
   </div>

  <?php include 'footer.php';?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
        $( document ).ready(function(){
           $('.delete_msg').delay(3000).slideUp();
        });
    </script>