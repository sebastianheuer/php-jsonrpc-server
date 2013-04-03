<?php
namespace belanur\jsonrpc2\server;

/**
 * MethodNotFoundException
 *
 *
 */
class MethodNotFoundException extends JsonRpcException
{
    protected $_jsonRpcCode = -32601;
}
 