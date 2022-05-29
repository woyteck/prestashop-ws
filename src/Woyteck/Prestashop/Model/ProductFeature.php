<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class ProductFeature implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $position;

    /** @var string[] */
    private $name = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function getName(int $languageId = 1): ?string
    {
        return $this->name[$languageId] ?? null;
    }

    public function setName(string $name, int $languageId = 1): void
    {
        $this->name[$languageId] = $name;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     */
    public static function fromArray(array $array): ModelInterface
    {
        $productFeature = new self;

        if (isset($array['id'])) {
            $productFeature->setId((int) $array['id']);
        }
        if (isset($array['position'])) {
            $productFeature->setPosition((int) $array['position']);
        }
        if (isset($array['name'])) {
            if (is_array($array['name'])) {
                foreach ($array['name'] as $name) {
                    $productFeature->setName($name['value'], (int) $name['id']);
                }
            } else {
                $productFeature->setName($array['name']);
            }
        }

        return $productFeature;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->product_feature->id = $this->getId();
        }
        if ($this->getPosition() !== null) {
            $xml->product_feature->position = $this->getPosition();
        }
        $i = 0;
        foreach ($this->name as $languageId => $value) {
            $xml->product_feature->name->language[$i] = $this->getName($languageId);
            if (!isset($xml->product_feature->name->language[$i]['id'])) {
                $xml->product_feature->name->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
