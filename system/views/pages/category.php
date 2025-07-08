<?php
require_once './system/core/database.php';
header('Content-Type: application/json');
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $sql = "SELECT * FROM categories WHERE slug = '$slug'";
    $category = $DB->fetch_assoc($sql, 1);
    if ($category) {
        $sql = "SELECT * FROM products WHERE category_id = '{$category['id']}'";
        $products = $DB->fetch_assoc($sql, 0);
        echo json_encode($products, JSON_PRETTY_PRINT);
        exit;
    }
}
?>