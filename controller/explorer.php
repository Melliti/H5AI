<?php

class Explorer {
    private $_url;
    private $_path;
    private $_res = null;
    // private $_fileContent = null;

    public function getURL() { return $this->_url; }
    public function getPath() { return $this->_path; }
    public function getResource() { return $this->_res; }
    // public function getFileContent() { return $this->_fileContent; }

    public function __construct() {
        $this->init();
    }

    public function init() {
        $this->URLToPath();
        if (is_dir($this->_path))
            $this->_res = opendir($this->_path);
        else
            return $this->_path;
    }

    private function URLToPath() {
        $this->_url = explode('/', $_SERVER['REQUEST_URI']);
        array_splice($this->_url, 0, 2);
        $this->_path = '../' . implode('/', $this->_url);
    }
}
