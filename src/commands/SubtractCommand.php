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
        $x = $this->_request->getParam('minuend');
        $y = $this->_request->getParam('subtrahend');
        return $x - $y;
    }
}
 