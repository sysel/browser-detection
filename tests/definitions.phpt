<?php
require_once(__DIR__ . '/bootstrap.php');

use Tester\Assert;
use BrowserDetector;

/*
 * @testCase
 */
class DefinitionsTest extends Tester\TestCase
{
    public function testInstantiate() {
        $definitions = new BrowserDetector\Definitions;
        Assert::type('BrowserDetector\Definitions', $definitions);
    }

    public function testOS() {
        $definitions = new BrowserDetector\Definitions;
        $os = $definitions->os();
        Assert::type('array', $os);
        Assert::count(5, $os);

        $first = $os[0];
        $expectedFirst = ['os' => 'Windows', 'version' => '10', 'pattern' => 'Windows NT 10\\.0', 'ua' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36'];
        Assert::same($expectedFirst, $first);
    }

    public function testBrowser() {
        $definitions = new BrowserDetector\Definitions;
        $browser = $definitions->browser();
        Assert::type('array', $browser);
        Assert::count(3, $browser);

        $first = $browser[0];
        $expectedFirst = ['browser' => 'Chromium', 'pattern' => 'Chromium/([\d\.]+)', 'ua' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/62.0.3202.94 Chrome/62.0.3202.94 Safari/537.36'];
        Assert::same($expectedFirst, $first);
    }

    public function testPlatform() {
        $definitions = new BrowserDetector\Definitions;
        $platform = $definitions->platform();
        Assert::type('array', $platform);
        Assert::count(2, $platform);

        $first = $platform[0];
        $expectedFirst = ['platform' => 'x86_64', 'pattern' => 'x86_64', 'ua' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/62.0.3202.94 Chrome/62.0.3202.94 Safari/537.36'];
        Assert::same($expectedFirst, $first);
    }
}

# Run test case
(new DefinitionsTest)->run();
