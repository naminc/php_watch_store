<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/admin-assets/libs-bower/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin-assets/libs-bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admin-assets/libs-bower/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/admin-assets/adminlte/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/admin-assets/adminlte/css/skins/skin-purple.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="/admin-assets/css/custom.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="/admin/dashboard" class="logo">
                <span class="logo-mini"><b>A</b>LT</span>
                <span class="logo-lg"><b>Admin</b>Panel</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['username']; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['username']; ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $_SESSION['username']; ?>
                                        <small><?= $user['email']; ?></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/" class="btn btn-default btn-flat">Quay lại shop</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/logout" class="btn btn-default btn-flat">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">

                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                    <li class="active">
                        <a href="/admin/dashboard">
                            <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
                        </a>
                    </li>
                    <li><a href="/admin/settings"><i class="fa fa-cogs"></i> <span>Quản lý hệ thống</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-dropbox"></i> <span>Quản lý sản phẩm</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/categories/list">Danh mục</a></li>
                            <li><a href="/admin/products/list">Sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin/orders/list"><i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span></a></li>
                    <li><a href="/admin/users/list"><i class="fa fa-users"></i> <span>Quản lý người dùng</span></a></li>
                </ul>
            </section>
        </aside>