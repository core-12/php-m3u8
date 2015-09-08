<?php
/**
 * Project: php-m3u8-sdk
 * File: Stream.php 2015-08-25 16:53
 * ----------------------------------------------
 *
 * @author      Stanislav Kiryukhin <korsar.zn@gmail.com>
 * @copyright   Copyright (c) 2015, Core12 Team
 *
 * ----------------------------------------------
 * All Rights Reserved.
 * ----------------------------------------------
 */
namespace sKGroup\M3u\Output;

use sKGroup\M3u\OutputInterface;

/**
 * Class Stream
 * @package sKGroup\M3u\Output
 */
class Stream implements OutputInterface
{
    /**
     * @var resource | stream
     */
    protected $stream;

    /**
     * @param $stream
     */
    public function __construct($stream = 'php://output')
    {
        if (!is_resource($stream) || 'stream' !== get_resource_type($stream)) {
            throw new \InvalidArgumentException('This class needs a stream as its first argument.');
        }

        $this->stream = $stream;
    }

    /**
     * @param string $string
     */
    public function append($string)
    {
        fwrite($this->stream, $string);
        fflush($this->stream);
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return stream_get_contents($this->stream, -1, 0);
    }
}
