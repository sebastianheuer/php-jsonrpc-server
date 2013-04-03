<?php
namespace belanur\jsonrpc2\server;

/**
 * InvalidParamsException
 *
 *
 */
class InvalidParamsException extends JsonRpcException
{
    protected $_jsonRpcCode = -32602;
}
 