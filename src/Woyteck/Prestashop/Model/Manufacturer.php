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

    /** @var string */
    private $description;

    /** @var string */
    private $shortDescription;

    /** @var string */
    private $metaTitle;

    /** @var string */
    private $metaDescription;

    /** @var array */
    private $metaKeywords;

    /** @var array */
    private $associations;

    /**
     * @return int
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
     * @return bool
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
     * @return string
     */
    public function getLinkRewrite(): ?string
    {
        return $this->linkRewrite;
    }

    /**
     * @param string $linkRewrite
     */
    public function setLinkRewrite(string $linkRewrite): void
    {
        $this->linkRewrite = $linkRewrite;
    }

    /**
     * @return string
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
     * @return DateTime
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
     * @return DateTime
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
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return string
     */
    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    /**
     * @param string $metaTitle
     */
    public function setMetaTitle(string $metaTitle): void
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * @return string
     */
    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     */
    public function setMetaDescription(string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return array
     */
    public function getMetaKeywords(): ?array
    {
        return $this->metaKeywords;
    }

    /**
     * @param array $metaKeywords
     */
    public function setMetaKeywords(array $metaKeywords): void
    {
        $this->metaKeywords = $metaKeywords;
    }

    /**
     * @return array
     */
    public function getAssociations(): ?array
    {
        return $this->associations;
    }

    /**
     * @param array $associations
     */
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
            $model->setDescription($array['description']);
        }
        if (isset($array['meta_title'])) {
            $model->setMetaTitle($array['meta_title']);
        }
        if (isset($array['meta_description'])) {
            $model->setMetaDescription($array['meta_description']);
        }
        if (isset($array['meta_keywords'])) {
            $model->setMetaKeywords(explode(',', $array['meta_keywords']));
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
        if ($this->getDescription() !== null) {
            $xml->manufacturer->description->language = $this->getDescription();
        }
        if ($this->getShortDescription() !== null) {
            $xml->manufacturer->short_description->language = $this->getShortDescription();
        }
        if ($this->getMetaTitle() !== null) {
            $xml->manufacturer->meta_title->language = $this->getMetaTitle();
        }
        if ($this->getMetaDescription() !== null) {
            $xml->manufacturer->meta_description->language = $this->getMetaDescription();
        }
        if ($this->getMetaKeywords() !== null) {
            $xml->manufacturer->meta_keywords->language = implode(',', $this->getMetaKeywords());
        }

        return $xml;
    }
}
