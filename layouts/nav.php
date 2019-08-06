<?php

function displayNav($folders) {
    $baseURL = "http://localhost/H5AI"; 
    foreach ($folders as $elem) {
        $baseURL = $baseURL . "/" . $elem;
        echo "<a href=\"{$baseURL}\">{$elem}</a> > ";        
    }
}