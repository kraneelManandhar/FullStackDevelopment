
<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../db.php';

use Jenssegers\Blade\Blade;

$views = __DIR__ . '/../app/views';
$cache = __DIR__ . '/../cache/views';
$blade = new Blade($views, $cache);

require_once __DIR__ . '/../app/controllers/StudentController.php';

$controller = new StudentController($pdo, $blade);

$page = $_GET['page'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($page) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
}
?>
