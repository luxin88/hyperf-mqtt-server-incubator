<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Hyperf\MqttServer\Handler;

use Hyperf\HttpMessage\Server\Response;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\MqttServer\Protocol;
use Psr\Http\Message\ServerRequestInterface;
use Simps\MQTT\Protocol\Types;
use Simps\MQTT\Protocol\V3;

class MQTTUnsubscribeHandler implements HandlerInterface
{
    public function handle(ServerRequestInterface $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        return $response->withBody(new SwooleStream(Protocol::get()::pack(
            [
                'type' => Types::UNSUBACK,
                'message_id' => $data['message_id'] ?? '',
            ]
        )));
    }
}
