<?php
namespace belanur\jsonrpc2\server;

/**
 * JsonRpcException
 *
 *
 */
abstract class JsonRpcException extends \Exception
{
    protected $_jsonRpcCode = -32000;

    public function getJsonRpcCode()
    {
        return $this->_jsonRpcCode;
    }
}
 