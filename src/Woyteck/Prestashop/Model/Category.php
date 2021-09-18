<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class Category implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idParent;

    /** @var int */
    private $levelDepth;

    /** @var int */
    private $nbProductsRecursive;

    /** @var bool */
    private $isActive;

    /** @var int */
    private $idShopDefault;

    /** @var bool */
    private $isRootCategory;

    /** @var int */
    private $position;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

    /** @var string */
    private $name;

    /** @var string */
    private $linkRewrite;

    /** @var string */
    private $description;

    /** @var string */
    private $metaTitle;

    /** @var string */
    private $metaDescription;

    /** @var array */
    private $metaKeywords;

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

    public function getIdParent(): ?int
    {
        return $this->idParent;
    }

    public function setIdParent(int $idParent): void
    {
        $this->idParent = $idParent;
    }

    public function getLevelDepth(): ?int
    {
        return $this->levelDepth;
    }

    public function setLevelDepth(int $levelDepth): void
    {
        $this->levelDepth = $levelDepth;
    }

    public function getNbProductsRecursive(): ?int
    {
        return $this->nbProductsRecursive;
    }

    public function setNbProductsRecursive(int $nbProductsRecursive): void
    {
        $this->nbProductsRecursive = $nbProductsRecursive;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getIdShopDefault(): ?int
    {
        return $this->idShopDefault;
    }

    public function setIdShopDefault(int $idShopDefault): void
    {
        $this->idShopDefault = $idShopDefault;
    }

    public function isRootCategory(): ?bool
    {
        return $this->isRootCategory;
    }

    public function setIsRootCategory(bool $isRootCategory): void
    {
        $this->isRootCategory = $isRootCategory;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLinkRewrite(): ?string
    {
        return $this->linkRewrite;
    }

    public function setLinkRewrite(string $linkRewrite): void
    {
        $this->linkRewrite = $linkRewrite;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(string $metaTitle): void
    {
        $this->metaTitle = $metaTitle;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    public function getMetaKeywords(): ?array
    {
        return $this->metaKeywords;
    }

    public function setMetaKeywords(array $metaKeywords): void
    {
        $this->metaKeywords = $metaKeywords;
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
        $category = new self;
        if (isset($array['id'])) {
            $category->setId((int) $array['id']);
        }
        if (isset($array['id_parent'])) {
            $category->setIdParent((int) $array['id_parent']);
        }
        if (isset($array['level_depth'])) {
            $category->setLevelDepth((int) $array['level_depth']);
        }
        if (isset($array['nb_products_recursive'])) {
            $category->setNbProductsRecursive((int) $array['nb_products_recursive']);
        }
        if (isset($array['active'])) {
            $category->setIsActive((int) $array['active'] === 1);
        }
        if (isset($array['id_shop_default'])) {
            $category->setIdShopDefault((int) $array['id_shop_default']);
        }
        if (isset($array['is_root_category'])) {
            $category->setIsRootCategory((int) $array['is_root_category'] === 1);
        }
        if (isset($array['position'])) {
            $category->setPosition((int) $array['position']);
        }
        if (isset($array['date_add'])) {
            $category->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd'])) {
            $category->setDateUpd(new DateTime($array['date_upd']));
        }
        if (isset($array['name'])) {
            $category->setName($array['name']);
        }
        if (isset($array['link_rewrite'])) {
            $category->setLinkRewrite($array['link_rewrite']);
        }
        if (isset($array['description'])) {
            $category->setDescription($array['description']);
        }
        if (isset($array['meta_title'])) {
            $category->setMetaTitle($array['meta_title']);
        }
        if (isset($array['meta_description'])) {
            $category->setMetaDescription($array['meta_description']);
        }
        if (isset($array['meta_keywords'])) {
            $category->setMetaKeywords(explode(',', $array['meta_keywords']));
        }
        if (isset($array['associations'])) {
            $category->setAssociations($array['associations']);
        }

        return $category;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->category->id = $this->getId();
        }
        if ($this->getIdParent() !== null) {
            $xml->category->id_parent = $this->getIdParent();
        }
        if ($this->isActive() !== null) {
            $xml->category->active = $this->isActive() ? '1' : '0';
        }
        if ($this->getIdShopDefault() !== null) {
            $xml->category->id_shop_default = $this->getIdShopDefault();
        }
        if ($this->isRootCategory() !== null) {
            $xml->category->is_root_category = $this->isRootCategory() ? '1' : '0';
        }
        if ($this->getPosition() !== null) {
            $xml->category->position = $this->getPosition();
        }
        if ($this->getName() !== null) {
            $xml->category->name->language = $this->getName();
        }
        if ($this->getLinkRewrite() !== null) {
            $xml->category->link_rewrite->language = $this->getLinkRewrite();
        }
        if ($this->getDescription() !== null) {
            $xml->category->description->language = $this->getDescription();
        }
        if ($this->getMetaTitle() !== null) {
            $xml->category->meta_title->language = $this->getMetaTitle();
        }
        if ($this->getMetaDescription() !== null) {
            $xml->category->meta_description->language = $this->getMetaDescription();
        }
        if ($this->getMetaKeywords() !== null) {
            $xml->category->meta_keywords->language = implode(',', $this->getMetaKeywords());
        }

        return $xml;
    }
}
