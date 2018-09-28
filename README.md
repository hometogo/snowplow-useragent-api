snowplow-device-api
===================

## Description

User agent parsing api built to support snowplow analytics enrichment. Can be deployed as a universal device recognition micro service 

## Setup
### Requirements

php >= 7.1.3

### AWS

### Docker

### Local

```
http://hostname/config
```

Returns ready to go api enrichment json. You need to copy/paste the content to your snowplow enrichments directory.

### Cache

This service is using filesystem cache. 3600 seconds for piwik yaml file parsing and 3600 seconds for json schema response.

Also you can enable cache for user agent response cache. You need to copy services_prod.yaml.dist in config directory.

```
cp config/services_prod.yaml.dist config/service_prod.yaml
```

It will enable user response cache for 3600 seconds.

## Usage

```
http://hostname/self
```

Return json response of your current client.

```
http://hostname/?user-agent={{ user-agent }}
```

Change {{ user-agent }} with your custom user agent. This will return parsed json response of your custom client.

## Contributing

This is a free/libre library under license LGPL v3 or later.

Your pull requests and/or feedback is very welcome!
