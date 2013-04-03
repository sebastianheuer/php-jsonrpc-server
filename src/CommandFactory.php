<?php
namespace belanur\jsonrpc2\server;

/**
 * CommandFactory
 *
 *
 */
class CommandFactory
{
    /**
     * @var Request
     */
    protected $_request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    /**
     * @param $method
     * @throws MethodNotFoundException
     * @return CommandInterface
     */
    public function getCommandForMethod($method)
    {
        $className = '\\belanur\\jsonrpc2\\server\\' . $method . 'Command';
        if (!class_exists($className)) {
            throw new MethodNotFoundException("Unknown method $method");
        }
        return new $className($this->_request);
    }
}
 