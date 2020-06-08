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
  .form-control, .single-line {
    background-color: #FFFFFF;
    background-image: none;
    border: 1px solid #e5e6e7;
    border-radius: 1px;
    color: inherit;
    display: block;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 224%;
    font-size: 14px;
  }
  </style> 
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Shopkeeper (User) List</h2>
                    <ol class="breadcrumb">
                        
                        
                        <li class="active">
                            <strong>Shopkeeper(User) list</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
                <div class="ibox-tools">
                   <a href="<?= base_url('index.php/supervisor_list');?>"><button class="float-right btn btn-md btn-primary">Supervisor List</button></a>
                              
              </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                   
                    <button class="float-right btn btn-md btn-success" id="bulkAssign">Bulk Assign</button>
                    </div>
                    
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Select</th>
                        <th>S.NO</th>
                        <th>Business Name</th>
                        <th>Phone</th>
                        <th>Country_code</th>
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
                    foreach($supervisor_user_list as $row){
                       $enc_charges_id = str_replace("/","-",$this->encryption->encrypt($row['id']));
                       ?>
                    <tr class="gradeX">
                    <td><input type="checkbox" class="bulkdata" value="<?php echo $row['id'];?>" name="selectvalue"/></td>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['business_name'];?> </td>
                    <td><?php echo $row['phone'];?> </td>
                    <td><?php echo $row['country_code'];?> </td>
                    <td><?php echo $row['email'];?> </td>
                    <td><?php echo $row['location'];?> </td>
                    <td><?php echo $row['latitude'];?> </td>
                    <td><?php echo $row['latitude'];?> </td>
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
                   <td> <a href="<?php  echo base_url().'index.php/assign_user/'. $enc_charges_id?>"><button type="button" class="btn btn-outline btn-success"><i class="fa fa-edit"></i>Assign</button></a>&nbsp;&nbsp;</td>
                      
                     
                     </tr>
                     <input type="hidden" name="supervisor_id" id="supervisor_id" value="<?php echo $id;?>"> 
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

        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supervisors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url('index.php/update_assign_users');?>"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
            
                     
                <div class="form-group">
                        <div class="col-md-5"><label class="control-label">Available Supervisors</label>
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
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            
                        </div>
                    </div>
                    <input type="hidden" name="user_id" id="user_id" value=""> 
                    <input type="hidden" name="supervisor" id="supervisor" value="">
                
            
      </div>
      <div class="modal-footer">
      <?php echo form_submit(['type'=>'submit','class'=>'btn btn-success','value'=>'Submit'])?>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   
      </div>
      </form>    
    </div>
  </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        




    <script src="<?= base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <!--<script src="<?= base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>-->

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
                window.location="<?php echo base_url();?>Admin/Delete_user/"+id;
            }
            else
            {
                return false;
            }
        })
    })

    </script>
    <script>
    var clicked = false;
    $('#bulkAssign').on("click", function() {
        debugger
    $(".bulkdata").prop("checked", !clicked);
    clicked = !clicked;

    var data = [];
    $.each($("input[name='selectvalue']:checked"), function(){
        data.push($(this).val());
    });
    var id = data.join(",");

    

    $.ajax({
            url: '<?php echo base_url();?>Admin/assign_users_alldata',
            type: 'POST',
            data: 'id='+id,
            success: function(res){
                if(parseInt(res) == 1)
                {
                    var supervisor_id = $('#supervisor_id').val();
                    $('#supervisor').val(supervisor_id);
                    $('#user_id').val(id);
                    $('#exampleModal').modal('show');
                }
            }
        });

    });
    </script>

