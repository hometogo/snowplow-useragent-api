# snowplow-device-api
User agent parsing api built to support snowplow analytics enrichment. Can be deployed as a universal device recognition micro service 

**requirements**

`php >= 7.1.3`

**setup**

`composer install`

make webserver point to web/index.php

**how to use**

`http://youraddress/?user-agent={$userAgent}`
