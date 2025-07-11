<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?> | <?= $settings['title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?= $settings['keyword']; ?>">
    <meta name="description" content="<?= $settings['description']; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $settings['icon']; ?>">
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="/assets/css/plugins/animation.css">
    <link rel="stylesheet" href="/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="/assets/css/plugins/animation.css">
    <link rel="stylesheet" href="/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/assets/css/plugins/fancy-box.css">
    <link rel="stylesheet" href="/assets/css/plugins/jqueryui.min.css">
    <link rel="stylesheet" href="/assets/css/style.css?=<?= time(); ?>">
    <link rel="stylesheet" href="/assets/css/custom.css?=<?= time(); ?>">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
    <!-- cdn jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- cdn toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>

    <div class="main-wrapper">
        <header class="header">
            <div class="header-top-area d-none d-lg-block text-color-white bg-gren border-bm-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <li class="language">Tiếng Việt <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list">
                                            <li><a href="#">Tiếng Việt</a></li>
                                            <li><a href="#">English</a></li>
                                        </ul>
                                    </li>
                                    <li class="curreny-wrap">VNĐ <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list curreny-list">
                                            <li><a href="#">VNĐ</a></li>
                                            <li><a href="#">USD</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top-info-wrap text-end">
                                <ul class="my-account-container">
                                    <?php if (isset($_SESSION['username'])) { ?>
                                        <li><a href="/my-account">Tài khoản</a></li>
                                        <li>|</li>
                                        <li><a href="/cart">Giỏ hàng</a></li>
                                        <li>|</li>
                                        <li><a href="/logout">Đăng xuất</a></li>
                                    <?php } else { ?>
                                        <li><a href="/auth/login">Đăng nhập</a></li>
                                        <li>|</li>
                                        <li><a href="/auth/login">Đăng ký</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="haeader-mid-area bg-gren border-bm-1 d-none d-lg-block ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-5">
                            <div class="logo-area">
                                <a href="/"><img src="<?= $settings['logo']; ?>" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="search-box-wrapper">
                                <div class="search-box-inner-wrap">
                                    <form class="search-box-inner">
                                        <div class="search-field-wrap">
                                            <input type="text" class="search-field" style="border-radius: 3px;" placeholder="Tìm kiếm sản phẩm...">
                                            <div class="search-btn">
                                                <button><i class="icon-magnifier"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="right-blok-box text-white d-flex">
                                <div class="user-wrap">
                                    <?php if (isset($_SESSION['username'])) { ?>
                                        <a href="/my-account"> <i class="icon-user"></i></a>
                                    <?php } else { ?>
                                        <a href="/auth/login"> <i class="icon-user"></i></a>
                                    <?php } ?>
                                </div>
                                <div class="shopping-cart-wrap">
                                    <a href="#"><i class="icon-basket-loaded"></i><span class="cart-total">2</span></a>
                                    <ul class="mini-cart">
                                        <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="/assets/images/product/product-02.png"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>Product Name 01</h4>
                                                </a>
                                                <div class="quanti-price-wrap">
                                                    <span class="quantity">1 ×</span>
                                                    <div class="price-box"><span class="new-price">$130.00</span></div>
                                                </div>
                                                <a class="remove_from_cart" href="#"><i class="icon_close"></i></a>
                                            </div>
                                        </li>
                                        <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="/assets/images/product/product-03.png"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>Product Name 03</h4>
                                                </a>
                                                <div class="quanti-price-wrap">
                                                    <span class="quantity">1 ×</span>
                                                    <div class="price-box"><span class="new-price">$130.00</span></div>
                                                </div>
                                                <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>
                                            </div>
                                        </li>
                                        <li class="subtotal-box">
                                            <div class="subtotal-title">
                                                <h3>Sub-Total :</h3><span>$ 260.99</span>
                                            </div>
                                        </li>
                                        <li class="mini-cart-btns">
                                            <div class="cart-btns">
                                                <a href="cart.html">View cart</a>
                                                <a href="checkout.html">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="admin-wrap">
                                    <?php if (isset($_SESSION['username']) && $user['role'] == 'admin') { ?>
                                        <a href="/admin/dashboard"> <i class="fa fa-cogs"></i></a>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="haeader-bottom-area bg-gren header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 d-none d-lg-block">
                            <div class="main-menu-area white_text">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation text-center">
                                    <ul>
                                        <li class="active"><a href="/">Trang chủ</a>
                                        </li>

                                        <li><a href="#">Danh mục <i class="fa fa-angle-down"></i></a>
                                            <?php
                                            $sql = "SELECT name, slug FROM categories WHERE status = 1 ORDER BY name ASC";
                                            $categories = $DB->fetch_assoc($sql, 0);
                                            ?>
                                            <ul class="sub-menu">
                                                <?php foreach ($categories as $category) { ?>
                                                    <li><a href="/category/<?php echo $category['slug']; ?>"><?php echo $category['name']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li><a href="/about-us">Giới thiệu</a></li>
                                        <li><a href="/promotion">Khuyến mãi</a></li>
                                        <li><a href="/contact-us">Liên hệ</a></li>
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-5 col-md-6 d-block d-lg-none">
                            <div class="logo"><a href="/"><img src="<?php echo $settings['logo']; ?>" alt="Logo"></a></div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-7 d-block d-lg-none">
                            <div class="right-blok-box text-white d-flex">

                                <div class="user-wrap">
                                    <a href="wishlist.html"><span class="cart-total">2</span> <i class="icon-heart"></i></a>
                                </div>

                                <div class="shopping-cart-wrap">
                                    <a href="#"><i class="icon-basket-loaded"></i><span class="cart-total">2</span></a>
                                    <ul class="mini-cart">
                                        <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="/assets/images/product/product-02.png"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>Product Name 01</h4>
                                                </a>
                                                <div class="quanti-price-wrap">
                                                    <span class="quantity">1 ×</span>
                                                    <div class="price-box"><span class="new-price">$130.00</span></div>
                                                </div>
                                                <a class="remove_from_cart" href="#"><i class="fa fa-times"></i></a>
                                            </div>
                                        </li>
                                        <li class="cart-item">
                                            <div class="cart-image">
                                                <a href="product-details.html"><img alt="" src="/assets/images/product/product-03.png"></a>
                                            </div>
                                            <div class="cart-title">
                                                <a href="product-details.html">
                                                    <h4>Product Name 03</h4>
                                                </a>
                                                <div class="quanti-price-wrap">
                                                    <span class="quantity">1 ×</span>
                                                    <div class="price-box"><span class="new-price">$130.00</span></div>
                                                </div>
                                                <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>
                                            </div>
                                        </li>
                                        <li class="subtotal-box">
                                            <div class="subtotal-title">
                                                <h3>Sub-Total :</h3><span>$ 260.99</span>
                                            </div>
                                        </li>
                                        <li class="mini-cart-btns">
                                            <div class="cart-btns">
                                                <a href="cart.html">View cart</a>
                                                <a href="checkout.html">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="mobile-menu-btn d-block d-lg-none">
                                    <div class="off-canvas-btn">
                                        <a href="#"><img src="/assets/images/icon/bg-menu.png" alt=""></a>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <aside class="off-canvas-wrapper">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>

                    <div class="off-canvas-inner">

                        <div class="search-box-offcanvas">
                            <form>
                                <input type="text" placeholder="Tìm kiếm sản phẩm...">
                                <button class="search-btn"><i class="icon-magnifier"></i></button>
                            </form>
                        </div>

                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children"><a href="#">Home</a>
                                        <ul class="dropdown">
                                            <li><a href="/">Home Page 1</a></li>
                                            <li><a href="/">Home Page 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Shop</a>
                                        <ul class="megamenu dropdown">
                                            <li class="mega-title has-children"><a href="#">Shop Layouts</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Shop Left Sidebar</a></li>
                                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                    <li><a href="shop-list-left.html">Shop List Left Sidebar</a></li>
                                                    <li><a href="shop-list-right.html">Shop List Right Sidebar</a></li>
                                                    <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-title has-children"><a href="#">Product Details</a>
                                                <ul class="dropdown">
                                                    <li><a href="product-details.html">Single Product Details</a></li>
                                                    <li><a href="variable-product-details.html">Variable Product Details</a></li>
                                                    <li><a href="affiliate-product-details.html">affiliatel Product Details</a></li>
                                                    <li><a href="gallery-product-details.html">Gallery Product Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-title has-children"><a href="#">Shop Pages</a>
                                                <ul class="dropdown">
                                                    <li><a href="error404.html">Error 404</a></li>
                                                    <li><a href="compare.html">Compare Page</a></li>
                                                    <li><a href="cart.html">Cart Page</a></li>
                                                    <li><a href="checkout.html">Checkout Page</a></li>
                                                    <li><a href="wishlist.html">Wish List Page</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.html">Blog Left Sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                            <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                            <li><a href="blog-largeimage.html">Blog Large Image</a></li>
                                            <li><a href="blog-details.html">Blog Details Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="frequently-questions.html">FAQ</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="login-register.html">login &amp; register</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/about-us">Giới thiệu</a></li>
                                    <li><a href="/contact-us">Liên hệ</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->


                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <div class="top-info-wrap text-left text-black">
                                <h5>Tài khoản</h5>
                                <ul class="offcanvas-account-container">
                                    <?php if (isset($_SESSION['username'])) { ?>
                                        <li><a href="/my-account">Tài khoản</a></li>
                                        <li><a href="/cart">Giỏ hàng</a></li>
                                        <li><a href="/wishlist">Yêu thích</a></li>
                                        <li><a href="/checkout">Thanh toán</a></li>
                                    <?php } else { ?>
                                        <li><a href="/auth/login">Đăng nhập</a></li>
                                        <li><a href="/auth/login">Đăng ký</a></li>
                                    <?php } ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </aside>
        </header>