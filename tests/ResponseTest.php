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
     * @testdox Response version is 2.0
     */
    public function testProtocolVersionIs2()
    {
        $response = new Response();
        $body = $response->flush();
        $decodedBody = json_decode($body, TRUE);
        $this->assertEquals('2.0', $decodedBody['jsonrpc']);
    }

    public function testResponseBodyContainsExpectedId()
    {
        $response = new Response(1);
        $body = $response->flush();
        $decodedBody = json_decode($body, TRUE);
        $this->assertEquals(1, $decodedBody['id']);

        $response = new Response(NULL);
        $body = $response->flush();
        $decodedBody = json_decode($body, TRUE);
        $this->assertEquals(NULL, $decodedBody['id']);
    }

}
 