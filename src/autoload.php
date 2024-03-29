<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'belanur\\jsonrpc2\\server\\abstractcommand' => '/commands/AbstractCommand.php',
                'belanur\\jsonrpc2\\server\\commandfactory' => '/CommandFactory.php',
                'belanur\\jsonrpc2\\server\\commandinterface' => '/commands/CommandInterface.php',
                'belanur\\jsonrpc2\\server\\commandlocator' => '/CommandLocator.php',
                'belanur\\jsonrpc2\\server\\error' => '/Error.php',
                'belanur\\jsonrpc2\\server\\invalidparamsexception' => '/exceptions/InvalidParamsException.php',
                'belanur\\jsonrpc2\\server\\jsonrpcexception' => '/exceptions/JsonRpcException.php',
                'belanur\\jsonrpc2\\server\\methodnotfoundexception' => '/exceptions/MethodNotFoundException.php',
                'belanur\\jsonrpc2\\server\\parseerrorexception' => '/exceptions/ParseErrorException.php',
                'belanur\\jsonrpc2\\server\\php' => '/Php.php',
                'belanur\\jsonrpc2\\server\\request' => '/Request.php',
                'belanur\\jsonrpc2\\server\\response' => '/Response.php',
                'belanur\\jsonrpc2\\server\\service' => '/Service.php',
                'belanur\\jsonrpc2\\server\\subtractcommand' => '/commands/SubtractCommand.php',
                'belanur\\jsonrpc2\\server\\subtractor' => '/Subtractor.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    }
);
// @codeCoverageIgnoreEnd