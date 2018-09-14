<?php

namespace App\Model\Response;

class Success implements \JsonSerializable
{
    /** @var bool */
    private $isBot;

    /** @var bool */
    private $isTouchEnabled;

    /** @var bool */
    private $isMobile;

    /** @var bool */
    private $isDesktop;

    /** @var bool */
    private $isSmartphone;

    /** @var bool */
    private $isFeaturePhone;

    /** @var bool */
    private $isTablet;

    /** @var bool */
    private $isPhablet;

    /** @var bool */
    private $isConsole;

    /** @var bool */
    private $isPortableMediaPlayer;

    /** @var bool */
    private $isCarBrowser;

    /** @var bool */
    private $isTV;

    /** @var bool */
    private $isSmartDisplay;

    /** @var bool */
    private $isCamera;

    /** @var bool */
    private $isBrowser;

    /** @var bool */
    private $isFeedReader;

    /** @var bool */
    private $isMobileApp;

    /** @var bool */
    private $isPIM;

    /** @var bool */
    private $isLibrary;

    /** @var bool */
    private $isMediaPlayer;

    /** @var mixed */
    private $os;

    /** @var mixed */
    private $client;

    /** @var mixed */
    private $device;

    /** @var mixed */
    private $deviceName;

    /** @var mixed */
    private $brand;

    /** @var mixed */
    private $brandName;

    /** @var mixed */
    private $model;

    /** @var mixed */
    private $bot;

    public function jsonSerialize(): array
    {
        return [
            'success' => true,
            'data' => [
                'isBot' => $this->isBot,
                'isTouchEnabled' => $this->isTouchEnabled,
                'isMobile' => $this->isMobile,
                'isDesktop' => $this->isDesktop,
                'isTablet' => $this->isTablet,
                'isPhablet' => $this->isPhablet,
                'isConsole' => $this->isConsole,
                'isPortableMediaPlayer' => $this->isPortableMediaPlayer,
                'isCarBrowser' => $this->isCarBrowser,
                'isTV' => $this->isTV,
                'isSmartDisplay' => $this->isSmartDisplay,
                'isCamera' => $this->isCamera,
                'isBrowser' => $this->isBrowser,
                'isFeedReader' => $this->isFeedReader,
                'isMobileApp' => $this->isMobileApp,
                'isPIM' => $this->isPIM,
                'isLibrary' => $this->isLibrary,
                'isMediaPlayer' => $this->isMediaPlayer,
                'osName' => $this->os['name'] ?? '',
                'osShortName' => $this->os['short_name'] ?? '',
                'osVersion' => $this->os['version'] ?? '',
                'osPlatform' => $this->os['platform'] ?? '',
                'clientType' => $this->client['type'] ?? '',
                'clientName' => $this->client['name'] ?? '',
                'clientShortName' => $this->client['short_name'] ?? '',
                'clientVersion' => $this->client['version'] ?? '',
                'clientEngine' => $this->client['engine'] ?? '',
                'clientEngineVersion' => $this->client['engine_version'] ?? '',
                'device' => $this->device,
                'deviceName' => $this->deviceName,
                'brand' => $this->brand,
                'brandName' => $this->brandName,
                'model' => $this->model,
                'botName' => $this->bot['name'] ?? '',
                'botCategory' => $this->bot['category'] ?? '',
                'botUrl' => $this->bot['url'] ?? '',
                'botProducerName' => $this->bot['producer']['name'] ?? '',
                'botProducerUrl' => $this->bot['producer']['url'] ?? '',
            ]
        ];
    }

    public function isBot(): bool
    {
        return $this->isBot;
    }

    public function setIsBot($isBot): void
    {
        $this->isBot = $isBot;
    }

    public function isTouchEnabled(): bool
    {
        return $this->isTouchEnabled;
    }

    public function setIsTouchEnabled($isTouchEnabled): void
    {
        $this->isTouchEnabled = $isTouchEnabled;
    }

    public function isMobile(): bool
    {
        return $this->isMobile;
    }

    public function setIsMobile($isMobile): void
    {
        $this->isMobile = $isMobile;
    }

    public function isDesktop(): bool
    {
        return $this->isDesktop;
    }

    public function setIsDesktop($isDesktop): void
    {
        $this->isDesktop = $isDesktop;
    }

    public function isSmartphone(): bool
    {
        return $this->isSmartphone;
    }

    public function setIsSmartphone(bool $isSmartphone): void
    {
        $this->isSmartphone = $isSmartphone;
    }

    public function isFeaturePhone(): bool
    {
        return $this->isFeaturePhone;
    }

    public function setIsFeaturePhone(bool $isFeaturePhone): void
    {
        $this->isFeaturePhone = $isFeaturePhone;
    }

    public function isTablet(): bool
    {
        return $this->isTablet;
    }

    public function setIsTablet(bool $isTablet): void
    {
        $this->isTablet = $isTablet;
    }

    public function isPhablet(): bool
    {
        return $this->isPhablet;
    }

    public function setIsPhablet(bool $isPhablet): void
    {
        $this->isPhablet = $isPhablet;
    }

    public function isConsole(): bool
    {
        return $this->isConsole;
    }

    public function setIsConsole(bool $isConsole): void
    {
        $this->isConsole = $isConsole;
    }

    public function isPortableMediaPlayer(): bool
    {
        return $this->isPortableMediaPlayer;
    }

    public function setIsPortableMediaPlayer(bool $isPortableMediaPlayer): void
    {
        $this->isPortableMediaPlayer = $isPortableMediaPlayer;
    }

    public function isCarBrowser(): bool
    {
        return $this->isCarBrowser;
    }

    public function setIsCarBrowser(bool $isCarBrowser): void
    {
        $this->isCarBrowser = $isCarBrowser;
    }

    public function isTV(): bool
    {
        return $this->isTV;
    }

    public function setIsTV(bool $isTV): void
    {
        $this->isTV = $isTV;
    }

    public function isSmartDisplay(): bool
    {
        return $this->isSmartDisplay;
    }

    public function setIsSmartDisplay(bool $isSmartDisplay): void
    {
        $this->isSmartDisplay = $isSmartDisplay;
    }

    public function isCamera(): bool
    {
        return $this->isCamera;
    }

    public function setIsCamera(bool $isCamera): void
    {
        $this->isCamera = $isCamera;
    }

    public function isBrowser(): bool
    {
        return $this->isBrowser;
    }

    public function setIsBrowser(bool $isBrowser): void
    {
        $this->isBrowser = $isBrowser;
    }

    public function isFeedReader(): bool
    {
        return $this->isFeedReader;
    }

    public function setIsFeedReader(bool $isFeedReader): void
    {
        $this->isFeedReader = $isFeedReader;
    }

    public function isMobileApp(): bool
    {
        return $this->isMobileApp;
    }

    public function setIsMobileApp(bool $isMobileApp): void
    {
        $this->isMobileApp = $isMobileApp;
    }

    public function isPIM(): bool
    {
        return $this->isPIM;
    }

    public function setIsPIM(bool $isPIM): void
    {
        $this->isPIM = $isPIM;
    }

    public function isLibrary(): bool
    {
        return $this->isLibrary;
    }

    public function setIsLibrary(bool $isLibrary): void
    {
        $this->isLibrary = $isLibrary;
    }

    public function isMediaPlayer(): bool
    {
        return $this->isMediaPlayer;
    }

    public function setIsMediaPlayer(bool $isMediaPlayer): void
    {
        $this->isMediaPlayer = $isMediaPlayer;
    }

    public function getOs()
    {
        return $this->os;
    }

    public function setOs($os): void
    {
        $this->os = $os;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient($client): void
    {
        $this->client = $client;
    }

    public function getDevice()
    {
        return $this->device;
    }

    public function setDevice($device): void
    {
        $this->device = $device;
    }

    public function getDeviceName()
    {
        return $this->deviceName;
    }

    public function setDeviceName($deviceName): void
    {
        $this->deviceName = $deviceName;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    public function getBrandName()
    {
        return $this->brandName;
    }

    public function setBrandName($brandName): void
    {
        $this->brandName = $brandName;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model): void
    {
        $this->model = $model;
    }

    public function getBot()
    {
        return $this->bot;
    }

    public function setBot($bot): void
    {
        $this->bot = $bot;
    }
}
