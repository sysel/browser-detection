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
        Assert::same(BrowserDetector::OS_WINDOWS, $browser->os);
    }
}

# Run test case
(new OsTest)->run();
