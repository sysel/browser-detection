<?php
require_once(__DIR__ . '/bootstrap.php');

use Tester\Assert;

/*
 * @testCase
 */
class OsTest extends Tester\TestCase
{
    public function testOne()
    {
        Assert::equal(1, 1);
    }
}

# Run test case
(new OsTest)->run();
