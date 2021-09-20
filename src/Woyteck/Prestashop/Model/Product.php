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

    /** @var string */
    private $deliveryInStock;

    /** @var string */
    private $deliveryOutStock;

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

    /** @var string */
    private $metaDescription;

    /** @var array */
    private $metaKeywords;

    /** @var string */
    private $metaTitle;

    /** @var string */
    private $linkRewrite;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var string */
    private $descriptionShort;

    /** @var string */
    private $availableNow;

    /** @var string */
    private $availableLater;

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

    public function getDeliveryInStock(): ?string
    {
        return $this->deliveryInStock;
    }

    public function setDeliveryInStock(string $deliveryInStock): void
    {
        $this->deliveryInStock = $deliveryInStock;
    }

    public function getDeliveryOutStock(): ?string
    {
        return $this->deliveryOutStock;
    }

    public function setDeliveryOutStock(string $deliveryOutStock): void
    {
        $this->deliveryOutStock = $deliveryOutStock;
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

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(string $metaTitle): void
    {
        $this->metaTitle = $metaTitle;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescriptionShort(): ?string
    {
        return $this->descriptionShort;
    }

    public function setDescriptionShort(string $descriptionShort): void
    {
        $this->descriptionShort = $descriptionShort;
    }

    public function getAvailableNow(): ?string
    {
        return $this->availableNow;
    }

    public function setAvailableNow(string $availableNow): void
    {
        $this->availableNow = $availableNow;
    }

    public function getAvailableLater(): ?string
    {
        return $this->availableLater;
    }

    public function setAvailableLater(string $availableLater): void
    {
        $this->availableLater = $availableLater;
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
            $product->setDeliveryInStock($array['delivery_in_stock']);
        }
        if (isset($array['delivery_out_stock'])) {
            $product->setDeliveryOutStock($array['delivery_out_stock']);
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
            $product->setMetaDescription($array['meta_description']);
        }
        if (isset($array['meta_keywords'])) {
            $product->setMetaKeywords(explode(',', $array['meta_keywords']));
        }
        if (isset($array['meta_title'])) {
            $product->setMetaTitle($array['meta_title']);
        }
        if (isset($array['link_rewrite'])) {
            $product->setLinkRewrite($array['link_rewrite']);
        }
        if (isset($array['name'])) {
            $product->setName($array['name']);
        }
        if (isset($array['description'])) {
            $product->setDescription($array['description']);
        }
        if (isset($array['description_short'])) {
            $product->setDescriptionShort($array['description_short']);
        }
        if (isset($array['available_now'])) {
            $product->setAvailableNow($array['available_now']);
        }
        if (isset($array['available_later'])) {
            $product->setAvailableLater($array['available_later']);
        }
        if (isset($array['associations'])) {
            $product->setAssociations($array['associations']);
        }

        return $product;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */

        if (isset($xml->combination->associations)) {
            unset($xml->product->associations);
            $xml->product->addChild('associations');
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
        if ($this->getDeliveryInStock() !== null) {
            $xml->product->delivery_in_stock->language = $this->getDeliveryInStock();
        }
        if ($this->getDeliveryOutStock() !== null) {
            $xml->product->delivery_out_stock->language = $this->getDeliveryOutStock();
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
        if ($this->getMetaDescription() !== null) {
            $xml->product->meta_description->language = $this->getMetaDescription();
        }
        if ($this->getMetaKeywords() !== null) {
            $xml->product->meta_keywords->language = implode(',', $this->getMetaKeywords());
        }
        if ($this->getMetaTitle() !== null) {
            $xml->product->meta_title->language = $this->getMetaTitle();
        }
        if ($this->getLinkRewrite() !== null) {
            $xml->product->link_rewrite->language = $this->getLinkRewrite();
        }
        if ($this->getName() !== null) {
            $xml->product->name->language = $this->getName();
        }
        if ($this->getDescription() !== null) {
            $xml->product->description->language = $this->getDescription();
        }
        if ($this->getDescriptionShort() !== null) {
            $xml->product->description_short->language = $this->getDescriptionShort();
        }
        if ($this->getAvailableNow() !== null) {
            $xml->product->available_now->language = $this->getAvailableNow();
        }
        if ($this->getAvailableLater() !== null) {
            $xml->product->available_later->language = $this->getAvailableLater();
        }
        if ($this->getAssociations() !== null) {
            unset($xml->product->associations->categories);
            foreach ($this->getAssociations() as $associationKey => $association) {
                switch ($associationKey) {
                    case 'categories':
                        if (isset($association['id'])) {
                            $categories = $xml->product->associations->addChild('categories');
                            $categories->addAttribute('nodeType', 'category');
                            $categories->addAttribute('api', 'categories');
                            $category = $categories->addChild('category');
                            $category->addChild('id', (string) $association['id']);
                        }
                        break;
                    case 'product_features':
                        $productFeatures = $xml->product->associations->addChild('product_features');
                        $productFeatures->addAttribute('nodeType', 'product_feature');
                        $productFeatures->addAttribute('api', 'product_features');
                        foreach ($association as $associationItem) {
                            $productFeature = $productFeatures->addChild('product_feature');
                            $productFeature->addChild('id', (string) $associationItem['id']);
                            $productFeature->addChild('id_feature_value', (string) $associationItem['id_feature_value']);
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
                }

            }
        }

        return $xml;
    }
}
