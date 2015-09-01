<?php

include 'config.php';

date_default_timezone_set('America/Sao_Paulo');

$date_time      = new DateTime();
$time_stamp     = $date_time->getTimestamp();
$date           = $date_time->format('d-m-Y | H:i:s | ');

$destiny_folder = 'downloads/'; 
$local_file     = $destiny_folder.'test-'.$time_stamp.'.ini';
$server_file    = 'php.ini';

$log_folder     = 'logs/';
$log            = fopen($log_folder.'log.txt', 'a+');

// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// try to download $server_file and save to $local_file
if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
    fwrite($log, $date."Arquivo $local_file salvo com sucesso".PHP_EOL);

} else {
    $error_message = $date."Não foi possível salvar o arquivo $local_file".PHP_EOL;
    $error_log     = fopen($log_folder.'error_log.txt', 'a+');
    
    fwrite($log, $error_message);
    fwrite($error_log, $error_message);

    fclose($error_log);
}

fclose($log);

// close the connection
ftp_close($conn_id);

?>