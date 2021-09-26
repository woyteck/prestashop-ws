<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use SimpleXMLElement;
use stdClass;

class SpecificPrice implements ModelInterface
{
    public const TYPE_AMOUNT = 'amount';
    public const TYPE_PERCENTAGE = 'percentage';

    /** @var int */
    private $id;

    /** @var int */
    private $idShopGroup;

    /** @var int */
    private $idShop;

    /** @var int */
    private $idCart;

    /** @var int */
    private $idProduct;

    /** @var int */
    private $idProductAttribute;

    /** @var int */
    private $idCurrency;

    /** @var int */
    private $idCountry;

    /** @var int */
    private $idGroup;

    /** @var int */
    private $idCustomer;

    /** @var int */
    private $idSpecificPriceRule;

    /** @var float */
    private $price;

    /** @var int */
    private $fromQuantity;

    /** @var float */
    private $reduction;

    /** @var bool */
    private $reductionTax;

    /** @var string */
    private $reductionType;

    /** @var DateTime */
    private $from;

    /** @var DateTime */
    private $to;

    /**
     * @return int|null
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
     * @return int|null
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
     * @return int|null
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
     * @return int|null
     */
    public function getIdCart(): ?int
    {
        return $this->idCart;
    }

    /**
     * @param int $idCart
     */
    public function setIdCart(int $idCart): void
    {
        $this->idCart = $idCart;
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
     */
    public function setIdProduct(int $idProduct): void
    {
        $this->idProduct = $idProduct;
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
     */
    public function setIdProductAttribute(int $idProductAttribute): void
    {
        $this->idProductAttribute = $idProductAttribute;
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
     */
    public function setIdCurrency(int $idCurrency): void
    {
        $this->idCurrency = $idCurrency;
    }

    /**
     * @return int|null
     */
    public function getIdCountry(): ?int
    {
        return $this->idCountry;
    }

    /**
     * @param int $idCountry
     */
    public function setIdCountry(int $idCountry): void
    {
        $this->idCountry = $idCountry;
    }

    /**
     * @return int|null
     */
    public function getIdGroup(): ?int
    {
        return $this->idGroup;
    }

    /**
     * @param int $idGroup
     */
    public function setIdGroup(int $idGroup): void
    {
        $this->idGroup = $idGroup;
    }

    /**
     * @return int|null
     */
    public function getIdCustomer(): ?int
    {
        return $this->idCustomer;
    }

    /**
     * @param int $idCustomer
     */
    public function setIdCustomer(int $idCustomer): void
    {
        $this->idCustomer = $idCustomer;
    }

    /**
     * @return int|null
     */
    public function getIdSpecificPriceRule(): ?int
    {
        return $this->idSpecificPriceRule;
    }

    /**
     * @param int $idSpecificPriceRule
     */
    public function setIdSpecificPriceRule(int $idSpecificPriceRule): void
    {
        $this->idSpecificPriceRule = $idSpecificPriceRule;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int|null
     */
    public function getFromQuantity(): ?int
    {
        return $this->fromQuantity;
    }

    /**
     * @param int $fromQuantity
     */
    public function setFromQuantity(int $fromQuantity): void
    {
        $this->fromQuantity = $fromQuantity;
    }

    /**
     * @return float|null
     */
    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    /**
     * @param float $reduction
     */
    public function setReduction(float $reduction): void
    {
        $this->reduction = $reduction;
    }

    /**
     * @return bool|null
     */
    public function isReductionTax(): ?bool
    {
        return $this->reductionTax;
    }

    /**
     * @param bool $reductionTax
     */
    public function setReductionTax(bool $reductionTax): void
    {
        $this->reductionTax = $reductionTax;
    }

    /**
     * @return string|null
     */
    public function getReductionType(): ?string
    {
        return $this->reductionType;
    }

    /**
     * @param string $reductionType
     */
    public function setReductionType(string $reductionType): void
    {
        $this->reductionType = $reductionType;
    }

    /**
     * @return DateTime|null
     */
    public function getFrom(): ?DateTime
    {
        return $this->from;
    }

    /**
     * @param DateTime $from
     */
    public function setFrom(DateTime $from): void
    {
        $this->from = $from;
    }

    /**
     * @return DateTime|null
     */
    public function getTo(): ?DateTime
    {
        return $this->to;
    }

    /**
     * @param DateTime $to
     */
    public function setTo(DateTime $to): void
    {
        $this->to = $to;
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
        if (isset($array['id_shop_group'])) {
            $stockAvailable->setIdShopGroup((int) $array['id_shop_group']);
        }
        if (isset($array['id_shop'])) {
            $stockAvailable->setIdShop((int) $array['id_shop']);
        }
        if (isset($array['id_cart'])) {
            $stockAvailable->setIdCart((int) $array['id_cart']);
        }
        if (isset($array['id_product'])) {
            $stockAvailable->setIdProduct((int) $array['id_product']);
        }
        if (isset($array['id_product_attribute'])) {
            $stockAvailable->setIdProductAttribute((int) $array['id_product_attribute']);
        }
        if (isset($array['id_currency'])) {
            $stockAvailable->setIdCurrency((int) $array['id_currency']);
        }
        if (isset($array['id_country'])) {
            $stockAvailable->setIdCountry((int) $array['id_country']);
        }
        if (isset($array['id_group'])) {
            $stockAvailable->setIdGroup((int) $array['id_group']);
        }
        if (isset($array['id_customer'])) {
            $stockAvailable->setIdCustomer((int) $array['id_customer']);
        }
        if (isset($array['id_specific_price_rule'])) {
            $stockAvailable->setIdSpecificPriceRule((int) $array['id_specific_price_rule']);
        }
        if (isset($array['price'])) {
            $stockAvailable->setPrice((float) $array['price']);
        }
        if (isset($array['from_quantity'])) {
            $stockAvailable->setFromQuantity((int) $array['from_quantity']);
        }
        if (isset($array['reduction'])) {
            $stockAvailable->setReduction((float) $array['reduction']);
        }
        if (isset($array['reduction_tax'])) {
            $stockAvailable->setReductionTax((int) $array['reduction_tax'] === 1);
        }
        if (isset($array['from'])) {
            $stockAvailable->setFrom(new DateTime($array['from']));
        }
        if (isset($array['to'])) {
            $stockAvailable->setTo(new DateTime($array['to']));
        }

        return $stockAvailable;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */
        if ($this->getId() !== null) {
            $xml->specific_price->id = $this->getId();
        }
        if ($this->getIdShopGroup() !== null) {
            $xml->specific_price->id_shop_group = $this->getIdShopGroup();
        }
        if ($this->getIdShop() !== null) {
            $xml->specific_price->id_shop = $this->getIdShop();
        }
        if ($this->getIdCart() !== null) {
            $xml->specific_price->id_cart = $this->getIdCart();
        }
        if ($this->getIdProduct() !== null) {
            $xml->specific_price->id_product = $this->getIdProduct();
        }
        if ($this->getIdProductAttribute() !== null) {
            $xml->specific_price->id_product_attribute = $this->getIdProductAttribute();
        }
        if ($this->getIdCurrency() !== null) {
            $xml->specific_price->id_currency = $this->getIdCurrency();
        }
        if ($this->getIdCountry() !== null) {
            $xml->specific_price->id_country = $this->getIdCountry();
        }
        if ($this->getIdGroup() !== null) {
            $xml->specific_price->id_group = $this->getIdGroup();
        }
        if ($this->getIdCustomer() !== null) {
            $xml->specific_price->id_customer = $this->getIdCustomer();
        }
        if ($this->getIdSpecificPriceRule() !== null) {
            $xml->specific_price->id_specific_price_rule = $this->getIdSpecificPriceRule();
        }
        if ($this->getPrice() !== null) {
            $xml->specific_price->price = round($this->getPrice(), 2);
        }
        if ($this->getFromQuantity() !== null) {
            $xml->specific_price->from_quantity = $this->getFromQuantity();
        }
        if ($this->getReduction() !== null) {
            $xml->specific_price->reduction = round($this->getReduction(), 2);
        }
        if ($this->isReductionTax() !== null) {
            $xml->specific_price->reduction_tax = $this->isReductionTax() ? '1' : '0';
        }
        if ($this->getReductionType() !== null) {
            $xml->specific_price->reduction_type = $this->getReductionType();
        }
        if ($this->getFrom() !== null) {
            $xml->specific_price->from = $this->getFrom()->format('Y-m-d H:i:s');
        }
        if ($this->getTo() !== null) {
            $xml->specific_price->to = $this->getTo()->format('Y-m-d H:i:s');
        }

        return $xml;
    }
}
