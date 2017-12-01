<?php

require_once(__DIR__ . '/BrowserDetector/Browser.php');
require_once(__DIR__ . '/BrowserDetector/Definitions.php');

use BrowserDetector;
use BrowserDetector\Browser;

class BrowserDetector
{
    const OS_UNKNOWN = 'unknown';
    const BROWSER_UNKNOWN = 'unknown';
    const PLATFORM_UNKNOWN = 'unknown';

    private $definitions;

    public function __construct() {
        $this->definitions = new BrowserDetector\Definitions;
    }

    public function detect($userAgent) {
        $browser = new Browser;
        $this->detectOS($userAgent, $browser);
        $this->detectBrowser($userAgent, $browser);
        $this->detectPlatform($userAgent, $browser);
        return $browser;
    }

    private function detectOS($userAgent, $browser) {
        $browser->os = OS_UNKNOWN;
        $defs = $this->definitions->os();
        foreach ($defs as $d) {
            if (preg_match("/{$d['pattern']}/i", $userAgent)) {
                $browser->os = $d['os'];
                $browser->osVersion = $d['version'];
                break;
            }
        }
        return;
    }

    private function detectBrowser($userAgent, $browser) {
        $browser->browser = self::BROWSER_UNKNOWN;
    }

    private function detectPlatform($userAgent, $browser) {
        $browser->platform = self::PLATFORM_UNKNOWN;
    }
}

class BrowserDetectorException extends Exception {
}
