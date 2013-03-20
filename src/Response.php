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

    /**
     * @var
     */
    protected $_result;

    /**
     * @var
     */
    protected $_error;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    /**
     * @param $result
     */
    public function setResult($result)
    {
        $this->_result = $result;
    }

    /**
     * Returns the response body as a string
     *
     * @return string
     */
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
 