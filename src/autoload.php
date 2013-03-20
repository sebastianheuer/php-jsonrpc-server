<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'belanur\\jsonrpc2\\server\\request' => '/Request.php',
                'belanur\\jsonrpc2\\server\\requestexception' => '/RequestException.php',
                'belanur\\jsonrpc2\\server\\response' => '/Response.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    }
);
// @codeCoverageIgnoreEnd