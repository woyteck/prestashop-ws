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

    /** @var string[] */
    private $name = [];

    /** @var string[] */
    private $linkRewrite = [];

    /** @var string[] */
    private $description = [];

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

    public function getName(int $languageId = 1): ?string
    {
        return $this->name[$languageId] ?? null;
    }

    public function setName(string $name, int $languageId = 1): void
    {
        $this->name[$languageId] = $name;
    }

    public function getLinkRewrite(int $languageId = 1): ?string
    {
        return $this->linkRewrite[$languageId] ?? null;
    }

    public function setLinkRewrite(string $linkRewrite, int $languageId = 1): void
    {
        $this->linkRewrite[$languageId] = $linkRewrite;
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
            if (is_array($array['name'])) {
                foreach ($array['name'] as $name) {
                    $category->setName($name['value'], (int) $name['id']);
                }
            } else {
                $category->setName($array['name']);
            }
        }
        if (isset($array['link_rewrite'])) {
            if (is_array($array['link_rewrite'])) {
                foreach ($array['link_rewrite'] as $name) {
                    $category->setLinkRewrite($name['value'], (int) $name['id']);
                }
            } else {
                $category->setLinkRewrite($array['link_rewrite']);
            }
        }
        if (isset($array['description'])) {
            if (is_array($array['link_rewrite'])) {
                foreach ($array['link_rewrite'] as $name) {
                    $category->setDescription($name['value'], (int) $name['id']);
                }
            } else {
                $category->setDescription($array['link_rewrite']);
            }
        }
        if (isset($array['meta_title'])) {
            if (is_array($array['meta_title'])) {
                foreach ($array['meta_title'] as $name) {
                    $category->setMetaTitle($name['value'], (int) $name['id']);
                }
            } else {
                $category->setMetaTitle($array['meta_title']);
            }
        }
        if (isset($array['meta_description'])) {
            if (is_array($array['meta_description'])) {
                foreach ($array['meta_description'] as $name) {
                    $category->setMetaDescription($name['value'], (int) $name['id']);
                }
            } else {
                $category->setMetaDescription($array['meta_description']);
            }
        }
        if (isset($array['meta_keywords'])) {
            if (is_array($array['meta_keywords'])) {
                foreach ($array['meta_keywords'] as $name) {
                    $category->setMetaKeywords($name['value'], (int) $name['id']);
                }
            } else {
                $category->setMetaKeywords($array['meta_keywords']);
            }
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
        $i = 0;
        foreach ($this->name as $languageId => $value) {
            $xml->category->name->language[$i] = $this->getName($languageId);
            if (!isset($xml->category->name->language[$i]['id'])) {
                $xml->category->name->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->linkRewrite as $languageId => $value) {
            $xml->category->link_rewrite->language[$i] = $this->getLinkRewrite($languageId);
            if (!isset($xml->category->link_rewrite->language[$i]['id'])) {
                $xml->category->link_rewrite->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->description as $languageId => $value) {
            $xml->category->description->language[$i] = $this->getDescription($languageId);
            if (!isset($xml->category->description->language[$i]['id'])) {
                $xml->category->description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaTitle as $languageId => $value) {
            $xml->category->meta_title->language[$i] = $this->getMetaTitle($languageId);
            if (!isset($xml->category->meta_title->language[$i]['id'])) {
                $xml->category->meta_title->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaDescription as $languageId => $value) {
            $xml->category->meta_description->language[$i] = $this->getMetaDescription($languageId);
            if (!isset($xml->category->meta_description->language[$i]['id'])) {
                $xml->category->meta_description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaKeywords as $languageId => $value) {
            $xml->category->meta_keywords->language[$i] = $this->getMetaKeywords($languageId);
            if (!isset($xml->category->meta_keywords->language[$i]['id'])) {
                $xml->category->meta_keywords->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
