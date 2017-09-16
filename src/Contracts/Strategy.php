<?php

namespace Yansongda\Translate\Contracts;

interface Strategy
{
    /**
     * apply strategy.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @return string
     */
    public function apply();
}