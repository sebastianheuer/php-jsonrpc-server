<?php
namespace belanur\jsonrpc2\server;

require __DIR__ . '/../src/autoload.php';

$request = new Request($_POST, $_SERVER);
if (!$request->isJsonRpcRequest()) {
    throw new \Exception('Not a JSON-RPC request');
}

$method = $request->getMethod();
$params = $request->getParams();

$response = new Response($request->getId());
echo $response . "\n";