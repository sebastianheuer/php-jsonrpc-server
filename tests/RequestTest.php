<?php
namespace belanur\jsonrpc2\server\tests;
use belanur\jsonrpc2\server\Request;

/**
 * RequestTest
 *
 *
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{
    protected $_serverData = array();

    public function setUp()
    {
        $this->_serverData = array(
            'CONTENT_TYPE' => 'application/json',
            'REQUEST_METHOD' => 'POST'
        );
    }

    /**
     * @expectedException \belanur\jsonrpc2\server\RequestException
     */
    public function testThrowsExceptionIfRequestBodyIsInvalid()
    {
        new Request(array(), array(), 'foo');
    }

    /**
     * @testdox isJsonRpcRequest() returns expected result depending on $_SERVER
     * @dataProvider isJsonRequestProvider
     *
     * @param array $server
     * @param bool $expectedResult
     */
    public function testIsJsonRpcRequest(array $server, $expectedResult)
    {
        $request = new Request(array(), $server, json_encode(array()));
        $this->assertEquals($expectedResult, $request->isJsonRpcRequest());
    }

    /**
     * @expectedException \belanur\jsonrpc2\server\RequestException
     */
    public function testThrowsExceptionIfParamIsMissing()
    {
        $content = json_encode(array());
        $request = new Request(array(), $this->_serverData, $content);
        $request->getVersion();
    }

    /**
     * @dataProvider validMethodProvider
     *
     * @param string $method
     */
    public function testGetMethodReturnsExpectedValue($method)
    {
        $content = json_encode(array('method' => $method));
        $request = new Request(array(), $this->_serverData, $content);

        $this->assertSame($method, $request->getMethod());
    }

    /**
     * @dataProvider validVersionProvider
     *
     * @param string $version
     */
    public function testGetVersionReturnsExpectedValue($version)
    {
        $content = json_encode(array('jsonrpc' => $version));
        $request = new Request(array(), $this->_serverData, $content);

        $this->assertSame($version, $request->getVersion());
    }

    /**
     * @dataProvider validParamsProvider
     *
     * @param array $params
     */
    public function testGetParamsReturnsExpectedValue(array $params)
    {
        $content = json_encode(array('params' => $params));
        $request = new Request(array(), $this->_serverData, $content);

        $this->assertSame($params, $request->getParams());
    }

    /**
     * @dataProvider validIdProvider
     *
     * @param string $id
     */
    public function testGetIdReturnsExpectedValue($id)
    {
        $content = json_encode(array('id' => $id));
        $request = new Request(array(), $this->_serverData, $content);

        $this->assertSame($id, $request->getId());
    }


    public static function validMethodProvider()
    {
        return array(
            array('foo'),
            array('bar'),
        );
    }

    public static function validVersionProvider()
    {
        return array(
            array('1.0'),
            array('2.0'),
        );
    }

    public static function validIdProvider()
    {
        return array(
            array('1'),
            array(1),
            array('1sdg2scef')
        );
    }

    public static function validParamsProvider()
    {
        return array(
            array(array('foo' => 'bar')),
            array(array(1, 2)),
        );
    }

    public static function isJsonRequestProvider()
    {
        return array(
            array(array('foo'), FALSE),
            array(array('CONTENT_TYPE' => 'application/json'), FALSE),
            array(array('REQUEST_METHOD' => 'POST'), FALSE),
            array(
                array(
                    'CONTENT_TYPE' => 'application/json',
                    'REQUEST_METHOD' => 'POST'
                ), TRUE
            ),
        );
    }

}
 