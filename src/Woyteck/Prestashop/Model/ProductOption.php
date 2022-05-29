<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class ProductOption implements ModelInterface
{
    public const GROUP_TYPE_SELECT = 'select';
    public const GROUP_TYPE_COLOR = 'color';

    /** @var int */
    private $id;

    /** @var int */
    private $isColorGroup;

    /** @var string */
    private $groupType;

    /** @var int */
    private $position;

    /** @var string[] */
    private $name = [];

    /** @var string[] */
    private $publicName = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIsColorGroup(): ?int
    {
        return $this->isColorGroup;
    }

    public function setIsColorGroup(int $isColorGroup): void
    {
        $this->isColorGroup = $isColorGroup;
    }

    public function getGroupType(): ?string
    {
        return $this->groupType;
    }

    public function setGroupType(string $groupType): void
    {
        $this->groupType = $groupType;
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

    public function getPublicName(int $languageId = 1): ?string
    {
        return $this->publicName[$languageId] ?? null;
    }

    public function setPublicName(string $publicName, int $languageId = 1): void
    {
        $this->publicName[$languageId] = $publicName;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     */
    public static function fromArray(array $array): ModelInterface
    {
        $productOption = new self;

        if (isset($array['id'])) {
            $productOption->setId((int) $array['id']);
        }
        if (isset($array['is_color_group'])) {
            $productOption->setIsColorGroup((int) $array['is_color_group']);
        }
        if (isset($array['group_type'])) {
            $productOption->setGroupType($array['group_type']);
        }
        if (isset($array['position'])) {
            $productOption->setPosition((int) $array['position']);
        }
        if (isset($array['name'])) {
            if (is_array($array['name'])) {
                foreach ($array['name'] as $name) {
                    $productOption->setName($name['value'], (int) $name['id']);
                }
            } else {
                $productOption->setName($array['name']);
            }
        }
        if (isset($array['public_name'])) {
            if (is_array($array['public_name'])) {
                foreach ($array['public_name'] as $name) {
                    $productOption->setPublicName($name['value'], (int) $name['id']);
                }
            } else {
                $productOption->setPublicName($array['public_name']);
            }
        }

        return $productOption;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->product_option->id = $this->getId();
        }
        if ($this->getIsColorGroup() !== null) {
            $xml->product_option->is_color_group = $this->getIsColorGroup();
        }
        if ($this->getGroupType() !== null) {
            $xml->product_option->group_type = $this->getGroupType();
        }
        if ($this->getPosition() !== null) {
            $xml->product_option->position = $this->getPosition();
        }
        $i = 0;
        foreach ($this->name as $languageId => $value) {
            $xml->product_option->name->language[$i] = $this->getName($languageId);
            if (!isset($xml->product_option->name->language[$i]['id'])) {
                $xml->product_option->name->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->publicName as $languageId => $value) {
            $xml->product_option->public_name->language[$i] = $this->getPublicName($languageId);
            if (!isset($xml->product_option->public_name->language[$i]['id'])) {
                $xml->product_option->public_name->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
