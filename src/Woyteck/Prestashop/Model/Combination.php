<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class Combination implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idProduct;

    /** @var string */
    private $location;

    /** @var string */
    private $ean13;

    /** @var string */
    private $isbn;

    /** @var string */
    private $upc;

    /** @var int */
    private $quantity;

    /** @var string */
    private $reference;

    /** @var string */
    private $supplierReference;

    /** @var float */
    private $wholesalePrice;

    /** @var float */
    private $price;

    /** @var float */
    private $ecotax;

    /** @var float */
    private $weight;

    /** @var float */
    private $unitPriceImpact;

    /** @var int */
    private $minimalQuantity;

    /** @var int */
    private $lowStockThreshold;

    /** @var int */
    private $lowStockAlert;

    /** @var int */
    private $defaultOn;

    /** @var DateTime */
    private $availableDate;

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

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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

    public function getWholesalePrice(): ?float
    {
        return $this->wholesalePrice;
    }

    public function setWholesalePrice(float $wholesalePrice): void
    {
        $this->wholesalePrice = $wholesalePrice;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getEcotax(): ?float
    {
        return $this->ecotax;
    }

    public function setEcotax(float $ecotax): void
    {
        $this->ecotax = $ecotax;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    public function getUnitPriceImpact(): ?float
    {
        return $this->unitPriceImpact;
    }

    public function setUnitPriceImpact(float $unitPriceImpact): void
    {
        $this->unitPriceImpact = $unitPriceImpact;
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

    public function getLowStockAlert(): ?int
    {
        return $this->lowStockAlert;
    }

    public function setLowStockAlert(int $lowStockAlert): void
    {
        $this->lowStockAlert = $lowStockAlert;
    }

    public function getDefaultOn(): ?int
    {
        return $this->defaultOn;
    }

    public function setDefaultOn(int $defaultOn): void
    {
        $this->defaultOn = $defaultOn;
    }

    public function getAvailableDate(): ?DateTime
    {
        return $this->availableDate;
    }

    public function setAvailableDate(DateTime $availableDate): void
    {
        $this->availableDate = $availableDate;
    }

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
     * @return ModelInterface|self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $combination = new self;

        if (isset($array['id'])) {
            $combination->setId((int) $array['id']);
        }
        if (isset($array['id_product'])) {
            $combination->setIdProduct((int) $array['id_product']);
        }
        if (isset($array['location'])) {
            $combination->setLocation($array['location']);
        }
        if (isset($array['ean13'])) {
            $combination->setEan13($array['ean13']);
        }
        if (isset($array['isbn'])) {
            $combination->setIsbn($array['isbn']);
        }
        if (isset($array['upc'])) {
            $combination->setUpc($array['upc']);
        }
        if (isset($array['quantity'])) {
            $combination->setQuantity((int) $array['quantity']);
        }
        if (isset($array['reference'])) {
            $combination->setReference($array['reference']);
        }
        if (isset($array['supplier_reference'])) {
            $combination->setSupplierReference($array['supplier_reference']);
        }
        if (isset($array['wholesale_price'])) {
            $combination->setWholesalePrice(round((float) $array['wholesale_price'], 2));
        }
        if (isset($array['price'])) {
            $combination->setPrice(round((float) $array['price'], 2));
        }
        if (isset($array['ecotax'])) {
            $combination->setEcotax(round((float) $array['ecotax'], 2));
        }
        if (isset($array['weight'])) {
            $combination->setWeight(round((float) $array['weight'], 4));
        }
        if (isset($array['unit_price_impact'])) {
            $combination->setUnitPriceImpact(round((float) $array['unit_price_impact'], 2));
        }
        if (isset($array['minimal_quantity'])) {
            $combination->setMinimalQuantity((int) $array['minimal_quantity']);
        }
        if (isset($array['low_stock_threshold'])) {
            $combination->setLowStockThreshold((int) $array['low_stock_threshold']);
        }
        if (isset($array['low_stock_alert'])) {
            $combination->setLowStockAlert((int) $array['low_stock_alert']);
        }
        if (isset($array['default_on'])) {
            $combination->setDefaultOn((int) $array['default_on']);
        }
        if (isset($array['available_date']) && $array['available_date'] !== '0000-00-00') {
            $combination->setAvailableDate(new DateTime($array['available_date']));
        }
        if (isset($array['associations'])) {
            $combination->setAssociations($array['associations']);
        }

        return $combination;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */

        if (isset($xml->combination->associations)) {
            unset($xml->combination->associations);
            $xml->combination->addChild('associations');
        }
        if ($this->getId() !== null) {
            $xml->combination->id = $this->getId();
        }
        if ($this->getIdProduct() !== null) {
            $xml->combination->id_product = $this->getIdProduct();
        }
        if ($this->getLocation() !== null) {
            $xml->combination->location = $this->getLocation();
        }
        if ($this->getEan13() !== null) {
            $xml->combination->ean13 = $this->getEan13();
        }
        if ($this->getIsbn() !== null) {
            $xml->combination->isbn = $this->getIsbn();
        }
        if ($this->getUpc() !== null) {
            $xml->combination->upc = $this->getUpc();
        }
        if ($this->getQuantity() !== null) {
            $xml->combination->quantity = $this->getQuantity();
        }
        if ($this->getReference() !== null) {
            $xml->combination->reference = $this->getReference();
        }
        if ($this->getSupplierReference() !== null) {
            $xml->combination->supplier_reference = $this->getSupplierReference();
        }
        if ($this->getWholesalePrice() !== null) {
            $xml->combination->wholesale_price = $this->getWholesalePrice();
        }
        if ($this->getPrice() !== null) {
            $xml->combination->price = $this->getPrice();
        }
        if ($this->getEcotax() !== null) {
            $xml->combination->ecotax = $this->getEcotax();
        }
        if ($this->getWeight() !== null) {
            $xml->combination->weight = $this->getWeight();
        }
        if ($this->getUnitPriceImpact() !== null) {
            $xml->combination->unit_price_impact = $this->getUnitPriceImpact();
        }
        if ($this->getMinimalQuantity() !== null) {
            $xml->combination->minimal_quantity = $this->getMinimalQuantity();
        }
        if ($this->getLowStockThreshold() !== null) {
            $xml->combination->low_stock_threshold = $this->getLowStockThreshold();
        }
        if ($this->getLowStockAlert() !== null) {
            $xml->combination->low_stock_alert = $this->getLowStockAlert();
        }
        if ($this->getDefaultOn() !== null) {
            $xml->combination->default_on = $this->getDefaultOn();
        }
        if ($this->getAvailableDate() !== null) {
            $xml->combination->available_date = $this->getAvailableDate()->format('Y-m-d');
        }
        if ($this->getAssociations() !== null) {
            foreach ($this->getAssociations() as $associationKey => $association) {
                switch ($associationKey) {
                    case 'product_option_values':
                        $productOptionValues = $xml->combination->associations->addChild('product_option_values');
                        $productOptionValues->addAttribute('nodeType', 'product_option_value');
                        $productOptionValues->addAttribute('api', 'product_option_values');
                        foreach ($association as $associationItem) {
                            if (!isset($associationItem['id'])) {
                                continue;
                            }

                            $productOptionValue = $productOptionValues->addChild('product_option_value');
                            $productOptionValue->addChild('id', (string) $associationItem['id']);
                        }
                        break;
                    case 'images':
                        $images = $xml->combination->associations->addChild('images');
                        $images->addAttribute('nodeType', 'image');
                        $images->addAttribute('api', 'images/products');
                        foreach ($association as $associationItem) {
                            if (!isset($associationItem['id'])) {
                                continue;
                            }

                            $image = $images->addChild('image');
                            $image->addChild('id', (string) $associationItem['id']);
                        }
                        break;
                }
            }
        }

        return $xml;
    }
}
