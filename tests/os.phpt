<?php
require_once(__DIR__ . '/bootstrap.php');

use Tester\Assert;
use BrowserDetector;

/*
 * @testCase
 */
class OsTest extends Tester\TestCase
{
    private $browserDetector;

    public function setUp() {
        $this->browserDetector = new BrowserDetector;
    }

    public function testOSWindows() {
        $userAgent = 'Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0';
        $browser = $this->browserDetector->detect($userAgent);
        Assert::same('Windows', $browser->os);
    }

    public function testOSAndriod() {
        $userAgent = 'Mozilla/5.0 (Linux; Android 4.4.2; K017 Build/KVT49L) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Safari/537.36';
        $browser = $this->browserDetector->detect($userAgent);
        Assert::same('Android', $browser->os);
    }
}

# Run test case
(new OsTest)->run();
