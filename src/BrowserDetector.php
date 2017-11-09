<?php

use BrowserDetector\Browser;

class BrowserDetector
{
    public fuction __construct() {
    }

    public function detect($userAgent) {
        $browser = new Browser;
        return $browser;
    }
}
