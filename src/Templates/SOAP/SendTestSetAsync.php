<?php

namespace ubl21dian\Templates\SOAP;

use ubl21dian\Templates\Template;
use ubl21dian\Templates\CreateTemplate;

/**
 * Send test set async.
 */
class SendTestSetAsync extends Template implements CreateTemplate
{
    /**
     * Action.
     *
     * @var string
     */
    public string $Action = 'http://wcf.dian.colombia/IWcfDianCustomerServices/SendTestSetAsync';

    /**
     * Required properties.
     *
     * @var array
     */
    protected array $requiredProperties = [
        'fileName',
        'contentFile',
        'testSetId',
    ];

    /**
     * Construct.
     *
     * @param string $pathCertificate
     * @param string $password
     */
    public function __construct($pathCertificate, $password)
    {
        parent::__construct($pathCertificate, $password);
    }

    /**
     * Create template.
     *
     * @return string
     */
    public function createTemplate(): string
    {
        return $this->templateXMLSOAP = <<<XML
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:wcf="http://wcf.dian.colombia">
    <soap:Body>
        <wcf:SendTestSetAsync>
            <!--Optional:-->
            <wcf:fileName>{$this->fileName}</wcf:fileName>
            <!--Optional:-->
            <wcf:contentFile>{$this->contentFile}</wcf:contentFile>
            <!--Optional:-->
            <wcf:testSetId>{$this->testSetId}</wcf:testSetId>
        </wcf:SendTestSetAsync>
    </soap:Body>
</soap:Envelope>
XML;
    }
}
