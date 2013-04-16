<?php
namespace belanur\jsonrpc2\server;

/**
 * SubstractWorker
 *
 *
 */
class SubtractCommand
{
    protected $_minuend = 0;

    protected $_subtrahend = 0;

    public function __construct($minuend, $subtrahend)
    {
        $this->_minuend = $minuend;
        $this->_subtrahend = $subtrahend;
    }

    /**
     * @return mixed
     */
    public function work()
    {
        return $this->_minuend - $this->_subtrahend;
    }
}
 