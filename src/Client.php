<?php

    namespace Firegore\Thingiverse;

    use Firegore\Thingiverse\HttpClients\GuzzleHttpClient;
    use Firegore\Thingiverse\HttpClients\HttpClientInterface;

    /**
     * Class Client
     *
     * @package Firegore\Thingiverse
     */
    class Client
    {
        const BASE_URL = 'https://api.thingiverse.com';
        const AUTH_URL = 'https://www.thingiverse.com';
        /**
         * @var HttpClientInterface|GuzzleHttpClient HTTP Client
         */
        protected $httpClientHandler;

        function __construct (HttpClientInterface $httpClientHandler = null)
        {
            $this->httpClientHandler = $httpClientHandler ?: new GuzzleHttpClient(
                new Client(
                    [
                        'base_uri' => $this->getBaseUrl(),
                    ]
                )
            );
        }

        /**
         * Returns the base Bot URL.
         *
         * @return string
         */
        public function getBaseUrl ()
        {
            return static::BASE_URL;
        }
    }
