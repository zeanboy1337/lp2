<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/phpseclib-master/phpseclib3/bootstrap.php';

use phpseclib3\Common\Functions\Strings;

echo Strings::strlen('tes koneksi');
