<?php

namespace core;

class SuperGlobal
{
    const REQUEST_METHOD = 'REQUEST_METHOD';
    const REQUEST_URI = 'REQUEST_URI';
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    const FLASH_SESSION_KEY = '_flash';
    const OLD_FORM_DATA_KEY = '_old';
    const VALIDATION_ERROR_DATA_KEY = '_errors';

    const PHPSESSION_COOKIE_NAME = 'PHPSESSID';
    const HTTP_REFERER = 'HTTP_REFERER';
}
