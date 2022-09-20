<?php

namespace ubl21dian\Templates\SOAP;

use ubl21dian\Templates\Template;
use ubl21dian\Templates\CreateTemplate;

/**
 * Get status zip.
 */
class GetStatusZip extends Template implements CreateTemplate
{
    /**
     * Action.
     *
     * @var string
     */
    public string $Action = 'http://wcf.dian.colombia/IWcfDianCustomerServices/GetStatusZip';

    /**
     * Required properties.
     *
     * @var array
     */
    protected array $requiredProperties = [
        'trackId',
    ];

    /**
     * Construct.
     *
     * @param string $pathCertificate
     * @param $password
     * @param bool $Ambiente
     */
    public function __construct($pathCertificate, $password, $Ambiente = false)
    {
        parent::__construct($pathCertificate, $password);
        if ($Ambiente)
          $this->To = $Ambiente;
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
        <wcf:GetStatusZip>
            <!--Optional:-->
            <wcf:trackId>{$this->trackId}</wcf:trackId>
        </wcf:GetStatusZip>
    </soap:Body>
</soap:Envelope>
XML;
    }
}
