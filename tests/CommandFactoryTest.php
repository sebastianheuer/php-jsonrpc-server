<?php
namespace belanur\jsonrpc2\server\tests;
use belanur\jsonrpc2\server\CommandFactory;

class CommandFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \belanur\jsonrpc2\server\Request
     */
    protected $_request;

    public function setUp()
    {
        $this->_request = $this->getMockBuilder(
            '\belanur\jsonrpc2\server\Request'
        )->disableOriginalConstructor()->getMock();
    }

    /**
     * @dataProvider methodProvider
     *
     * @param $method
     * @param $expectedClass
     */
    public function testCreatesExpectedCommand($method, $expectedClass)
    {
        $expectedClass = '\\belanur\\jsonrpc2\\server\\' . $expectedClass;

        $factory = new CommandFactory($this->_request);
        $command = $factory->getCommandForMethod($method);
        $this->assertInstanceOf($expectedClass, $command);
    }

    public static function methodProvider()
    {
        return array(
            array('subtract', 'SubtractCommand')
        );
    }

    /**
     * @expectedException \belanur\jsonrpc2\server\MethodNotFoundException
     */
    public function testThrowsExceptionIfMethodIsUnknown()
    {
        $factory = new CommandFactory($this->_request);
        $factory->getCommandForMethod('foo');
    }
}
 