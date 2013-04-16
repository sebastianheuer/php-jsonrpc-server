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
     * @param $minuend
     * @param $subtrahend
     * @return SubtractCommand
     */
    public function getInstanceForSubtractCommand($minuend, $subtrahend)
    {
        return new SubtractCommand($minuend, $subtrahend);
    }
}
 