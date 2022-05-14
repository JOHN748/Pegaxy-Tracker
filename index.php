<!-- HTML Start -->
<!DOCTYPE html>
<html lang="en">
<!-- Head Section -->
<head>
    <!-- Website Title -->
    <title>Pegaxy Portfolio</title>
    <!-- Meta Tags -->
    <?php include 'includes/header/meta-tags.php'; ?>
    <!-- Default CSS -->
    <?php include 'includes/header/header-styles.php'; ?>
    <!-- Script JS -->
    <?php include 'includes/header/header-scripts.php'; ?>

    <style type="text/css">
        .row.equal-cols {
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          -webkit-flex-wrap: wrap;
          -ms-flex-wrap: wrap;
          flex-wrap: wrap;
        }

        .row.equal-cols:before,
        .row.equal-cols:after {
          display: block;
        }

        .row.equal-cols > [class*='col-'] {
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          -webkit-flex-direction: column;
          -ms-flex-direction: column;
          flex-direction: column;
        }

        .row.equal-cols > [class*='col-'] > * {
          -webkit-flex: 1 1 auto;
          -ms-flex: 1 1 auto;
          flex: 1 1 auto; 
        }
    </style>
</head>

<!-- Body Section -->
<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- MenuBar -->
    <?php include 'includes/menu/menu.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Container -->
            <div class="container-fluid">
            
                <!-- WALLET BALANCES -->
                <?php include 'includes/sections/wallet-balances.php' ?>

                <!-- PEGAS -->
                <?php include 'includes/sections/pegas.php' ?>

                <!-- EARNING HISTORY -->
                <?php include 'includes/sections/earning-history.php' ?>



            </div>
            <!-- End Page Container -->
        </div>
        <!-- End Page Content -->

        <?php include 'includes/footer/footer.php'; ?>

    </div>
    <!-- End Main Content -->

</div>
<!-- End layout Wrapper -->

<!-- Script JS -->
<script src="assets/js/script.js"></script>

<!-- Right Sidebar -->
<?php include 'includes/menu/right-sidebar.php'; ?>

<!-- Default JS -->
<?php include 'includes/footer/footer-scripts.php'; ?>

</body>
</html>

