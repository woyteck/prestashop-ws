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

    /** @var string */
    private $name;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
            $productFeature->setName($array['name']);
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
        if ($this->getName() !== null) {
            $xml->product_feature->name->language = $this->getName();
        }

        return $xml;
    }
}
