<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/phpseclib/phpseclib/Net/SSH2.php';
require_once __DIR__ . '/phpseclib/phpseclib/Net/SFTP.php';

use phpseclib\Net\SFTP;

$host = '62.146.225.40';
$username = 'adminptyogov';
$password = 'psacln';

$sftp = new SFTP($host);

if (!$sftp->login($username, $password)) {
    die('❌ Login gagal');
}

$localFile = __DIR__ . '/localfile.txt';
$remoteFile = '/home/adminptyogov/remote_uploaded_file.txt';

if (!$sftp->put($remoteFile, file_get_contents($localFile))) {
    die('❌ Upload gagal');
}

echo "✅ Upload berhasil!";
