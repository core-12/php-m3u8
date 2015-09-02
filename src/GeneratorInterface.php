<?php
/**
 * Project: php-m3u8-sdk
 * File: GeneratorInterface.php 2015-08-20 19:50
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
 * Class GeneratorInterface
 * @package sKGroup\M3u
 */
interface GeneratorInterface
{
    const TAG_BEGIN             = '#EXTM3U';
    const TAG_EXTINF            = '#EXTINF';
    const TAG_VERSION           = '#EXT-X-VERSION';
    const TAG_TARGET_DURATION   = '#EXT-X-TARGETDURATION';
    const TAG_PLAYLIST_TYPE     = '#EXT-X-PLAYLIST-TYPE';
    const TAG_MEDIA_SEQUENCE    = '#EXT-X-MEDIA-SEQUENCE';
    const TAG_ENDLIST           = '#EXT-X-ENDLIST';

    /**
     * @param OutputInterface|null $output
     */
    public function __construct(OutputInterface $output = null);

    /**
     * @param string $tag
     * @param string|array $attributes
     */
    public function tag($tag, $attributes = null);

    /**
     * @param string $str
     */
    public function string($str);

    /**
     * @param $comment
     */
    public function comment($comment);

    /**
     * @return OutputInterface
     */
    public function getOutputProvider();
}
