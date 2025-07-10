<?php
require_once './system/core/database.php';
require_once './system/views/layouts/header.php';
?>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Error Page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb wishlist-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="search-error-wrapper">
                            <h1>404</h1>
                            <h2>PAGE NOT BE FOUND</h2>
                            <p class="home-link">Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.</p>
                            <form action="#" class="error-form">
                                <div class="error-form-input">
                                    <input type="text" placeholder="Tìm kiếm..." class="error-input-text">
                                    <button type="submit" class="error-s-button"><i class="icon-magnifier"></i></button>
                                </div>
                            </form>
                            <a href="/" class="home-bacck-button">Quay về trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
require_once './system/views/layouts/footer.php';
?>