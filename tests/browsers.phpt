<?php
require_once(__DIR__ . '/bootstrap.php');

use Tester\Assert;
use BrowserDetector;

/*
 * @testCase
 */
class BrowsersTest extends Tester\TestCase
{
    private $browserDetector;

    public function setUp() {
        $this->browserDetector = new BrowserDetector;
    }

    public function testDefinitions() {
        $definitions = new BrowserDetector\Definitions;
        $defs = $definitions->os();
        foreach ($defs as $d) {
            $browser = $this->browserDetector->detect($d['ua']);
            Assert::same($d['os'], $browser->os);
            Assert::same($d['version'], $browser->osVersion);
        }
    }
}

# Run test case
(new BrowsersTest)->run();
