<?php

require_once(__DIR__ . '/BrowserDetector/Browser.php');

use BrowserDetector\Browser;

class BrowserDetector
{
    const OS_UNKNOWN = 'unknown',
          OS_WINDOWS = 'Windows',
          OS_ANDROID = 'Android',
          OS_LINUX = 'Linux';
    const BROWSER_UNKNOWN = 'unknown';

    public function __construct() {
    }

    public function detect($userAgent) {
        $browser = new Browser;
        $this->detectOS($userAgent, $browser);
        $this->detectBrowser($userAgent, $browser);
        $this->detectPlatform($userAgent, $browser);
        return $browser;
    }

    private function detectOS($userAgent, $browser) {
        if (stristr($userAgent, 'windows')) {
            $browser->os = self::OS_WINDOWS;
        } elseif (stristr($userAgent, 'android')) {
            $browser->os = self::OS_ANDROID;
        } elseif (stristr($userAgent, 'linux')) {
            $browser->os = self::OS_LINUX;
        } else {
            $browser->os = self::OS_UNKNOWN;
        }
    }

    private function detectBrowser($userAgent, $browser) {
        $browser->browser = self::BROWSER_UNKNOWN;
    }

    private function detectPlatform($userAgent, $browser) {
    }
}
