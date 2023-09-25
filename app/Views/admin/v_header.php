<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pagetitle; ?></title>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>/assets/bootstrap-5.2.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/bootstrap-icons-1.10.2/bootstrap-icons.css" rel="stylesheet">
    <!-- JQuery Confirm -->
    <link href="<?= base_url(); ?>/assets/jquery-confirm-v3.3.4/css/jquery-confirm.css" rel="stylesheet">
    <!-- datatables -->
    <link href="<?= base_url(); ?>/assets/DataTables/datatables.min.css" rel="stylesheet">
    <!-- base css -->
    <link href="<?= base_url(); ?>/assets/css/base.css" rel="stylesheet">
    <!-- color css -->
    <link href="<?= base_url(); ?>/assets/css/global.css" rel="stylesheet">
    <!-- style.css -->
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <!-- Custom Loaded CSS -->

    <?php foreach ($css as $row) : ?>
        <link href="<?= base_url(); ?><?= $row ?>" rel="stylesheet">
    <?php endforeach ?>
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo getenv('appName'); ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="w-100 text-light text-nowrap px-3 py-2" style="overflow-x:hidden; text-overflow:ellipsis;">User: <?php echo $_SESSION['username']; ?> </div>
        <div class="w-100 text-light text-nowrap px-3 py-2" style="overflow-x:hidden; text-overflow:ellipsis;">Date: <?php echo date('M d, Y', time()); ?> &emsp;|&emsp; Server: <?php echo $_SERVER['SERVER_SOFTWARE']; ?> &emsp;|&emsp; Php: <?php echo phpversion(); ?> &emsp;|&emsp; Mysqli Client: <?php echo mysqli_get_client_version(); ?></div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="mt-2 col-md-3 col-lg-2 d-md-block  sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="list-unstyled ps-0">

                        <li>
                            <button class="btn btn-toggle align-items-center collapsed mb-2" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                                <i class="icons bi bi-person-vcard"></i>
                                帐户 / Account
                            </button>
                            <div class="collapse" id="account-collapse">
                                <ul class="sidebar_r btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="/dashboard" data-toggle="tooltip" title="操控界面 / Dashboard" class="sbnav"><i class="subicons bi-house-fill"></i> 操控界面 / Dashboard</a></li>
                                    <li><a href="/myprofile" data-toggle="tooltip" title="My Profile" class="sbnav"><i class="subicons bi-tools"></i> 我的资料 / My Profile</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php
                        $permission_set = session()->get('permission_set');
                        ?>

                        <?php if (in_array("UserManagement/index", $permission_set) || in_array("PermissionManagement/index", $permission_set) || in_array("RoleManagement/index", $permission_set) || in_array("SysConfig/index", $permission_set)  ) : ?>
                            <li>
                                <button class="btn btn-toggle align-items-center collapsed mb-2" data-bs-toggle="collapse" data-bs-target="#admin-collapse" aria-expanded="false">
                                    <i class="icons bi bi-person-circle"></i>
                                    管理 / Administration
                                </button>
                                <div class="collapse" id="admin-collapse">
                                    <ul class="sidebar_r btn-toggle-nav list-unstyled fw-normal pb-1 small">

                                        <?php if (in_array("UserManagement/index", $permission_set)) : ?>
                                            <li><a href="/usermanagement" data-toggle="tooltip" title="用户管理 / User Management" class="sbnav"><i class="subicons bi-person-fill-gear"></i> 用户管理 / User Management</a></li>
                                        <?php endif; ?>

                                        <?php if (in_array("PermissionManagement/index", $permission_set)) : ?>
                                            <li><a href="/permissionmanagement" data-toggle="tooltip" title="权限管理 / Permission Management" class="sbnav"><i class="subicons bi-person-fill-lock"></i> 权限管理 / Permission Management</a></li>
                                        <?php endif; ?>

                                        <?php if (in_array("RoleManagement/index", $permission_set)) : ?>
                                            <li><a href="/rolemanagement" data-toggle="tooltip" title="角色管理 / Role Management" class="sbnav"><i class="subicons bi-person-lines-fill"></i> 角色管理 / Role Management</a></li>
                                        <?php endif; ?>

                                        <?php if (in_array("SysConfig/index", $permission_set)) : ?>
                                            <li><a href="/sysconfig" data-toggle="tooltip" title="系统配置 / System Configuration" class="sbnav"><i class="subicons bi-gear-fill"></i> 系统配置 / System Configuration</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ( in_array("Promo1/index", $permission_set) || in_array("Promo2week/index", $permission_set) || in_array("Promo2month/index", $permission_set) || in_array("Promo2year/index", $permission_set) || in_array("Promo3/index", $permission_set) || in_array("Promo3betlist/index", $permission_set) || in_array("Promo3userinfo/index", $permission_set) || in_array("Promo4gambling/index", $permission_set) || in_array("Promo4fishing/index", $permission_set) || in_array("Promo4deposit/index", $permission_set) || in_array("PromoSummary/index", $permission_set) || in_array("Promo1ewallet/index", $permission_set) ) : ?>
                            <li>
                                <button class="btn btn-toggle align-items-center collapsed mb-2" data-bs-toggle="collapse" data-bs-target="#promo-collapse" aria-expanded="false">
                                    <i class="icons bi bi-trophy-fill"></i>
                                    no.097vip
                                </button>
                                <div class="collapse" id="promo-collapse">
                                    <ul class="sidebar_r btn-toggle-nav list-unstyled fw-normal pb-1 small">

                                        <?php if (in_array("Promo3/index", $permission_set)) : ?>
                                            <li><a href="/promo3" data-toggle="tooltip" title="Promo 3" class="sbnav"><i class="subicons bi-dice-3-fill"></i>彩金</a></li>
                                        <?php endif; ?>

                                        <?php if (in_array("Promo3betlist/index", $permission_set)) : ?>
                                            <li><a href="/promo3betlist" data-toggle="tooltip" title="Promo 3 Betlist" class="sbnav"><i class="subicons bi-dice-3-fill"></i>上传存款</a></li>
                                        <?php endif; ?>

                                        <?php if (in_array("Promo3userinfo/index", $permission_set)) : ?>
                                            <li><a href="/promo3userinfo" data-toggle="tooltip" title="Promo 3 Userinfo" class="sbnav"><i class="subicons bi-dice-3-fill"></i>总存款</a></li>
                                        <?php endif; ?>

                                   
                                    </ul>
                                </div>
			    </li>

                           
                              <li>
                                <button class="btn btn-toggle align-items-center collapsed mb-2" data-bs-toggle="collapse" data-bs-target="#promo-collapse-two" aria-expanded="false">
                                    <i class="icons bi bi-trophy-fill"></i>
                                   no.8167vip_org
                                </button>
                                <div class="collapse" id="promo-collapse-two">
                                    <ul class="sidebar_r btn-toggle-nav list-unstyled fw-normal pb-1 small">

                                        <?php if (in_array("Promo3/index", $permission_set)) : ?>
                                            <li><a href="/promo8167" data-toggle="tooltip" title="8167 Promo" class="sbnav"><i class="subicons bi-dice-3-fill"></i>彩金</a></li>
                                        <?php endif; ?>

                                        <?php if (in_array("Promo3betlist/index", $permission_set)) : ?>
                                            <li><a href="/promo8167betlist" data-toggle="tooltip" title="Promo 8167 Betlist" class="sbnav"><i class="subicons bi-dice-3-fill"></i>上传存款</a></li>
                                        <?php endif; ?>

                                        <?php if (in_array("Promo3userinfo/index", $permission_set)) : ?>
                                            <li><a href="/promo8167userinfo" data-toggle="tooltip" title="Promo 8167 Userinfo" class="sbnav"><i class="subicons bi-dice-3-fill"></i>总存款</a></li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>


                    </ul>
                    <!-- <ul class="btn-toggle-nav logout fw-normal pb-1 small">
                        <li><a href="/logout" data-toggle="tooltip" title="登出 / Sign Out" class=""><i class="icons bi-power"></i> 登出 / Sign Out</a></li>
                    </ul> -->
                    <div class="logout bg-danger mt-5"><a href="/logout" data-toggle="tooltip" title="登出 / Sign Out" class=""><i class="icons bi-power"></i> 登出 / Sign Out</a></div>
                </div>
            </nav>
            <!-- end header -->
