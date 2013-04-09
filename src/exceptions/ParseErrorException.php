<?php
namespace belanur\jsonrpc2\server;

/**
 * InvalidParamsException
 *
 * @codeCoverageIgnore
 */
class ParseErrorException extends JsonRpcException
{
    protected $_jsonRpcCode = -32700;
}
 