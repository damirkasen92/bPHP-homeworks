<?php
include 'autoload.php';
include 'config/SystemConfig.php';

$json_file_access_model = new JsonFileAccessModel('arr');

print_r($json_file_access_model->read());