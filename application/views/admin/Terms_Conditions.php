<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Terms Conditions Page</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=  base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?=  base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?=  base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=  base_url();?>assets/css/style.css" rel="stylesheet">
<style>
.landing-page section p {
    color: #181717;
    font-size: 16px;
}
p {
    margin: 1px 1px 10px;
	text-align: justify;
}
</style>
</head>

<body id="page-top" class="landing-page">


<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
            <h1><b><?php echo $terms_conditions[0]['title'];?></b></h1>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1 features-text">
             
                
                <p><?php echo $terms_conditions[0]['description'];?></p>
            </div>
            
        </div>
       
    </div>

</section>


<!-- Mainly scripts -->
<script src="<?=  base_url();?>assets/js/jquery-2.1.1.js"></script>
<script src="<?=  base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=  base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=  base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=  base_url();?>assets/js/inspinia.js"></script>
<script src="<?=  base_url();?>assets/js/plugins/pace/pace.min.js"></script>
<script src="<?=  base_url();?>assets/js/plugins/wow/wow.min.js"></script>



</body>
</html>
