<?php

//AWS access info
define('awsAccessKey', 'AKIAIFO6UZZNQKI7WN2Q');
define('awsSecretKey', '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');

//cria o objeto PHP de conexão com S3
require_once 'S3.php';
	$s3 = new S3(awsAccessKey, awsSecretKey, false, 's3.amazonaws.com'); //endpoint sao paulo, SSL verification disabled

/*$buckets = $s3->listBuckets(); //obtém lista de arquivos no servidor
$bucket = $buckets[0];*/

$bucket = 'metricas.campanhaporto.com.br';

$file = $s3->getObject($bucket, 'dw/PORTO - Base 09-09-2015.xlsx');
/*$server_files = $s3->getBucket($bucket); //obtém lista de arquivos no servidor*/

var_dump($file);