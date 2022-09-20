
# UBL2.1 DIAN

Nucleo de pre-validación de facturación electronica - Colombia

* 1: Contiene pruebas válidas con el token de seguridad binario (SOAP) y la firma XAdES (XML) con los algoritmos sha1, sha256 y sha512.
* 2: Contiene las plantillas principales para el consumo del servicio web, requiere curl como una dependencia.
* 3: Se soluciona el error de canonización.
* 4: Contiene pruebas válidas para el envío de notas de crédito y el cálculo del CUDE.
* 5: Licencia LGPL.
* 6: Contiene pruebas válidas para el envío de notas de débito y el nombre del documento estándar.

## Características

* Firma de documentos
* Envío asíncrono
* Consulta de estado por ZIPKey
* Consulta de estado por CUFE
* Consulta de rangos de numeración
* Envió de set de pruebas asíncrono
* Consulta de eventos


## Instalación

Requisitos mínimos
```bash
php: >= 7.4
ext-dom
ext-xml
ext-curl
ext-libxml
ext-openssl
ext-xmlwriter
ext-json
```


Instalación con composer
```bash
composer require dcorreah/ubl21dian
```

## Licencia

[MIT](https://choosealicense.com/licenses/mit/)


## Autores

- [@TorreSoftware](https://github.com/TorreSoftware) (Agradecimientos por el proyecto inicial)
- [@Ryunosukee](https://github.com/Ryunosukee)

## Soporte

Si necesitas soporte, puedes escribirme al correo electrónico strike970124@gmail.com

