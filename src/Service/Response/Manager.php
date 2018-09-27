<?php

namespace App\Service\Response;

use App\Service\Wrapper\DeviceDetectorCache;
use DeviceDetector\DeviceDetector;

class Manager
{
    /** @var Builder */
    private $builder;

    /** @var DeviceDetector */
    private $deviceDetector;

    public function __construct(
        Builder $builder,
        DeviceDetector $deviceDetector,
        DeviceDetectorCache $deviceDetectorCache
    ) {
        $this->builder = $builder;
        $this->deviceDetector = $deviceDetector;
        $this->deviceDetector->setCache($deviceDetectorCache);
    }

    public function success(string $userAgent): \JsonSerializable
    {
        $this->deviceDetector->setUserAgent($userAgent);
        $this->deviceDetector->parse();

        return $this->builder->buildFromDeviceDetector($this->deviceDetector);
    }

    public function error(\Exception $exception): \JsonSerializable
    {
        return $this->builder->buildFromException($exception);
    }
}
