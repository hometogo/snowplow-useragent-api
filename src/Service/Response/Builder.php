<?php

namespace App\Service\Response;

use App\Model\Response\Error;
use App\Model\Response\Success;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\OperatingSystem;
use DeviceDetector\Parser\Client\Browser;

class Builder
{
    public function buildFromDeviceDetector(DeviceDetector $deviceDetector): \JsonSerializable
    {
        $model = new Success();

        if ($deviceDetector->isParsed()) {
            $model->setIsBot($deviceDetector->isBot());
            $model->setIsTouchEnabled($deviceDetector->isTouchEnabled());
            $model->setIsMobile($deviceDetector->isMobile());
            $model->setIsDesktop($deviceDetector->isDesktop());
            $model->setOs($deviceDetector->getOs());
            $model->setClient($deviceDetector->getClient());
            $model->setDevice($deviceDetector->getDevice());
            $model->setDeviceName($deviceDetector->getDeviceName());
            $model->setBrand($deviceDetector->getBrand());
            $model->setBrandName($deviceDetector->getBrandName());
            $model->setModel($deviceDetector->getModel());
            $model->setBot($deviceDetector->getBot());
            $model->setIsSmartphone($deviceDetector->isSmartphone());
            $model->setIsFeaturePhone($deviceDetector->isFeaturePhone());
            $model->setIsTablet($deviceDetector->isTablet());
            $model->setIsPhablet($deviceDetector->isPhablet());
            $model->setIsConsole($deviceDetector->isConsole());
            $model->setIsPortableMediaPlayer($deviceDetector->isPortableMediaPlayer());
            $model->setIsCarBrowser($deviceDetector->isCarBrowser());
            $model->setIsTV($deviceDetector->isTV());
            $model->setIsSmartDisplay($deviceDetector->isSmartDisplay());
            $model->setIsCamera($deviceDetector->isCamera());
            $model->setIsBrowser($deviceDetector->isBrowser());
            $model->setIsFeedReader($deviceDetector->isFeedReader());
            $model->setIsMobileApp($deviceDetector->isMobileApp());
            $model->setIsPIM($deviceDetector->isPIM());
            $model->setIsLibrary($deviceDetector->isLibrary());
            $model->setIsMediaPlayer($deviceDetector->isMediaPlayer());
            $model->setOsFamily($this->getOsFamily($deviceDetector));
            $model->setBrowserFamily($this->getBrowserFamily($deviceDetector));
        }

        return $model;
    }

    private function getOsFamily(DeviceDetector $deviceDetector): string
    {
        $osFamily = OperatingSystem::getOsFamily($deviceDetector->getOs('short_name'));

        return $osFamily !== false ? $osFamily : null;
    }

    private function getBrowserFamily(DeviceDetector $deviceDetector): string
    {
        $browserFamily = Browser::getBrowserFamily($deviceDetector->getClient('short_name'));

        return $browserFamily !== false ? $browserFamily : null;
    }

    public function buildFromException(\Exception $exception): \JsonSerializable
    {
        $model = new Error();
        $model->setMessage($exception->getMessage());

        return $model;
    }
}
