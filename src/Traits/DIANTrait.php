<?php

namespace ubl21dian\Traits;

use Exception;

/**
 * DIAN trait.
 */
trait DIANTrait
{
    /**
     * Version.
     *
     * @var string
     */
    public string $version = '1.0';

    /**
     * Encoding.
     *
     * @var string
     */
    public string $encoding = 'UTF-8';

    /**
     * Certs.
     *
     * @var array
     */
    protected array $certs;

    /**
     * Attributes.
     *
     * @var array
     */
    protected array $attributes;

    /**
     * Read certs.
     * @throws Exception
     */
    protected function readCerts()
    {
        if (is_null($this->pathCertificate) || is_null($this->password)) {
            throw new Exception('Class '.get_class($this).': requires the certificate path and password.');
        }
        if (!openssl_pkcs12_read(file_get_contents($this->pathCertificate), $this->certs, $this->password)) {
            throw new Exception('Class '.get_class($this).': Failure signing data: '.openssl_error_string());
        }
    }

    /**
     * X509 export.
     * @throws Exception
     */
    protected function x509Export()
    {
        if (!empty($this->certs)) {
            openssl_x509_export($this->certs['cert'], $stringCert);

            return str_replace([PHP_EOL, '-----BEGIN CERTIFICATE-----', '-----END CERTIFICATE-----'], '', $stringCert);
        }

        throw new Exception('Class '.get_class($this).': Error openssl x509 export.');
    }

    /**
     * Identifiers references.
     */
    protected function identifiersReferences()
    {
        foreach ($this->ids as $key => $value) {
            $this->$key = mb_strtoupper("{$value}-".sha1(uniqid()));
        }
    }

    /**
     * @param string $tagName
     * @param int $item
     * @return void
     */
    protected function removeChild(string $tagName, int $item = 0)
    {
        if (is_null($tag = $this->domDocument->documentElement->getElementsByTagName($tagName)->item($item))) {
            return;
        }

        $this->domDocument->documentElement->removeChild($tag);
    }

    /**
     * @param $tagName
     * @param int $item
     * @param $attribute
     * @param $attribute_value
     * @return void
     * @throws Exception
     */
    protected function getTag($tagName, int $item = 0, $attribute = NULL, $attribute_value = NULL)
    {
        $tag = $this->domDocument->documentElement->getElementsByTagName($tagName);

        if (is_null($tag->item(0))) {
            throw new Exception('Class '.get_class($this).": The tag name {$tagName} does not exist.");
        }

        if($attribute)
            if($attribute_value){
                $tag->item($item)->setAttribute($attribute, $attribute_value);
                return;
            }
            else
                return $tag->item($item)->getAttribute($attribute);
        else
            return $tag->item($item);
    }

    /**
     * @param $stringXML
     * @param $xpath
     * @return bool|string|null
     */
    protected function ValueXML($stringXML, $xpath)
    {
        if(substr($xpath, 0, 1) != '/')
            return NULL;
        $search = substr($xpath, 1, strpos(substr($xpath, 1), '/'));
        $posinicio = strpos($stringXML, "<".$search);
        if($posinicio == 0)
           return false;
        $posinicio = strpos($stringXML, ">", $posinicio) + 1;
        $posCierre = strpos($stringXML, "</".$search.">", $posinicio);
        if($posCierre == 0)
            return true;
        $valorXML = substr($stringXML, $posinicio, $posCierre - $posinicio);
        if(strcmp(substr($xpath, strpos($xpath, $search) + strlen($search)), '/') != 0)
            return $this->ValueXML($valorXML, substr($xpath, strpos($xpath, $search) + strlen($search)));
        else
            return $valorXML;
    }

    /**
     * @param $query
     * @param bool $validate
     * @param int $item
     * @return mixed
     * @throws Exception
     */
    protected function getQuery($query, bool $validate = true, int $item = 0)
    {
        $tag = $this->domXPath->query($query);

        if (($validate) && (null == $tag->item(0))) {
            throw new Exception('Class '.get_class($this).": The query {$query} does not exist.");
        }
        if (is_null($item)) {
            return $tag;
        }

        return $tag->item($item);
    }

    /**
     * Join array.
     *
     * @param array  $array
     * @param bool $formatNS
     * @param string $join
     *
     * @return string
     */
    protected function joinArray(array $array, bool $formatNS = true, string $join = ' '): string
    {
        return implode($join, array_map(function ($value, $key) use ($formatNS) {
            return ($formatNS) ? "{$key}=\"$value\"" : "{$key}=$value";
        }, $array, array_keys($array)));
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|void
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        return;
    }
}
