<?php

namespace ubl21dian\Templates\SOAP;

use ubl21dian\Templates\Template;
use ubl21dian\Templates\CreateTemplate;

/**
 * Send bill async.
 */
class SendPayrollSync extends Template implements CreateTemplate
{
    /**
     * Action.
     *
     * @var string
     */
    public $Action = 'http://wcf.dian.colombia/IWcfDianCustomerServices/SendPayrollSync';

    /**
     * Required properties.
     *
     * @var array
     */
    protected $requiredProperties = [
        'fileName',
        'contentFile',
    ];

    /**
     * Construct.
     *
     * @param string $pathCertificate
     * @param string $passwors
     */
    public function __construct($pathCertificate, $passwors)
    {
        parent::__construct($pathCertificate, $passwors);
    }

    /**
     * Create template.
     *
     * @return string
     */
    public function createTemplate()
    {
        return $this->templateXMLSOAP = <<<XML
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:wcf="http://wcf.dian.colombia">
    <soap:Body>
        <wcf:SendPayrollSync>
            <!--Optional:-->
            <wcf:fileName>{$this->fileName}</wcf:fileName>
            <!--Optional:-->
            <wcf:contentFile>{$this->contentFile}</wcf:contentFile>
        </wcf:SendPayrollSync>
    </soap:Body>
</soap:Envelope>
XML;
    }
}
