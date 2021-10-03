<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use SimpleXMLElement;
use stdClass;

class ProductSupplier implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idProduct;

    /** @var int */
    private $idProductAttribute;

    /** @var int */
    private $idSupplier;

    /** @var int */
    private $idCurrency;

    /** @var string */
    private $productSupplierReference;

    /** @var string */
    private $productSupplierPriceTe;

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
     * @return int|null
     */
    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    /**
     * @param int $idProduct
     * @return self
     */
    public function setIdProduct(int $idProduct): self
    {
        $this->idProduct = $idProduct;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdProductAttribute(): ?int
    {
        return $this->idProductAttribute;
    }

    /**
     * @param int $idProductAttribute
     * @return self
     */
    public function setIdProductAttribute(int $idProductAttribute): self
    {
        $this->idProductAttribute = $idProductAttribute;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdSupplier(): ?int
    {
        return $this->idSupplier;
    }

    /**
     * @param int $idSupplier
     * @return self
     */
    public function setIdSupplier(int $idSupplier): self
    {
        $this->idSupplier = $idSupplier;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdCurrency(): ?int
    {
        return $this->idCurrency;
    }

    /**
     * @param int $idCurrency
     * @return self
     */
    public function setIdCurrency(int $idCurrency): self
    {
        $this->idCurrency = $idCurrency;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductSupplierReference(): ?string
    {
        return $this->productSupplierReference;
    }

    /**
     * @param string $productSupplierReference
     * @return self
     */
    public function setProductSupplierReference(string $productSupplierReference): self
    {
        $this->productSupplierReference = $productSupplierReference;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductSupplierPriceTe(): ?string
    {
        return $this->productSupplierPriceTe;
    }

    /**
     * @param string $productSupplierPriceTe
     * @return self
     */
    public function setProductSupplierPriceTe(string $productSupplierPriceTe): self
    {
        $this->productSupplierPriceTe = $productSupplierPriceTe;
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
        if (isset($array['id_product'])) {
            $supplier->setIdProduct((int) $array['id_product']);
        }
        if (isset($array['id_product_attribute'])) {
            $supplier->setIdProductAttribute((int) $array['id_product_attribute']);
        }
        if (isset($array['id_supplier'])) {
            $supplier->setIdSupplier((int) $array['id_supplier']);
        }
        if (isset($array['id_currency'])) {
            $supplier->setIdCurrency((int) $array['id_currency']);
        }
        if (isset($array['product_supplier_reference'])) {
            $supplier->setProductSupplierReference($array['product_supplier_reference']);
        }
        if (isset($array['product_supplier_price_te'])) {
            $supplier->setProductSupplierPriceTe($array['product_supplier_price_te']);
        }

        return $supplier;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */
        if ($this->getId() !== null) {
            $xml->product_supplier->id = $this->getId();
        }
        if ($this->getIdProduct() !== null) {
            $xml->product_supplier->id_product = $this->getIdProduct();
        }
        if ($this->getIdProductAttribute() !== null) {
            $xml->product_supplier->id_product_attribute = $this->getIdProductAttribute();
        }
        if ($this->getIdSupplier() !== null) {
            $xml->product_supplier->id_supplier = $this->getIdSupplier();
        }
        if ($this->getIdCurrency() !== null) {
            $xml->product_supplier->id_currency = $this->getIdCurrency();
        }
        if ($this->getProductSupplierReference() !== null) {
            $xml->product_supplier->product_supplier_reference = $this->getProductSupplierReference();
        }
        if ($this->getProductSupplierPriceTe() !== null) {
            $xml->product_supplier->product_supplier_price_te = $this->getProductSupplierPriceTe();
        }

        return $xml;
    }
}
