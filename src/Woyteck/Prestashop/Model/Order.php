<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;
use Woyteck\Prestashop\WsException;

class Order implements ModelInterface
{
    /** int */
    private $id;

    /** @var int */
    private $idAddressDelivery;

    /** @var int */
    private $idAddressInvoice;

    /** @var int */
    private $idCart;

    /** @var int */
    private $idCurrency;

    /** @var int */
    private $idLang;

    /** @var int */
    private $idCustomer;

    /** @var int */
    private $idCarrier;

    /** @var int */
    private $currentState;

    /** @var string */
    private $module;

    /** @var int */
    private $invoiceNumber;

    /** @var DateTime */
    private $invoiceDate;

    /** @var int */
    private $deliveryNumber;

    /** @var DateTime */
    private $deliveryDate;

    /** @var bool */
    private $isValid;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

    /** @var string */
    private $shippingNumber;

    /** @var int */
    private $idShopGroup;

    /** @var int */
    private $idShop;

    /** @var string */
    private $secureKey;

    /** @var string */
    private $payment;

    /** @var bool */
    private $isRecyclable;

    /** @var bool */
    private $isGift;

    /** @var string */
    private $giftMessage;

    /** @var int */
    private $mobileTheme;

    /** @var float */
    private $totalDiscounts;

    /** @var float */
    private $totalDiscountsTaxIncl;

    /** @var float */
    private $totalDiscountsTaxExcl;

    /** @var float */
    private $totalPaid;

    /** @var float */
    private $totalPaidTaxIncl;

    /** @var float */
    private $totalPaidTaxExcl;

    /** @var float */
    private $totalPaidReal;

    /** @var float */
    private $totalProducts;

    /** @var float */
    private $totalProductsWt;

    /** @var float */
    private $totalShipping;

    /** @var float */
    private $totalShippingTaxIncl;

    /** @var float */
    private $totalShippingTaxExcl;

    /** @var int */
    private $carrierTaxRate;

    /** @var float */
    private $totalWrapping;

    /** @var float */
    private $totalWrappingTaxIncl;

    /** @var float */
    private $totalWrappingTaxExcl;

    /** @var int */
    private $roundMode;

    /** @var int */
    private $roundType;

    /** @var float */
    private $conversionRate;

    /** @var string */
    private $reference;

    /** @var string */
    private $deliveryPointName;

    /** @var string */
    private $deliveryPointAddress;

    /** @var string */
    private $deliveryPointCity;

    /** @var string */
    private $deliveryPointPostCode;

    /** @var string */
    private $targetPoint;

    /** @var string */
    private $trackingNumber;

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

    public function getIdAddressDelivery(): ?int
    {
        return $this->idAddressDelivery;
    }

    public function setIdAddressDelivery(int $idAddressDelivery): void
    {
        $this->idAddressDelivery = $idAddressDelivery;
    }

    public function getIdAddressInvoice(): ?int
    {
        return $this->idAddressInvoice;
    }

    public function setIdAddressInvoice(int $idAddressInvoice): void
    {
        $this->idAddressInvoice = $idAddressInvoice;
    }

    public function getIdCart(): ?int
    {
        return $this->idCart;
    }

    public function setIdCart(int $idCart): void
    {
        $this->idCart = $idCart;
    }

    public function getIdCurrency(): ?int
    {
        return $this->idCurrency;
    }

    public function setIdCurrency(int $idCurrency): void
    {
        $this->idCurrency = $idCurrency;
    }

    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    public function setIdLang(int $idLang): void
    {
        $this->idLang = $idLang;
    }

    public function getIdCustomer(): ?int
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(int $idCustomer): void
    {
        $this->idCustomer = $idCustomer;
    }

    public function getIdCarrier(): ?int
    {
        return $this->idCarrier;
    }

    public function setIdCarrier(int $idCarrier): void
    {
        $this->idCarrier = $idCarrier;
    }

    public function getCurrentState(): ?int
    {
        return $this->currentState;
    }

    public function setCurrentState(int $currentState): void
    {
        $this->currentState = $currentState;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(string $module): void
    {
        $this->module = $module;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(int $invoiceNumber): void
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    public function getInvoiceDate(): ?DateTime
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(DateTime $invoiceDate): void
    {
        $this->invoiceDate = $invoiceDate;
    }

    public function getDeliveryNumber(): ?int
    {
        return $this->deliveryNumber;
    }

    public function setDeliveryNumber(int $deliveryNumber): void
    {
        $this->deliveryNumber = $deliveryNumber;
    }

    public function getDeliveryDate(): ?DateTime
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(DateTime $deliveryDate): void
    {
        $this->deliveryDate = $deliveryDate;
    }

    public function isIsValid(): ?bool
    {
        return $this->isValid;
    }

    public function setIsValid(bool $isValid): void
    {
        $this->isValid = $isValid;
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

    public function getShippingNumber(): ?string
    {
        return $this->shippingNumber;
    }

    public function setShippingNumber(string $shippingNumber): void
    {
        $this->shippingNumber = $shippingNumber;
    }

    public function getIdShopGroup(): ?int
    {
        return $this->idShopGroup;
    }

    public function setIdShopGroup(int $idShopGroup): void
    {
        $this->idShopGroup = $idShopGroup;
    }

    public function getIdShop(): ?int
    {
        return $this->idShop;
    }

    public function setIdShop(int $idShop): void
    {
        $this->idShop = $idShop;
    }

    public function getSecureKey(): ?string
    {
        return $this->secureKey;
    }

    public function setSecureKey(string $secureKey): void
    {
        $this->secureKey = $secureKey;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(string $payment): void
    {
        $this->payment = $payment;
    }

    public function isIsRecyclable(): ?bool
    {
        return $this->isRecyclable;
    }

    public function setIsRecyclable(bool $isRecyclable): void
    {
        $this->isRecyclable = $isRecyclable;
    }

    public function isIsGift(): ?bool
    {
        return $this->isGift;
    }

    public function setIsGift(bool $isGift): void
    {
        $this->isGift = $isGift;
    }

    public function getGiftMessage(): ?string
    {
        return $this->giftMessage;
    }

    public function setGiftMessage(string $giftMessage): void
    {
        $this->giftMessage = $giftMessage;
    }

    public function getMobileTheme(): ?int
    {
        return $this->mobileTheme;
    }

    public function setMobileTheme(int $mobileTheme): void
    {
        $this->mobileTheme = $mobileTheme;
    }

    public function getTotalDiscounts(): ?float
    {
        return $this->totalDiscounts;
    }

    public function setTotalDiscounts(float $totalDiscounts): void
    {
        $this->totalDiscounts = $totalDiscounts;
    }

    public function getTotalDiscountsTaxIncl(): ?float
    {
        return $this->totalDiscountsTaxIncl;
    }

    public function setTotalDiscountsTaxIncl(float $totalDiscountsTaxIncl): void
    {
        $this->totalDiscountsTaxIncl = $totalDiscountsTaxIncl;
    }

    public function getTotalDiscountsTaxExcl(): ?float
    {
        return $this->totalDiscountsTaxExcl;
    }

    public function setTotalDiscountsTaxExcl(float $totalDiscountsTaxExcl): void
    {
        $this->totalDiscountsTaxExcl = $totalDiscountsTaxExcl;
    }

    public function getTotalPaid(): ?float
    {
        return $this->totalPaid;
    }

    public function setTotalPaid(float $totalPaid): void
    {
        $this->totalPaid = $totalPaid;
    }

    public function getTotalPaidTaxIncl(): ?float
    {
        return $this->totalPaidTaxIncl;
    }

    public function setTotalPaidTaxIncl(float $totalPaidTaxIncl): void
    {
        $this->totalPaidTaxIncl = $totalPaidTaxIncl;
    }

    public function getTotalPaidTaxExcl(): ?float
    {
        return $this->totalPaidTaxExcl;
    }

    public function setTotalPaidTaxExcl(float $totalPaidTaxExcl): void
    {
        $this->totalPaidTaxExcl = $totalPaidTaxExcl;
    }

    public function getTotalPaidReal(): ?float
    {
        return $this->totalPaidReal;
    }

    public function setTotalPaidReal(float $totalPaidReal): void
    {
        $this->totalPaidReal = $totalPaidReal;
    }

    public function getTotalProducts(): ?float
    {
        return $this->totalProducts;
    }

    public function setTotalProducts(float $totalProducts): void
    {
        $this->totalProducts = $totalProducts;
    }

    public function getTotalProductsWt(): ?float
    {
        return $this->totalProductsWt;
    }

    public function setTotalProductsWt(float $totalProductsWt): void
    {
        $this->totalProductsWt = $totalProductsWt;
    }

    public function getTotalShipping(): ?float
    {
        return $this->totalShipping;
    }

    public function setTotalShipping(float $totalShipping): void
    {
        $this->totalShipping = $totalShipping;
    }

    public function getTotalShippingTaxIncl(): ?float
    {
        return $this->totalShippingTaxIncl;
    }

    public function setTotalShippingTaxIncl(float $totalShippingTaxIncl): void
    {
        $this->totalShippingTaxIncl = $totalShippingTaxIncl;
    }

    public function getTotalShippingTaxExcl(): ?float
    {
        return $this->totalShippingTaxExcl;
    }

    public function setTotalShippingTaxExcl(float $totalShippingTaxExcl): void
    {
        $this->totalShippingTaxExcl = $totalShippingTaxExcl;
    }

    public function getCarrierTaxRate(): ?int
    {
        return $this->carrierTaxRate;
    }

    public function setCarrierTaxRate(int $carrierTaxRate): void
    {
        $this->carrierTaxRate = $carrierTaxRate;
    }

    public function getTotalWrapping(): ?float
    {
        return $this->totalWrapping;
    }

    public function setTotalWrapping(float $totalWrapping): void
    {
        $this->totalWrapping = $totalWrapping;
    }

    public function getTotalWrappingTaxIncl(): ?float
    {
        return $this->totalWrappingTaxIncl;
    }

    public function setTotalWrappingTaxIncl(float $totalWrappingTaxIncl): void
    {
        $this->totalWrappingTaxIncl = $totalWrappingTaxIncl;
    }

    public function getTotalWrappingTaxExcl(): ?float
    {
        return $this->totalWrappingTaxExcl;
    }

    public function setTotalWrappingTaxExcl(float $totalWrappingTaxExcl): void
    {
        $this->totalWrappingTaxExcl = $totalWrappingTaxExcl;
    }

    public function getRoundMode(): ?int
    {
        return $this->roundMode;
    }

    public function setRoundMode(int $roundMode): void
    {
        $this->roundMode = $roundMode;
    }

    public function getRoundType(): ?int
    {
        return $this->roundType;
    }

    public function setRoundType(int $roundType): void
    {
        $this->roundType = $roundType;
    }

    public function getConversionRate(): ?float
    {
        return $this->conversionRate;
    }

    public function setConversionRate(float $conversionRate): void
    {
        $this->conversionRate = $conversionRate;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getAssociations(): array
    {
        return $this->associations;
    }

    public function setAssociations(array $associations): void
    {
        $this->associations = $associations;
    }

    public function getDeliveryPointName(): ?string
    {
        return $this->deliveryPointName;
    }

    public function setDeliveryPointName(string $deliveryPointName): void
    {
        $this->deliveryPointName = $deliveryPointName;
    }

    public function getDeliveryPointAddress(): ?string
    {
        return $this->deliveryPointAddress;
    }

    public function setDeliveryPointAddress(string $deliveryPointAddress): void
    {
        $this->deliveryPointAddress = $deliveryPointAddress;
    }

    public function getDeliveryPointCity(): ?string
    {
        return $this->deliveryPointCity;
    }

    public function setDeliveryPointCity(string $deliveryPointCity): void
    {
        $this->deliveryPointCity = $deliveryPointCity;
    }

    public function getDeliveryPointPostCode(): ?string
    {
        return $this->deliveryPointPostCode;
    }

    public function setDeliveryPointPostCode(string $deliveryPointPostCode): void
    {
        $this->deliveryPointPostCode = $deliveryPointPostCode;
    }

    public function getTargetPoint(): ?string
    {
        return $this->targetPoint;
    }

    public function setTargetPoint(string $targetPoint): void
    {
        $this->targetPoint = $targetPoint;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(string $trackingNumber): void
    {
        $this->trackingNumber = $trackingNumber;
    }

    /**
     * @param array $array
     * @return ModelInterface
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $order = new self;

        if (isset($array['id'])) {
            $order->setId((int) $array['id']);
        }
        if (isset($array['id_address_delivery'])) {
            $order->setIdAddressDelivery((int) $array['id_address_delivery']);
        }
        if (isset($array['id_address_invoice'])) {
            $order->setIdAddressInvoice((int) $array['id_address_invoice']);
        }
        if (isset($array['id_cart'])) {
            $order->setIdCart((int) $array['id_cart']);
        }
        if (isset($array['id_currency'])) {
            $order->setIdCurrency((int) $array['id_currency']);
        }
        if (isset($array['id_lang'])) {
            $order->setIdLang((int) $array['id_lang']);
        }
        if (isset($array['id_customer'])) {
            $order->setIdCustomer((int) $array['id_customer']);
        }
        if (isset($array['id_carrier'])) {
            $order->setIdCarrier((int) $array['id_carrier']);
        }
        if (isset($array['current_state'])) {
            $order->setCurrentState((int) $array['current_state']);
        }
        if (isset($array['module'])) {
            $order->setModule($array['module']);
        }
        if (isset($array['invoice_number'])) {
            $order->setInvoiceNumber((int) $array['invoice_number']);
        }
        if (isset($array['invoice_date'])) {
            $order->setInvoiceDate(new DateTime($array['invoice_date']));
        }
        if (isset($array['delivery_number'])) {
            $order->setDeliveryNumber((int) $array['delivery_number']);
        }
        if (isset($array['delivery_date'])) {
            $order->setDeliveryDate(new DateTime($array['delivery_date']));
        }
        if (isset($array['valid'])) {
            $order->setIsValid((int) $array['valid'] === 1);
        }
        if (isset($array['date_add'])) {
            $order->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd'])) {
            $order->setDateUpd(new DateTime($array['date_upd']));
        }
        if (isset($array['shipping_number'])) {
            $order->setShippingNumber($array['shipping_number']);
        }
        if (isset($array['id_shop_group'])) {
            $order->setIdShopGroup((int) $array['id_shop_group']);
        }
        if (isset($array['id_shop'])) {
            $order->setIdShop((int) $array['id_shop']);
        }
        if (isset($array['secure_key'])) {
            $order->setSecureKey($array['secure_key']);
        }
        if (isset($array['payment'])) {
            $order->setPayment($array['payment']);
        }
        if (isset($array['recyclable'])) {
            $order->setIsRecyclable((int) $array['recyclable'] === 1);
        }
        if (isset($array['gift'])) {
            $order->setIsGift((int) $array['gift'] === 1);
        }
        if (isset($array['gift_message'])) {
            $order->setGiftMessage($array['gift_message']);
        }
        if (isset($array['mobile_theme'])) {
            $order->setMobileTheme((int) $array['mobile_theme']);
        }
        if (isset($array['total_discounts'])) {
            $order->setTotalDiscounts((float) $array['total_discounts']);
        }
        if (isset($array['total_discounts_tax_incl'])) {
            $order->setTotalDiscountsTaxIncl((float) $array['total_discounts_tax_incl']);
        }
        if (isset($array['total_discounts_tax_excl'])) {
            $order->setTotalDiscountsTaxExcl((float) $array['total_discounts_tax_excl']);
        }
        if (isset($array['total_paid'])) {
            $order->setTotalPaid((float) $array['total_paid']);
        }
        if (isset($array['total_paid_tax_incl'])) {
            $order->setTotalPaidTaxIncl((float) $array['total_paid_tax_incl']);
        }
        if (isset($array['total_paid_tax_excl'])) {
            $order->setTotalPaidTaxExcl((float) $array['total_paid_tax_excl']);
        }
        if (isset($array['total_paid_real'])) {
            $order->setTotalPaidReal((float) $array['total_paid_real']);
        }
        if (isset($array['total_products'])) {
            $order->setTotalProducts((float) $array['total_products']);
        }
        if (isset($array['total_products_wt'])) {
            $order->setTotalProductsWt((float) $array['total_products_wt']);
        }
        if (isset($array['total_shipping'])) {
            $order->setTotalShipping((float) $array['total_shipping']);
        }
        if (isset($array['total_shipping_tax_incl'])) {
            $order->setTotalShippingTaxIncl((float) $array['total_shipping_tax_incl']);
        }
        if (isset($array['total_shipping_tax_excl'])) {
            $order->setTotalShippingTaxExcl((float) $array['total_shipping_tax_excl']);
        }
        if (isset($array['carrier_tax_rate'])) {
            $order->setCarrierTaxRate((int) round((float) $array['carrier_tax_rate']));
        }
        if (isset($array['total_wrapping'])) {
            $order->setTotalWrapping((float) $array['total_wrapping']);
        }
        if (isset($array['total_wrapping_tax_incl'])) {
            $order->setTotalWrappingTaxIncl((float) $array['total_wrapping_tax_incl']);
        }
        if (isset($array['total_wrapping_tax_excl'])) {
            $order->setTotalWrappingTaxExcl((float) $array['total_wrapping_tax_excl']);
        }
        if (isset($array['round_mode'])) {
            $order->setRoundMode((int) $array['round_mode']);
        }
        if (isset($array['round_type'])) {
            $order->setRoundType((int) $array['round_type']);
        }
        if (isset($array['conversion_rate'])) {
            $order->setConversionRate((float) $array['conversion_rate']);
        }
        if (isset($array['reference'])) {
            $order->setReference($array['reference']);
        }
        if (isset($array['bl_delivery_point_name'])) {
            $order->setDeliveryPointName($array['bl_delivery_point_name']);
        }
        if (isset($array['bl_delivery_point_address'])) {
            $order->setDeliveryPointAddress($array['bl_delivery_point_address']);
        }
        if (isset($array['bl_delivery_point_city'])) {
            $order->setDeliveryPointCity($array['bl_delivery_point_city']);
        }
        if (isset($array['bl_delivery_point_postcode'])) {
            $order->setDeliveryPointPostCode($array['bl_delivery_point_postcode']);
        }
        if (isset($array['target_point'])) {
            $order->setTargetPoint($array['target_point']);
        }
        if (isset($array['tracking_number'])) {
            $order->setTrackingNumber($array['tracking_number']);
        }
        if (isset($array['associations'])) {
            $order->setAssociations($array['associations']);
        }

        return $order;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */
        if ($this->getId() !== null) {
            $xml->order->id = $this->getId();
        }
        if ($this->getIdAddressDelivery() !== null) {
            $xml->order->id_address_delivery = $this->getIdAddressDelivery();
        }
        if ($this->getIdAddressInvoice() !== null) {
            $xml->order->id_address_invoice = $this->getIdAddressInvoice();
        }
        if ($this->getIdCart() !== null) {
            $xml->order->id_cart = $this->getIdCart();
        }
        if ($this->getIdCurrency() !== null) {
            $xml->order->id_currency = $this->getIdCurrency();
        }
        if ($this->getIdLang() !== null) {
            $xml->order->id_lang = $this->getIdLang();
        }
        if ($this->getIdCustomer() !== null) {
            $xml->order->id_customer = $this->getIdCustomer();
        }
        if ($this->getIdCarrier() !== null) {
            $xml->order->id_carrier = $this->getIdCarrier();
        }
        if ($this->getCurrentState() !== null) {
            $xml->order->current_state = $this->getCurrentState();
        }
        if ($this->getModule() !== null) {
            $xml->order->module = $this->getModule();
        }
        if ($this->getInvoiceNumber() !== null) {
            $xml->order->invoice_number = $this->getInvoiceNumber();
        }
        if ($this->getInvoiceDate() !== null) {
            $xml->order->invoice_date = $this->getInvoiceDate()->format('Y-m-d');
        }
        if ($this->getDeliveryNumber() !== null) {
            $xml->order->delivery_number = $this->getDeliveryNumber();
        }
        if ($this->getDeliveryDate() !== null) {
            $xml->order->delivery_date = $this->getDeliveryDate()->format('Y-m-d');
        }
        if ($this->isIsValid() !== null) {
            $xml->order->valid = $this->isIsValid() ? '1' : '0';
        }
        if ($this->getShippingNumber() !== null) {
            $xml->order->shipping_number = $this->getShippingNumber();
        }
        if ($this->getIdShopGroup() !== null) {
            $xml->order->id_shop_group = $this->getIdShopGroup();
        }
        if ($this->getIdShop() !== null) {
            $xml->order->id_shop = $this->getIdShop();
        }
        if ($this->getSecureKey() !== null) {
            $xml->order->secure_key = $this->getSecureKey();
        }
        if ($this->getPayment() !== null) {
            $xml->order->payment = $this->getPayment();
        }
        if ($this->isIsRecyclable() !== null) {
            $xml->order->recyclable = $this->isIsRecyclable() ? '1' : '0';
        }
        if ($this->isIsGift() !== null) {
            $xml->order->gift = $this->isIsGift() ? '1' : '0';
        }
        if ($this->getGiftMessage() !== null) {
            $xml->order->gift_message = $this->getGiftMessage();
        }
        if ($this->getMobileTheme() !== null) {
            $xml->order->mobile_theme = $this->getMobileTheme();
        }
        if ($this->getTotalDiscounts() !== null) {
            $xml->order->total_discounts = $this->getTotalDiscounts();
        }
        if ($this->getTotalDiscountsTaxIncl() !== null) {
            $xml->order->total_discounts_tax_incl = $this->getTotalDiscountsTaxIncl();
        }
        if ($this->getTotalDiscountsTaxExcl() !== null) {
            $xml->order->total_discounts_tax_excl = $this->getTotalDiscountsTaxExcl();
        }
        if ($this->getTotalPaid() !== null) {
            $xml->order->total_paid = $this->getTotalPaid();
        }
        if ($this->getTotalPaidTaxIncl() !== null) {
            $xml->order->total_paid_tax_incl = $this->getTotalPaidTaxIncl();
        }
        if ($this->getTotalPaidTaxExcl() !== null) {
            $xml->order->total_paid_tax_excl = $this->getTotalPaidTaxExcl();
        }
        if ($this->getTotalPaidReal() !== null) {
            $xml->order->total_paid_real = $this->getTotalPaidReal();
        }
        if ($this->getTotalProducts() !== null) {
            $xml->order->total_products = $this->getTotalProducts();
        }
        if ($this->getTotalProductsWt() !== null) {
            $xml->order->total_products_wt = $this->getTotalProductsWt();
        }
        if ($this->getTotalShipping() !== null) {
            $xml->order->total_shipping = $this->getTotalShipping();
        }
        if ($this->getTotalShippingTaxIncl() !== null) {
            $xml->order->total_shipping_tax_incl = $this->getTotalShippingTaxIncl();
        }
        if ($this->getTotalShippingTaxExcl() !== null) {
            $xml->order->total_shipping_tax_excl = $this->getTotalShippingTaxExcl();
        }
        if ($this->getCarrierTaxRate() !== null) {
            $xml->order->carrier_tax_rate = $this->getCarrierTaxRate();
        }
        if ($this->getTotalWrapping() !== null) {
            $xml->order->total_wrapping = $this->getTotalWrapping();
        }
        if ($this->getTotalWrappingTaxIncl() !== null) {
            $xml->order->total_wrapping_tax_incl = $this->getTotalWrappingTaxIncl();
        }
        if ($this->getTotalWrappingTaxExcl() !== null) {
            $xml->order->total_wrapping_tax_excl = $this->getTotalWrappingTaxExcl();
        }
        if ($this->getRoundMode() !== null) {
            $xml->order->round_mode = $this->getRoundMode();
        }
        if ($this->getRoundType() !== null) {
            $xml->order->round_type = $this->getRoundType();
        }
        if ($this->getConversionRate() !== null) {
            $xml->order->conversion_rate = $this->getConversionRate();
        }
        if ($this->getReference() !== null) {
            $xml->order->reference = $this->getReference();
        }
        if ($this->getDeliveryPointName() !== null) {
            $xml->order->bl_delivery_point_name = $this->getDeliveryPointName();
        }
        if ($this->getDeliveryPointAddress() !== null) {
            $xml->order->bl_delivery_point_address = $this->getDeliveryPointAddress();
        }
        if ($this->getDeliveryPointCity() !== null) {
            $xml->order->bl_delivery_point_city = $this->getDeliveryPointCity();
        }
        if ($this->getDeliveryPointPostCode() !== null) {
            $xml->order->bl_delivery_point_postcode = $this->getDeliveryPointPostCode();
        }
        if (isset($xml->order->tracking_number)) {
            unset($xml->order->tracking_number);
        }
        if (isset($xml->order->target_point)) {
            unset($xml->order->target_point);
        }
        if ($this->getAssociations() !== null) {
            unset($xml->order->associations->cart_rows);
            foreach ($this->getAssociations() as $associationKey => $association) {
                switch ($associationKey) {
                    case 'cart_rows':
                        $cartRows = $xml->product->associations->addChild('cart_rows');
                        $cartRows->addAttribute('nodeType', 'cart_row');
                        $cartRows->addAttribute('virtualEntity', 'true');
                        foreach ($association as $associationItem) {
                            $cartRow = $cartRows->addChild('cart_row');
                            if (!isset($association['id_product'], $association['quantity'])) {
                                throw new WsException('id_product & quantity required');
                            }
                            $cartRow->addChild('id_product', $association['id_product']);
                            if (isset($association['id_product_attribute'])) {
                                $cartRow->addChild('id_product_attribute', $association['id_product_attribute']);
                            }
                            if (isset($association['id_address_delivery'])) {
                                $cartRow->addChild('id_address_delivery', $association['id_address_delivery']);
                            }
                            if (isset($association['id_customization'])) {
                                $cartRow->addChild('id_customization', $association['id_customization']);
                            }
                            $cartRow->addChild('quantity', $association['quantity']);

                        }
                        break;
                }
            }
        }

        return $xml;
    }
}
