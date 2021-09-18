<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class Stock implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idWarehouse;

    /** @var int */
    private $idProduct;

    /** @var int */
    private $idProductAttribute;

    /** @var string */
    private $reference;

    /** @var string */
    private $ean13;

    /** @var string */
    private $isbn;

    /** @var string */
    private $upc;

    /** @var int */
    private $physicalQuantity;

    /** @var int */
    private $usableQuantity;

    /** @var float */
    private $priceTr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdWarehouse(): ?int
    {
        return $this->idWarehouse;
    }

    public function setIdWarehouse(int $idWarehouse): void
    {
        $this->idWarehouse = $idWarehouse;
    }

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    public function getIdProductAttribute(): ?int
    {
        return $this->idProductAttribute;
    }

    public function setIdProductAttribute(int $idProductAttribute): void
    {
        $this->idProductAttribute = $idProductAttribute;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
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

    public function getPhysicalQuantity(): ?int
    {
        return $this->physicalQuantity;
    }

    public function setPhysicalQuantity(int $physicalQuantity): void
    {
        $this->physicalQuantity = $physicalQuantity;
    }

    public function getUsableQuantity(): ?int
    {
        return $this->usableQuantity;
    }

    public function setUsableQuantity(int $usableQuantity): void
    {
        $this->usableQuantity = $usableQuantity;
    }

    public function getPriceTr(): ?float
    {
        return $this->priceTr;
    }

    public function setPriceTr(float $priceTr): void
    {
        $this->priceTr = $priceTr;
    }

    public static function fromArray(array $array): ModelInterface
    {
        $stock = new self;

        if (isset($array['id'])) {
            $stock->setId((int) $array['id']);
        }
        if (isset($array['id_warehouse'])) {
            $stock->setIdWarehouse((int) $array['id_warehouse']);
        }
        if (isset($array['id_product'])) {
            $stock->setIdProduct((int) $array['id_product']);
        }
        if (isset($array['id_product_attribute'])) {
            $stock->setIdProductAttribute((int) $array['id_product_attribute']);
        }
        if (isset($array['reference'])) {
            $stock->setReference($array['reference']);
        }
        if (isset($array['ean13'])) {
            $stock->setEan13($array['ean13']);
        }
        if (isset($array['isbn'])) {
            $stock->setIsbn($array['isbn']);
        }
        if (isset($array['upc'])) {
            $stock->setUpc($array['upc']);
        }
        if (isset($array['physical_quantity'])) {
            $stock->setPhysicalQuantity((int) $array['physical_quantity']);
        }
        if (isset($array['usable_quantity'])) {
            $stock->setUsableQuantity((int) $array['usable_quantity']);
        }
        if (isset($array['price_tr'])) {
            $stock->setPriceTr((float) $array['price_tr']);
        }

        return $stock;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */
        if ($this->getId() !== null) {
            $xml->product->id = $this->getId();
        }
        if ($this->getIdWarehouse() !== null) {
            $xml->product->id_warehouse = $this->getIdWarehouse();
        }
        if ($this->getIdProduct() !== null) {
            $xml->product->id_product = $this->getIdProduct();
        }
        if ($this->getIdProductAttribute() !== null) {
            $xml->product->id_product_attribute = $this->getIdProductAttribute();
        }
        if ($this->getReference() !== null) {
            $xml->product->reference = $this->getReference();
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
        if ($this->getPhysicalQuantity() !== null) {
            $xml->product->physical_quantity = $this->getPhysicalQuantity();
        }
        if ($this->getUsableQuantity() !== null) {
            $xml->product->usable_quantity = $this->getUsableQuantity();
        }
        if ($this->getPriceTr() !== null) {
            $xml->product->price_tr = $this->getPriceTr();
        }

        return $xml;
    }
}
