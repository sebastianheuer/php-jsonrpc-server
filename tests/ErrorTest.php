<?php
namespace belanur\jsonrpc2\server\tests;
use belanur\jsonrpc2\server\Error;

class ErrorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider errorDataProvider
     *
     * @param $code
     * @param $message
     * @param $data
     */
    public function testGetters($code, $message, $data)
    {
        $error = new Error($code, $message, $data);
        $this->assertEquals($code, $error->getCode());
        $this->assertEquals($message, $error->getMessage());
        $this->assertEquals($data, $error->getData());
    }

    public static function errorDataProvider()
    {
        return array(
            array(0, 'foo', 'bar'),
            array(-32000, 'bar', 'foo'),
            array(-32001, 'foo', array('bar'))
        );
    }
}
 