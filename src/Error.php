<?php
namespace belanur\jsonrpc2\server;

/**
 * JSON RPC 2.0 Error Object
 *
 *
 */
class Error
{
    protected $_code = -32000;

    protected $_message = '';

    protected $_data;

    public function __construct($code, $message)
    {
        $this->_code = $code;
        $this->_message = $message;
    }

    public function getCode()
    {
        return $this->_code;
    }

    public function getMessage()
    {
        return $this->_message;
    }

}
 