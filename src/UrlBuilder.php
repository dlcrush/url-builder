<?php

namespace Crush\Http;

use Crush\Http\Contracts\UrlBuilder as UrlBuilderInterface;
use Crush\Http\Contracts\ParamsBuilder;

class UrlBuilder implements UrlBuilderInterface {

    protected $baseUrl;
    protected $paramsBuilder;
    protected $path;

    public function __construct(ParamsBuilder $paramsBuilder) {
        $this->paramsBuilder = $paramsBuilder;
    }

    public function setBaseUrl(String $baseUrl) {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function addParam(String $key, String $value) {
        return $this->paramsBuilder->add($key, $value);
    }

    public function removeParam(String $key) {
        return $this->paramsBuilder->remove($key);
    }

    public function hasParam(String $key) {
        return $this->paramsBuilder->has($key);
    }

    public function setParam(String $key, String $value) {
        return $this->paramsBuilder->set($key, $value);
    }

    public function setParams(array $params) {
        foreach($params as $k => $v) {
            $this->setParam($k, $v);
        }
        return $this;
    }

    public function setPath(String $path) {
        $this->path = $path;
        return $this;
    }

    public function path(String $path) {
        return $this->setPath($path);
    }

    public function params(array $params) {
        return $this->setParams($params);
    }

    public function build() {
        return $this->baseUrl . $this->path . $this->paramsBuilder->build();
    }
}