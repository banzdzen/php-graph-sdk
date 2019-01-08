<?php

namespace Facebook\HttpClients;

class FacebookCurlOptsHttpClient extends FacebookCurlHttpClient
{
    protected $curlOptions = null;

    public function __construct(FacebookCurl $facebookCurl = null, $curlOptions = null)
    {
        parent::__construct($facebookCurl);
        $this->curlOptions = $curlOptions;
    }

    public function openConnection($url, $method, $body, array $headers, $timeOut)
    {
        parent::openConnection($url, $method, $body, $headers, $timeOut);
        if($this->curlOptions) {
            $this->facebookCurl->setoptArray($this->curlOptions);
        }
    }

}