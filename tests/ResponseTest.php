<?php
namespace belanur\jsonrpc2\server\tests;
use belanur\jsonrpc2\server\Response;
use belanur\jsonrpc2\server\Error;

/**
 * ResponseTest
 *
 *
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \belanur\jsonrpc2\server\Php
     */
    protected $_php;

    public function setUp()
    {
        $this->_php = $this->getMock('\belanur\jsonrpc2\server\Php');
    }

    /**
     * @testdox Response version is 2.0
     */
    public function testProtocolVersionIs2()
    {
        $response = new Response($this->_php);
        $body = $response->flush();
        $decodedBody = json_decode($body, TRUE);
        $this->assertEquals('2.0', $decodedBody['jsonrpc']);
    }

    /**
     * @testdox Request ID is returned in Response
     */
    public function testResponseBodyContainsExpectedId()
    {
        $response = new Response($this->_php, 1);
        $body = $response->flush();
        $decodedBody = json_decode($body, TRUE);
        $this->assertEquals(1, $decodedBody['id']);

        $response = new Response($this->_php, NULL);
        $body = $response->flush();
        $decodedBody = json_decode($body, TRUE);
        $this->assertEquals(NULL, $decodedBody['id']);
    }

    public function testResponseBodyContainsErrorObjectData()
    {
        $response = new Response($this->_php);
        $error = new Error(-32000, 'foo', array('bar'));
        $response->setError($error);
        $body = $response->flush();
        $decodedBody = json_decode($body, TRUE);
        $this->assertEquals(-32000, $decodedBody['error']['code']);
        $this->assertEquals('foo', $decodedBody['error']['message']);
        $this->assertEquals(array('bar'), $decodedBody['error']['data']);
    }

    public function testResponseBodyContainsResultData()
    {
        $response = new Response($this->_php);
        $response->setResult('foo');
        $body = $response->flush();
        $decodedBody = json_decode($body, TRUE);
        $this->assertEquals('foo', $decodedBody['result']);
    }

}
 