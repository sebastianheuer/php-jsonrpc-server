<?php
namespace belanur\jsonrpc2\server;

/**
 * AbstractCommand
 *
 */
abstract class AbstractCommand implements CommandInterface
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
}
 