<?php

namespace App\Service\Wrapper;

use DeviceDetector\Cache\Cache;
use Symfony\Component\Cache\Simple\FilesystemCache;

class DeviceDetectorCache implements Cache
{
    /** @var FilesystemCache */
    private $cache;

    public function __construct(string $namespace, int $ttl, string $cacheDir)
    {
        $this->cache = new FilesystemCache($namespace, $ttl, $cacheDir);
    }

    public function fetch($id)
    {
        return $this->cache->get($id);
    }

    public function contains($id): bool
    {
        return $this->cache->has($id);
    }

    public function save($id, $data, $lifeTime = 0): void
    {
        $this->cache->set($id, $data);
    }

    public function delete($id): void
    {
        $this->cache->delete($id);
    }

    public function flushAll()
    {
        $this->cache->clear();
    }
}
