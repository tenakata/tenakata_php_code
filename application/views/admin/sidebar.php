<?php
$fname = $this->session->userdata['fname'];
$lname = $this->session->userdata['lname'];
$image = $this->session->userdata['image'];





// ?>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                      
                       <img alt="image" class="img-circle" <?php if($image){ ?>src="<?php echo base_url();?>upload/<?php echo $image;?>" <?php }else{ ?> src="<?php echo base_url('assest/img/')?>profile_small.jpg"<?php } ?> style="margin-left: 38px;width:60px;height:60px;"/>
                  </span>
                                 
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           
                             </span> <span class="text-muted text-xs block"><?php echo $fname.' '.$lname;?><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                             
                                
                                <li class=""><a href="<?php echo base_url();?>index.php/admin_profile">Profile</a></li>
                            	  <li class=""><a href="<?php echo base_url();?>index.php/login_admin">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            Tenakata+
                        </div>
                    </li>
                    <li class="<?php echo (strcmp($this->uri->segment(1),'Admin')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/Admin');?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                       
                    </li>
                  

                    <li class="<?php echo (strcmp($this->uri->segment(1),'supervisor_list')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/supervisor_list');?>"><i class="fa fa-diamond"></i> <span class="nav-label">Supervisor</span></a>
                    </li>
                    
                    <li class="<?php echo (strcmp($this->uri->segment(1),'user_list')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/user_list');?>"><i class="fa fa-edit"></i> <span class="nav-label">Add Business</span></a>
                    </li>

                    <li class="<?php echo (strcmp($this->uri->segment(1),'sales_cash')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/sales_cash');?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Sales Credit & Cash</span></a>
                    </li>

                    <li class="<?php echo (strcmp($this->uri->segment(1),'purchase_cash')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/purchase_cash');?>"><i class="fa fa-table"></i> <span class="nav-label">Purchase Credit & Cash</span></a>
                    </li>

                    <li class="<?php echo (strcmp($this->uri->segment(1),'training_list')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/training_list');?>"><i class="fa fa-diamond"></i> <span class="nav-label">Add Training</span></a>
                    </li>

                    <li class="<?php echo (strcmp($this->uri->segment(1),'bussiness_visit_list')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/bussiness_visit_list');?>"><i class="fa fa-pie-chart"></i> <span class="nav-label">Business Visit</span></a>
                    </li>
    				 <li class="<?php echo (strcmp($this->uri->segment(1),'privacy_policy')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/privacy_policy');?>"><i class="fa fa-star"></i> <span class="nav-label">Privacy Policy</span></a>
                    </li>


                    <li class="<?php echo (strcmp($this->uri->segment(1),'terms_conditions')==0)?'active':''; ?>">
                        <a href="<?= base_url('index.php/terms_conditions');?>"><i class="fa fa-star"></i> <span class="nav-label">Terms & Conditions</span></a>
                    </li>

                    <li class="<?php echo (strcmp($this->uri->segment(1),'change_password')==0)?'active':''; ?>">
                    <a href=""><i class="fa fa-files-o"></i> <span class="nav-label">Setting</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                       <li class="<?php echo (strcmp($this->uri->segment(1),'change_password')==0)?'active':''; ?>"><a href="<?= base_url('index.php/change_password');?>">Change Password</a></li>
                       
                    </ul>
                </li>
                    
                  
                     
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                   
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Tenakata Admin Panel</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning"><?php echo $count_bussiness_visit;?></span>
                    </a>
                   
                    
                   
                    <ul class="dropdown-menu dropdown-messages">
                   <center> <strong><span>Bussiness Visit</span></strong><br/></center>
                    <?php 
                    foreach($bussiness_visit_lists as $row)
                    {
                        
                        ?>
                        <li>
                            <div class="dropdown-messages-box">
                                
                                <div class="media-body">
                                    
                                   <a href="<?php  echo base_url().'index.php/bussiness_status/'.$row['id']?>"> <strong><?php echo $row['id'];?></strong>&nbsp;&nbsp;&nbsp;<?php echo $row['current_date'];?>&nbsp;&nbsp;&nbsp;<?php echo $row['business_name'];?>  <br>
                                   </a>
                                </div>
                            </div>
                        </li>
                       <?php
                    }
                    ?>
                       
                        
                    </ul>
                  
                </li>
               
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-primary"><?php echo $count_bussiness_register;?></span>
                    </a>
                   
                    
                   
                    <ul class="dropdown-menu dropdown-messages">
                     <center><strong><span>Bussiness</span></strong><br/></center>
                    <?php 
                    foreach($bussiness_registers_lists as $row)
                    {
                        
                        ?>
                        <li>
                            <div class="dropdown-messages-box">
                                
                                <div class="media-body">
                                    
                                   <a href="<?php  echo base_url().'index.php/bussiness_register_status/'.$row['id']?>"> <strong><?php echo $row['id'];?></strong>&nbsp;&nbsp;&nbsp;<?php echo $row['business_date'];?>&nbsp;&nbsp;&nbsp;<?php echo $row['business_name'];?> <br>
                                   </a>
                                </div>
                            </div>
                        </li>
                       <?php
                    }
                    ?>
                       
                        
                    </ul>
                  
                </li>
               
                <li>
                    <a href="<?php echo base_url();?>index.php/login_admin">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                
            </ul>

        </nav>
        </div>
