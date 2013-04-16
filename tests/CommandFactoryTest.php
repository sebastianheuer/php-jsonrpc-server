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
     *
     */
    public function testCreatesInstanceForSubtractCommand()
    {
        $expectedClass = '\\belanur\\jsonrpc2\\server\\subtractcommand';

        $factory = new CommandFactory($this->_request);
        $command = $factory->getInstanceForSubtractCommand(10,10);
        $this->assertInstanceOf($expectedClass, $command);
    }

}
 