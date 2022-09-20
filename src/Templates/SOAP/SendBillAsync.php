<?php

namespace ubl21dian\Templates\SOAP;

use ubl21dian\Templates\Template;
use ubl21dian\Templates\CreateTemplate;

/**
 * Send bill async.
 */
class SendBillAsync extends Template implements CreateTemplate
{
    /**
     * Action.
     *
     * @var string
     */
    public string $Action = 'http://wcf.dian.colombia/IWcfDianCustomerServices/SendBillAsync';

    /**
     * Required properties.
     *
     * @var array
     */
    protected array $requiredProperties = [
        'fileName',
        'contentFile',
    ];

    /**
     * @param $pathCertificate
     * @param $password
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
        <wcf:SendBillAsync>
            <!--Optional:-->
            <wcf:fileName>{$this->fileName}</wcf:fileName>
            <!--Optional:-->
            <wcf:contentFile>{$this->contentFile}</wcf:contentFile>
        </wcf:SendBillAsync>
    </soap:Body>
</soap:Envelope>
XML;
    }
}
