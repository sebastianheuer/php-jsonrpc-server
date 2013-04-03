<?php
namespace belanur\jsonrpc2\server;

/**
 * Request Object
 *
 *
 */
class Request
{
    /**
     * @var array POST parameters
     */
    protected $_post = array();

    /**
     * @var array SERVER parameters
     */
    protected $_server = array();

    /**
     * @var array Request body
     */
    protected $_content = array();

    /**
     * @param array $post
     * @param array $server
     * @param string $content
     * @throws ParseErrorException
     */
    public function __construct(array $post, array $server, $content)
    {
        $this->_post = $post;
        $this->_server = $server;
        $content = json_decode($content, TRUE);
        if (NULL === $content) {
            throw new ParseErrorException("Request does not contain valid JSON");
        }
        $this->_content = $content;
    }

    /**
     * @param string $param
     * @return bool
     */
    private function _hasServerParameter($param)
    {
        return isset($this->_server[$param]);
    }

    /**
     * @return string
     */
    private function _getRequestMethod()
    {
        if (!$this->_hasServerParameter('REQUEST_METHOD')) {
            return 'GET';
        }
        return ($this->_server['REQUEST_METHOD']);
    }

    /**
     * @return string
     */
    private function _getContentType()
    {
        if (!$this->_hasServerParameter('CONTENT_TYPE')) {
            return '';
        }
        return $this->_server['CONTENT_TYPE'];
    }

    /**
     * Determines if the request is a valid JSON-RPC request
     * Does not check for JSON-RPC protocol version!
     *
     * @return bool
     */
    public function isJsonRpcRequest()
    {
        // jsonrpc requests are always POST
        if ($this->_getRequestMethod() !== 'POST') {
            return FALSE;
        }

        // jsonrpc requests come as application/json
        if ($this->_getContentType() !== 'application/json') {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->_getJsonParam('method');
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->_getJsonParam('jsonrpc');
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_getJsonParam('id');
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->_getJsonParam('params');
    }

    /**
     * @return mixed
     */
    public function getParam($param)
    {
        $params = $this->getParams();
        if (!isset($params[$param])) {
            throw new InvalidParamsException("Method Parameter $param not found.");
        }
        return $params[$param];
    }

    /**
     * @return bool
     */
    public function isNotification()
    {
        return !$this->_hasJsonParam('id');
    }

    /**
     * @param string $param
     * @return bool
     */
    private function _hasJsonParam($param)
    {
        return isset($this->_content[$param]);
    }

    /**
     * @param string $param
     * @throws InvalidParamsException
     * @return mixed
     */
    private function _getJsonParam($param)
    {
        if (!$this->_hasJsonParam($param)) {
            throw new InvalidParamsException("Parameter $param not found.");
        }
        return $this->_content[$param];
    }

}
 