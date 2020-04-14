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
  
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Bussiness List</h2>
                    <ol class="breadcrumb">
                        
                        
                        <li class="active">
                            <strong>Bussiness list</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
                <div class="ibox-tools">
                            <a href="<?= base_url('user');?>"><button class="float-right btn btn-md btn-primary">Add Bussiness </button></a>
                              
                            </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                   
                    <a href="<?= base_url('user_export');?>"><button class="float-right btn btn-md btn-success" style="float: right;">Export </button></a>
                    <form action="<?php echo base_url();?>user_list" method="GET" autocomplete="off">
                        Search : <input type="text" name="keyword" id="keyword" placeholder="Search Bussiness Name" required>
                        <button type="submit" class="btn btn btn-primary"> Go!</button> </span></div>
                        </form>
                    </div>
                    <div class="ibox-content">
                    
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Business Name</th>
                        <th>Phone</th>
                        <th>Country Code</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Owner Name</th>
                        <th>Business Registered	</th>
                        <th>Registation No</th>
                        <th>Gender</th>
                        <th>Core Business</th>
                        <th>Activities</th>
                        <th>Business Date</th>
                        <th>Branches</th>
                        <th>Financial Institution</th>
                        <th>Name</th>
                        <th>Any Loan</th>
                        <th>Loan Amount</th>
                        <th>Loan Purpose</th>
                        <th>Receive Payments</th>
                        <th>Make Payments</th>
                        <th>Busniness Funding</th>
                        <th>Role</th>
                        <th>Supervisor Name</th>
                        <th>Image</th>
                        <th>Action</th>
                       
                    </tr>
                   
                    </thead>
                  
                    <tbody>
                    <?php
                    $i=1;
                    foreach($user_list as $row){
                       
                        if ($row['status'] == 0) {
                            $bgColor = ' style="background-color:#A9A9A9;" color: white;';
                            
                        } else {
                            $bgColor = ' style="background-color:white;" color: white;';
                        }
                        ?>
                    <tr class="gradeX" <?php echo $bgColor;?>>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['business_name'];?> </td>
                    <td><?php echo $row['phone'];?> </td>
                    <td><?php echo $row['country_code'];?> </td>
                    <td><?php echo $row['email'];?> </td>
                    <td><?php echo $row['location'];?> </td>
                    <td><?php echo $row['latitude'];?> </td>
                    <td><?php echo $row['longitude'];?> </td>
                    <td><?php echo $row['owner_name'];?> </td>
                    <td><?php echo $row['business_registered'];?> </td>
                    <td><?php echo $row['registation_no'];?> </td>
                    <td><?php echo $row['gender'];?> </td>
                    <td><?php echo $row['core_business'];?> </td>
                    <td><?php echo $row['activities'];?> </td>
                    <td><?php echo $row['business_date'];?> </td>
                    <td><?php echo $row['branches'];?> </td>
                    <td><?php echo $row['financial_institution'];?> </td>
                    <td><?php echo $row['name'];?> </td>
                    <td><?php echo $row['any_loan'];?> </td>
                    <td><?php echo $row['loan_amount'];?> </td>
                    <td><?php echo $row['loan_purpose'];?> </td>
                    <td><?php echo $row['receive_payments'];?> </td>
                    <td><?php echo $row['make_payments'];?> </td>
                    <td><?php echo $row['busniness_funding'];?> </td>
                    <td><?php echo $row['role'];?> </td>
                    <td><?php echo $row['superwiser_name'];?> </td>
                   <td><img src="<?php echo $row['image'];?>" width="40" height="30"> </td>
                   <td>
                        <a href="<?php  echo base_url().'assign_user/'.$row['id']?>"><button type="button" class="btn btn-outline btn-success"><i class="fa fa-edit"></i>Assign</button></a>&nbsp;&nbsp;
                        <a href="#" class="delete_data" id="<?php  echo $row['id']?>"><button type="button" class="btn btn-outline btn-info"><i class="fa fa-trash-o"></i> Remove</button></a>
                        <a href="<?php  echo base_url().'supervisor_history/'.$row['id']?>"><button type="button" class="btn btn-outline btn-warning"><i class="fa fa-edit"></i>Supervisor History</button></a>
                     </tr>
                    <?php
                    }
                    ?>
                   </tfoot>
                  
                    </table>
                    <?php 
                    echo $this->pagination->create_links();
                        ?>
                        </div>

                    </div>
                </div>
            </div>
            </div>
           
        </div>
        <script type="text/javascript"   src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('.delete_data').click(function(){
                var id =$(this).attr("id");
                if(confirm("Are you sure to Remove record?"))
                {
                    window.location="<?php echo base_url();?>Admin/Delete_user/"+id;
                }
                else
                {
                    return false;
                }
            })
        })

       </script>