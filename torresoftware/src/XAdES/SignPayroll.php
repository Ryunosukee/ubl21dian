<?php

namespace ubl21dian\XAdES;

/**
 * Sign Invoice.
 */
class SignPayroll extends SignInvoice
{
    /**
     * NS.
     *
     * @var array
     */

     public $ns = [
        'xmlns:ext' => 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2',
        'xmlns:xades' => 'http://uri.etsi.org/01903/v1.3.2#',
        'xmlns:xades141' => 'http://uri.etsi.org/01903/v1.4.1#',
        'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
        'xmlns' => 'dian:gov:co:facturaelectronica:NominaIndividual',
        'xmlns:xs' => 'http://www.w3.org/2001/XMLSchema-instance',
        'xmlns:ds' => 'http://www.w3.org/2000/09/xmldsig#',
        'xsi:schemaLocation' => 'dian:gov:co:facturaelectronica:NominaIndividual NominaIndividualElectronicaXSD.xsd',
        'xmlns:ds' => SignInvoice::XMLDSIG,
    ];
}
