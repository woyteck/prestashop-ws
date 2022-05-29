<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class Manufacturer implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var bool */
    private $active;

    /** @var string */
    private $linkRewrite;

    /** @var string */
    private $name;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

    /** @var string[] */
    private $description = [];

    /** @var string[] */
    private $shortDescription = [];

    /** @var string[] */
    private $metaTitle = [];

    /** @var string[] */
    private $metaDescription = [];

    /** @var string[] */
    private $metaKeywords = [];

    /** @var array */
    private $associations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
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

    public function getShortDescription(int $languageId = 1): ?string
    {
        return $this->shortDescription[$languageId] ?? null;
    }

    public function setShortDescription(string $shortDescription, int $languageId = 1): void
    {
        $this->shortDescription[$languageId] = $shortDescription;
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

    public function getAssociations(): ?array
    {
        return $this->associations;
    }

    public function setAssociations(array $associations): void
    {
        $this->associations = $associations;
    }

    /**
     * @param array $array
     * @return self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $model = new self;

        if (isset($array['id'])) {
            $model->setId((int) $array['id']);
        }
        if (isset($array['active'])) {
            $model->setActive((int) $array['active'] === 1);
        }
        if (isset($array['link_rewrite'])) {
            $model->setLinkRewrite($array['link_rewrite']);
        }
        if (isset($array['name'])) {
            $model->setName($array['name']);
        }
        if (isset($array['date_add'])) {
            $model->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd'])) {
            $model->setDateUpd(new DateTime($array['date_upd']));
        }
        if (isset($array['description'])) {
            if (is_array($array['description'])) {
                foreach ($array['description'] as $name) {
                    $model->setDescription($name['value'], (int) $name['id']);
                }
            } else {
                $model->setDescription($array['description']);
            }
        }
        if (isset($array['meta_title'])) {
            if (is_array($array['meta_title'])) {
                foreach ($array['meta_title'] as $name) {
                    $model->setMetaTitle($name['value'], (int) $name['id']);
                }
            } else {
                $model->setMetaTitle($array['meta_title']);
            }
        }
        if (isset($array['meta_description'])) {
            if (is_array($array['meta_description'])) {
                foreach ($array['meta_description'] as $name) {
                    $model->setMetaDescription($name['value'], (int) $name['id']);
                }
            } else {
                $model->setMetaDescription($array['meta_description']);
            }
        }
        if (isset($array['meta_keywords'])) {
            if (is_array($array['meta_keywords'])) {
                foreach ($array['meta_keywords'] as $name) {
                    $model->setMetaKeywords($name['value'], (int) $name['id']);
                }
            } else {
                $model->setMetaKeywords($array['meta_keywords']);
            }
        }
        if (isset($array['associations'])) {
            $model->setAssociations($array['associations']);
        }

        return $model;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->manufacturer->id = $this->getId();
        }
        if ($this->isActive() !== null) {
            $xml->manufacturer->active = $this->isActive() ? '1' : '0';
        }
        if ($this->getName() !== null) {
            $xml->manufacturer->name = $this->getName();
        }
        $i = 0;
        foreach ($this->description as $languageId => $value) {
            $xml->manufacturer->description->language[$i] = $this->getDescription($languageId);
            if (!isset($xml->manufacturer->description->language[$i]['id'])) {
                $xml->manufacturer->description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->shortDescription as $languageId => $value) {
            $xml->manufacturer->short_description->language[$i] = $this->getShortDescription($languageId);
            if (!isset($xml->manufacturer->short_description->language[$i]['id'])) {
                $xml->manufacturer->short_description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaTitle as $languageId => $value) {
            $xml->manufacturer->meta_title->language[$i] = $this->getMetaTitle($languageId);
            if (!isset($xml->manufacturer->meta_title->language[$i]['id'])) {
                $xml->manufacturer->meta_title->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaDescription as $languageId => $value) {
            $xml->manufacturer->meta_description->language[$i] = $this->getMetaDescription($languageId);
            if (!isset($xml->manufacturer->meta_description->language[$i]['id'])) {
                $xml->manufacturer->meta_description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaKeywords as $languageId => $value) {
            $xml->manufacturer->meta_keywords->language[$i] = $this->getMetaKeywords($languageId);
            if (!isset($xml->manufacturer->meta_keywords->language[$i]['id'])) {
                $xml->manufacturer->meta_keywords->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
