<?php
/**
 * ============================================================================
 * Copyright (c) 2015-2023 贵州大师兄信息技术有限公司 All rights reserved.
 * siteַ: https://www.gzdsx.cn
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0.0
 * ---------------------------------------------
 * Date: 2023/3/21
 * Time: 上午2:40
 */

namespace SmsSdk;


use AlibabaCloud\Client\AlibabaCloud;

class AliyunSmsClient extends AbstractDriver
{
    private static $defaultSignName;
    private static $defaultTemplateCode;

    private $templateCode;

    /**
     * @param $accessKeyId
     * @param $accessSecret
     * @throws \AlibabaCloud\Client\Exception\ClientException
     */
    public static function registerApp($accessKeyId, $accessSecret)
    {
        AlibabaCloud::accessKeyClient($accessKeyId, $accessSecret)
            ->regionId('cn-hangzhou')
            ->asDefaultClient();
    }

    /**
     * @param mixed $defaultSignName
     */
    public static function setDefaultSignName($defaultSignName)
    {
        self::$defaultSignName = $defaultSignName;
    }

    /**
     * @param mixed $defaultTemplateCode
     */
    public static function setDefaultTemplateCode($defaultTemplateCode)
    {
        self::$defaultTemplateCode = $defaultTemplateCode;
    }

    /**
     * @param mixed $templateCode
     * @return AliyunSmsClient
     */
    public function setTemplateCode($templateCode)
    {
        $this->templateCode = $templateCode;
        return $this;
    }

    /**
     * @return \AlibabaCloud\Client\Result\Result
     * @throws \AlibabaCloud\Client\Exception\ClientException
     * @throws \AlibabaCloud\Client\Exception\ServerException
     */
    public function send()
    {
        $signName = $this->signName ?: self::$defaultSignName;
        $templateCode = $this->templateCode ?: self::$defaultTemplateCode;
        $phoneNumbers = is_array($this->phoneNumbers) ? implode(',', $this->phoneNumbers) : $this->phoneNumbers;
        return AlibabaCloud::rpc()
            ->product('Dysmsapi')
            // ->scheme('https') // https | http
            ->version('2017-05-25')
            ->action('SendSms')
            ->method('POST')
            ->options([
                'query' => [
                    //需要发送到那个手机
                    //支持对多个手机号码发送短信，手机号码之间以半角逗号（,）分隔。
                    //上限为1000个手机号码。批量调用相对于单条调用及时性稍有延迟。
                    'PhoneNumbers' => $phoneNumbers,
                    //必填项 签名(需要在阿里云短信服务后台申请)
                    'SignName' => $signName,
                    //必填项 短信模板code (需要在阿里云短信服务后台申请)
                    'TemplateCode' => $templateCode,
                    //如果在短信中添加了${code} 变量则此项必填 要求为JSON格式
                    'TemplateParam' => json_encode($this->templateParam, 256),
                ],
            ])->request();
    }
}
