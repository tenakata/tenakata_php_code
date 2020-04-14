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
                            <h5>Add Bussiness </h5>
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
 <form method="POST" action="<?php echo base_url('add_user');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                         <div class="form-group">
                         <div class="col-md-12"><label class="control-label">Bussiness Name</label></div>
                                   
                                   <div class="col-md-5">
                                   <?php echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter Bussiness Name','name'=>'bussiness_name','value'=>set_value('bussiness_name')])?>
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('bussiness_name') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Name of Owner</label></div>
                                  
                                   <div class="col-md-5">
                                   <?php echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter Name of Owner','name'=>'owner_name','value'=>set_value('owner_name')])?>
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('owner_name') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Phone</label></div>
                                  
                                   <div class="col-md-5">
                                   <?php echo form_input(['class'=>'form-control','type'=>'number','placeholder'=>'Enter Phone','name'=>'phone','value'=>set_value('phone')])?>
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('phone') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Country Code</label></div>
                                  
                                   <div class="col-md-5">
                                   <?php echo form_input(['class'=>'form-control','type'=>'TEXT','placeholder'=>'Enter Country Code','name'=>'country_code','value'=>set_value('country_code')])?>
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('country_code') ?>
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Is Bussiness Registered ?</label></div>
                                   
                                   <div class="col-md-5">
                                     <div class="radio">
                                    <label><input type="radio" name="business_registered" value="no" id="button1" checked>No</label>
                                    </div>
                                    <div class="radio">
                                    <label><input type="radio" name="business_registered"  value="yes" id="button">Yes</label>
                                    </div>
                                     <div id="fn" hidden>
                                     <div class="col-md-12">
                                   <?php echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter Registation No','name'=>'registation_no','value'=>set_value('registation_no')])?>
                                </div>
                                    </div>
                                </div>
                                 <div class="col-md-5">
                               
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Gender</label></div>
                                  
                                   <div class="col-md-5">
                                   <select name="gender" class="form-control">
                                    <option value="Male" name="gender">Male</option>
                                    <option value="Female" name="gender">Female</option>
                                    </select>
                                </div>
                                 <div class="col-md-5">
                                
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Shop Location</label></div>
                                  
                                   <div class="col-md-5">
                                   <?php echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter Shop Location','name'=>'location','value'=>set_value('location')])?>
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('location') ?>
                                 </div>
                                </div>
                                
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Core Bussiness</label></div>
                                  
                                   <div class="col-md-5">
                                   <select name="core_business" class="form-control">
                                    <option value="Selling Clothes & Fashion">Selling Clothes & Fashion</option>
                                    <option value="Selling Raw Vegetables and grains">Selling Raw Vegetables and grains</option>
                                    <option value="Selling Cooked Food">Selling Cooked Food</option>
                                    <option value="Service Shop; Video Rentals, Stationary, Printing">Service Shop; Video Rentals, Stationary, Printing</option>
                                    <option value="Beauty Products Shop">Beauty Products Shop</option>
                                    <option value="Wholesale Shop">Wholesale Shop</option>
                                    <option value="Retail Shop">Retail Shop</option>
                                    <option value="Mobile Phone and Accessories Shop">Mobile Phone and Accessories Shop</option>
                                    <option value="Mini Market">Mini Market</option>
                                    <option value="Butchery">Butchery</option>
                                    <option value="Transport Business">Transport Business</option>
                                    <option value="Other">Other</option>
                                    </select>
                                </div>
                                 <div class="col-md-5">
                                
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Other Activities</label></div>
                                  
                                   <div class="col-md-5">
                                   <textarea class="form-control" rows="5" id="activities" name="activities"></textarea>
                                </div>
                                 <div class="col-md-5">
                             
                                 </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Bussiness Date Start</label></div>
                                  
                                   <div class="col-md-5">
                                   <?php echo form_input(['class'=>'form-control','type'=>'date','placeholder'=>'Enter Shop Location','name'=>'date'])?>
                                </div>
                                 <div class="col-md-5">
                                
                                 </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">No Of Employees</label></div>
                                  
                                   <div class="col-md-5">
                                   <?php echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter No Of Employees','name'=>'no_of_employees'])?>
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('no_of_employees') ?>
                                 </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Branches</label></div>
                                   
                                   <div class="col-md-5">
                                     <div class="radio">
                                    </div>
                                    <div class="radio">
                                    <label><input type="radio" name="branches" value="no"checked  id="button2">No</label>
                                    <label><input type="radio" name="branches"  value="yes"  id="button3">Yes</label>
                                    </div>

                                    <div class="col-md-12"><label class="control-label"></label></div>
                                  
                                  <div  class="col-md-12">
                                  <select name="financial_institution" class="form-control">
                                   <option value="">Select Prefered Financial Institution</option>
                                   <option value="Commercial Bank">Commercial Bank </option>
                                   <option value="SACCOs">SACCOs</option>
                                   <option value="Microfinance Institutions (MFIs)">Microfinance Institutions (MFIs) </option>
                                   <option value="Other">Other (Within the markets, Mpesa, Table banking etc.) </option>
                                   </select><br>
                               </div>
                                     <div>
                                     <div class="col-md-12">
                                   <?php echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter Name','name'=>'name','value'=>set_value('name')])?>
                                </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Takens Any Loans ?</label></div>
                                   
                                   <div class="col-md-5">
                                     <div class="radio">
                                    <label><input type="radio" name="any_loans" value="no" checked id="button4">No</label>
                                    </div>
                                    <div class="radio">
                                    <label><input type="radio" name="any_loans"  value="yes" id="button5">Yes</label>
                                    </div>
                                    <div id="fn4" hidden>
                                     <div class="col-md-12">
                                   <?php echo form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Enter Loan Amount','name'=>'loan_amount','value'=>set_value('loan_amount')])?>
                                </div>
                                    </div>
                                    <div class="col-md-12"><label class="control-label"></label></div>
                                  
                                  <div id="fn3" hidden class="col-md-12">
                                  <select name="loan_purpose" class="form-control">
                                   <option value="">Select Loan Purpose</option>
                                   <option value="Increase business stock">Increase business stock</option>
                                   <option value="Invest in a new business">Invest in a new business</option>
                                   <option value="Make a personal investment">Make a personal investment</option>
                                   <option value="Buy assets">Buy assets</option>
                                   <option value="School Fees">School Fees</option>
                                   <option value="House Holds Expenses">House Holds Expenses</option>
                                   <option value="Other">Other</option>
                                   </select><br>
                               </div>
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">How do you recive payment?</label></div>
                                   
                                   <div class="col-md-5">
                                   <label class="checkbox-inline">
                                  <input type="checkbox" name="receive_payments[]" value="mpesa">MPESA
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="receive_payments[]" value="cash">CASH
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox"  name="receive_payments[]" value="bank_transfer">BANK TRANSFER
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="receive_payments[]" value="cheque">CHEQUE
                                </label>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">How do you make payment?</label></div>
                                   
                                   <div class="col-md-5">
                                   <label class="checkbox-inline">
                                  <input type="checkbox" name="make_payments[]" value="mpesa">MPESA
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="make_payments[]" value="cash">CASH
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="make_payments[]" value="bank_transfer">BANK TRANSFER
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="make_payments[]" value="cheque">CHEQUE
                                </label>
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                  <div class="col-md-12"><label class="control-label">Source of business funding?</label></div>
                                   
                                   <div class="col-md-5">
                                   <label class="checkbox-inline">
                                  <input type="checkbox" name="busniness_funding[]" value="personal">Personal
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" name="busniness_funding[]" value="borrowing">Borrowing
                                </label>
                               
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                  <div class="col-md-5"><label class="control-label">Supervisor Assign</label>
                                    <select name="supervisor_id" class="form-control">
                                    <option value="">Select Supervisor Assign</option>
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
                                  <div class="col-md-12"><label class="control-label">Role</label></div>
                                  
                                   <div class="col-md-5">
                                   <input type="text" placeholder="Enter Role" class="form-control"  readonly  name="role" value="user">
                                </div>
                                 <div class="col-md-5">
                                 <?php echo form_error('role') ?>
                                 </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="col-md-12"><label class="control-label">Capture Documnet</label></div>
                                    
                                    <div class="col-md-5">
                                    <input type="file"  name="image">
                                    </div>
                                    <div class="col-md-5">
                                    <?php echo form_error('image') ?>
                                    </div>
                                </div>
                               
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <?php echo form_submit(['type'=>'submit','class'=>'btn btn-success','value'=>'Submit'])?>
                                 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset'])?>&nbsp;&nbsp;
                                 
                                    </div>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script>
    $("#button").click(function() {
  $("#fn").show();
  
});
$("#button1").click(function() {
  $("#fn").hide();
});

$("#button3").click(function() {
  $("#fn1").show();
  
});

$("#button3").click(function() {
  $("#fn2").show();
  
});
$("#button2").click(function() {
  $("#fn1").hide();
});
$("#button2").click(function() {
  $("#fn2").hide();
});



$("#button5").click(function() {
  $("#fn3").show();
  
});
$("#button5").click(function() {
  $("#fn4").show();
  
});
$("#button4").click(function() {
  $("#fn3").hide();
});
$("#button4").click(function() {
  $("#fn4").hide();
  
});
    </script>

    