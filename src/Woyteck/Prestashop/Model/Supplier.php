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

    /** @var string[] */
    private $description = [];

    /** @var string[] */
    private $metaTitle = [];

    /** @var string[] */
    private $metaDescription = [];

    /** @var string[] */
    private $metaKeywords = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLinkRewrite(): ?string
    {
        return $this->linkRewrite;
    }

    public function setLinkRewrite(string $linkRewrite): void
    {
        $this->linkRewrite = $linkRewrite;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getDateAdd(): ?DateTime
    {
        return $this->dateAdd;
    }

    public function setDateAdd(DateTime $dateAdd): void
    {
        $this->dateAdd = $dateAdd;
    }

    public function getDateUpd(): ?DateTime
    {
        return $this->dateUpd;
    }

    public function setDateUpd(DateTime $dateUpd): void
    {
        $this->dateUpd = $dateUpd;
    }

    public function getDescription(int $languageId = 1): ?string
    {
        return $this->description[$languageId] ?? null;
    }

    public function setDescription(string $description, int $languageId = 1): void
    {
        $this->description[$languageId] = $description;
    }

    public function getMetaTitle(int $languageId = 1): ?string
    {
        return $this->metaTitle[$languageId] ?? null;
    }

    public function setMetaTitle(string $metaTitle, int $languageId = 1): void
    {
        $this->metaTitle[$languageId] = $metaTitle;
    }

    public function getMetaDescription(int $languageId = 1): ?string
    {
        return $this->metaDescription[$languageId] ?? null;
    }

    public function setMetaDescription(string $metaDescription, int $languageId = 1): void
    {
        $this->metaDescription[$languageId] = $metaDescription;
    }

    public function getMetaKeywords(int $languageId = 1): ?string
    {
        return $this->metaKeywords[$languageId] ?? null;
    }

    public function setMetaKeywords(string $metaKeywords, int $languageId = 1): void
    {
        $this->metaKeywords[$languageId] = $metaKeywords;
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
            $supplier->setActive($array['active'] === '1');
        }
        if (isset($array['date_add']) && $array['date_add'] !== '0000-00-00 00:00:00') {
            $supplier->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd']) && $array['date_upd'] !== '0000-00-00 00:00:00') {
            $supplier->setDateUpd(new DateTime($array['date_upd']));
        }
        if (isset($array['description'])) {
            if (is_array($array['description'])) {
                foreach ($array['description'] as $name) {
                    $supplier->setDescription($name['value'], (int) $name['id']);
                }
            } else {
                $supplier->setDescription($array['description']);
            }
        }
        if (isset($array['meta_title'])) {
            if (is_array($array['meta_title'])) {
                foreach ($array['meta_title'] as $name) {
                    $supplier->setMetaTitle($name['value'], (int) $name['id']);
                }
            } else {
                $supplier->setMetaTitle($array['meta_title']);
            }
        }
        if (isset($array['meta_description'])) {
            if (is_array($array['meta_description'])) {
                foreach ($array['meta_description'] as $name) {
                    $supplier->setMetaDescription($name['value'], (int) $name['id']);
                }
            } else {
                $supplier->setMetaDescription($array['meta_description']);
            }
        }
        if (isset($array['meta_keywords'])) {
            if (is_array($array['meta_keywords'])) {
                foreach ($array['meta_keywords'] as $name) {
                    $supplier->setMetaKeywords($name['value'], (int) $name['id']);
                }
            } else {
                $supplier->setMetaKeywords($array['meta_keywords']);
            }
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
        $i = 0;
        foreach ($this->description as $languageId => $value) {
            $xml->supplier->description->language[$i] = $this->getDescription($languageId);
            if (!isset($xml->supplier->description->language[$i]['id'])) {
                $xml->supplier->description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaTitle as $languageId => $value) {
            $xml->supplier->meta_title->language[$i] = $this->getMetaTitle($languageId);
            if (!isset($xml->supplier->meta_title->language[$i]['id'])) {
                $xml->supplier->meta_title->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaDescription as $languageId => $value) {
            $xml->supplier->meta_description->language[$i] = $this->getMetaDescription($languageId);
            if (!isset($xml->supplier->meta_description->language[$i]['id'])) {
                $xml->supplier->meta_description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaKeywords as $languageId => $value) {
            $xml->supplier->meta_keywords->language[$i] = $this->getMetaKeywords($languageId);
            if (!isset($xml->supplier->meta_keywords->language[$i]['id'])) {
                $xml->supplier->meta_keywords->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
