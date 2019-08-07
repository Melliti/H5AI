<?php

function defineIcon($handle) {
    $ext = substr($handle, strrpos($handle, '.') + 1);
    $icon = "http://localhost/H5AI/icons/" . $ext . ".png" ;
    echo "<p><img src=\"$icon\" alt=\"language icon\"/> ";    
}

function displayDirContent($folders) {
    $baseURL = "http://localhost" . $_SERVER['REQUEST_URI']; 
    while ($handle = readdir($folders)) {
        $url = $baseURL . "/" . $handle;
        if ($handle != "." && $handle != "..")
        {
            if (strpos($handle, "."))
                defineIcon($handle);
            if (is_dir($handle))
                echo "<a href=\"{$url}\">{$handle}</a></p>";
            else
            echo "{$handle}</p>";
        }   
    }
}