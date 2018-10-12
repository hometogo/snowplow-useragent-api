snowplow-device-api
===================

## Description

User agent parsing APi built to support snowplow analytics enrichment. Can be deployed as a universal device recognition micro service.

## Setup
### Requirements

php >= 7.1.3

### Docker

The fastest way to get started:
```
docker pull hometogo/snowplow-device-api
docker run -d -p 80:80 --name snowplow-device-api hometogo:snowplow-device-api
```
This image contains apache2 with latest mod_php7.2 and all dependencies baked in. Not recommended for production use. 

### Cache

This service caches useragent regexes files and json schema response in filesystem. Relevant config can be found in ```config/services.yaml```. Response caching can be enabled with:

```
cp config/services_prod.yaml.dist config/service_prod.yaml
```

### EC2

Recommended setup would include response caching in order to avoid your API being flooded. If you're running EmrEtlRunner enrichment, every worker node in your EMR cluster will bombard the API and slow down the php interpreter. Here's an example configuration with Nginx + php-fpm and fastcgi caching: 

```nginx
http {
    fastcgi_cache_path /var/cache/nginx levels=1:2 keys_zone=webcache:10m inactive=7d;
    fastcgi_cache_key "$scheme$request_method$host$request_uri";
    fastcgi_cache_lock on;
    fastcgi_cache_use_stale error timeout invalid_header updating http_500;
    fastcgi_cache_valid 7d;
    fastcgi_ignore_headers Cache-Control Expires Set-Cookie;
}
server {
    listen      80;
    server_name _;
    root /var/www/html/web;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ ^(.+\.php)(.*) {
        try_files $uri /index.php =404;

        fastcgi_split_path_info ^(.+\.php)(.*)$;

        fastcgi_pass server unix:/var/run/php7-live.sock;

        fastcgi_cache webcache;
        fastcgi_cache_valid 200 7d;

        fastcgi_param PATH_INFO $fastcgi_path_info;
        include fastcgi_params;
    }
}
```

## Usage

```
/config
```

Returns ready to go api enrichment json. You need to copy/paste the content to your snowplow enrichments directory.

```
/self
```

Return json response of your current client.

```
/?user-agent={{ user-agent }}
```

Change {{ user-agent }} with your custom user agent. This will return parsed json response of your custom client.

## Contributing

This is a free/libre library under license LGPL v3 or later.

Your pull requests and/or feedback is very welcome!
