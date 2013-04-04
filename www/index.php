<?php
namespace belanur\jsonrpc2\server;

require __DIR__ . '/../src/autoload.php';

$requestContent = file_get_contents('php://input');
$request = new Request($_POST, $_SERVER, $requestContent);

if (!$request->isJsonRpcRequest()) {
    throw new \Exception('Not a JSON-RPC request');
}

$response = new Response($request->getId());
$factory = new CommandFactory($request);

try {
    $command = $factory->getCommandForMethod($request->getMethod());
    $result = $command->work();
    $response->setResult($result);
} catch (JsonRpcException $e) {
    $error = new Error($e->getJsonRpcCode(), $e->getMessage());
    $response->setError($error);
}

/**
 * the server MUST not send a response if the client sent a notification
 */
if ($request->isNotification()) {
    exit;
}

echo $response->flush() . "\n";