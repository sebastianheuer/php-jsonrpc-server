<?php
namespace belanur\jsonrpc2\server\tests;
use belanur\jsonrpc2\server\SubtractCommand;
use belanur\jsonrpc2\server\Request;

class SubtractCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider paramProvider
     *
     * @param int $minuend
     * @param int $subtrahend
     * @param int $expected
     */
    public function testReturnsExpectedResult($minuend, $subtrahend, $expected)
    {
        $command = new SubtractCommand($minuend, $subtrahend);
        $result = $command->work();
        $this->assertEquals($expected, $result);
    }

    public function paramProvider()
    {
        return array(
            array(10, 1, 9),
            array(1, 10, -9)
        );
    }
}
 