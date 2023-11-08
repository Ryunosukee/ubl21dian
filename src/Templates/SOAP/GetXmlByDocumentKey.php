<?php

namespace ubl21dian\Templates\SOAP;

use Exception;
use ubl21dian\Templates\CreateTemplate;
use ubl21dian\Templates\Template;

/**
 * Get status.
 */
class GetXmlByDocumentKey extends Template implements CreateTemplate
{
    /**
     * Action.
     *
     * @var string
     */
    public $Action = 'http://wcf.dian.colombia/IWcfDianCustomerServices/GetXmlByDocumentKey';

    /**
     * Required properties.
     *
     * @var array
     */
    protected $requiredProperties = [
        'trackId',
    ];

    /**
     * Construct.
     *
     * @param string $pathCertificate
     * @param string $passwors
     * @throws Exception
     */
    public function __construct($pathCertificate, $passwors, $Ambiente = false)
    {
        parent::__construct($pathCertificate, $passwors);
        if ($Ambiente)
            $this->To = $Ambiente;
//          $this->To = 'https://vpfe.dian.gov.co/WcfDianCustomerServices.svc?wsdl';
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
        <wcf:GetXmlByDocumentKey>
            <!--Optional:-->
            <wcf:trackId>{$this->trackId}</wcf:trackId>
        </wcf:GetXmlByDocumentKey>
    </soap:Body>
</soap:Envelope>
XML;
    }
}
