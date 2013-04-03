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
     * @var string|NULL
     */
    protected $_id;

    /**
     * @var
     */
    protected $_result;

    /**
     * @var Error
     */
    protected $_error;

    public function __construct($id = NULL)
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

    public function setError(Error $error)
    {
        $this->_error = $error;
    }

    /**
     * Returns the response body as a JSON string
     *
     * @return string
     */
    public function flush()
    {
        $jsonData = array(
            'jsonrpc' => self::PROTOCOL_VERSION,
            'id' => $this->_id
        );

        if (NULL !== $this->_result && $this->_error === NULL) {
            $jsonData['result'] = $this->_result;
        }

        if (NULL !== $this->_error) {
            $jsonData['error'] = array(
                'code' => $this->_error->getCode(),
                'message' => $this->_error->getMessage()
            );
        }

        return json_encode($jsonData);
    }
}
 