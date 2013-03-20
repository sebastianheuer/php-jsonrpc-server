<?php
namespace belanur\jsonrpc2\server;

/**
 * Response
 *
 *
 */
class Response
{
    const PROTOCOL_VERSION = '2.0';

    /**
     * @var string
     */
    protected $_id = '';

    protected $_result;

    protected $_error;

    /**
     * @param $result
     */
    public function setResult($result)
    {
        $this->_result = $result;
    }

    public function __toString()
    {
        $jsonData = array(
            'jsonrpc' => self::PROTOCOL_VERSION,
            'id' => $this->_id
        );

        if (NULL !== $this->_result) {
            $jsonData['result'] = $this->_result;
        }

        if (NULL !== $this->_error) {
            $jsonData['error'] = $this->_error;
        }

        return json_encode($jsonData);
    }
}
 