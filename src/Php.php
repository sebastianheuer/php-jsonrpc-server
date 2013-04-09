<?php
namespace belanur\jsonrpc2\server;

/**
 * Wrapper Class for native PHP functions
 * Used mainly for increased testability
 *
 * @codeCoverageIgnore
 */
class Php
{
    /**
     * Wrapper for header()
     *
     * @param string $key
     * @param string $value
     */
    public function setHeader($key, $value)
    {
        $headerStr = $key . ':' . $value;
        \header($headerStr);
    }
}
 