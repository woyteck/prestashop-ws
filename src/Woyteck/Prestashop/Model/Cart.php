<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;
use Woyteck\Prestashop\WsException;

class Cart implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idAddressDelivery;

    /** @var int */
    private $idAddressInvoice;

    /** @var int */
    private $idCurrency;

    /** @var int */
    private $idCustomer;

    /** @var int */
    private $idGuest;

    /** @var int */
    private $idLang;

    /** @var string */
    private $paczkomatCode;

    /** @var string */
    private $paczkomatAddress;

    /** @var int */
    private $idShopGroup;

    /** @var int */
    private $idShop;

    /** @var int */
    private $idCarrier;

    /** @var bool */
    private $recyclable;

    /** @var bool */
    private $gift;

    /** @var string */
    private $giftMessage;

    /** @var string */
    private $mobileTheme;

    /** @var string */
    private $deliveryOption;

    /** @var string */
    private $secureKey;

    /** @var bool */
    private $allowSeparatedPackage;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

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

    public function getIdCurrency(): ?int
    {
        return $this->idCurrency;
    }

    public function setIdCurrency(int $idCurrency): void
    {
        $this->idCurrency = $idCurrency;
    }

    public function getIdCustomer(): ?int
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(int $idCustomer): void
    {
        $this->idCustomer = $idCustomer;
    }

    public function getIdGuest(): ?int
    {
        return $this->idGuest;
    }

    public function setIdGuest(int $idGuest): void
    {
        $this->idGuest = $idGuest;
    }

    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    public function setIdLang(int $idLang): void
    {
        $this->idLang = $idLang;
    }

    public function getPaczkomatCode(): ?string
    {
        return $this->paczkomatCode;
    }

    public function setPaczkomatCode(string $paczkomatCode): void
    {
        $this->paczkomatCode = $paczkomatCode;
    }

    public function getPaczkomatAddress(): ?string
    {
        return $this->paczkomatAddress;
    }

    public function setPaczkomatAddress(string $paczkomatAddress): void
    {
        $this->paczkomatAddress = $paczkomatAddress;
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

    public function getIdCarrier(): ?int
    {
        return $this->idCarrier;
    }

    public function setIdCarrier(int $idCarrier): void
    {
        $this->idCarrier = $idCarrier;
    }

    public function isRecyclable(): ?bool
    {
        return $this->recyclable;
    }

    public function setRecyclable(bool $recyclable): void
    {
        $this->recyclable = $recyclable;
    }

    public function isGift(): ?bool
    {
        return $this->gift;
    }

    public function setGift(bool $gift): void
    {
        $this->gift = $gift;
    }

    public function getGiftMessage(): ?string
    {
        return $this->giftMessage;
    }

    public function setGiftMessage(string $giftMessage): void
    {
        $this->giftMessage = $giftMessage;
    }

    public function getMobileTheme(): ?string
    {
        return $this->mobileTheme;
    }

    public function setMobileTheme(string $mobileTheme): void
    {
        $this->mobileTheme = $mobileTheme;
    }

    public function getDeliveryOption(): ?string
    {
        return $this->deliveryOption;
    }

    public function setDeliveryOption(string $deliveryOption): void
    {
        $this->deliveryOption = $deliveryOption;
    }

    public function getSecureKey(): ?string
    {
        return $this->secureKey;
    }

    public function setSecureKey(string $secureKey): void
    {
        $this->secureKey = $secureKey;
    }

    public function isAllowSeparatedPackage(): ?bool
    {
        return $this->allowSeparatedPackage;
    }

    public function setAllowSeparatedPackage(bool $allowSeparatedPackage): void
    {
        $this->allowSeparatedPackage = $allowSeparatedPackage;
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
     * @return ModelInterface|self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $cart = new self;

        if (isset($array['id']) && $array['id'] !== '') {
            $cart->setId((int) $array['id']);
        }
        if (isset($array['id_cart_delivery']) && $array['id_customer'] !== '') {
            $cart->setIdAddressDelivery((int) $array['id_cart_delivery']);
        }
        if (isset($array['id_cart_invoice']) && $array['id_cart_invoice'] !== '') {
            $cart->setIdAddressInvoice((int) $array['id_cart_invoice']);
        }
        if (isset($array['id_currency']) && $array['id_currency'] !== '') {
            $cart->setIdCurrency((int) $array['id_currency']);
        }
        if (isset($array['id_customer']) && $array['id_customer'] !== '') {
            $cart->setIdCustomer((int) $array['id_customer']);
        }
        if (isset($array['id_guest']) && $array['id_guest'] !== '') {
            $cart->setIdGuest((int) $array['id_guest']);
        }
        if (isset($array['id_lang']) && $array['id_lang'] !== '') {
            $cart->setIdLang((int) $array['id_lang']);
        }
        if (isset($array['paczkomat_code']) && $array['paczkomat_code'] !== '') {
            $cart->setPaczkomatCode($array['paczkomat_code']);
        }
        if (isset($array['paczkomat_cart']) && $array['paczkomat_cart'] !== '') {
            $cart->setPaczkomatAddress($array['paczkomat_cart']);
        }
        if (isset($array['id_shop_group']) && $array['id_shop_group'] !== '') {
            $cart->setIdShopGroup((int) $array['id_shop_group']);
        }
        if (isset($array['id_shop']) && $array['id_shop'] !== '') {
            $cart->setIdShop((int) $array['id_shop']);
        }
        if (isset($array['id_carrier']) && $array['id_carrier'] !== '') {
            $cart->setIdCarrier((int) $array['id_carrier']);
        }
        if (isset($array['recyclable']) && $array['recyclable'] !== '') {
            $cart->setRecyclable((int) $array['recyclable'] === 1);
        }
        if (isset($array['gift']) && $array['gift'] !== '') {
            $cart->setGift((int) $array['gift'] === 1);
        }
        if (isset($array['gift_message']) && $array['gift_message'] !== '') {
            $cart->setGiftMessage($array['gift_message']);
        }
        if (isset($array['mobile_theme']) && $array['mobile_theme'] !== '') {
            $cart->setMobileTheme($array['mobile_theme']);
        }
        if (isset($array['delivery_option']) && $array['delivery_option'] !== '') {
            $cart->setDeliveryOption($array['delivery_option']);
        }
        if (isset($array['secure_key']) && $array['secure_key'] !== '') {
            $cart->setSecureKey($array['secure_key']);
        }
        if (isset($array['allow_seperated_package']) && $array['allow_seperated_package'] !== '') {
            $cart->setAllowSeparatedPackage((int) $array['allow_seperated_package'] === 1);
        }
        if (isset($array['date_add']) && $array['date_add'] !== '') {
            $cart->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd']) && $array['date_upd'] !== '') {
            $cart->setDateUpd(new DateTime($array['date_upd']));
        }
        if (isset($array['associations'])) {
            $cart->setAssociations($array['associations']);
        }

        return $cart;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->cart->id = $this->getId();
        }
        if ($this->getIdAddressDelivery() !== null) {
            $xml->cart->id_address_delivery = $this->getIdAddressDelivery();
        }
        if ($this->getIdAddressInvoice() !== null) {
            $xml->cart->id_address_invoice = $this->getIdAddressInvoice();
        }
        if ($this->getIdCurrency() !== null) {
            $xml->cart->id_currency = $this->getIdCurrency();
        }
        if ($this->getIdCustomer() !== null) {
            $xml->cart->id_customer = $this->getIdCustomer();
        }
        if ($this->getIdGuest() !== null) {
            $xml->cart->id_guest = $this->getIdGuest();
        }
        if ($this->getIdLang() !== null) {
            $xml->cart->id_lang = $this->getIdLang();
        }
        if ($this->getPaczkomatAddress() !== null) {
            $xml->cart->paczkomat_address = $this->getPaczkomatAddress();
        }
        if ($this->getIdShopGroup() !== null) {
            $xml->cart->id_shop_group = $this->getIdShopGroup();
        }
        if ($this->getIdShop() !== null) {
            $xml->cart->id_shop = $this->getIdShop();
        }
        if ($this->getIdCarrier() !== null) {
            $xml->cart->id_carrier = $this->getIdCarrier();
        }
        if ($this->isRecyclable() !== null) {
            $xml->cart->recyclable = $this->isRecyclable() ? '1' : '0';
        }
        if ($this->isGift() !== null) {
            $xml->cart->gift = $this->isGift() ? '1' : '0';
        }
        if ($this->getGiftMessage() !== null) {
            $xml->cart->gift_message = $this->getGiftMessage();
        }
        if ($this->getMobileTheme() !== null) {
            $xml->cart->mobile_theme = $this->getMobileTheme();
        }
        if ($this->getDeliveryOption() !== null) {
            $xml->cart->delivery_option = $this->getDeliveryOption();
        }
        if ($this->getSecureKey() !== null) {
            $xml->cart->secure_key = $this->getSecureKey();
        }
        if ($this->isAllowSeparatedPackage() !== null) {
            $xml->cart->allow_seperated_package = $this->isAllowSeparatedPackage() ? '1' : '0';
        }
        if ($this->getDateAdd() !== null) {
            $xml->cart->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        }
        if ($this->getDateUpd() !== null) {
            $xml->cart->date_upd = $this->getDateUpd()->format('Y-m-d H:i:s');
        }
        if (isset($xml->cart->paczkomat_address)) {
            unset($xml->cart->paczkomat_address);
        }
        if ($this->getAssociations() !== null) {
            unset($xml->cart->paczkomat_code);
            unset($xml->cart->associations->cart_rows);
            foreach ($this->getAssociations() as $associationKey => $association) {
                switch ($associationKey) {
                    case 'cart_rows':
                        $cartRows = $xml->cart->associations->addChild('cart_rows');
                        $cartRows->addAttribute('nodeType', 'cart_row');
                        $cartRows->addAttribute('virtualEntity', 'true');
                        foreach ($association as $associationItem) {
                            $cartRow = $cartRows->addChild('cart_row');
                            if (!isset($associationItem['id_product'], $associationItem['quantity'])) {
                                throw new WsException('id_product & quantity required');
                            }
                            $cartRow->addChild('id_product', (string) $associationItem['id_product']);
                            if (isset($associationItem['id_product_attribute'])) {
                                $cartRow->addChild('id_product_attribute', (string) $associationItem['id_product_attribute']);
                            }
                            if (isset($associationItem['id_address_delivery'])) {
                                $cartRow->addChild('id_address_delivery', (string) $associationItem['id_address_delivery']);
                            }
                            if (isset($associationItem['id_customization'])) {
                                $cartRow->addChild('id_customization', (string) $associationItem['id_customization']);
                            }
                            if (isset($associationItem['product_price'])) {
                                $cartRow->addChild('product_price', (string) $associationItem['product_price']);
                            }
                            if (isset($associationItem['unit_price_tax_incl'])) {
                                $cartRow->addChild('unit_price_tax_incl', (string) $associationItem['unit_price_tax_incl']);
                            }
                            if (isset($associationItem['unit_price_tax_excl'])) {
                                $cartRow->addChild('unit_price_tax_excl', (string) $associationItem['unit_price_tax_excl']);
                            }
                            $cartRow->addChild('quantity', (string) $associationItem['quantity']);

                        }
                        break;
                }
            }
        }

        return $xml;
    }
}
