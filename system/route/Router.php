<?php
class Router {
    public $url;

    public function __construct() {
        $arr = $this->UrlProcess();
        if (!empty($arr)) {
            if ($arr[0] === 'category' && isset($arr[1])) {
                $_GET['slug'] = $arr[1];
                require_once './system/views/pages/category.php';
                return;
            }
            $urlPath = implode('/', $arr);
            $filePath = "./system/views/pages/" . $urlPath . ".php";

            if (file_exists($filePath)) {
                require_once $filePath;
            } else {
                require_once './system/views/layouts/404.php';
            }

        } else {
            require_once "./system/views/pages/home.php";
        }
    }

    private function UrlProcess() {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(trim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
?>
