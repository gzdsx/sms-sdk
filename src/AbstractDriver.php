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
 * Time: 上午2:23
 */

namespace SmsSdk;

/**
 * Class AbstractDriver
 * @package SmsSdk
 */
abstract class AbstractDriver
{
    protected $signName;
    protected $templateId;
    protected $phoneNumbers;
    protected $templateParam = [];

    /**
     * @return mixed
     */
    public function getSignName()
    {
        return $this->signName;
    }

    /**
     * @param string $signName
     * @return AbstractDriver
     */
    public function setSignName($signName)
    {
        $this->signName = $signName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param string $templateId
     * @return AbstractDriver
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers;
    }

    /**
     * @param mixed $phoneNumbers
     * @return AbstractDriver
     */
    public function setPhoneNumbers($phoneNumbers)
    {
        $this->phoneNumbers = $phoneNumbers;
        return $this;
    }

    /**
     * @return array
     */
    public function getTemplateParam()
    {
        return $this->templateParam;
    }

    /**
     * @param array $templateParam
     * @return AbstractDriver
     */
    public function setTemplateParam($templateParam)
    {
        $this->templateParam = $templateParam;
        return $this;
    }

    abstract function send();
}
