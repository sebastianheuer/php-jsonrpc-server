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

    public function __construct($code, $message, $data = NULL)
    {
        $this->_code = $code;
        $this->_message = $message;
        $this->_data = $data;
    }

    public function getCode()
    {
        return $this->_code;
    }

    public function getMessage()
    {
        return $this->_message;
    }

    public function getData()
    {
        return $this->_data;
    }



}
 