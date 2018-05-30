<?php

    namespace Firegore\Thingiverse\Traits;

    trait RulesTrait
    {
        /** @var int $last_request Time of the last request in microseconds */
        protected $last_request = 0;

        /** @var int $limit_count Total requests per microseconds before flood */
        protected $limit_count = 2;

        /** @var int $limit_time Time limit in microseconds before flood */
        protected $limit_time = 1000000;

        public function waitRequest ()
        {
            $remaining = $this->getFreqLimit() - $this->getElapsedTime();
            if ($remaining > 0) usleep($remaining);
            return $this;

        }

        public function getFreqLimit ()
        {
            return $this->limit_time / $this->limit_count;
        }

        public function getElapsedTime ()
        {
            return microtime(true) - $this->getLastRequest();
        }

        public function setLastRequest ()
        {
            $this->last_request = microtime(true);
            return $this;
        }

        public function getLastRequest ()
        {
            return $this->last_request;
        }
    }
