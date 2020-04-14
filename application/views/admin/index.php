<?php
if ($this->session->userdata['email'] == TRUE)
        {
            //do something
        }
        else
        {
            redirect('login_admin'); //if session is not there, redirect to login page
        }
include('header.php');   include('sidebar.php');
?>


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Dashboard</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= base_url('dashboard');?>">Home</a>
                        </li>
                        <li class="active">
                            <strong>Dashboard</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
            <div class="widget style1 navy-bg">
                        <div class="row">
                        <div class="col-xs-4">
                        <a href="<?php echo base_url('sales_cash');?>">  <h1  style="color:white;">Sales</h1></a>
                        </div>
                        <div class="col-xs-8 text-right">
                           <a href="<?php echo base_url('sales_cash');?>"> <span style="color:white;">Cash Sales</span></a>
                            <h2 class="font-bold"><?php echo $count_cash_sales;?></h2>
                           <a href="<?php echo base_url('sales_credit');?>"> <br>  <span style="color:white;"> Credit Sales</span></a>
                            <h2 class="font-bold"><?php echo $count_credit_sales;?></h2>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
            <div class="widget style1 yellow-bg">
                        <div class="row">
                        <div class="col-xs-4">
                        <a href="<?php echo base_url('purchase_cash');?>"><h1 style="color:white;">Purchase</h1></a>
                        </div>
                        <div class="col-xs-8 text-right">
                            <a href="<?php echo base_url('purchase_cash');?>"><span style="color:white;"> Cash Purchase </span></a>
                            <h2 class="font-bold"><?= $count_cash_purchase;?></h2>
                            <br>
                           <a href="<?php echo base_url('purchase_cash');?>"> <span style="color:white;">Credit Purchase </span></a>
                            <h2 class="font-bold"><?= $count_credit_purchase;?></h2>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        <div class="row">
            <div class="col-lg-6">
                <div class="widget navy-bg no-padding">
                    <div class="p-m">
                       <a href="<?php echo base_url('user_list');?>"> <h1 class="m-xs" style="color:white;"> Bussiness </h1></a>

                        <h2 class="font-bold no-margins">
                       <?= $count_user;?>
                        </h2>
                        <small></small>
                    </div>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-chart1"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget lazur-bg no-padding">
                    <div class="p-m">
                        <a href="<?php echo base_url('supervisor_list');?>"><h1 class="m-xs" style="color:white;">Supervisor</h1></a>

                        <h2 class="font-bold no-margins">
                        <?= $count_supervisor;?>
                        </h2>
                        <small></small>
                    </div>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-chart2"></div>
                    </div>
                </div>
            </div>
          </div>
          </div>
            <br><br><br>

                <?php include('footer.php');?>
