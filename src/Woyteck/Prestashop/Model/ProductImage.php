<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;

class ProductImage implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var string */
    private $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }


    public static function fromArray(array $array): ModelInterface
    {
        $productImage = new self;

        if (isset($array['id'])) {
            $productImage->setId((int) $array['id']);
        }
        if (isset($array['url'])) {
            $productImage->setUrl($array['url']);
        }

        return $productImage;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        return $xml;
    }
}
