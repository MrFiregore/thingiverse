<?php

    namespace Firegore\Thingiverse\HttpClients;

    use GuzzleHttp\Promise\Promise;


    interface HttpClientInterface
    {
        /**
         * @param string     $url
         * @param string     $method
         * @param array      $options
         * @param int        $timeOut
         * @param bool|false $isAsyncRequest
         * @param int        $connectTimeOut
         *
         * @return Promise||Response||mixed
         */
        public function send (
            $url,
            $method,
            array $options = [],
            $timeOut = 30,
            $isAsyncRequest = false,
            $connectTimeOut = 10
        );
    }
