<?php

function defineIcon($handle, $path) {
    $ext = substr($handle, strrpos($handle, '.') + 1);
    $icon = "http://localhost/H5AI/icons/" . $ext . ".png" ;
    if (file_exists("./icons/" . $ext . ".png"))
        {
            echo "<p><img src=\"$icon\" alt=\"language icon\"/> ";
        }
    else if (is_dir($path . '/' . $handle))
        echo "<p><img src=\"http://localhost/H5AI/icons/dir.png\" alt=\"language icon\"/>" ;    
    else
        echo "<p><img src=\"http://localhost/H5AI/icons/unknown.png\" alt=\"language icon\"/>" ;
}

function displayDirContent($folders, $path) {
    $baseURL = "http://localhost" . $_SERVER['REQUEST_URI']; 
    while ($handle = readdir($folders)) {
        $url = $baseURL . "/" . $handle;
        if ($handle != "." && $handle != "..")
        {
            defineIcon($handle, $path);
            if (is_dir($path . "/" . $handle))
                echo "<a href=\"{$url}\">{$handle}</a></p>";
            else
            echo "{$handle}</p>";
        }   
    }
}