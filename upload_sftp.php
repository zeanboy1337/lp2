<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include kelas fungsi dasar yang dipakai SFTP/SSH2
require_once __DIR__ . '/phpseclib-master/phpseclib3/Common/Functions/Strings.php';
require_once __DIR__ . '/phpseclib-master/phpseclib3/Common/Functions/Multibyte.php';
require_once __DIR__ . '/phpseclib-master/phpseclib3/Common/Functions/JSON.php';
require_once __DIR__ . '/phpseclib-master/phpseclib3/Common/Functions/UTF8.php';

// Trait constant utility dipakai kelas SFTP/SSH2
require_once __DIR__ . '/phpseclib-master/phpseclib3/Common/ConstantUtilityTrait.php';

// Kelas utama SSH2 dan SFTP
require_once __DIR__ . '/phpseclib-master/phpseclib3/Net/SSH2.php';
require_once __DIR__ . '/phpseclib-master/phpseclib3/Net/SFTP.php';

use phpseclib3\Net\SFTP;

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
