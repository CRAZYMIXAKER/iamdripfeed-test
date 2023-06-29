<?php
const __CORE__ = __DIR__ . '/../';
require_once __CORE__ . 'vendor/autoload.php';

use App\Models\Model;
use System\App;
use System\Database\JsonDb;
use System\Twig;

Model::setDb(JsonDb::getInstance());

$routes = require __CORE__ . 'system/routes.php';
$result = (new App())->run($_SERVER['REQUEST_URI'], $routes);

echo (new Twig())->makeTemplate($result['path'], $result);