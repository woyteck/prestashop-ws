<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class Product implements ModelInterface
{
    public const TYPE_SIMPLE = 'simple';

    public const CONDITION_NEW = 'new';
    public const CONDITION_USED = 'used';
    public const CONDITION_REFUBRISHED = 'refurbished';

    public const REDIRECT_TYPE_NONE = '';
    public const REDIRECT_TYPE_404 = '404';
    public const REDIRECT_TYPE_301_PRODUCT = '301-product';
    public const REDIRECT_TYPE_302_PRODUCT = '302-product';
    public const REDIRECT_TYPE_301_CATEGORY = '301-category';
    public const REDIRECT_TYPE_302_CATEGORY = '302-category';

    public const VISIBILITY_BOTH = 'both';
    public const VISIBILITY_CATALOG = 'catalog';
    public const VISIBILITY_SEARCH = 'search';
    public const VISIBILITY_NONE = 'none';

    /** @var int */
    private $id;

    /** @var int */
    private $idManufacturer;

    /** @var int */
    private $idSupplier;

    /** @var int */
    private $idCategoryDefault;

    /** @var int */
    private $new;

    /** @var int */
    private $cacheDefaultAttribute;

    /** @var int */
    private $idDefaultImage;

    /** @var int */
    private $idDefaultCombination;

    /** @var int */
    private $idTaxRulesGroup;

    /** @var int */
    private $positionInCategory;

    /** @var string */
    private $manufacturerName;

    /** @var int */
    private $quantity;

    /** @var string */
    private $type;

    /** @var int */
    private $idShopDefault;

    /** @var string */
    private $reference;

    /** @var string */
    private $supplierReference;

    /** @var string */
    private $location;

    /** @var float */
    private $width;

    /** @var float */
    private $height;

    /** @var float */
    private $depth;

    /** @var float */
    private $weight;

    /** @var bool */
    private $quantityDiscount;

    /** @var string */
    private $ean13;

    /** @var string */
    private $isbn;

    /** @var string */
    private $upc;

    /** @var bool */
    private $cacheIsPack;

    /** @var bool */
    private $cacheHasAttachments;

    /** @var bool */
    private $isVirtual;

    /** @var bool */
    private $state;

    /** @var bool */
    private $additionalDeliveryTimes;

    /** @var string[] */
    private $deliveryInStock = [];

    /** @var string[] */
    private $deliveryOutStock = [];

    /** @var bool */
    private $onSale;

    /** @var bool */
    private $onlineOnly;

    /** @var float */
    private $ecotax;

    /** @var int */
    private $minimalQuantity;

    /** @var int */
    private $lowStockThreshold;

    /** @var bool */
    private $lowStockAlert;

    /** @var float */
    private $price;

    /** @var float */
    private $wholesalePrice;

    /** @var string */
    private $unity;

    /** @var float */
    private $unitPriceRatio;

    /** @var float */
    private $additionalShippingCost;

    /** @var bool */
    private $customizable;

    /** @var bool */
    private $textFields;

    /** @var bool */
    private $uploadableFiles;

    /** @var bool */
    private $active;

    /** @var string */
    private $redirectType;

    /** @var int */
    private $idTypeRedirected;

    /** @var bool */
    private $availableForOrder;

    /** @var DateTime */
    private $availableDate;

    /** @var bool */
    private $showCondition;

    /** @var string */
    private $condition;

    /** @var bool */
    private $showPrice;

    /** @var bool */
    private $indexed;

    /** @var string */
    private $visibility;

    /** @var bool */
    private $advancedStockManagement;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

    /** @var int */
    private $packStockType;

    /** @var string[] */
    private $metaDescription = [];

    /** @var string[] */
    private $metaKeywords = [];

    /** @var string[] */
    private $metaTitle = [];

    /** @var string[] */
    private $linkRewrite = [];

    /** @var string[] */
    private $name = [];

    /** @var string[] */
    private $description = [];

    /** @var string[] */
    private $descriptionShort = [];

    /** @var string[] */
    private $availableNow = [];

    /** @var string[] */
    private $availableLater = [];

    /** @var array */
    private $associations;

    /** @var int */
    private $idLatestIssue;

    /** @var string */
    private $additionalMessage;

    /** @var string */
    private $availability;

    /** @var int */
    private $isAvailable;

    /** @var int */
    private $gmc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdManufacturer(): ?int
    {
        return $this->idManufacturer;
    }

    public function setIdManufacturer(int $idManufacturer): void
    {
        $this->idManufacturer = $idManufacturer;
    }

    public function getIdSupplier(): ?int
    {
        return $this->idSupplier;
    }

    public function setIdSupplier(int $idSupplier): void
    {
        $this->idSupplier = $idSupplier;
    }

    public function getIdCategoryDefault(): ?int
    {
        return $this->idCategoryDefault;
    }

    public function setIdCategoryDefault(int $idCategoryDefault): void
    {
        $this->idCategoryDefault = $idCategoryDefault;
    }

    public function getNew(): ?int
    {
        return $this->new;
    }

    public function setNew(int $new): void
    {
        $this->new = $new;
    }

    public function getCacheDefaultAttribute(): ?int
    {
        return $this->cacheDefaultAttribute;
    }

    public function setCacheDefaultAttribute(int $cacheDefaultAttribute): void
    {
        $this->cacheDefaultAttribute = $cacheDefaultAttribute;
    }

    public function getIdDefaultImage(): ?int
    {
        return $this->idDefaultImage;
    }

    public function setIdDefaultImage(int $idDefaultImage): void
    {
        $this->idDefaultImage = $idDefaultImage;
    }

    public function getIdDefaultCombination(): ?int
    {
        return $this->idDefaultCombination;
    }

    public function setIdDefaultCombination(int $idDefaultCombination): void
    {
        $this->idDefaultCombination = $idDefaultCombination;
    }

    public function getIdTaxRulesGroup(): ?int
    {
        return $this->idTaxRulesGroup;
    }

    public function setIdTaxRulesGroup(int $idTaxRulesGroup): void
    {
        $this->idTaxRulesGroup = $idTaxRulesGroup;
    }

    public function getPositionInCategory(): ?int
    {
        return $this->positionInCategory;
    }

    public function setPositionInCategory(int $positionInCategory): void
    {
        $this->positionInCategory = $positionInCategory;
    }

    public function getManufacturerName(): ?string
    {
        return $this->manufacturerName;
    }

    public function setManufacturerName(string $manufacturerName): void
    {
        $this->manufacturerName = $manufacturerName;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getIdShopDefault(): ?int
    {
        return $this->idShopDefault;
    }

    public function setIdShopDefault(int $idShopDefault): void
    {
        $this->idShopDefault = $idShopDefault;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getSupplierReference(): ?string
    {
        return $this->supplierReference;
    }

    public function setSupplierReference(string $supplierReference): void
    {
        $this->supplierReference = $supplierReference;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getDepth(): ?float
    {
        return $this->depth;
    }

    public function setDepth(float $depth): void
    {
        $this->depth = $depth;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    public function isQuantityDiscount(): ?bool
    {
        return $this->quantityDiscount;
    }

    public function setQuantityDiscount(bool $quantityDiscount): void
    {
        $this->quantityDiscount = $quantityDiscount;
    }

    public function getEan13(): ?string
    {
        return $this->ean13;
    }

    public function setEan13(string $ean13): void
    {
        $this->ean13 = $ean13;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getUpc(): ?string
    {
        return $this->upc;
    }

    public function setUpc(string $upc): void
    {
        $this->upc = $upc;
    }

    public function isCacheIsPack(): ?bool
    {
        return $this->cacheIsPack;
    }

    public function setCacheIsPack(bool $cacheIsPack): void
    {
        $this->cacheIsPack = $cacheIsPack;
    }

    public function isCacheHasAttachments(): ?bool
    {
        return $this->cacheHasAttachments;
    }

    public function setCacheHasAttachments(bool $cacheHasAttachments): void
    {
        $this->cacheHasAttachments = $cacheHasAttachments;
    }

    public function isVirtual(): ?bool
    {
        return $this->isVirtual;
    }

    public function setIsVirtual(bool $isVirtual): void
    {
        $this->isVirtual = $isVirtual;
    }

    public function isState(): ?bool
    {
        return $this->state;
    }

    public function setState(bool $state): void
    {
        $this->state = $state;
    }

    public function isAdditionalDeliveryTimes(): ?bool
    {
        return $this->additionalDeliveryTimes;
    }

    public function setAdditionalDeliveryTimes(bool $additionalDeliveryTimes): void
    {
        $this->additionalDeliveryTimes = $additionalDeliveryTimes;
    }

    public function getDeliveryInStock(int $languageId = 1): ?string
    {
        return $this->deliveryInStock[$languageId] ?? null;
    }

    public function setDeliveryInStock(string $deliveryInStock, int $languageId = 1): void
    {
        $this->deliveryInStock[$languageId] = $deliveryInStock;
    }

    public function getDeliveryOutStock(int $languageId = 1): ?string
    {
        return $this->deliveryOutStock[$languageId] ?? null;
    }

    public function setDeliveryOutStock(string $deliveryOutStock, int $languageId = 1): void
    {
        $this->deliveryOutStock[$languageId] = $deliveryOutStock;
    }

    public function isOnSale(): ?bool
    {
        return $this->onSale;
    }

    public function setOnSale(bool $onSale): void
    {
        $this->onSale = $onSale;
    }

    public function isOnlineOnly(): ?bool
    {
        return $this->onlineOnly;
    }

    public function setOnlineOnly(bool $onlineOnly): void
    {
        $this->onlineOnly = $onlineOnly;
    }

    public function getEcotax(): ?float
    {
        return $this->ecotax;
    }

    public function setEcotax(float $ecotax): void
    {
        $this->ecotax = $ecotax;
    }

    public function getMinimalQuantity(): ?int
    {
        return $this->minimalQuantity;
    }

    public function setMinimalQuantity(int $minimalQuantity): void
    {
        $this->minimalQuantity = $minimalQuantity;
    }

    public function getLowStockThreshold(): ?int
    {
        return $this->lowStockThreshold;
    }

    public function setLowStockThreshold(int $lowStockThreshold): void
    {
        $this->lowStockThreshold = $lowStockThreshold;
    }

    public function isLowStockAlert(): ?bool
    {
        return $this->lowStockAlert;
    }

    public function setLowStockAlert(bool $lowStockAlert): void
    {
        $this->lowStockAlert = $lowStockAlert;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getWholesalePrice(): ?float
    {
        return $this->wholesalePrice;
    }

    public function setWholesalePrice(float $wholesalePrice): void
    {
        $this->wholesalePrice = $wholesalePrice;
    }

    public function getUnity(): ?string
    {
        return $this->unity;
    }

    public function setUnity(string $unity): void
    {
        $this->unity = $unity;
    }

    public function getUnitPriceRatio(): ?float
    {
        return $this->unitPriceRatio;
    }

    public function setUnitPriceRatio(float $unitPriceRatio): void
    {
        $this->unitPriceRatio = $unitPriceRatio;
    }

    public function getAdditionalShippingCost(): ?float
    {
        return $this->additionalShippingCost;
    }

    public function setAdditionalShippingCost(float $additionalShippingCost): void
    {
        $this->additionalShippingCost = $additionalShippingCost;
    }

    public function isCustomizable(): ?bool
    {
        return $this->customizable;
    }

    public function setCustomizable(bool $customizable): void
    {
        $this->customizable = $customizable;
    }

    public function isTextFields(): ?bool
    {
        return $this->textFields;
    }

    public function setTextFields(bool $textFields): void
    {
        $this->textFields = $textFields;
    }

    public function isUploadableFiles(): ?bool
    {
        return $this->uploadableFiles;
    }

    public function setUploadableFiles(bool $uploadableFiles): void
    {
        $this->uploadableFiles = $uploadableFiles;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getRedirectType(): ?string
    {
        return $this->redirectType;
    }

    public function setRedirectType(string $redirectType): void
    {
        $this->redirectType = $redirectType;
    }

    public function getIdTypeRedirected(): ?int
    {
        return $this->idTypeRedirected;
    }

    public function setIdTypeRedirected(int $idTypeRedirected): void
    {
        $this->idTypeRedirected = $idTypeRedirected;
    }

    public function isAvailableForOrder(): ?bool
    {
        return $this->availableForOrder;
    }

    public function setAvailableForOrder(bool $availableForOrder): void
    {
        $this->availableForOrder = $availableForOrder;
    }

    public function getAvailableDate(): ?DateTime
    {
        return $this->availableDate;
    }

    public function setAvailableDate(DateTime $availableDate): void
    {
        $this->availableDate = $availableDate;
    }

    public function isShowCondition(): ?bool
    {
        return $this->showCondition;
    }

    public function setShowCondition(bool $showCondition): void
    {
        $this->showCondition = $showCondition;
    }

    public function getCondition(): ?string
    {
        return $this->condition;
    }

    public function setCondition(string $condition): void
    {
        $this->condition = $condition;
    }

    public function isShowPrice(): ?bool
    {
        return $this->showPrice;
    }

    public function setShowPrice(bool $showPrice): void
    {
        $this->showPrice = $showPrice;
    }

    public function isIndexed(): ?bool
    {
        return $this->indexed;
    }

    public function setIndexed(bool $indexed): void
    {
        $this->indexed = $indexed;
    }

    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    public function setVisibility(string $visibility): void
    {
        $this->visibility = $visibility;
    }

    public function isAdvancedStockManagement(): ?bool
    {
        return $this->advancedStockManagement;
    }

    public function setAdvancedStockManagement(bool $advancedStockManagement): void
    {
        $this->advancedStockManagement = $advancedStockManagement;
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

    public function getPackStockType(): ?int
    {
        return $this->packStockType;
    }

    public function setPackStockType(int $packStockType): void
    {
        $this->packStockType = $packStockType;
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

    public function getMetaTitle(int $languageId = 1): ?string
    {
        return $this->metaTitle[$languageId] ?? null;
    }

    public function setMetaTitle(string $metaTitle, int $languageId = 1): void
    {
        $this->metaTitle[$languageId] = $metaTitle;
    }

    public function getLinkRewrite(int $languageId = 1): ?string
    {
        return $this->linkRewrite[$languageId] ?? null;
    }

    public function setLinkRewrite(string $linkRewrite, int $languageId = 1): void
    {
        $this->linkRewrite[$languageId] = $linkRewrite;
    }

    public function getName(int $languageId = 1): ?string
    {
        return $this->name[$languageId] ?? null;
    }

    public function setName(string $name, int $languageId = 1): void
    {
        $this->name[$languageId] = $name;
    }

    public function getDescription(int $languageId = 1): ?string
    {
        return $this->description[$languageId] ?? null;
    }

    public function setDescription(string $description, int $languageId = 1): void
    {
        $this->description[$languageId] = $description;
    }

    public function getDescriptionShort(int $languageId = 1): ?string
    {
        return $this->descriptionShort[$languageId] ?? null;
    }

    public function setDescriptionShort(string $descriptionShort, int $languageId = 1): void
    {
        $this->descriptionShort[$languageId] = $descriptionShort;
    }

    public function getAvailableNow(int $languageId = 1): ?string
    {
        return $this->availableNow[$languageId] ?? null;
    }

    public function setAvailableNow(string $availableNow, int $languageId = 1): void
    {
        $this->availableNow[$languageId] = $availableNow;
    }

    public function getAvailableLater(int $languageId = 1): ?string
    {
        return $this->availableLater[$languageId] ?? null;
    }

    public function setAvailableLater(string $availableLater, int $languageId = 1): void
    {
        $this->availableLater[$languageId] = $availableLater;
    }

    public function getAssociations(): ?array
    {
        return $this->associations;
    }

    public function setAssociations(array $associations): void
    {
        $this->associations = $associations;
    }

    public function getIdLatestIssue(): ?int
    {
        return $this->idLatestIssue;
    }

    public function setIdLatestIssue(int $idLatestIssue): void
    {
        $this->idLatestIssue = $idLatestIssue;
    }

    public function getAdditionalMessage(): ?string
    {
        return $this->additionalMessage;
    }

    public function setAdditionalMessage(string $additionalMessage): void
    {
        $this->additionalMessage = $additionalMessage;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(string $availability): void
    {
        $this->availability = $availability;
    }

    public function getGmc(): ?int
    {
        return $this->gmc;
    }

    public function setGmc(int $gmc): void
    {
        $this->gmc = $gmc;
    }

    public function getIsAvailable(): ?int
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(int $isAvailable): void
    {
        $this->isAvailable = $isAvailable;
    }

    /**
     * @param array $array
     * @return self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $product = new self;

        if (isset($array['id'])) {
            $product->setId((int) $array['id']);
        }
        if (isset($array['id_manufacturer'])) {
            $product->setIdManufacturer((int) $array['id_manufacturer']);
        }
        if (isset($array['id_supplier'])) {
            $product->setIdSupplier((int) $array['id_supplier']);
        }
        if (isset($array['id_category_default'])) {
            $product->setIdCategoryDefault((int) $array['id_category_default']);
        }
        if (isset($array['new'])) {
            $product->setNew((int) $array['new']);
        }
        if (isset($array['cache_default_attribute'])) {
            $product->setCacheDefaultAttribute((int) $array['cache_default_attribute']);
        }
        if (isset($array['id_default_image'])) {
            $product->setIdDefaultImage((int) $array['id_default_image']);
        }
        if (isset($array['id_default_combination'])) {
            $product->setIdDefaultCombination((int) $array['id_default_combination']);
        }
        if (isset($array['id_tax_rules_group'])) {
            $product->setIdTaxRulesGroup((int) $array['id_tax_rules_group']);
        }
        if (isset($array['position_in_category'])) {
            $product->setPositionInCategory((int) $array['position_in_category']);
        }
        if (isset($array['manufacturer_name']) && is_string($array['manufacturer_name'])) {
            $product->setManufacturerName($array['manufacturer_name']);
        }
        if (isset($array['quantity'])) {
            $product->setQuantity((int) $array['quantity']);
        }
        if (isset($array['type'])) {
            $product->setType($array['type']);
        }
        if (isset($array['id_shop_default'])) {
            $product->setIdShopDefault((int) $array['id_shop_default']);
        }
        if (isset($array['reference'])) {
            $product->setReference($array['reference']);
        }
        if (isset($array['supplier_reference'])) {
            $product->setSupplierReference($array['supplier_reference']);
        }
        if (isset($array['location'])) {
            $product->setLocation($array['location']);
        }
        if (isset($array['width'])) {
            $product->setWidth((float) $array['width']);
        }
        if (isset($array['height'])) {
            $product->setHeight((float) $array['height']);
        }
        if (isset($array['depth'])) {
            $product->setDepth((float) $array['depth']);
        }
        if (isset($array['weight'])) {
            $product->setWeight((float) $array['weight']);
        }
        if (isset($array['quantity_discount'])) {
            $product->setQuantityDiscount((int) $array['quantity_discount'] === 1);
        }
        if (isset($array['ean13'])) {
            $product->setEan13($array['ean13']);
        }
        if (isset($array['isbn'])) {
            $product->setIsbn($array['isbn']);
        }
        if (isset($array['upc'])) {
            $product->setUpc($array['upc']);
        }
        if (isset($array['cache_is_pack'])) {
            $product->setCacheIsPack((int) $array['cache_is_pack'] === 1);
        }
        if (isset($array['cache_has_attachments'])) {
            $product->setCacheHasAttachments((int) $array['cache_has_attachments'] === 1);
        }
        if (isset($array['is_virtual'])) {
            $product->setIsVirtual((int) $array['is_virtual'] === 1);
        }
        if (isset($array['state'])) {
            $product->setState((int) $array['state'] === 1);
        }
        if (isset($array['additional_delivery_times'])) {
            $product->setAdditionalDeliveryTimes((int) $array['additional_delivery_times'] === 1);
        }
        if (isset($array['delivery_in_stock'])) {
            if (is_array($array['delivery_in_stock'])) {
                foreach ($array['delivery_in_stock'] as $item) {
                    $product->setDeliveryInStock($item['value'], (int) $item['id']);
                }
            } else {
                $product->setDeliveryInStock($array['delivery_in_stock']);
            }
        }
        if (isset($array['delivery_out_stock'])) {
            if (is_array($array['delivery_out_stock'])) {
                foreach ($array['delivery_out_stock'] as $item) {
                    $product->setDeliveryOutStock($item['value'], (int) $item['id']);
                }
            } else {
                $product->setDeliveryOutStock($array['delivery_out_stock']);
            }
        }
        if (isset($array['on_sale'])) {
            $product->setOnSale((int) $array['on_sale'] === 1);
        }
        if (isset($array['online_only'])) {
            $product->setOnlineOnly((int) $array['online_only'] === 1);
        }
        if (isset($array['ecotax'])) {
            $product->setEcotax((float) $array['ecotax']);
        }
        if (isset($array['minimal_quantity'])) {
            $product->setMinimalQuantity((int) $array['minimal_quantity']);
        }
        if (isset($array['low_stock_threshold'])) {
            $product->setLowStockThreshold((int) $array['low_stock_threshold']);
        }
        if (isset($array['low_stock_alert'])) {
            $product->setLowStockAlert((int) $array['low_stock_alert'] === 1);
        }
        if (isset($array['price'])) {
            $product->setPrice((float) $array['price']);
        }
        if (isset($array['wholesale_price'])) {
            $product->setWholesalePrice((float) $array['wholesale_price']);
        }
        if (isset($array['unity'])) {
            $product->setUnity($array['unity']);
        }
        if (isset($array['unit_price_ratio'])) {
            $product->setUnitPriceRatio((float) $array['unit_price_ratio']);
        }
        if (isset($array['additional_shipping_cost'])) {
            $product->setAdditionalShippingCost((float) $array['additional_shipping_cost']);
        }
        if (isset($array['customizable'])) {
            $product->setCustomizable((int) $array['customizable'] === 1);
        }
        if (isset($array['text_fields'])) {
            $product->setTextFields((int) $array['text_fields'] === 1);
        }
        if (isset($array['uploadable_files'])) {
            $product->setUploadableFiles((int) $array['uploadable_files'] === 1);
        }
        if (isset($array['active'])) {
            $product->setActive((int) $array['active'] === 1);
        }
        if (isset($array['redirect_type'])) {
            $product->setRedirectType($array['redirect_type']);
        }
        if (isset($array['id_type_redirected'])) {
            $product->setIdTypeRedirected((int) $array['id_type_redirected']);
        }
        if (isset($array['available_for_order'])) {
            $product->setAvailableForOrder((int) $array['available_for_order'] === 1);
        }
        if (isset($array['available_date']) && $array['available_date'] !== '0000-00-00') {
            $product->setAvailableDate(new DateTime($array['available_date']));
        }
        if (isset($array['show_condition'])) {
            $product->setShowCondition((int) $array['show_condition'] === 1);
        }
        if (isset($array['condition'])) {
            $product->setCondition($array['condition']);
        }
        if (isset($array['show_price'])) {
            $product->setShowPrice((int) $array['show_price'] === 1);
        }
        if (isset($array['indexed'])) {
            $product->setIndexed((int) $array['indexed'] === 1);
        }
        if (isset($array['visibility'])) {
            $product->setVisibility($array['visibility']);
        }
        if (isset($array['advanced_stock_management'])) {
            $product->setAdvancedStockManagement((int) $array['advanced_stock_management'] === 1);
        }
        if (isset($array['date_add']) && $array['date_add'] !== '0000-00-00') {
            $product->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd']) && $array['date_upd'] !== '0000-00-00') {
            $product->setDateUpd(new DateTime($array['date_upd']));
        }
        if (isset($array['pack_stock_type'])) {
            $product->setPackStockType((int) $array['pack_stock_type']);
        }
        if (isset($array['meta_description'])) {
            if (is_array($array['meta_description'])) {
                foreach ($array['meta_description'] as $item) {
                    $product->setMetaDescription($item['value'], (int) $item['id']);
                }
            } else {
                $product->setMetaDescription($array['meta_description']);
            }
        }
        if (isset($array['meta_keywords'])) {
            if (is_array($array['meta_keywords'])) {
                foreach ($array['meta_keywords'] as $item) {
                    $product->setMetaKeywords($item['value'], (int) $item['id']);
                }
            } else {
                $product->setMetaKeywords($array['meta_keywords']);
            }
        }
        if (isset($array['meta_title'])) {
            if (is_array($array['meta_title'])) {
                foreach ($array['meta_title'] as $item) {
                    $product->setMetaTitle($item['value'], (int) $item['id']);
                }
            } else {
                $product->setMetaTitle($array['meta_title']);
            }
        }
        if (isset($array['link_rewrite'])) {
            if (is_array($array['link_rewrite'])) {
                foreach ($array['link_rewrite'] as $item) {
                    $product->setLinkRewrite($item['value'], (int) $item['id']);
                }
            } else {
                $product->setLinkRewrite($array['link_rewrite']);
            }
        }
        if (isset($array['name'])) {
            if (is_array($array['name'])) {
                foreach ($array['name'] as $item) {
                    $product->setName($item['value'], (int) $item['id']);
                }
            } else {
                $product->setName($array['name']);
            }
        }
        if (isset($array['description'])) {
            if (is_array($array['description'])) {
                foreach ($array['description'] as $item) {
                    $product->setDescription($item['value'], (int) $item['id']);
                }
            } else {
                $product->setDescription($array['description']);
            }
        }
        if (isset($array['description_short'])) {
            if (is_array($array['description_short'])) {
                foreach ($array['description_short'] as $item) {
                    $product->setDescriptionShort($item['value'], (int) $item['id']);
                }
            } else {
                $product->setDescriptionShort($array['description_short']);
            }
        }
        if (isset($array['available_now'])) {
            if (is_array($array['available_now'])) {
                foreach ($array['available_now'] as $item) {
                    $product->setAvailableNow($item['value'], (int) $item['id']);
                }
            } else {
                $product->setAvailableNow($array['available_now']);
            }
        }
        if (isset($array['available_later'])) {
            if (is_array($array['available_later'])) {
                foreach ($array['available_later'] as $item) {
                    $product->setAvailableLater($item['value'], (int) $item['id']);
                }
            } else {
                $product->setAvailableLater($array['available_later']);
            }
        }
        if (isset($array['associations'])) {
            $product->setAssociations($array['associations']);
        }
        if (isset($array['id_latest_issue'])) {
            $product->setIdLatestIssue((int) $array['id_latest_issue']);
        }
        if (isset($array['additional_message'])) {
            $product->setAdditionalMessage($array['additional_message']);
        }
        if (isset($array['availability'])) {
            $product->setAvailability($array['availability']);
        }
        if (isset($array['gmc'])) {
            $product->setGmc((int) $array['gmc']);
        }
        if (isset($array['is_available'])) {
            $product->setIsAvailable((int) $array['is_available']);
        }

        return $product;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */

        unset($xml->product->position_in_category);

        if (isset($xml->combination->associations)) {
            unset($xml->product->associations);
//            $xml->product->addChild('associations');
        }

        if ($this->getId() !== null) {
            $xml->product->id = $this->getId();
        }
        if ($this->getIdManufacturer() !== null) {
            $xml->product->id_manufacturer = $this->getIdManufacturer();
        }
        if ($this->getIdSupplier() !== null) {
            $xml->product->id_supplier = $this->getIdSupplier();
        }
        if ($this->getIdCategoryDefault() !== null) {
            $xml->product->id_category_default = $this->getIdCategoryDefault();
        }
        if ($this->getNew() !== null) {
            $xml->product->new = $this->getNew();
        }
        if ($this->getCacheDefaultAttribute() !== null) {
            $xml->product->cache_default_attribute = $this->getCacheDefaultAttribute();
        }
        if ($this->getIdDefaultImage() !== null) {
            $xml->product->id_default_image = $this->getIdDefaultImage();
        }
        if ($this->getIdDefaultCombination() !== null) {
            $xml->product->id_default_combination = $this->getIdDefaultCombination();
        }
        if ($this->getIdTaxRulesGroup() !== null) {
            $xml->product->id_tax_rules_group = $this->getIdTaxRulesGroup();
        }
        if ($this->getType() !== null) {
            $xml->product->type = $this->getType();
        }
        if ($this->getIdShopDefault() !== null) {
            $xml->product->id_shop_default = $this->getIdShopDefault();
        }
        if ($this->getReference() !== null) {
            $xml->product->reference = $this->getReference();
        }
        if ($this->getSupplierReference() !== null) {
            $xml->product->supplier_reference = $this->getSupplierReference();
        }
        if ($this->getLocation() !== null) {
            $xml->product->location = $this->getLocation();
        }
        if ($this->getWidth() !== null) {
            $xml->product->width = $this->getWidth();
        }
        if ($this->getHeight() !== null) {
            $xml->product->height = $this->getHeight();
        }
        if ($this->getDepth() !== null) {
            $xml->product->depth = $this->getDepth();
        }
        if ($this->getWeight() !== null) {
            $xml->product->weight = $this->getWeight();
        }
        if ($this->isQuantityDiscount() !== null) {
            $xml->product->quantity_discount = $this->isQuantityDiscount() ? '1' : '0';
        }
        if ($this->getEan13() !== null) {
            $xml->product->ean13 = $this->getEan13();
        }
        if ($this->getIsbn() !== null) {
            $xml->product->isbn = $this->getIsbn();
        }
        if ($this->getUpc() !== null) {
            $xml->product->upc = $this->getUpc();
        }
        if ($this->isCacheIsPack() !== null) {
            $xml->product->cache_is_pack = $this->isCacheIsPack() ? '1' : '0';
        }
        if ($this->isCacheHasAttachments() !== null) {
            $xml->product->cache_has_attachments = $this->isCacheHasAttachments() ? '1' : '0';
        }
        if ($this->isVirtual() !== null) {
            $xml->product->is_virtual = $this->isVirtual() ? '1' : '0';
        }
        if ($this->isState() !== null) {
            $xml->product->state = $this->isState() === true ? '1' : '0';
        }
        if ($this->isAdditionalDeliveryTimes() !== null) {
            $xml->product->additional_delivery_times = $this->isAdditionalDeliveryTimes() ? '1' : '0';
        }
        $i = 0;
        foreach ($this->deliveryInStock as $languageId => $value) {
            $xml->product->delivery_in_stock->language[$i] = $this->getDeliveryInStock($languageId);
            if (!isset($xml->product->delivery_in_stock->language[$i]['id'])) {
                $xml->product->delivery_in_stock->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->deliveryOutStock as $languageId => $value) {
            $xml->product->delivery_out_stock->language[$i] = $this->getDeliveryOutStock($languageId);
            if (!isset($xml->product->delivery_out_stock->language[$i]['id'])) {
                $xml->product->delivery_out_stock->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        if ($this->isOnSale() !== null) {
            $xml->product->on_sale = $this->isOnSale() ? '1' : '0';
        }
        if ($this->isOnlineOnly() !== null) {
            $xml->product->online_only = $this->isOnlineOnly() ? '1' : '0';
        }
        if ($this->getEcotax() !== null) {
            $xml->product->ecotax = round($this->getEcotax(), 2);
        }
        if ($this->getMinimalQuantity() !== null) {
            $xml->product->minimal_quantity = $this->getMinimalQuantity();
        }
        if ($this->getLowStockThreshold() !== null) {
            $xml->product->low_stock_threshold = $this->getLowStockThreshold();
        }
        if ($this->isLowStockAlert() !== null) {
            $xml->product->low_stock_alert = $this->isLowStockAlert();
        }
        if ($this->getPrice() !== null) {
            $xml->product->price = round($this->getPrice(), 2);
        }
        if ($this->getWholesalePrice() !== null) {
            $xml->product->wholesale_price = round($this->getWholesalePrice(), 2);
        }
        if ($this->getUnity() !== null) {
            $xml->product->unity = $this->getUnity();
        }
        if ($this->getUnitPriceRatio() !== null) {
            $xml->product->unit_price_ratio = $this->getUnitPriceRatio();
        }
        if ($this->getAdditionalShippingCost() !== null) {
            $xml->product->additional_shipping_cost = round($this->getAdditionalShippingCost(), 2);
        }
        if ($this->isCustomizable() !== null) {
            $xml->product->customizable = $this->isCustomizable() ? '1' : '0';
        }
        if ($this->isTextFields() !== null) {
            $xml->product->text_fields = $this->isTextFields() ? '1' : '0';
        }
        if ($this->isUploadableFiles() !== null) {
            $xml->product->uploadable_files = $this->isUploadableFiles() ? '1' : '0';
        }
        if ($this->isActive() !== null) {
            $xml->product->active = $this->isActive() ? '1' : '0';
        }
        if ($this->getRedirectType() !== null) {
            $xml->product->redirect_type = $this->getRedirectType();
        }
        if ($this->getIdTypeRedirected() !== null) {
            $xml->product->id_type_redirected = $this->getIdTypeRedirected();
        }
        if ($this->isAvailableForOrder() !== null) {
            $xml->product->available_for_order = $this->isAvailableForOrder() ? '1' : '0';
        }
        if ($this->getAvailableDate() !== null) {
            $xml->product->available_date = $this->getAvailableDate()->format('Y-m-d');
        }
        if ($this->isShowCondition() !== null) {
            $xml->product->show_condition = $this->isShowCondition() ? '1' : '0';
        }
        if ($this->getCondition() !== null) {
            $xml->product->condition = $this->getCondition();
        }
        if ($this->isShowPrice() !== null) {
            $xml->product->show_price = $this->isShowPrice() ? '1' : '0';
        }
        if ($this->isIndexed() !== null) {
            $xml->product->indexed = $this->isIndexed() ? '1' : '0';
        }
        if ($this->getVisibility() !== null) {
            $xml->product->visibility = $this->getVisibility();
        }
        if ($this->getDateAdd() !== null) {
            $xml->product->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        }
        if ($this->isAdvancedStockManagement() !== null) {
            $xml->product->advanced_stock_management = $this->isAdvancedStockManagement() ? '1' : '0';
        }
        if ($this->getPackStockType() !== null) {
            $xml->product->pack_stock_type = $this->getPackStockType();
        }
        $i = 0;
        foreach ($this->metaDescription as $languageId => $value) {
            $xml->product->meta_description->language[$i] = $this->getMetaDescription($languageId);
            if (!isset($xml->product->meta_description->language[$i]['id'])) {
                $xml->product->meta_description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaKeywords as $languageId => $value) {
            $xml->product->meta_keywords->language[$i] = $this->getMetaKeywords($languageId);
            if (!isset($xml->product->meta_keywords->language[$i]['id'])) {
                $xml->product->meta_keywords->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->metaTitle as $languageId => $value) {
            $xml->product->meta_title->language[$i] = $this->getMetaTitle($languageId);
            if (!isset($xml->product->meta_title->language[$i]['id'])) {
                $xml->product->meta_title->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->linkRewrite as $languageId => $value) {
            $xml->product->link_rewrite->language[$i] = $this->getLinkRewrite($languageId);
            if (!isset($xml->product->link_rewrite->language[$i]['id'])) {
                $xml->product->link_rewrite->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->name as $languageId => $value) {
            $xml->product->name->language[$i] = $this->getName($languageId);
            if (!isset($xml->product->name->language[$i]['id'])) {
                $xml->product->name->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->description as $languageId => $value) {
            $xml->product->description->language[$i] = $this->getDescription($languageId);
            if (!isset($xml->product->description->language[$i]['id'])) {
                $xml->product->description->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->descriptionShort as $languageId => $value) {
            $xml->product->description_short->language[$i] = $this->getDescriptionShort($languageId);
            if (!isset($xml->product->description_short->language[$i]['id'])) {
                $xml->product->description_short->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->availableNow as $languageId => $value) {
            $xml->product->available_now->language[$i] = $this->getAvailableNow($languageId);
            if (!isset($xml->product->available_now->language[$i]['id'])) {
                $xml->product->available_now->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        $i = 0;
        foreach ($this->availableLater as $languageId => $value) {
            $xml->product->available_later->language[$i] = $this->getAvailableLater($languageId);
            if (!isset($xml->product->available_later->language[$i]['id'])) {
                $xml->product->available_later->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }
        if ($this->getAssociations() !== null) {
            unset($xml->product->associations->categories);
            unset($xml->product->associations->product_features);
            unset($xml->product->associations->stock_availables);
            unset($xml->product->associations->accessories);
            unset($xml->product->associations->tags);
            unset($xml->product->associations->product_bundle);

            foreach ($this->getAssociations() as $associationKey => $association) {
                switch ($associationKey) {
                    case 'categories':
                        $categories = $xml->product->associations->addChild('categories');
                        $categories->addAttribute('nodeType', 'category');
                        $categories->addAttribute('api', 'categories');
                        foreach ($association as $associationItem) {
                            if (isset($associationItem['id'])) {
                                $category = $categories->addChild('category');
                                $category->addChild('id', (string) $associationItem['id']);
                            }
                        }
                        break;
                    case 'product_features':
                        $productFeatures = $xml->product->associations->addChild('product_features');
                        $productFeatures->addAttribute('nodeType', 'product_feature');
                        $productFeatures->addAttribute('api', 'product_features');
                        foreach ($association as $associationItem) {
                            $productFeature = $productFeatures->addChild('product_feature');
                            if (isset($associationItem['id'])) {
                                $productFeature->addChild('id', (string) $associationItem['id']);
                            }
                            if (isset($associationItem['id_feature_value'])) {
                                $productFeature->addChild('id_feature_value', (string) $associationItem['id_feature_value']);
                            }
                        }
                        break;
                    case 'stock_availables':
                        $stockAvailables = $xml->product->associations->addChild('stock_availables');
                        $stockAvailables->addAttribute('nodeType', 'stock_available');
                        $stockAvailables->addAttribute('api', 'stock_availables');
                        foreach ($association as $associationItem) {
                            $stockAvailable = $stockAvailables->addChild('stock_available');
                            if (isset($associationItem['id'])) {
                                $stockAvailable->addChild('id', $associationItem['id']);
                            }
                            if (isset($associationItem['id_product_attribute'])) {
                                $stockAvailable->addChild('id_product_attribute', $associationItem['id_product_attribute']);
                            }
                        }
                        break;
                    case 'accessories':
                        $accessories = $xml->product->associations->addChild('accessories');
                        $accessories->addAttribute('nodeType', 'product');
                        $accessories->addAttribute('api', 'products');
                        foreach ($association as $associationItem) {
                            if (isset($associationItem['id'])) {
                                $product = $accessories->addChild('product');
                                $product->addChild('id', (string) $associationItem['id']);
                            }
                        }
                        break;
                    case 'tags':
                        $tags = $xml->product->associations->addChild('tags');
                        $tags->addAttribute('nodeType', 'tag');
                        $tags->addAttribute('api', 'tags');
                        foreach ($association as $associationItem) {
                            if (isset($associationItem['id'])) {
                                $tag = $tags->addChild('tag');
                                $tag->addChild('id', (string) $associationItem['id']);
                            }
                        }
                        break;
                }
            }
        }
        if ($this->getIdLatestIssue() !== null) {
            $xml->product->id_latest_issue = $this->getIdLatestIssue();
        }
        if ($this->getAdditionalMessage() !== null) {
            $xml->product->additional_message = $this->getAdditionalMessage();
        }
        if ($this->getAvailability() !== null) {
            $xml->product->availability = $this->getAvailability();
        }
        if ($this->getIsAvailable() !== null) {
            $xml->product->is_available = $this->getIsAvailable();
        }
        if ($this->getGmc() !== null) {
            $xml->product->gmc = $this->getGmc();
        }

        return $xml;
    }
}
