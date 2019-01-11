<?php

namespace Facebook;

use Facebook\HttpClients\FacebookCurlOptsHttpClient;
use Facebook\HttpClients\FacebookCurl;

class FacebookSocks
{
    public static function createClient($accessToken, $socks, $version = 'v3.2')
    {
        $fbCurl = new FacebookCurl;
        return new Facebook([
            'app_id' => 1,
            'app_secret' => 1,
            'http_client_handler' => new FacebookCurlOptsHttpClient($fbCurl, $socks ? [
                    CURLOPT_PROXY => $socks,
                    CURLOPT_PROXYTYPE => CURLPROXY_SOCKS5_HOSTNAME,
                ] : []
            ),
            'default_access_token' => $accessToken,
            'default_graph_version' => $version,
        ]);
    }
}