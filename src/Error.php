<?php
namespace belanur\jsonrpc2\server;

/**
 * JSON RPC 2.0 Error Object
 *
 *
 */
class Error
{
    /**
     * @var int
     */
    protected $_code = -32000;

    /**
     * @var string
     */
    protected $_message = '';

    /**
     * @var mixed
     */
    protected $_data;

    /**
     * @param int $code
     * @param string $message
     * @param null $data
     */
    public function __construct($code, $message, $data = NULL)
    {
        $this->_code = $code;
        $this->_message = $message;
        $this->_data = $data;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @return mixed|null
     */
    public function getData()
    {
        return $this->_data;
    }

}
 