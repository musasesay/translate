<?php

namespace Yansongda\Translate\Gateways;

use Yansongda\Supports\Config;
use Yansongda\Supports\Traits\HasHttpRequest;
use Yansongda\Translate\Contracts\Translation;
use Yansongda\Translate\Exceptions\GatewayException;
use Yansongda\Translate\Exceptions\InvalidArgumentException;

class BaiduGateway implements Translation
{
    use HasHttpRequest;

    /**
     * baidu api.
     *
     * @var string
     */
    protected $gateway = 'https://fanyi-api.baidu.com/api/trans/vip/translate';

    /**
     * baidu api config.
     *
     * @var array
     */
    protected $config;

    /**
     * user_config.
     *
     * @var Config
     */
    protected $user_config;

    /**
     * construct.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->user_config = new Config($config);

        if (is_null($this->user_config->get('appid')) || is_null($this->user_config->get('appsecret'))) {
            throw new InvalidArgumentException("missing config [appid] or [appsecret]", 1);
        }

        $this->config = [
            'q' => '',
            'from' => '',
            'to' => '',
            'appid' => $this->user_config->get('appid'),
            'salt' => time(),
            'sign' => '',
        ];
    }

    /**
     * translate.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param string $q
     * @param string $to
     * @param string $from
     *
     * @return
     */
    public function trans($q, $to = 'en', $from = 'auto')
    {
        $this->config['q'] = $q;
        $this->config['from'] = $from;
        $this->config['to'] = $to;
        $this->config['sign'] = $this->getSign();

        $res = $this->post($this->gateway, $this->config);

        if (isset($res['error_code']) && $res['error_code'] !== '52000') {
            throw new GatewayException(
                'get result error:' . $res['error_msg'],
                $res['error_code'],
                $res
            );
        }

        $trans_result = '';
        foreach ($res['trans_result'] as $v) {
            $trans_result .= $v['dst'] . "\n";
        }

        return trim($trans_result, "\n");
    }

    /**
     * get sign
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @return string
     */
    protected function getSign()
    {
        return md5($this->config['appid'] . $this->config['q'] . $this->config['salt'] . $this->user_config->get('appsecret'));
    }
}
