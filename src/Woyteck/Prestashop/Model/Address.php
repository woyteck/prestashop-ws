<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class Address implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idCustomer;

    /** @var int */
    private $idManufacturer;

    /** @var int */
    private $idSupplier;

    /** @var int */
    private $idWarehouse;

    /** @var int */
    private $idCountry;

    /** @var int */
    private $idState;

    /** @var string */
    private $alias;

    /** @var string */
    private $company;

    /** @var string */
    private $lastname;

    /** @var string */
    private $firstname;

    /** @var string */
    private $vatNumber;

    /** @var string */
    private $address1;

    /** @var string */
    private $address2;

    /** @var string */
    private $postcode;

    /** @var string */
    private $city;

    /** @var string */
    private $other;

    /** @var string */
    private $phone;

    /** @var string */
    private $phoneMobile;

    /** @var string */
    private $dni;

    /** @var bool */
    private $deleted;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

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
    public function getIdManufacturer(): ?int
    {
        return $this->idManufacturer;
    }

    /**
     * @param int $idManufacturer
     */
    public function setIdManufacturer(int $idManufacturer): void
    {
        $this->idManufacturer = $idManufacturer;
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
     */
    public function setIdSupplier(int $idSupplier): void
    {
        $this->idSupplier = $idSupplier;
    }

    /**
     * @return int|null
     */
    public function getIdWarehouse(): ?int
    {
        return $this->idWarehouse;
    }

    /**
     * @param int $idWarehouse
     */
    public function setIdWarehouse(int $idWarehouse): void
    {
        $this->idWarehouse = $idWarehouse;
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
    public function getIdState(): ?int
    {
        return $this->idState;
    }

    /**
     * @param int $idState
     */
    public function setIdState(int $idState): void
    {
        $this->idState = $idState;
    }

    /**
     * @return string|null
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     */
    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    /**
     * @param string $vatNumber
     */
    public function setVatNumber(string $vatNumber): void
    {
        $this->vatNumber = $vatNumber;
    }

    /**
     * @return string|null
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     */
    public function setAddress1(string $address1): void
    {
        $this->address1 = $address1;
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     */
    public function setAddress2(string $address2): void
    {
        $this->address2 = $address2;
    }

    /**
     * @return string|null
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     */
    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getOther(): ?string
    {
        return $this->other;
    }

    /**
     * @param string $other
     */
    public function setOther(string $other): void
    {
        $this->other = $other;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getPhoneMobile(): ?string
    {
        return $this->phoneMobile;
    }

    /**
     * @param string $phoneMobile
     */
    public function setPhoneMobile(string $phoneMobile): void
    {
        $this->phoneMobile = $phoneMobile;
    }

    /**
     * @return string|null
     */
    public function getDni(): ?string
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     */
    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }

    /**
     * @return bool|null
     */
    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    /**
     * @return DateTime|null
     */
    public function getDateAdd(): ?DateTime
    {
        return $this->dateAdd;
    }

    /**
     * @param DateTime $dateAdd
     */
    public function setDateAdd(DateTime $dateAdd): void
    {
        $this->dateAdd = $dateAdd;
    }

    /**
     * @return DateTime|null
     */
    public function getDateUpd(): ?DateTime
    {
        return $this->dateUpd;
    }

    /**
     * @param DateTime $dateUpd
     */
    public function setDateUpd(DateTime $dateUpd): void
    {
        $this->dateUpd = $dateUpd;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $address = new self;

        if (isset($array['id']) && $array['id'] !== '') {
            $address->setId($array['id']);
        }
        if (isset($array['id_customer']) && $array['id_customer'] !== '') {
            $address->setIdCustomer((int) $array['id_customer']);
        }
        if (isset($array['id_manufacturer']) && $array['id_manufacturer'] !== '') {
            $address->setIdManufacturer((int) $array['id_manufacturer']);
        }
        if (isset($array['id_supplier']) && $array['id_supplier'] !== '') {
            $address->setIdSupplier((int) $array['id_supplier']);
        }
        if (isset($array['id_warehouse']) && $array['id_warehouse'] !== '') {
            $address->setIdWarehouse((int) $array['id_warehouse']);
        }
        if (isset($array['id_country']) && $array['id_country'] !== '') {
            $address->setIdCountry((int) $array['id_country']);
        }
        if (isset($array['id_state']) && $array['id_state'] !== '') {
            $address->setIdState((int) $array['id_state']);
        }
        if (isset($array['alias']) && $array['alias'] !== '') {
            $address->setAlias($array['alias']);
        }
        if (isset($array['company']) && $array['company'] !== '') {
            $address->setCompany($array['company']);
        }
        if (isset($array['lastname']) && $array['lastname'] !== '') {
            $address->setLastname($array['lastname']);
        }
        if (isset($array['firstname']) && $array['firstname'] !== '') {
            $address->setFirstname($array['firstname']);
        }
        if (isset($array['vat_number']) && $array['vat_number'] !== '') {
            $address->setVatNumber($array['vat_number']);
        }
        if (isset($array['address1']) && $array['address1'] !== '') {
            $address->setAddress1($array['address1']);
        }
        if (isset($array['address2']) && $array['address2'] !== '') {
            $address->setAddress2($array['address2']);
        }
        if (isset($array['postcode']) && $array['postcode'] !== '') {
            $address->setPostcode($array['postcode']);
        }
        if (isset($array['city']) && $array['city'] !== '') {
            $address->setCity($array['city']);
        }
        if (isset($array['other']) && $array['other'] !== '') {
            $address->setOther($array['other']);
        }
        if (isset($array['phone']) && $array['phone'] !== '') {
            $address->setPhone($array['phone']);
        }
        if (isset($array['phone_mobile']) && $array['phone_mobile'] !== '') {
            $address->setPhoneMobile($array['phone_mobile']);
        }
        if (isset($array['dni']) && $array['dni'] !== '') {
            $address->setDni($array['dni']);
        }
        if (isset($array['deleted']) && $array['deleted'] !== '') {
            $address->setDeleted($array['deleted'] === '1');
        }
        if (isset($array['date_add']) && $array['date_add'] !== '') {
            $address->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd']) && $array['date_upd'] !== '') {
            $address->setDateUpd(new DateTime($array['date_upd']));
        }

        return $address;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->address->id = $this->getId();
        }
        if ($this->getIdCustomer() !== null) {
            $xml->address->id_customer = $this->getIdCustomer();
        }
        if ($this->getIdManufacturer() !== null) {
            $xml->address->id_manufacturer = $this->getIdManufacturer();
        }
        if ($this->getIdSupplier() !== null) {
            $xml->address->id_supplier = $this->getIdSupplier();
        }
        if ($this->getIdWarehouse() !== null) {
            $xml->address->id_warehouse = $this->getIdWarehouse();
        }
        if ($this->getIdCountry() !== null) {
            $xml->address->id_country = $this->getIdCountry();
        }
        if ($this->getIdState() !== null) {
            $xml->address->id_state = $this->getIdState();
        }
        if ($this->getAlias() !== null) {
            $xml->address->alias = $this->getAlias();
        }
        if ($this->getCompany() !== null) {
            $xml->address->company = $this->getCompany();
        }
        if ($this->getLastname() !== null) {
            $xml->address->lastname = $this->getLastname();
        }
        if ($this->getFirstname() !== null) {
            $xml->address->firstname = $this->getFirstname();
        }
        if ($this->getVatNumber() !== null) {
            $xml->address->vat_number = $this->getVatNumber();
        }
        if ($this->getAddress1() !== null) {
            $xml->address->address1 = $this->getAddress1();
        }
        if ($this->getAddress2() !== null) {
            $xml->address->address2 = $this->getAddress2();
        }
        if ($this->getPostcode() !== null) {
            $xml->address->postcode = $this->getPostcode();
        }
        if ($this->getCity() !== null) {
            $xml->address->city = $this->getCity();
        }
        if ($this->getOther() !== null) {
            $xml->address->other = $this->getOther();
        }
        if ($this->getPhone() !== null) {
            $xml->address->phone = $this->getPhone();
        }
        if ($this->getPhoneMobile() !== null) {
            $xml->address->phone_mobile = $this->getPhoneMobile();
        }
        if ($this->getDni() !== null) {
            $xml->address->dni = $this->getDni();
        }
        if ($this->isDeleted() !== null) {
            $xml->address->deleted = $this->isDeleted() ? '1' : '0';
        }
        if ($this->getDateAdd() !== null) {
            $xml->address->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        }
        if ($this->getDateUpd() !== null) {
            $xml->address->date_upd = $this->getDateUpd()->format('Y-m-d H:i:s');
        }

        return $xml;
    }
}
