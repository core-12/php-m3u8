<?php
/**
 * Project: php-m3u8-sdk
 * File: Generator.php 2015-08-20 19:59
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

use sKGroup\M3u\Output;

/**
 * Class Generator
 * @package sKGroup\M3u
 */
class Generator implements GeneratorInterface
{
    /**
     * @var OutputInterface
     */
    private $outputProvider;

    /**
     * @param OutputInterface|null $output
     */
    public function __construct(OutputInterface $output = null)
    {
        if ($output === null) {
            $output = new Output\File();
        }

        $this->outputProvider = $output;
    }

    /**
     * @param PlaylistInterface $playlist
     * @return OutputInterface
     */
    public function generate(PlaylistInterface $playlist)
    {
        $this->tag(static::TAG_BEGIN);
        $this->tag(static::TAG_VERSION, $playlist->getVersion());
        $this->tag(static::TAG_TARGET_DURATION, $playlist->getTargetDuration());

        foreach ($playlist->getSegments() as $segment) {
            $this->tag(static::TAG_EXTINF, [$segment['duration'], $segment['title']]);
            $this->string($segment['uri']);
        }

        $this->tag(static::TAG_ENDLIST);
        return $this->getOutputProvider();
    }

    /**
     * @param string $tag
     * @param string|array $attributes
     */
    public function tag($tag, $attributes = null)
    {
        if ($attributes) {
            if (is_array($attributes)) {
                $attributes = $this->generateAttributes($attributes);
            } else {
                $attributes = ': ' . $attributes;
            }
        }

        $this->string($tag . $attributes);
    }

    /**
     * @param string $str
     */
    public function string($str)
    {
        $this->getOutputProvider()->append($str . PHP_EOL);
    }

    /**
     * @param $comment
     */
    public function comment($comment)
    {
        $this->string('#' . $comment);
    }

    /**
     * @return OutputInterface
     */
    public function getOutputProvider()
    {
        return $this->outputProvider;
    }

    /**
     * @param array $attributes
     * @return null|string
     */
    protected function generateAttributes(array $attributes)
    {
        $attrs = [];
        asort($attributes);

        foreach ($attributes as $key => $value) {
            if ($value) {
                $attrs[] = is_int($key) ? $value : $key . '=' . $value;
            }
        }

        if ($attrs) {
            return ':' . implode(', ', $attrs);
        } else {
            return null;
        }
    }
}
