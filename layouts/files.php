<?php

class Files {
    private $audioTypes = ['mp3', 'wac', 'flac', 'wav'];
    private $imgTypes = ['jpg', 'png', 'gif', 'bmp', 'svg'];
    private $fileInfo= [];

    // Show file details
    private function displayFileInfo($url) {
        echo "<p><img src=\"{$this->fileInfo["icon"]}\" alt=\"language icon\"/>";
        echo "<a href=\"{$url}\"> {$this->fileInfo["filename"]}</a></p>";
        echo date('d/m/y', $this->fileInfo["mtime"]) . " - ";
        echo number_format($this->fileInfo["size"] / 1024, 2) . ' KB';
    }

    // Get data about the file
    private function file_information($path) {
        $data = stat($path);
        $this->fileInfo['size'] = $data['size'];
        $this->fileInfo['mtime'] = $data['mtime'];
    }

    // Select the expected icon for each file
    private function defineIcon($handle, $path) {
        $ext = substr($handle, strrpos($handle, '.') + 1);
        $icon = "http://localhost/H5AI/icons/" . $ext . ".png" ;
        if (file_exists("./icons/" . $ext . ".png"))
            $this->fileInfo['icon'] = $icon;
        else if (is_dir($path . '/' . $handle))
            $this->fileInfo['icon'] = "http://localhost/H5AI/icons/dir.png";
        else if (in_array($ext, $this->audioTypes))
            $this->fileInfo['icon'] = "http://localhost/H5AI/icons/audio.png";
        else if (in_array($ext, $this->imgTypes))
            $this->fileInfo['icon'] = "http://localhost/H5AI/icons/img.png";
        else
            $this->fileInfo['icon'] = "http://localhost/H5AI/icons/unknown.png";
    }

    // List content of a dir and send it to display function
    public function listDirContent($folders, $path) {
        $baseURL = "http://localhost" . $_SERVER['REQUEST_URI']; 
        
        while ($handle = readdir($folders)) {
            $fullPath = $path . "/" . $handle;
            $url = $baseURL . "/" . $handle;
            $this->file_information($fullPath);
            $this->fileInfo['filename'] = $handle;
            if ($handle != "." && $handle != "..")
            {
                $this->defineIcon($handle, $path);
                $this->displayFileInfo($url);
            }  
        }
    }
}
