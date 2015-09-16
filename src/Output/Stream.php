<?php
/**
 * Project: php-m3u8
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
namespace Core12\M3u8\Output;

use Core12\M3u8\OutputInterface;

/**
 * Class Stream
 * @package Core12\M3u8\Output
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
