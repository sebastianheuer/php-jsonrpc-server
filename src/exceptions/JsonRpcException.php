<?php
namespace belanur\jsonrpc2\server;

/**
 * JsonRpcException
 *
 * @codeCoverageIgnore
 */
abstract class JsonRpcException extends \Exception
{
    protected $_jsonRpcCode = -32000;

    public function getJsonRpcCode()
    {
        return $this->_jsonRpcCode;
    }
}
 