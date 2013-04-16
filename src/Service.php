<?php
namespace belanur\jsonrpc2\server;

/**
 * Service
 *
 *
 */
class Service
{
    /**
     * @var CommandFactory
     */
    protected $_factory;

    /**
     * @param CommandFactory $factory
     */
    public function __construct(CommandFactory $factory)
    {
        $this->_factory = $factory;
    }

    /**
     * @param $minuend
     * @param $subtrahend
     * @return mixed
     */
    public function subtract($minuend, $subtrahend)
    {
        return $this->_factory->getInstanceForSubtractCommand($minuend, $subtrahend)->work();
    }
}
 