<?php

function displayNav($folders) {
    $baseURL = "http://localhost/H5AI";
    $folders = array_values(array_filter($folders));
    echo "<a href=\"{$baseURL}\">Home</a> >";
    foreach ($folders as $elem) {
        $baseURL = $baseURL . "/" . $elem;
        echo "<a href=\"{$baseURL}\">{$elem}</a> > ";
    }
}