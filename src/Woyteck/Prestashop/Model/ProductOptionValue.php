<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class ProductOptionValue implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idAttributeGroup;

    /** @var string */
    private $color;

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

    public function getIdAttributeGroup(): ?int
    {
        return $this->idAttributeGroup;
    }

    public function setIdAttributeGroup(int $idAttributeGroup): void
    {
        $this->idAttributeGroup = $idAttributeGroup;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
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
        $productOptionValue = new self;

        if (isset($array['id']) && $array['id'] > 0) {
            $productOptionValue->setId((int) $array['id']);
        }
        if (isset($array['id_attribute_group'])) {
            $productOptionValue->setIdAttributeGroup((int) $array['id_attribute_group']);
        }
        if (isset($array['color'])) {
            $productOptionValue->setColor($array['color']);
        }
        if (isset($array['name'])) {
            if (is_array($array['name'])) {
                foreach ($array['name'] as $name) {
                    $productOptionValue->setName($name['value'], (int) $name['id']);
                }
            } else {
                $productOptionValue->setName($array['name']);
            }
        }

        return $productOptionValue;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->product_option_value->id = $this->getId();
        }
        if ($this->getIdAttributeGroup() !== null) {
            $xml->product_option_value->id_attribute_group = $this->getIdAttributeGroup();
        }
        if ($this->getColor() !== null) {
            $xml->product_option_value->color = $this->getColor();
        }
        $i = 0;
        foreach ($this->name as $languageId => $value) {
            $xml->product_option_value->name->language[$i] = $this->getName($languageId);
            if (!isset($xml->product_option_value->name->language[$i]['id'])) {
                $xml->product_option_value->name->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
