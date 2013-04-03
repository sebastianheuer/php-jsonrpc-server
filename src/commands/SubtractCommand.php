<?php
namespace belanur\jsonrpc2\server;

/**
 * SubstractWorker
 *
 *
 */
class SubtractCommand extends AbstractCommand
{
    public function work()
    {
        $x = $this->_request->getParam('x');
        $y = $this->_request->getParam('y');
        return $x - $y;
    }
}
 