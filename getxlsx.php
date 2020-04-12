<?php
if (empty($_GET['file_name'])) {
    header("HTTP/1.0 404 Not Found");
} else {
    header('Content-Type: application/vnd.ms-excel');
    $name = $_GET['file_name'] . ".xls";
    header("Content-Disposition: attachment; filename=$name");
}
