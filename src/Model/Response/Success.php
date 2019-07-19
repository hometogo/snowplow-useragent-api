<?php
declare(strict_types=1);

namespace App\Model\Response;

use App\Model\Parameters;

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

    /** @var string|null */
    private $osFamily;

    /** @var string|null */
    private $browserFamily;

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
                // booleans
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
                // strings
                'osFamily' => $this->osFamily,
                'osName' => $this->os['name'] ?? null,
                'osShortName' => $this->os['short_name'] ?? null,
                'osVersion' => $this->getOsVersion(),
                'osPlatform' => $this->getOsPlatform(),
                'brFamily' => $this->browserFamily,
                'clientType' => $this->client['type'] ?: null,
                'clientName' => $this->client['name'] ?? null,
                'clientShortName' => $this->client['short_name'] ?? null,
                'clientVersion' => $this->client['version'] ?: null,
                'clientEngine' => $this->client['engine'] ?? null,
                'clientEngineVersion' => $this->getClientEngineVersion(),
                'deviceName' => $this->deviceName ?: null,
                'brand' => $this->brand ?: null,
                'brandName' => $this->brandName ?: null,
                'model' => $this->model ?: null,
                'botName' => $this->bot['name'] ?: null,
                'botCategory' => $this->bot['category'] ?: null,
                'botUrl' => $this->bot['url'] ?: null,
                'botProducerName' => $this->bot['producer']['name'] ?: null,
                'botProducerUrl' => $this->bot['producer']['url'] ?: null,
                // integers
                'device' => $this->device ?? Parameters::DEFAULT_DEVICE,
            ]
        ];
    }

    public function isBot(): bool
    {
        return $this->isBot;
    }

    public function setIsBot(bool $isBot): void
    {
        $this->isBot = $isBot;
    }

    public function isTouchEnabled(): bool
    {
        return $this->isTouchEnabled;
    }

    public function setIsTouchEnabled(bool $isTouchEnabled): void
    {
        $this->isTouchEnabled = $isTouchEnabled;
    }

    public function isMobile(): bool
    {
        return $this->isMobile;
    }

    public function setIsMobile(bool $isMobile): void
    {
        $this->isMobile = $isMobile;
    }

    public function isDesktop(): bool
    {
        return $this->isDesktop;
    }

    public function setIsDesktop(bool $isDesktop): void
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

    public function setOs(?array $os): void
    {
        $this->os = $os;
    }

    public function getOsFamily(): ?string
    {
        return $this->osFamily;
    }

    public function setOsFamily(?string $osFamily): void
    {
        $this->osFamily = $osFamily;
    }

    public function getBrowserFamily(): ?string
    {
        return $this->browserFamily;
    }

    public function setBrowserFamily(?string $browserFamily): void
    {
        $this->browserFamily = $browserFamily;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient(?array $client): void
    {
        $this->client = $client;
    }

    public function getDevice()
    {
        return $this->device;
    }

    public function setDevice(?int $device): void
    {
        $this->device = $device;
    }

    public function getDeviceName()
    {
        return $this->deviceName;
    }

    public function setDeviceName(string $deviceName): void
    {
        $this->deviceName = $deviceName;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getBrandName()
    {
        return $this->brandName;
    }

    public function setBrandName(string $brandName): void
    {
        $this->brandName = $brandName;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getBot()
    {
        return $this->bot;
    }

    public function setBot(?array $bot): void
    {
        $this->bot = $bot;
    }

    private function getOsVersion(): ?string
    {
        return !empty($this->os['version']) ? $this->os['version'] : null;
    }

    private function getOsPlatform(): ?string
    {
        return !empty($this->os['platform']) ? $this->os['platform'] : null;
    }

    private function getClientEngineVersion(): ?string
    {
        return !empty($this->client['engine_version']) ? $this->client['engine_version'] : null;
    }
}
