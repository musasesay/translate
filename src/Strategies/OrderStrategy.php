<?php

namespace Yansongda\Translate\Strategies;

use Yansongda\Translate\Contracts\Strategy;

class OrderStrategy implements Strategy
{
    /**
     * apply strategy.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param array $gateways
     *
     * @return array
     */
    public function apply(array $gateways)
    {
        return array_keys($gateways);
    }
}
