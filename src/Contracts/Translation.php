<?php

namespace Yansongda\Translate\Contracts;

interface Translation
{

    /**
     * translate.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param string $q
     * @param string $to
     * @param string $from
     *
     * @return string
     */
    public function trans($q, $to = 'en', $from = 'auto');
}