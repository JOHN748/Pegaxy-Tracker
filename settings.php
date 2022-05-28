<!-- Functions -->
<?php include ('functions/functions.php'); ?>
<!-- Session -->
<?php include ('includes/session.php') ?>
<!-- Currencies -->
<?php $currdetails = currencies(); ?>

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
            
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6 col-xs-6">
                                            <input type="hidden" name="usrid" value="<?php echo $_SESSION['user']['id']; ?>">
                                            <p class="text-muted mb-2">Currency</p>
                                            <select name="currency" class="form-control select2 col-12" onchange="this.form.submit()">
                                                <?php 
                                                    $query = "SELECT * FROM users where id = $log_userid";
                                                    $result = mysqli_query($db, $query);
                                                    $row = mysqli_fetch_array($result);
                                                    $currcode = $row['currency'];
                                                    foreach($currdetails as $currdetail): 
                                                        if($currdetail['code'] == $currcode):
                                                ?>
                                                    <option value="<?php echo $currdetail['code']; ?>" selected>
                                                        <?php echo $currdetail['currency']; ?>
                                                    </option>
                                                <?php        
                                                    else:
                                                ?>
                                                    <option value="<?php echo $currdetail['code']; ?>">
                                                        <?php echo $currdetail['currency']; ?>
                                                    </option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6 col-xs-6">
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Page Container -->
        </div>
        <!-- End Page Content -->

        <?php include 'includes/footer/footer.php'; ?>

    </div>
    <!-- End Main Content -->

</div>
<!-- End layout Wrapper -->

<!-- Right Sidebar -->
<?php include 'includes/menu/right-sidebar.php'; ?>

<!-- Default JS -->
<?php include 'includes/footer/footer-scripts.php'; ?>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

</body>
</html>

