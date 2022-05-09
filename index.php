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
            
                <div class="row pt-4">
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Matic</p>
                                        <h4 id="matic" class="mb-0">0</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <img width="50px" height="50px" src="assets/images/coins/matic.png"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Vigorous</p>
                                        <h4 id="vis" class="mb-0">0</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <img width="50px" height="50px" src="assets/images/coins/vis.png"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Locked Vis</p>
                                        <h4 id="lockedvis" class="mb-0">0</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <img width="50px" height="50px" src="assets/images/coins/visoff.png"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Pegaxy Stone</p>
                                        <h4 id="pgx" class="mb-0">0</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <img width="50px" height="50px" src="assets/images/coins/pgx.png"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">USDT</p>
                                        <h4 id="usdt" class="mb-0">0</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <img width="50px" height="50px" src="assets/images/coins/usdt.png"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">USDC</p>
                                        <h4 id="usdc" class="mb-0">0</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <img width="50px" height="50px" src="assets/images/coins/usdc.png"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Fabled Token</p>
                                        <h4 id="matic" class="mb-0">0</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <img width="50px" height="50px" src="assets/images/coins/fable.png"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Pegas</p>
                                        <h4 id="pega" class="mb-0">0</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <img width="60px" height="60px" src="assets/images/coins/pega.png"></i>
                                    </div>
                                </div>
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

<script>

    $.ajaxSetup({
        method: "GET",
        withCredentials: true,
        headers : {
            'x-api-key' : 'ZBhee8uPaQv5gjjX2zXF8Z1gW7UbjM8P4r9yxnQQlPnTqE5ZFl2fAAbx5cKp5G8l',
            'Content-Type': 'application/json'
        }
    });

    var url1 = 'https://deep-index.moralis.io/api/v2/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A/erc20?chain=polygon';
    var url2 = 'https://deep-index.moralis.io/api/v2/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A/balance?chain=polygon';
    var url3 = 'https://api-apollo.pegaxy.io/v1/assets/count/user/0xc580Aaf1D3C119E050AAEBf51D8cf912c8183A0A';
    
    $.when(
        $.getJSON(url1),
        $.getJSON(url2),
        $.getJSON(url3)
    ).done(function (data1, data2, data3) {

        let coins = JSON.parse(JSON.stringify(data1));

        for(i=0; i<coins[0].length; i++){
            if(coins[0][i].symbol=='VIS'){
                var value = coins[0][i].balance;
                var convert = Moralis.Units.FromWei(value, 18);
                var balance = Math.round(convert*10000)/10000;
                document.getElementById('vis').innerHTML = balance;
            }else if(coins[0][i].symbol=='PGX'){
                var value = coins[0][i].balance;
                var convert = Moralis.Units.FromWei(value, 18);
                var balance = Math.round(convert*10000)/10000;
                document.getElementById('pgx').innerHTML = balance;  
            }else if(coins[0][i].symbol=='USDT'){
                var value = coins[0][i].balance;
                var convert = Moralis.Units.FromWei(value, 6);
                var balance = Math.round(convert*10000)/10000;
                document.getElementById('usdt').innerHTML = balance;  
            }else if(coins[0][i].symbol=='USDC'){
                var value = coins[0][i].balance;
                var convert = Moralis.Units.FromWei(value, 6);
                var balance = Math.round(convert*10000)/10000;
                document.getElementById('usdc').innerHTML = balance;  
            }          
        }

        var value = data2[0].balance;
        var convert = Moralis.Units.FromWei(value, 18);
        var balance = Math.round(convert*10000)/10000;
        document.getElementById('matic').innerHTML = balance;

        var lockedvis = data3[0].lockedVis;
        var pega = data3[0].pega;
        document.getElementById('lockedvis').innerHTML = lockedvis;
        document.getElementById('pega').innerHTML = pega;

    });


</script>


<!-- Right Sidebar -->
<?php include 'includes/menu/right-sidebar.php'; ?>

<!-- Default JS -->
<?php include 'includes/footer/footer-scripts.php'; ?>

</body>
</html>

