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

    /** @var string */
    private $name;

    /** @var string */
    private $publicName;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPublicName(): ?string
    {
        return $this->publicName;
    }

    public function setPublicName(string $publicName): void
    {
        $this->publicName = $publicName;
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
            $productOption->setName($array['name']);
        }
        if (isset($array['public_name'])) {
            $productOption->setPublicName($array['public_name']);
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
        if ($this->getName() !== null) {
            $xml->product_option->name->language = $this->getName();
        }
        if ($this->getPublicName() !== null) {
            $xml->product_option->public_name->language = $this->getPublicName();
        }

        return $xml;
    }
}
