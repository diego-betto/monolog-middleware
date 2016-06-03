<?php

namespace MonologMiddleware\Validator;

use MonologMiddleware\Exception\MonologConfigException;

/**
 * Class ValidateRedisHandlerConfig
 * @package MonologMiddleware\Validator
 */
class ValidateRedisHandlerConfig extends AbstractValidateHandlerConfig
{
    /**
     * @return bool
     * @throws MonologConfigException
     */
    public function validate()
    {
        if (parent::hasLevel() && $this->hasRedisClient() && $this->hasKey()) {
            return true;
        }
    }


    /**
     * @return bool
     * @throws MonologConfigException
     */
    public function hasRedisClient()
    {
        if (isset($this->handlerConfigArray['redis']) && $this->handlerConfigArray['redis'] instanceof \Redis) {
            return true;
        } else {
            throw new MonologConfigException("Missing Redis client in Redis handler configuration");
        }
    }

    /**
     * @return bool
     * @throws MonologConfigException
     */
    public function hasKey()
    {
        if (isset($this->handlerConfigArray['key'])) {
            return true;
        } else {
            throw new MonologConfigException("Missing Redis key in Redis handler configuration");
        }
    }
}