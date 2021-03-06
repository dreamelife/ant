<?php
/**
 * Created by PhpStorm.
 * User: shenzhe
 * Date: 2016/11/22
 * Time: 16:04
 */

namespace packer;

use ZPHP\Common\MessagePacker;


class Ant
{
    /**
     * @param $data
     * @return Result
     */
    public static function unpack($data)
    {
        $message = new MessagePacker($data);
        $header = $message->readString();
        $body = $message->readString();
        return new Result($header, $body);
    }

    public static function pack($header, $body)
    {
        $message = new MessagePacker();
        $message->writeString($header);
        $message->writeString($body);
        return $message->getData();
    }
}