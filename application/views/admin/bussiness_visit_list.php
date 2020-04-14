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
                    <h2>Bussiness Visit List</h2>
                    <ol class="breadcrumb">
                       
                        
                        <li class="active">
                            <strong>Bussiness Visit List</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
                <div class="ibox-tools">
                            
                              
                            </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    <a href="<?= base_url('bussiness_visit_export');?>"><button class="float-right btn btn-md btn-success" style="float: right;">Export </button></a>
                 
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Business Name</th>
                        <th>Current Date</th>
                        <th style="text-align: center;">Comment</th>
                        <th>Bussiness Location</th>
                        <th>Stock</th>
                     	<th>Latitude</th>
                    	<th>Longitude</th>
                        <th>Busy Shop</th>
                        <th>Supervisor Name</th>
                       
                       
                    </tr>
                   
                    </thead>
                  
                    <tbody>
                    <?php
                    $i=1;
                    foreach($bussiness_visit_list as $row){
                      ?>
                        
                    <tr class="gradeX">
                    <td  style="text-align: center;"><?php echo $i++;?></td>
                    <td style="text-align: center;"><?php echo $row['business_name'];?> </td>
                    <td style="text-align: center;"><?php echo $row['current_date'];?> </td>
                    <td style="text-align: center;"><?php echo $row['comment'];?> </td>
                    <td style="text-align: center;"><?php echo $row['bussiness_location'];?> </td>
                    <td style="text-align: center;"><?php echo $row['latitude'];?> </td>
                    <td style="text-align: center;"><?php echo $row['longitude'];?> </td>
                    <td style="text-align: center;"><?php echo $row['stock'];?> </td>
                    <td style="text-align: center;"><?php echo $row['busy_shop'];?> </td>
                    <td style="text-align: center;"><?php echo $row['name'];?> </td>
                         
                    
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
                    window.location="<?php echo base_url();?>Admin/Delete_training/"+id;
                }
                else
                {
                    return false;
                }
            })
        })

       </script>