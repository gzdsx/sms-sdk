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
 * Time: 上午2:13
 */

namespace SmsSdk;


class SmsSdk
{
    /**
     * @param $accessKeyId
     * @param $accessSecret
     * @param null $defaultSignName
     * @param null $defaultTemplateCode
     * @throws \AlibabaCloud\Client\Exception\ClientException
     */
    public static function registerAliyun($accessKeyId, $accessSecret, $defaultSignName = null, $defaultTemplateCode = null)
    {
        AliyunSmsClient::registerApp($accessKeyId, $accessSecret);
        AliyunSmsClient::setDefaultSignName($defaultSignName);
        AliyunSmsClient::setDefaultTemplateCode($defaultTemplateCode);
    }

    public static function registerTencentCloud($secretId, $secretKey, $defaultSmsSdkAppId, $defaultSignName, $defaultTemplateId)
    {
        TencentCloudSmsClient::registerApp($secretId, $secretKey);
        TencentCloudSmsClient::setDefaultSmsSdkAppId($defaultSmsSdkAppId);
        TencentCloudSmsClient::setDefaultSignName($defaultSignName);
        TencentCloudSmsClient::setDefaultTemplateId($defaultTemplateId);
    }

    /**
     * @return AliyunSmsClient
     */
    public static function aliyun()
    {
        return new AliyunSmsClient();
    }

    /**
     * @return TencentCloudSmsClient
     */
    public static function tencentCloud()
    {
        return new TencentCloudSmsClient();
    }
}
