<?php

function previousArrow($folders, $baseURL) {
    for ($i = 0; $i < count($folders) - 1; $i++)
        $baseURL = $baseURL . "/" . $folders[$i];
    echo "<a href=\"{$baseURL}\"><img src=\"http://localhost/H5AI/icons/arrow.png\" alt=\"previous\"></a> >";
}

function displayNav($folders) {
    $baseURL = "http://localhost/H5AI";
    $folders = array_values(array_filter($folders));
    previousArrow($folders, $baseURL);
    echo "<a href=\"{$baseURL}\">Home</a> >";
    foreach ($folders as $elem) {
        $baseURL = $baseURL . "/" . $elem;
        echo "<a href=\"{$baseURL}\">{$elem}</a> > ";
    }
}