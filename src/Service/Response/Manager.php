<?php

namespace App\Service\Response;

use App\Model\Parameters;
use DeviceDetector\DeviceDetector;
use Symfony\Component\HttpFoundation\Request;

class Manager
{
    /** @var Builder */
    private $builder;

    /** @var DeviceDetector */
    private $deviceDetector;

    public function __construct(Builder $builder, DeviceDetector $deviceDetector)
    {
        $this->builder = $builder;
        $this->deviceDetector = $deviceDetector;
    }

    public function success(Request $request): \JsonSerializable
    {
        $this->deviceDetector->setUserAgent($request->get(Parameters::USER_AGENT));
        $this->deviceDetector->parse();

        return $this->builder->buildFromDeviceDetector($this->deviceDetector);
    }

    public function error(\Exception $exception): \JsonSerializable
    {
        return $this->builder->buildFromException($exception);
    }
}
