<?php

namespace ubl21dian\XAdES;

/**
 * Sign Credit Note.
 */
class SignAttachedDocument extends SignInvoice
{
    /**
     * NS.
     *
     * @var array
     */
    public $ns = [
        'xmlns:ds' => SignInvoice::XMLDSIG,
        'xmlns:cac' => 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2',
        'xmlns:cbc' => 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2',
        'xmlns:ccts' => 'urn:un:unece:uncefact:data:specification:CoreComponentTypeSchemaModule:2',
        'xmlns:ext' => 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2',
        'xmlns:xades' => 'http://uri.etsi.org/01903/v1.3.2#',
        'xmlns:xades141' => 'http://uri.etsi.org/01903/v1.4.1#',
        'xmlns' => 'urn:oasis:names:specification:ubl:schema:xsd:AttachedDocument-2',
    ];
}
