<?php
require_once './system/core/database.php';
if($_GET && isset($_GET['id'])){
    $id = intval($_GET['id']);
    $DB->query("DELETE FROM `categories` WHERE `id` = '{$id}'");
    $status = true;
    $msg = 'Xóa danh mục thành công';
}
require_once LAYOUT . '/admin/header.php';
if($msg){
?>
<script>
    Swal.fire({
        title: 'Thông báo',
        text: '<?= $msg ?>',
        icon: '<?= $status === true ? 'success' : 'error' ?>'
    });
    <?php if ($status === true): ?>
        setTimeout(() => {
            window.location.href = '/admin/categories/list';
        }, 1500);
    <?php endif; ?>
</script>
<?php } ?>