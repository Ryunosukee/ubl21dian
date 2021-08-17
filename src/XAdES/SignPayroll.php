<?php

namespace ubl21dian\XAdES;

/**
 * Sign Payroll.
 */
class SignPayroll extends SignInvoice
{
    /**
     * NS.
     *
     * @var array
     */

     public $ns = [
        'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
        'xmlns:ds' => SignInvoice::XMLDSIG,
        'xmlns:xades' => 'http://uri.etsi.org/01903/v1.3.2#',
        'xmlns:xades141' => 'http://uri.etsi.org/01903/v1.4.1#',
        'xmlns:ext' => 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2',
        'xmlns' => 'urn:dian:gov:co:facturaelectronica:NominaIndividual',
    ];
}
