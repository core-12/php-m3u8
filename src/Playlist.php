<?php
/**
 * Project: php-m3u8-sdk
 * File: Playlist.php 2015-08-17 19:15
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
 * Class Playlist
 * @package sKGroup\M3u
 */
class Playlist implements PlaylistInterface, ObservableInterface
{
    /**
     * @var int
     */
    private $version;

    /**
     * @var array
     */
    private $segments = [];

    /**
     * @var int
     */
    private $targetDuration = 0;

    /**
     * @var ObserverInterface[]
     */
    private $observers = [];


    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
        $this->notifyObservers(__METHOD__, $version);
    }

    /**
     * @return int
     */
    public function getTargetDuration()
    {
        return $this->targetDuration;
    }

    /**
     * @param $duration
     */
    public function setTargetDuration($duration)
    {
        $this->targetDuration = $duration;
        $this->notifyObservers(__METHOD__, $duration);
    }


    /**
     * @param string|array $uri
     * @param int $duration
     * @param null $title
     */
    public function addSegment($uri, $duration = -1, $title = null)
    {
        $segment = [
            'uri'       => $uri,
            'duration'  => $duration,
            'title'     => $title
        ];

        $this->segments[] = $segment;
        $this->notifyObservers(__METHOD__, $segment);
    }

    /**
     * @param $n
     * @return bool
     */
    public function getSegment($n)
    {
        if (isset($this->segments[$n])) {
            return $this->segments[$n];
        }

        return false;
    }

    /**
     * @return array
     */
    public function getSegments()
    {
        return $this->segments;
    }


    /**
     * @param ObserverInterface $observer
     * @return mixed
     */
    public function attachObserver(ObserverInterface $observer)
    {
        $hash = spl_object_hash($observer);
        $this->observers[$hash] = $observer;
    }


    /**
     * @param ObserverInterface $observer
     */
    public function detachObserver(ObserverInterface $observer)
    {
        $hash = spl_object_hash($observer);
        unset($this->observers[$hash]);
    }

    /**
     * @param $method
     * @param null $data
     */
    protected function notifyObservers($method, $data = null)
    {
        foreach ($this->observers as $observer) {
            $observer->handleEvent($method, $this, $data);
        }
    }
}
