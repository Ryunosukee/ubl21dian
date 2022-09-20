<?php

namespace ubl21dian;

use DOMDocument;
use Exception;
use ubl21dian\Traits\DIANTrait;

/**
 * Sign.
 */
abstract class Sign
{
    use DIANTrait;

    /**
     * @return mixed
     */
    abstract protected function loadXML();

    /**
     * @param null $pathCertificate
     * @param null $password
     * @param null $xmlString
     * @throws Exception
     */
    public function __construct($pathCertificate = null, $password = null, $xmlString = null)
    {
        $this->pathCertificate = $pathCertificate;
        $this->password = $password;
        $this->xmlString = $xmlString;

        $this->readCerts();
        $this->identifiersReferences();

        if (!is_null($xmlString)) {
            $this->sign();
        }

        return $this;
    }

    /**
     * Get document.
     *
     * @return DOMDocument
     */
    public function getDocument(): DOMDocument
    {
        return $this->domDocument;
    }

    /**
     * @param $string
     * @return $this
     */
    public function sign($string = null): Sign
    {
        if (null != $string) {
            $this->xmlString = $string;
        }

        if (!is_null($this->xmlString)) {
            $this->loadXML();
            $this->xml = $this->domDocument->saveXML();
        }
        return $this;
    }
}
