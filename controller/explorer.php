<?php

class Explorer {
    private $_url;
    private $_path;
    private $_res;

    public function getURL() { return $this->_url; }
    public function getPath() { return $this->_path; }
    public function getResource() { return $this->_res; }

    public function __construct() {
        $this->init();
    }

    public function init() {
        $this->URLToPath();
        $this->_res = opendir($this->_path);
        // return $this->res;
    }

    private function URLToPath() {
        var_dump($_SERVER['REQUEST_URI']);
        $this->_url = explode('/', $_SERVER['REQUEST_URI']);
        var_dump($this->_url);
        array_splice($this->_url, 0, 2);
        $this->_path = '../' . implode('/', $this->_url);
        var_dump($this->_path);
    }
}