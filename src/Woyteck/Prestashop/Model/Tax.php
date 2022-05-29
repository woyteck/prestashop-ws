<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class Tax implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $rate;

    /** @var bool */
    private $active;

    /** @var bool */
    private $deleted;

    /** @var string[] */
    private $name = [];

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
    public function getRate(): ?int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return bool|null
     */
    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
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
        $tax = new self;

        if (isset($array['id'])) {
            $tax->setId((int) $array['id']);
        }
        if (isset($array['rate'])) {
            $tax->setRate((int) $array['rate']);
        }
        if (isset($array['active'])) {
            $tax->setActive($array['active'] === '1');
        }
        if (isset($array['deleted'])) {
            $tax->setDeleted($array['deleted'] === '1');
        }
        if (isset($array['name'])) {
            if (is_array($array['name'])) {
                foreach ($array['name'] as $name) {
                    $tax->setName($name['value'], (int) $name['id']);
                }
            } else {
                $tax->setName($array['name']);
            }
        }

        return $tax;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->tax->id = $this->getId();
        }
        if ($this->getRate() !== null) {
            $xml->tax->rate = $this->getRate();
        }
        if ($this->isActive() !== null) {
            $xml->tax->active = $this->isActive() ? '1' : '0';
        }
        if ($this->isDeleted() !== null) {
            $xml->tax->deleted = $this->isDeleted() ? '1' : '0';
        }
        $i = 0;
        foreach ($this->name as $languageId => $value) {
            $xml->tax->name->language[$i] = $this->getName($languageId);
            if (!isset($xml->tax->name->language[$i]['id'])) {
                $xml->tax->name->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
