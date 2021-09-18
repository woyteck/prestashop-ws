<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class StockAvailable implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idProduct;

    /** @var int */
    private $idProductAttribute;

    /** @var int */
    private $idShop;

    /** @var int */
    private $idShopGroup;

    /** @var int */
    private $quantity;

    /** @var bool */
    private $dependsOnStock;

    /** @var bool */
    private $outOfStock;

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
     * @return int
     */
    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    /**
     * @param int $idProduct
     */
    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    /**
     * @return int
     */
    public function getIdProductAttribute(): ?int
    {
        return $this->idProductAttribute;
    }

    /**
     * @param int $idProductAttribute
     */
    public function setIdProductAttribute(int $idProductAttribute): void
    {
        $this->idProductAttribute = $idProductAttribute;
    }

    /**
     * @return int
     */
    public function getIdShop(): ?int
    {
        return $this->idShop;
    }

    /**
     * @param int $idShop
     */
    public function setIdShop(int $idShop): void
    {
        $this->idShop = $idShop;
    }

    /**
     * @return int
     */
    public function getIdShopGroup(): ?int
    {
        return $this->idShopGroup;
    }

    /**
     * @param int $idShopGroup
     */
    public function setIdShopGroup(int $idShopGroup): void
    {
        $this->idShopGroup = $idShopGroup;
    }

    /**
     * @return int
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return bool
     */
    public function isDependsOnStock(): ?bool
    {
        return $this->dependsOnStock;
    }

    /**
     * @param bool $dependsOnStock
     */
    public function setDependsOnStock(bool $dependsOnStock): void
    {
        $this->dependsOnStock = $dependsOnStock;
    }

    /**
     * @return bool
     */
    public function isOutOfStock(): ?bool
    {
        return $this->outOfStock;
    }

    /**
     * @param bool $outOfStock
     */
    public function setOutOfStock(bool $outOfStock): void
    {
        $this->outOfStock = $outOfStock;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     */
    public static function fromArray(array $array): ModelInterface
    {
        $stockAvailable = new self;

        if (isset($array['id'])) {
            $stockAvailable->setId((int) $array['id']);
        }
        if (isset($array['id_product'])) {
            $stockAvailable->setIdProduct((int) $array['id_product']);
        }
        if (isset($array['id_product_attribute'])) {
            $stockAvailable->setIdProductAttribute((int) $array['id_product_attribute']);
        }
        if (isset($array['id_shop'])) {
            $stockAvailable->setIdShop((int) $array['id_shop']);
        }
        if (isset($array['id_shop_group'])) {
            $stockAvailable->setIdShopGroup((int) $array['id_shop_group']);
        }
        if (isset($array['quantity'])) {
            $stockAvailable->setQuantity((int) $array['quantity']);
        }
        if (isset($array['depends_on_stock'])) {
            $stockAvailable->setDependsOnStock((int) $array['depends_on_stock'] === 1);
        }
        if (isset($array['out_of_stock'])) {
            $stockAvailable->setOutOfStock((int) $array['out_of_stock'] === 1);
        }

        return $stockAvailable;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */
        if ($this->getId() !== null) {
            $xml->stock_available->id = $this->getId();
        }
        if ($this->getIdProduct() !== null) {
            $xml->stock_available->id_product = $this->getIdProduct();
        }
        if ($this->getIdProductAttribute() !== null) {
            $xml->stock_available->id_product_attribute = $this->getIdProductAttribute();
        }
        if ($this->getIdShop() !== null) {
            $xml->stock_available->id_shop = $this->getIdShop();
        }
        if ($this->getIdShopGroup() !== null) {
            $xml->stock_available->id_shop_group = $this->getIdShopGroup();
        }
        if ($this->getQuantity() !== null) {
            $xml->stock_available->quantity = $this->getQuantity();
        }
        if ($this->isDependsOnStock() !== null) {
            $xml->stock_available->depends_on_stock = $this->isDependsOnStock() ? '1' : '0';
        }
        if ($this->isOutOfStock() !== null) {
            $xml->stock_available->out_of_stock = $this->isOutOfStock() ? '1' : '0';
        }

        return $xml;
    }
}
