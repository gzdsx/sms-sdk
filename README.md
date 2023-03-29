# 阿里云和腾讯云短信SDK

### 开始

> composer require gzdsx/sms-sdk

### 注册APP


在应用入口处注册，如Laravel的AppSericeProvider的boot出

1.阿里云注册
```php
SmsSdk::registerAliyun('your accessKeyId','accessSecret','默认签名','默认模版');
```

2.腾讯云注册
```php
SmsSdk::registerTencentCloud('your secretId','your secretKey','默认SmsSdkAppId','默认签名','默认模版');
```

### 使用阿里云发送
```php
SmsSdk::aliyun()
    ->setPhoneNumbers('13800000000')
    ->setTemplateParam(['code'=>'123456'])
    ->send();
```

### 使用腾讯云发送

```php
SmsSdk::tencentCloud()
    ->setPhoneNumbers('13800000000')
    ->setTemplateParam(['code'=>'123456'])
    ->send();
```

### 打赏作者

![微信支付](https://shop.gzdsx.cn/storage/image/2023/03/zU4JxAGYranaNZ5LIibqqT5nfgI0qTJznL0zVg8f.jpg)
