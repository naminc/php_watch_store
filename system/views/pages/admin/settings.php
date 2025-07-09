<?php
require_once './system/core/database.php';
if (isset($_SESSION['username']) && $user['role'] == 'admin') {
    if($_POST && isset($_POST['update_settings'])){
        $title = isset($_POST['title']) ? $DB->real_escape_string(xss($_POST['title'])) : exit;
        $keyword = isset($_POST['keyword']) ? $DB->real_escape_string(xss($_POST['keyword'])) : exit;
        $description = isset($_POST['description']) ? $DB->real_escape_string(xss($_POST['description'])) : exit;
        $logo = isset($_POST['logo']) ? $DB->real_escape_string(xss($_POST['logo'])) : exit;
        $icon = isset($_POST['icon']) ? $DB->real_escape_string(xss($_POST['icon'])) : exit;
        $owner = isset($_POST['owner']) ? $DB->real_escape_string(xss($_POST['owner'])) : exit;
        $domain = isset($_POST['domain']) ? $DB->real_escape_string(xss($_POST['domain'])) : exit;
        $phone = isset($_POST['phone']) ? $DB->real_escape_string(xss($_POST['phone'])) : exit;
        $email = isset($_POST['email']) ? $DB->real_escape_string(xss($_POST['email'])) : exit;
        $address = isset($_POST['address']) ? $DB->real_escape_string(xss($_POST['address'])) : exit;
        $maintenance = isset($_POST['maintenance']) ? $DB->real_escape_string(xss($_POST['maintenance'])) : exit;

        $DB->query("UPDATE `settings` SET
            `title` = '{$title}',
            `keyword` = '{$keyword}',
            `description` = '{$description}',
            `logo` = '{$logo}',
            `icon` = '{$icon}',
            `owner` = '{$owner}',
            `domain` = '{$domain}',
            `phone` = '{$phone}',
            `email` = '{$email}',
            `address` = '{$address}',
            `maintenance` = '{$maintenance}'
        WHERE `id` = 1");
        $status = true;
        $msg = 'Cập nhật thông tin hệ thống thành công';
    }
    require_once LAYOUT . '/admin/header.php';
if($msg) {
?>
<script>
    Swal.fire({
        title: 'Thông báo',
        text: '<?= $msg ?>',
        icon: '<?= $status === true ? 'success' : 'error' ?>'
    });
    <?php if ($status === true): ?>
        setTimeout(() => {
            window.location.href = '/admin/settings';
        }, 1500);
    <?php endif; ?>
</script>
<?php
}
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Quản lý hệ thống
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li class="active">Quản lý hệ thống</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin hệ thống</h3>
                </div>
                <div class="box-body">
                    <form action="#" method="post"> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title"
                                        value="<?= $settings['title']; ?>" placeholder="Nhập tiêu đề trang web" required>
                                </div>
                                <div class="form-group">
                                    <label for="keyword">Từ khóa</label>
                                    <input type="text" class="form-control" name="keyword"
                                        value="<?= $settings['keyword']; ?>" placeholder="Nhập từ khóa, cách nhau bằng dấu phẩy" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea class="form-control" name="description" rows="3"
                                        placeholder="Nhập mô tả trang web" required><?= $settings['description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="text" class="form-control" name="logo"
                                        value="<?= $settings['logo']; ?>" placeholder="Nhập đường dẫn logo (VD: assets/images/logo.png)" required>
                                    <?php if (!empty($settings['logo'])): ?>
                                    <img src="<?= $settings['logo']; ?>" alt="Logo Preview" style="max-width: 90px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" class="form-control" name="icon"
                                        value="<?= $settings['icon']; ?>" placeholder="Nhập đường dẫn icon (VD: assets/images/favicon.ico)" required>
                                    <?php if (!empty($settings['icon'])): ?>
                                    <img src="<?= $settings['icon']; ?>" alt="Icon Preview" style="max-width: 90px; margin-top: 10px;">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="owner">Chủ sở hữu</label>
                                    <input type="text" class="form-control" name="owner"
                                        value="<?= $settings['owner']; ?>" placeholder="Nhập tên chủ sở hữu" required>
                                </div>
                                <div class="form-group">
                                    <label for="domain">Tên miền</label>
                                    <input type="text" class="form-control" name="domain"
                                        value="<?= $settings['domain']; ?>" placeholder="Nhập tên miền (VD: naminc.io)" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="number" class="form-control" name="phone"
                                        value="<?= $settings['phone']; ?>" placeholder="Nhập số điện thoại" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email liên hệ</label>
                                    <input type="email" class="form-control" name="email"
                                        value="<?= $settings['email']; ?>" placeholder="Nhập email liên hệ" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <textarea class="form-control" name="address" rows="3"
                                        placeholder="Nhập địa chỉ liên hệ" required><?= $settings['address']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="maintenance">Trạng thái bảo trì</label>
                                    <select class="form-control" name="maintenance" required>
                                        <option value="off" <?= $settings['maintenance'] == 'off' ? 'selected' : '' ?>>OFF</option>
                                        <option value="on" <?= $settings['maintenance'] == 'on' ? 'selected' : '' ?>>ON</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn bg-purple" name="update_settings"><i class="fa fa-save"></i> Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
<?php
    require_once LAYOUT . '/admin/footer.php';
} else {
    echo href('/');
    exit;
}
?>