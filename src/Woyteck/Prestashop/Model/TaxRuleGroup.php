<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class TaxRuleGroup implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var bool */
    private $active;

    /** @var bool */
    private $deleted;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

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

    /**
     * @return DateTime|null
     */
    public function getDateAdd(): ?DateTime
    {
        return $this->dateAdd;
    }

    /**
     * @param DateTime $dateAdd
     */
    public function setDateAdd(DateTime $dateAdd): void
    {
        $this->dateAdd = $dateAdd;
    }

    /**
     * @return DateTime|null
     */
    public function getDateUpd(): ?DateTime
    {
        return $this->dateUpd;
    }

    /**
     * @param DateTime $dateUpd
     */
    public function setDateUpd(DateTime $dateUpd): void
    {
        $this->dateUpd = $dateUpd;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $taxRuleGroup = new self;

        if (isset($array['id'])) {
            $taxRuleGroup->setId((int) $array['id']);
        }
        if (isset($array['name'])) {
            $taxRuleGroup->setName($array['name']);
        }
        if (isset($array['active'])) {
            $taxRuleGroup->setActive($array['active'] === '1');
        }
        if (isset($array['deleted'])) {
            $taxRuleGroup->setDeleted($array['deleted'] === '1');
        }
        if (isset($array['date_add']) && $array['date_add'] !== '') {
            $taxRuleGroup->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd']) && $array['date_upd'] !== '') {
            $taxRuleGroup->setDateUpd(new DateTime($array['date_upd']));
        }

        return $taxRuleGroup;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->tax_rule_group->id = $this->getId();
        }
        if ($this->getName() !== null) {
            $xml->tax_rule_group->name = $this->getName();
        }
        if ($this->isActive() !== null) {
            $xml->tax_rule_group->active = $this->isActive() ? '1' : '0';
        }
        if ($this->isDeleted() !== null) {
            $xml->tax_rule_group->deleted = $this->isDeleted() ? '1' : '0';
        }
        if ($this->getDateAdd() !== null) {
            $xml->tax_rule_group->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        }
        if ($this->getDateUpd() !== null) {
            $xml->tax_rule_group->date_upd = $this->getDateUpd()->format('Y-m-d H:i:s');
        }

        return $xml;
    }
}
