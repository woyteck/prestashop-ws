<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class Country implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idZone;

    /** @var int */
    private $idCurrency;

    /** @var string */
    private $callPrefix;

    /** @var string */
    private $isoCode;

    /** @var bool */
    private $active;

    /** @var bool */
    private $containsStates;

    /** @var bool */
    private $needIdentificationNumber;

    /** @var bool */
    private $needZipCode;

    /** @var string */
    private $zipCodeFormat;

    /** @var bool */
    private $displayTaxLabel;

    /** @var string[] */
    private $name = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdZone(): ?int
    {
        return $this->idZone;
    }

    public function setIdZone(int $idZone): void
    {
        $this->idZone = $idZone;
    }

    public function getIdCurrency(): ?int
    {
        return $this->idCurrency;
    }

    public function setIdCurrency(int $idCurrency): void
    {
        $this->idCurrency = $idCurrency;
    }

    public function getCallPrefix(): ?string
    {
        return $this->callPrefix;
    }

    public function setCallPrefix(string $callPrefix): void
    {
        $this->callPrefix = $callPrefix;
    }

    public function getIsoCode(): ?string
    {
        return $this->isoCode;
    }

    public function setIsoCode(string $isoCode): void
    {
        $this->isoCode = $isoCode;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function isContainsStates(): ?bool
    {
        return $this->containsStates;
    }

    public function setContainsStates(bool $containsStates): void
    {
        $this->containsStates = $containsStates;
    }

    public function isNeedIdentificationNumber(): ?bool
    {
        return $this->needIdentificationNumber;
    }

    public function setNeedIdentificationNumber(bool $needIdentificationNumber): void
    {
        $this->needIdentificationNumber = $needIdentificationNumber;
    }

    public function isNeedZipCode(): ?bool
    {
        return $this->needZipCode;
    }

    public function setNeedZipCode(bool $needZipCode): void
    {
        $this->needZipCode = $needZipCode;
    }

    public function getZipCodeFormat(): ?string
    {
        return $this->zipCodeFormat;
    }

    public function setZipCodeFormat(string $zipCodeFormat): void
    {
        $this->zipCodeFormat = $zipCodeFormat;
    }

    public function isDisplayTaxLabel(): ?bool
    {
        return $this->displayTaxLabel;
    }

    public function setDisplayTaxLabel(bool $displayTaxLabel): void
    {
        $this->displayTaxLabel = $displayTaxLabel;
    }

    public function getName(int $languageId = 1): ?string
    {
        return $this->name[$languageId] ?? null;
    }

    public function setName(string $name, int $languageId = 1): void
    {
        $this->name[$languageId] = $name;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     */
    public static function fromArray(array $array): ModelInterface
    {
        $country = new self();

        if (isset($array['id'])) {
            $country->setId((int) $array['id']);
        }
        if (isset($array['id_zone'])) {
            $country->setIdZone((int) $array['id_zone']);
        }
        if (isset($array['id_currency'])) {
            $country->setIdCurrency((int) $array['id_currency']);
        }
        if (isset($array['call_prefix'])) {
            $country->setCallPrefix($array['call_prefix']);
        }
        if (isset($array['iso_code'])) {
            $country->setIsoCode($array['iso_code']);
        }
        if (isset($array['active'])) {
            $country->setActive($array['active'] === '1');
        }
        if (isset($array['contains_states'])) {
            $country->setContainsStates($array['contains_states'] === '1');
        }
        if (isset($array['need_identification_number'])) {
            $country->setNeedIdentificationNumber($array['need_identification_number'] === '1');
        }
        if (isset($array['need_zip_code'])) {
            $country->setNeedZipCode($array['need_zip_code'] === '1');
        }
        if (isset($array['zip_code_format'])) {
            $country->setZipCodeFormat($array['zip_code_format']);
        }
        if (isset($array['display_tax_label'])) {
            $country->setDisplayTaxLabel($array['display_tax_label'] === '1');
        }
        if (isset($array['name'])) {
            if (is_array($array['name'])) {
                foreach ($array['name'] as $name) {
                    $country->setName($name['value'], (int) $name['id']);
                }
            } else {
                $country->setName($array['name']);
            }
        }

        return $country;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->country->id = $this->getId();
        }
        if ($this->getIdZone() !== null) {
            $xml->country->id_zone = $this->getIdZone();
        }
        if ($this->getIdCurrency() !== null) {
            $xml->country->id_currency = $this->getIdCurrency();
        }
        if ($this->getCallPrefix() !== null) {
            $xml->country->call_prefix = $this->getCallPrefix();
        }
        if ($this->getIsoCode() !== null) {
            $xml->country->iso_code = $this->getIsoCode();
        }
        if ($this->isActive() !== null) {
            $xml->country->active = $this->isActive() ? '1' : '0';
        }
        if ($this->isContainsStates() !== null) {
            $xml->country->contains_states = $this->isContainsStates() ? '1' : '0';
        }
        if ($this->isNeedIdentificationNumber() !== null) {
            $xml->country->need_identification_number = $this->isNeedIdentificationNumber() ? '1' : '0';
        }
        if ($this->isNeedZipCode() !== null) {
            $xml->country->need_zip_code = $this->isNeedZipCode() ? '1' : '0';
        }
        if ($this->getZipCodeFormat() !== null) {
            $xml->country->zip_code_format = $this->getZipCodeFormat();
        }
        if ($this->isDisplayTaxLabel() !== null) {
            $xml->country->display_tax_label = $this->isDisplayTaxLabel() ? '1' : '0';
        }
        $i = 0;
        foreach ($this->name as $languageId => $value) {
            $xml->country->name->language[$i] = $this->getName($languageId);
            if (!isset($xml->country->name->language[$i]['id'])) {
                $xml->country->name->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
