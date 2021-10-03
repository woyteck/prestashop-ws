<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use SimpleXMLElement;
use stdClass;

class Supplier implements ModelInterface
{
    public const TYPE_AMOUNT = 'amount';
    public const TYPE_PERCENTAGE = 'percentage';

    /** @var int */
    private $id;

    /** @var string */
    private $linkRewrite;

    /** @var string */
    private $name;

    /** @var bool */
    private $active;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

    /** @var string */
    private $description;

    /** @var string */
    private $metaTitle;

    /** @var string */
    private $metaDescription;

    /** @var string */
    private $metaKeywords;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLinkRewrite(): ?string
    {
        return $this->linkRewrite;
    }

    /**
     * @param string $linkRewrite
     * @return self
     */
    public function setLinkRewrite(string $linkRewrite): self
    {
        $this->linkRewrite = $linkRewrite;
        return $this;
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
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
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
     * @return self
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
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
     * @return self
     */
    public function setDateAdd(DateTime $dateAdd): self
    {
        $this->dateAdd = $dateAdd;
        return $this;
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
     * @return self
     */
    public function setDateUpd(DateTime $dateUpd): self
    {
        $this->dateUpd = $dateUpd;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    /**
     * @param string $metaTitle
     * @return self
     */
    public function setMetaTitle(string $metaTitle): self
    {
        $this->metaTitle = $metaTitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     * @return self
     */
    public function setMetaDescription(string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaKeywords(): ?string
    {
        return $this->metaKeywords;
    }

    /**
     * @param string $metaKeywords
     * @return self
     */
    public function setMetaKeywords(string $metaKeywords): self
    {
        $this->metaKeywords = $metaKeywords;
        return $this;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     */
    public static function fromArray(array $array): ModelInterface
    {
        $supplier = new self;

        if (isset($array['id'])) {
            $supplier->setId((int) $array['id']);
        }
        if (isset($array['link_rewrite'])) {
            $supplier->setLinkRewrite($array['link_rewrite']);
        }
        if (isset($array['name'])) {
            $supplier->setName($array['name']);
        }
        if (isset($array['active'])) {
            $supplier->setActive($array['active']);
        }
        if (isset($array['date_add']) && $array['date_add'] !== '0000-00-00 00:00:00') {
            $supplier->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd']) && $array['date_upd'] !== '0000-00-00 00:00:00') {
            $supplier->setDateUpd(new DateTime($array['date_upd']));
        }
        if (isset($array['description'])) {
            $supplier->setDescription($array['description']);
        }
        if (isset($array['meta_title'])) {
            $supplier->setMetaTitle($array['meta_title']);
        }
        if (isset($array['meta_description'])) {
            $supplier->setMetaDescription($array['meta_description']);
        }
        if (isset($array['meta_keywords'])) {
            $supplier->setMetaKeywords($array['meta_keywords']);
        }

        return $supplier;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */
        if ($this->getId() !== null) {
            $xml->supplier->id = $this->getId();
        }
        if ($this->getLinkRewrite() !== null) {
            $xml->supplier->link_rewrite = $this->getLinkRewrite();
        }
        if ($this->getName() !== null) {
            $xml->supplier->name = $this->getName();
        }
        if ($this->isActive() !== null) {
            $xml->supplier->active = $this->isActive();
        }
        if ($this->getDateAdd() !== null) {
            $xml->supplier->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        } else {
            $xml->supplier->date_add = '0000-00-00 00:00:00';
        }
        if ($this->getDateUpd() !== null) {
            $xml->supplier->date_upd = $this->getDateUpd()->format('Y-m-d H:i:s');
        } else {
            $xml->supplier->date_upd = '0000-00-00 00:00:00';
        }
        if ($this->getDescription() !== null) {
            $xml->supplier->description = $this->getDescription();
        }
        if ($this->getMetaTitle() !== null) {
            $xml->supplier->meta_title = $this->getMetaTitle();
        }
        if ($this->getMetaDescription() !== null) {
            $xml->supplier->meta_description = $this->getMetaDescription();
        }
        if ($this->getMetaKeywords() !== null) {
            $xml->supplier->meta_keywords = $this->getMetaKeywords();
        }

        return $xml;
    }
}
