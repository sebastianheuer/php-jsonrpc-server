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
     * @var array JSON-RPC payload (e.g. method, params)
     */
    protected $_payload = NULL;

    /**
     * @param array $post
     * @param array $server
     */
    public function __construct(array $post, array $server)
    {
        $this->_post = $post;
        $this->_server = $server;
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

    public function getParams()
    {
        return $this->_getJsonParam('params');
    }

    /**
     * @param string $param
     * @return mixed
     */
    private function _getJsonParam($param)
    {
        if (NULL === $this->_payload) {
            $this->_payload = json_decode(
                file_get_contents('php://input'), TRUE
            );
        }
        return $this->_payload[$param];
    }

}
 