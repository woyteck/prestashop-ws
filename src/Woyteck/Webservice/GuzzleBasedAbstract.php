<?php
declare(strict_types=1);

namespace Woyteck\Webservice;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Woyteck\Db\ModelFactory;
use Woyteck\StoresManager\Model\WebservicesLog;

abstract class GuzzleBasedAbstract
{
    /** @var Client */
    protected $client;

    /** @var ModelFactory */
    protected $modelFactory;

    /** @var string */
    protected $lastRequestHeaders;

    /** @var string */
    protected $lastRequest;

    /** @var string */
    protected $lastResponseHeaders;

    /** @var string */
    protected $lastResponse;

    public function __construct(Client $client, ModelFactory $modelFactory)
    {
        $this->client = $client;
        $this->modelFactory = $modelFactory;
    }

    protected function send(string $method, string $url, array $options = []): Response
    {
        $this->clearLastLog();
        $fp = fopen('php://memory', 'r+');
        $options[RequestOptions::DEBUG] = $fp;
        try {
            /** @var Response $response */
            $response = $this->client->{$method}($url, $options);
            fseek($fp, 0);
            $this->lastRequest = stream_get_contents($fp);
            $contents = (string) $response->getBody();
            $response->getBody()->rewind();
            $this->lastResponseHeaders = $this->parseHeaders($response->getHeaders());
            $this->lastResponse = $contents;
            $this->saveLog();

            return $response;
        } catch (ServerException $e) {
            $this->lastRequest = $e->getRequest()->getBody()->getContents();
            $this->lastRequestHeaders = $this->parseHeaders($e->getRequest()->getHeaders());
            $this->lastResponse = $e->getResponse()->getBody()->getContents();
            $this->lastResponseHeaders = $this->parseHeaders($e->getResponse()->getHeaders());
            $this->saveLog();

            throw $e;
        }
    }

    private function clearLastLog(): void
    {
        $this->lastRequestHeaders = null;
        $this->lastRequest = null;
        $this->lastResponseHeaders = null;
        $this->lastResponse = null;
    }

    private function parseHeaders(array $headers): string
    {
        $output = '';
        foreach ($headers as $name => $values) {
            $value = implode(';', $values);
            $output .= "{$name}: {$value}". "\n";
        }

        return $output;
    }

    private function saveLog(): WebservicesLog
    {
        /** @var WebservicesLog $log */
        $log = $this->modelFactory->create(WebservicesLog::class);
        $log->webservice = get_class($this);
        $log->datetime = time();
        $log->request_headers = $this->lastRequestHeaders;
        if (ctype_print($this->lastRequest) === true) {
            $log->request = $this->lastRequest;
        } else {
            $log->request = 'binary_data';
        }
        $log->response_headers = $this->lastResponseHeaders;
        if (ctype_print($this->lastResponse) === true) {
            $log->response = $this->lastResponse;
        } else {
            $log->response = 'binary_data';
        }
        $log->save();

        return $log;
    }
}
