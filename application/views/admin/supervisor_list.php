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
                    <h2>Supervisor List</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url("index.php/supervisor");?>">supervisor</a>
                        </li>
                        
                        <li class="active">
                            <strong>supervisor list</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
					 
                </div>
                <div class="ibox-tools">
              
                            <a href="<?= base_url('index.php/supervisor');?>"><button class="float-right btn btn-md btn-primary">Add Supervisor </button></a>
                              
                            </div>
            </div>
   <?php $msg = $this->session->userdata('message'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                   
                    <a href="<?= base_url('index.php/action');?>"><button class="float-right btn btn-md btn-success" style="float: right;">Export </button>&nbsp;&nbsp;</a>
                     <a href="<?= base_url('index.php/supervisor_all_list');?>"><button class="float-right btn btn-md btn-primary" style="float: right;">Deleted</button></a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Phone</th>
                        <th style="text-align: center;">Country Code</th>
                        <th style="text-align: center;">Role</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                   
                    </thead>
                  
                    <tbody>
                    <?php
                    $i=1;
                    foreach($supervisor_list as $row){
                       $enc_charges_id = str_replace("/","-",$this->encryption->encrypt($row['id']));
                        ?>
                        
                    <tr class="gradeX">
                    <td  style="text-align: center;"><?php echo $i++;?></td>
                    <td style="text-align: center;"><?php echo $row['name'];?> </td>
                    <td style="text-align: center;"><?php echo $row['email'];?> </td>
                    <td style="text-align: center;"><?php echo $row['phone'];?> </td>
                    <td style="text-align: center;"><?php echo $row['country_code'];?> </td>
                    <td style="text-align: center;"><?php echo $row['role'];?> </td>
                  <td><img src="<?php echo base_url();?>upload/<?php echo $row['image'];?>" width="80" height="80"></td>
                    <td style="text-align: center;">
                           <a href="<?php  echo base_url().'index.php/view_supervisor/'.$enc_charges_id?>"><button type="button" class="btn btn-outline btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
                         &nbsp;&nbsp;
                         <a href="<?php  echo base_url().'index.php/supervisor_user_list/'.$enc_charges_id?>"><button type="button" class="btn btn-outline btn-success"><i class="fa fa-edit"></i>View</button></a>&nbsp;&nbsp;
                      
                        <a href="#" class="delete_data" id="<?php  echo $row['id']?>"><button type="button" class="btn btn-outline btn-info"><i class="fa fa-trash-o"></i> Remove</button></a>

                    </tr>
                    <?php 
                    }
                    ?>
                   </tfoot>
                  
                    </table>
                   
                        </div>

                    </div>
                </div>
            </div>
            </div>
           
        </div>
<div class="footer">
                    
                    <div>
                        <center><strong>Copyright Tenakata &copy; <?php echo date('Y');?> </strong></center>
                    </div>
                </div>
        <script src="<?= base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="<?= base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url();?>assets/js/inspinia.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?= base_url();?>assets/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>

<script type="text/javascript">
        $(document).ready(function(){
            $('.delete_data').click(function(){
                var id =$(this).attr("id");
                if(confirm("Are you sure to Remove record?"))
                {
                    window.location="<?php echo base_url();?>index.php/Admin/Delete_supervisor/"+id;
                }
                else
                {
                    return false;
                }
            })
        })

       </script>

<script type="text/javascript">
        $( document ).ready(function(){
           $('.delete_msg').delay(3000).slideUp();
        });
    </script>