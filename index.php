<!-- Functions -->
<?php include ('functions/functions.php'); ?>
<!-- Session -->
<?php include ('includes/session.php') ?>

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
</head>

<!-- Body Section -->
<body data-sidebar="dark">

<!-- Initiable -->
<?php include 'includes/initiable.php' ?>

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

