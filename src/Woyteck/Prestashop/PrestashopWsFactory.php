<?php
declare(strict_types=1);

namespace Woyteck\Prestashop;

use Psr\Container\ContainerInterface;
use Woyteck\Db\ModelFactory;
use GuzzleHttp\Client;
use Woyteck\Exception;

class PrestashopWsFactory
{
    /** @var ContainerInterface */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $shopPrefix
     * @return WsPrestashop
     * @throws Exception
     */
    public function createWs(string $shopPrefix): WsPrestashop
    {
        $settings = $this->container->get('settings');
        if (!isset($settings['prestashop_api'][$shopPrefix])) {
            throw new Exception("Prestashop endpoint (shop prefix) {$shopPrefix} is not configured");
        }

        $wsConfig = $settings['prestashop_api'][$shopPrefix];
        $client = $this->container->get(Client::class);
        $schema = $wsConfig['schema'];
        $url = $wsConfig['url_api'];
        $key  = $wsConfig['key'];
        $modelFactory = $this->container->get(ModelFactory::class);

        return new WsPrestashop($client, $modelFactory, $schema, $url, $key);
    }
}
