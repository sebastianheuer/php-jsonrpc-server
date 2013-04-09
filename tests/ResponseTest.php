<?php
namespace belanur\jsonrpc2\server\tests;
use belanur\jsonrpc2\server\Response;

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

}
 