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
    <style>
    .anchor{
      position: relative;
    padding-left: 25px;
    }
    .anchor.active{
    background-color: #1a7bb9;
    border-color: #1a7bb9;
    color: #FFFFFF;
    }
.anchor:before {
    content: "";
    width: 15px;
    height: 15px;
    background: #fff;
    position: absolute;
    border-radius: 50%;
    top: 8px;
    left: 6px;
    border: 1px solid #ddd;
}
.anchor:active:before,.anchor.active:before {
    content: "";
    width: 15px;
    height: 15px;
    background: #545b62;
    position: absolute;
    border-radius: 50%;
    top: 9px;
    left: 6px;
    border: 3px solid #fff;
}
.ml-2{
    margin-left:10px !important;
}
  </style>
  <?php include('sidebar.php');?>
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Sales Cash List</h2>
                    <ol class="breadcrumb">
                       
                        
                        <li class="active">
                            <strong>Sales Cash  list</strong>
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
                    <div class="btn-group btn-group-toggle">
                    <a href="<?php echo base_url();?>index.php/sales_cash"  class="btn btn-primary anchor active"> Sales Cash List</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url();?>index.php/sales_credit"  class="btn btn-primary anchor ml-2" > Sales Credit List</a>
                </div>
                 
                    <a href="<?= base_url('index.php/sales_cash_export');?>"><button class="float-right btn btn-md btn-success" style="float: right;">Export </button></a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th style="text-align: center;"> Bussiness Name</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Amount</th>
                        <th style="text-align: center;">Payment Type</th>
                        <th style="text-align: center;">Sales</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Description</th>
                        <th style="text-align: center;">Attach Recepit</th>
                       
                    </tr>
                   
                    </thead>
                  
                    <tbody>
                    <?php
                    $i=1;
                    foreach($sales_cash as $row){
                        
                        ?>
                    <tr class="gradeX">
                    <td  style="text-align: center;"><?php echo $i++;?></td>
                    <td style="text-align: center;"><?php echo $row['bussiness_name'];?> </td>
                    <td style="text-align: center;"><?php echo $row['date'];?> </td>
                    <td style="text-align: center;"><?php echo $row['amount'];?> </td>
                    <td style="text-align: center;"><?php echo $row['payment_type'];?> </td>
                    <td style="text-align: center;"><?php echo $row['sales_purchases'];?> </td>
                    <td style="text-align: center;"><?php echo $row['name'];?> </td>
                    <td style="text-align: center;"><?php echo $row['item_list'];?> </td>
                    <td style="text-align: center;"><img src="<?php echo $row['attach_recepit'];?>" width="40" height="30"> </td>
                    

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