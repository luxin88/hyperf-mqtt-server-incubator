<?php

namespace Hyperf\MqttServer;

use Simps\MQTT\Protocol\ProtocolInterface;

class Protocol
{
    private static ?ProtocolInterface $protocol = null;
    public static function get(): ProtocolInterface
    {
        if(self::$protocol === null){
            self::$protocol = config('mqtt.packer', Simps\MQTT\Protocol\V3::class);
        }
        return self::$protocol;
    }
}