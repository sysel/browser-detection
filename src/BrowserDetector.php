<?php

require_once(__DIR__ . '/BrowserDetector/Browser.php');

use BrowserDetector\Browser;

class BrowserDetector
{
    public function __construct() {
    }

    public function detect($userAgent) {
        $browser = new Browser;
        return $browser;
    }
}
