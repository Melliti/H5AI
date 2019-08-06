<?php

function displayDir($folders) {
    $baseURL = "http://localhost" . $_SERVER['REQUEST_URI']; 
    while ($handle = readdir($folders)) {
        $url = $baseURL . "/" . $handle;
        echo "<a href=\"{$url}\">{$handle}</a><br>";
    }
}