<?php
/**
 * Project: php-m3u8-sdk
 * File: GeneratorObserver.php 2015-08-25 16:04
 * ----------------------------------------------
 *
 * @author      Stanislav Kiryukhin <korsar.zn@gmail.com>
 * @copyright   Copyright (c) 2015, Core12 Team
 *
 * ----------------------------------------------
 * All Rights Reserved.
 * ----------------------------------------------
 */
namespace sKGroup\M3u;

/**
 * Class GeneratorObserver
 * @package sKGroup\M3u
 */
class GeneratorObserver extends Generator implements ObserverInterface
{
    /**
     * @param OutputInterface|null $output
     */
    public function __construct(OutputInterface $output = null)
    {
        parent::__construct($output);
        $this->tag(static::TAG_BEGIN);
    }

    /**
     * @param $method
     * @param PlaylistInterface $playlist
     * @param null $data
     */
    public function handleEvent($method, PlaylistInterface $playlist, $data = null)
    {
        switch ($method) {
            case 'setVersion':
                $this->tag(static::TAG_VERSION, $data);
                break;

            case 'setTargetDuration':
                $this->tag(static::TAG_TARGET_DURATION, $data);
                break;

            case 'addSegment':
                $this->mediaSegmentTag($data['uri'], $data['duration'], $data['title']);
                break;
        }
    }
}
