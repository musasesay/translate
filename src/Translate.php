<?php

namespace Yansongda\Translate;

use Yansongda\Supports\Config;
use Yansongda\Translate\Contracts\Translation;
use Yansongda\Translate\Exceptions\GatewayException;

class Translate
{
    /**
     * config.
     *
     * @var Config
     */
    protected $config;

    /**
     * bootstrap.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
    }

    /**
     * translation driver.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param string $driver
     *
     * @return Translation
     */
    public function driver($driver)
    {
        if (is_null($this->config->get($driver))) {
            throw new GatewayException("missing driver [$driver] config", 1);
        }

        return $this->buildDriver();
    }

    protected function buildDriver($driver)
    {
        # code...
    }
}