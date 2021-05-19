<?php

namespace App\Service\Wrapper;

use DeviceDetector\Cache\CacheInterface;
use Symfony\Component\Cache\Simple\FilesystemCache;

class DeviceDetectorCache implements CacheInterface
{
    /** @var FilesystemCache */
    private $cache;

    public function __construct(string $namespace, int $ttl, string $cacheDir)
    {
        $this->cache = new FilesystemCache($namespace, $ttl, $cacheDir);
    }

    public function fetch(string $id)
    {
        return $this->cache->get($id);
    }

    public function contains(string $id): bool
    {
        return $this->cache->has($id);
    }

    public function save(string $id, $data, int $lifeTime = 0): bool
    {
        $this->cache->set($id, $data);

        return true;
    }

    public function delete(string $id): bool
    {
        $this->cache->delete($id);

        return true;
    }

    public function flushAll(): bool
    {
        $this->cache->clear();

        return true;
    }
}
