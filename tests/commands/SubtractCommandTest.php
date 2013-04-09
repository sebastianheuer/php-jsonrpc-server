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
        $content = json_encode(
            array(
                'params' => array(
                    'minuend' => $minuend,
                    'subtrahend' => $subtrahend
                )
            )
        );

        $request = new Request(array(), array(), $content);
        $command = new SubtractCommand($request);
        $result = $command->work();
        $this->assertEquals($expected, $result);
    }

    public function paramProvider()
    {
        return array(
            array(10, 1, 9)
        );
    }
}
 