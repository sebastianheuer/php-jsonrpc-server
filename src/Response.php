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

    /**
     * @var PHP
     */
    protected $_php;

    /**
     * @param PHP $php
     * @param string|null $id
     */
    public function __construct(PHP $php, $id = NULL)
    {
        $this->_php = $php;
        $this->_id = $id;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->_result = $result;
    }

    /**
     * @param Error $error
     */
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
        $this->_php->setHeader('Content-Type', 'application/json');

        $jsonData = array('jsonrpc' => self::PROTOCOL_VERSION);

        if (NULL !== $this->_result && $this->_error === NULL) {
            $jsonData['result'] = $this->_result;
        }

        if (NULL !== $this->_error) {
            $jsonData['error'] = array(
                'code' => $this->_error->getCode(),
                'message' => $this->_error->getMessage()
            );
            $data = $this->_error->getData();
            if (NULL !== $data) {
                $jsonData['error']['data'] = $data;
            }
        }

        $jsonData['id'] = $this->_id;
        return json_encode($jsonData);
    }
}
 