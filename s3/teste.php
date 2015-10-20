<?php

define('ROOTPATH', __DIR__);
require ROOTPATH.'/amazon/aws-autoloader.php';

$destiny_folder = ROOTPATH."/downlads/";
$bucket = 'metricas.campanhaporto.com.br';

$s3 = new Aws\S3\S3Client([
    'version'     => 'latest',
    'region'      => 'sa-east-1',
    'scheme' => 'http',
    'credentials' => [
        'key'    => 'AKIAIFO6UZZNQKI7WN2Q',
        'secret' => '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'
    ]
]);


$result = $s3->getObject([
	'Bucket' => $bucket,
	'Key'    => 'dw/PORTO - Base 09-09-2015.xlsx',
	'SaveAs' => $destiny_folder.'PORTO - Base 09-09-2015.xlsx'
]);

$result = $s3->listObjects(['Bucket' => $bucket]);

var_dump($result);
