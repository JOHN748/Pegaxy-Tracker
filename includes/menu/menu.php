<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- Logo -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo/logo-01.svg" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo/logo-title.png" alt="" width="100%" height="26">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="px-lg-2">
                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/github.png" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                    <span>Mail Chimp</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/slack.png" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <a href="#">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class='bx bx-fullscreen'></i>
                </button>
                </a>
            </div>
            
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <a href="#">
                <button type="button" class="btn header-item noti-icon waves-effect">
                    <i class="bx bxs-heart beat-heart"></i>
                    <span class="badge badge-primary badge-pill" style="position: absolute; top: 18px; left: 24px;">
                        0
                    </span>
                </button>
                </a>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bxs-wallet"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0">Addresses</h6>
                            </div>
                            <div class="col-auto">
                                <a href="#" style="color: white;"><i class='bx bx-folder-plus'></i> Add</a>
                            </div>
                        </div>
                    </div>

                    <div data-simplebar style="max-height: auto;">
                        <?php 
                            $query = "SELECT * FROM users where id = $log_userid ";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_array($result);
                        ?>
                        
                        <form method="post">

                        <input type="hidden" name="usrid" value="<?php echo $row['id']; ?>">

                        <?php if(!empty($row['address_1'])){ ?>
                            <button class="addbuts" type="submit" name="address1">
                                <div class="notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bxs-wallet-alt"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1 float-left">Wallet 1</h6>
                                            <div class="font-size-12 text-muted">
                                                <?php if($row['address'] == '1'){ ?>
                                                    <p class="mb-1 text-wrap text-success">
                                                        <?php echo $row['address_1']; ?>
                                                    </p>
                                                <?php }else{ ?>
                                                    <p class="mb-1 text-wrap"><?php echo $row['address_1']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        <?php }if(!empty($row['address_2'])){ ?>
                            <button class="addbuts" type="submit" name="address2">
                                <div class="notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bxs-wallet-alt"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1 float-left">Wallet 2</h6>
                                            <div class="font-size-12 text-muted">
                                                <?php if($row['address'] == '2'){ ?>
                                                    <p class="mb-1 text-wrap text-success">
                                                        <?php echo $row['address_2']; ?>
                                                    </p>
                                                <?php }else{ ?>
                                                    <p class="mb-1 text-wrap"><?php echo $row['address_2']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        <?php }if(!empty($row['address_3'])){ ?>
                            <button class="addbuts" type="submit" name="address3">
                                <div class="notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bxs-wallet-alt"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1 float-left">Wallet 3</h6>
                                            <div class="font-size-12 text-muted">
                                                <?php if($row['address'] == '3'){ ?>
                                                    <p class="mb-1 text-wrap text-success">
                                                        <?php echo $row['address_3']; ?>
                                                    </p>
                                                <?php }else{ ?>
                                                    <p class="mb-1 text-wrap"><?php echo $row['address_3']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        <?php }if(!empty($row['address_4'])){ ?>
                            <button class="addbuts" type="submit" name="address4">
                                <div class="notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bxs-wallet-alt"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1 float-left">Wallet 4</h6>
                                            <div class="font-size-12 text-muted">
                                                <?php if($row['address'] == '4'){ ?>
                                                    <p class="mb-1 text-wrap text-success">
                                                        <?php echo $row['address_4']; ?>
                                                    </p>
                                                <?php }else{ ?>
                                                    <p class="mb-1 text-wrap"><?php echo $row['address_4']; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        <?php } ?>

                        </form>

                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <?php  if (isset($_SESSION['user'])){ ?>

                    <?php if($_SESSION['user']['role'] == 'user') { ?>
                        <img class="rounded-circle header-profile-user" src="<?php echo 'assets/images/users/'.$log_userimage; ?>">
                        <span class="d-none d-xl-inline-block ml-1"><?php echo $log_username; ?></span>
                    <?php }elseif($_SESSION['user']['role'] == 'admin') { ?>
                        <img class="rounded-circle header-profile-user" src="<?php echo 'admin/assets/images/admins/'.$log_userimage; ?>">
                        <span class="d-none d-xl-inline-block ml-1"><?php echo $log_username; ?></span>
                    <?php } ?>

                <?php } ?>

                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-right">

                    <a class="dropdown-item d-block" href="settings.php"><i class="fa fa-wrench mr-2"></i> Settings</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-danger" href="index.php?logout='1'"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>

                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header> 

<!-- Left Sidebar Start -->

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">
                    <span>Guest</span>
                <li>
                    <a href="#" class=" waves-effect">
                        <i class='bx bxs-user-account'></i>
                        <span>Profile</span>
                    </a>
                </li>


                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-movie-play"></i>
                        <span>Movies</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Kollywood Movies</a></li>
                        <li><a href="#">Tollywood Movies</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->