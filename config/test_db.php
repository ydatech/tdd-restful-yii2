<?php
$db = require __DIR__ . '/db.php';
$host = getenv('MYSQL_HOST');
$dbname = getenv('MYSQL_DATABASE_TEST');
// test database! Important not to run tests on production or development databases
$db['dsn'] = "mysql:host={$host};dbname={$dbname}";

return $db;
