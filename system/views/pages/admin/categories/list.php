<?php
require_once './system/core/database.php';
if (isset($_SESSION['username']) && $user['role'] == 'admin') {
    if ($_POST && isset($_POST['add_category'])) {
        $name = isset($_POST['name']) ? $DB->real_escape_string(xss($_POST['name'])) : exit;
        $description = isset($_POST['description']) ? $DB->real_escape_string(xss($_POST['description'])) : exit;
        $stt = isset($_POST['status']) ? $DB->real_escape_string(xss($_POST['status'])) : 1;
        $slug = slug($name);
        $check = $DB->fetch_assoc("SELECT * FROM `categories` WHERE `slug` = '{$slug}'", 0);
        if ($check) {
            $status = false;
            $msg = 'Danh mục đã tồn tại, vui lòng thử lại';
        } else {
            $DB->query("INSERT INTO `categories` (`name`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES ('{$name}', '{$description}', '{$slug}', '{$stt}', NOW(), NOW())");
            $status = true;
            $msg = 'Thêm danh mục thành công';
        }
    }
    if($_POST && isset($_POST['edit_category'])){
        $id = intval($_POST['category_id']);
        $name = isset($_POST['name']) ? $DB->real_escape_string(xss($_POST['name'])) : exit;
        $description = isset($_POST['description']) ? $DB->real_escape_string(xss($_POST['description'])) : exit;
        $stt = isset($_POST['status']) ? $DB->real_escape_string(xss($_POST['status'])) : 1;
        $slug = slug($name);
        $check = $DB->fetch_assoc("SELECT * FROM `categories` WHERE `slug` = '{$slug}' AND `id` != '{$id}'", 0);
        if ($check) {
            $status = false;
            $msg = 'Danh mục đã tồn tại, vui lòng thử lại';
        } else {
            $DB->query("UPDATE `categories` SET `name` = '{$name}', `description` = '{$description}', `slug` = '{$slug}', `status` = '{$stt}', `updated_at` = NOW() WHERE `id` = '{$id}'");
            $status = true;
            $msg = 'Sửa danh mục thành công';
        }
    }
    if ($_GET && isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $check = $DB->fetch_assoc("SELECT * FROM `categories` WHERE `id` = '{$id}'", 0);
        if ($check) {
            $DB->query("DELETE FROM `categories` WHERE `id` = '{$id}'");
            $status = true;
            $msg = 'Xóa danh mục thành công';
        } else {
            $status = false;
            $msg = 'Danh mục không tồn tại';
        }
    }
    require_once LAYOUT . '/admin/header.php';
    if ($msg) {
?>
        <script>
            Swal.fire({
                title: 'Thông báo',
                text: '<?= $msg ?>',
                icon: '<?= $status === true ? 'success' : 'error' ?>'
            });
            <?php if ($status === true || $status === false): ?>
                setTimeout(() => {
                    window.location.href = '/admin/categories/list';
                }, 1500);
            <?php endif; ?>
        </script>
    <?php
    }
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>#Quản lý danh mục</h1>
            <ol class="breadcrumb">
                <li><a href="/admin/dashboard">Admin</a></li>
                <li class="active">Danh mục</li>
            </ol>
        </section>
        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh mục</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#addCategoryModal">
                            <i class="fa fa-plus"></i> Thêm danh mục
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="categoryTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên danh mục</th>
                                    <th>Slug</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Cập nhật</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM categories";
                                $categories = $DB->fetch_assoc($sql, 0);
                                foreach ($categories as $category) { ?>
                                    <tr>
                                        <td><?= $category['id'] ?></td>
                                        <td><?= $category['name'] ?></td>
                                        <td><?= $category['slug'] ?></td>
                                        <td><?= $category['description'] ?></td>
                                        <td><?= $category['status'] == 1 ? '<span class="badge bg-green">Hoạt động</span>' : '<span class="badge bg-red">Không hoạt động</span>' ?></td>
                                        <td><span class="badge bg-green"><?= $category['created_at'] ?></span></td>
                                        <td><span class="badge bg-blue"><?= $category['updated_at'] ?></span></td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-success btn-sm"
                                                data-toggle="modal"
                                                data-target="#editCategoryModal"
                                                data-id="<?= $category['id'] ?>"
                                                data-name="<?= htmlspecialchars($category['name']) ?>"
                                                data-description="<?= htmlspecialchars($category['description']) ?>"
                                                data-status="<?= $category['status'] ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="/admin/categories/list?delete=<?= $category['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if (empty($categories)) { ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="addCategoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm danh mục</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Tên danh mục</label>
                            <input type="text" class="form-control" id="category_name" name="name"
                                placeholder="Nhập tên danh mục" required>
                        </div>
                        <div class="form-group">
                            <label for="category_description">Mô tả</label>
                            <textarea class="form-control" id="category_description" name="description" rows="3"
                                placeholder="Nhập mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_status">Trạng thái</label>
                            <select class="form-control" id="category_status" name="status">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="add_category" class="btn bg-purple"><i class="fa fa-plus"></i> Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editCategoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Sửa danh mục</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_id" id="edit_category_id">
                        <div class="form-group">
                            <label for="edit_category_name">Tên danh mục</label>
                            <input type="text" class="form-control" id="edit_category_name" name="name"
                                placeholder="Nhập tên danh mục" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_category_description">Mô tả</label>
                            <textarea class="form-control" id="edit_category_description" name="description" rows="3"
                                placeholder="Nhập mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_category_status">Trạng thái</label>
                            <select class="form-control" id="edit_category_status" name="status">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="edit_category" class="btn bg-purple"><i class="fa fa-save"></i> Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#editCategoryModal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var id = button.data('id');
                var name = button.data('name');
                var description = button.data('description');
                var status = button.data('status');
                var modal = $(this);
                modal.find('#edit_category_id').val(id);
                modal.find('#edit_category_name').val(name);
                modal.find('#edit_category_description').val(description);
                modal.find('#edit_category_status').val(status);
            });
        });
    </script>

<?php
    require_once LAYOUT . '/admin/footer.php';
} else {
    echo href('/');
    exit;
}
?>