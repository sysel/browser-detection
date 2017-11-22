<?php
require_once(__DIR__ . '/bootstrap.php');

use Tester\Assert;
use BrowserDetector;

/*
 * @testCase
 */
class BrowserDetectorBrowserTest extends Tester\TestCase
{
    public function testToString() {
        $b = new BrowserDetector\Browser;
        $b->browser = 'Firefox';
        $b->version = '57.0';
        $b->os = 'Windows';

        Assert::same('Firefox 57.0 (Windows)', "$b");
    }

    public function testToStringOsVersion() {
        $b = new BrowserDetector\Browser;
        $b->browser = 'Firefox';
        $b->version = '57.0';
        $b->os = 'Windows';
        $b->osVersion = '10';

        Assert::same('Firefox 57.0 (Windows 10)', "$b");
    }

    public function testToStringOsVersionPlatform() {
        $b = new BrowserDetector\Browser;
        $b->browser = 'Firefox';
        $b->version = '57.0';
        $b->os = 'Windows';
        $b->osVersion = '10';
        $b->platform = 'x86_64';

        Assert::same('Firefox 57.0 (Windows 10, x86_64)', "$b");
    }

    public function testToStringPlatform() {
        $b = new BrowserDetector\Browser;
        $b->browser = 'Firefox';
        $b->version = '57.0';
        $b->os = 'Windows';
        $b->platform = 'x86_64';

        Assert::same('Firefox 57.0 (Windows, x86_64)', "$b");
    }
}

# Run test case
(new BrowserDetectorBrowserTest)->run();
