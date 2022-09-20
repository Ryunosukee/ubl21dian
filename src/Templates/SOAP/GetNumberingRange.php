<?php

namespace ubl21dian\Templates\SOAP;

use ubl21dian\Templates\Template;
use ubl21dian\Templates\CreateTemplate;

/**
 * Get Numbering Range.
 */
class GetNumberingRange extends Template implements CreateTemplate
{
    /**
     * Action.
     *
     * @var string
     */
    public string $Action = 'http://wcf.dian.colombia/IWcfDianCustomerServices/GetNumberingRange';

    /**
     * Required properties.
     *
     * @var array
     */
    protected array $requiredProperties = [
        'Nit',
		'IDSoftware',
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
        $this->To = 'https://vpfe.dian.gov.co/WcfDianCustomerServices.svc?wsdl';
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
   <soap:Header/>
   <soap:Body>
      <wcf:GetNumberingRange>
         <!--Optional:-->
         <wcf:accountCode>{$this->Nit}</wcf:accountCode>
         <!--Optional:-->
         <wcf:accountCodeT>{$this->Nit}</wcf:accountCodeT>
         <!--Optional:-->
         <wcf:softwareCode>{$this->IDSoftware}</wcf:softwareCode>
      </wcf:GetNumberingRange>
   </soap:Body>
</soap:Envelope>
XML;
    }
}
