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


use AlibabaCloud\Client\AlibabaCloud;

class SmsSdk
{
    private static $tencentCloudSecretId;
    private static $tencentCloudSecretKey;
    private static $tencentCloudSmsSdkAppId;

    public static function registerAliyun($accessKeyId, $accessSecret)
    {
        AlibabaCloud::accessKeyClient($accessKeyId, $accessSecret)
            ->regionId('cn-hangzhou')
            ->asDefaultClient();
    }

    public static function registerTencentCloud($secretId, $secretKey, $smsSdkAppId)
    {
        self::$tencentCloudSecretId = $secretId;
        self::$tencentCloudSecretKey = $secretKey;
        self::$tencentCloudSmsSdkAppId = $smsSdkAppId;
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
        return new TencentCloudSmsClient(
            self::$tencentCloudSecretId,
            self::$tencentCloudSecretKey,
            self::$tencentCloudSmsSdkAppId);
    }
}
