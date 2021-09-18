<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class TaxRule implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idTaxRulesGroup;

    /** @var int */
    private $idState;

    /** @var int */
    private $idCountry;

    /** @var int */
    private $zipcodeFrom;

    /** @var int */
    private $zipcodeTo;

    /** @var int */
    private $idTax;

    /** @var int */
    private $behavior;

    /** @var string */
    private $description;

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
    public function getIdTaxRulesGroup(): ?int
    {
        return $this->idTaxRulesGroup;
    }

    /**
     * @param int $idTaxRulesGroup
     */
    public function setIdTaxRulesGroup(int $idTaxRulesGroup): void
    {
        $this->idTaxRulesGroup = $idTaxRulesGroup;
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
    public function getZipcodeFrom(): ?int
    {
        return $this->zipcodeFrom;
    }

    /**
     * @param int $zipcodeFrom
     */
    public function setZipcodeFrom(int $zipcodeFrom): void
    {
        $this->zipcodeFrom = $zipcodeFrom;
    }

    /**
     * @return int|null
     */
    public function getZipcodeTo(): ?int
    {
        return $this->zipcodeTo;
    }

    /**
     * @param int $zipcodeTo
     */
    public function setZipcodeTo(int $zipcodeTo): void
    {
        $this->zipcodeTo = $zipcodeTo;
    }

    /**
     * @return int|null
     */
    public function getIdTax(): ?int
    {
        return $this->idTax;
    }

    /**
     * @param int $idTax
     */
    public function setIdTax(int $idTax): void
    {
        $this->idTax = $idTax;
    }

    /**
     * @return int|null
     */
    public function getBehavior(): ?int
    {
        return $this->behavior;
    }

    /**
     * @param int $behavior
     */
    public function setBehavior(int $behavior): void
    {
        $this->behavior = $behavior;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     */
    public static function fromArray(array $array): ModelInterface
    {
        $taxRule = new self;

        if (isset($array['id'])) {
            $taxRule->setId((int) $array['id']);
        }
        if (isset($array['id_tax_rules_group'])) {
            $taxRule->setIdTaxRulesGroup((int) $array['id_tax_rules_group']);
        }
        if (isset($array['id_state'])) {
            $taxRule->setIdState((int) $array['id_state']);
        }
        if (isset($array['id_country'])) {
            $taxRule->setIdCountry((int) $array['id_country']);
        }
        if (isset($array['zipcode_from'])) {
            $taxRule->setZipcodeFrom((int) $array['zipcode_from']);
        }
        if (isset($array['zipcode_to'])) {
            $taxRule->setZipcodeTo((int) $array['zipcode_to']);
        }
        if (isset($array['id_tax'])) {
            $taxRule->setIdTax((int) $array['id_tax']);
        }
        if (isset($array['behavior'])) {
            $taxRule->setBehavior((int) $array['behavior']);
        }
        if (isset($array['description'])) {
            $taxRule->setDescription($array['description']);
        }

        return $taxRule;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->tax_rule->id = $this->getId();
        }
        if ($this->getIdTaxRulesGroup() !== null) {
            $xml->tax_rule->id_tax_rules_group = $this->getIdTaxRulesGroup();
        }
        if ($this->getIdState() !== null) {
            $xml->tax_rule->id_state = $this->getIdState();
        }
        if ($this->getIdCountry() !== null) {
            $xml->tax_rule->id_country = $this->getIdCountry();
        }
        if ($this->getZipcodeFrom() !== null) {
            $xml->tax_rule->zipcode_from = $this->getZipcodeFrom();
        }
        if ($this->getZipcodeTo() !== null) {
            $xml->tax_rule->zipcode_to = $this->getZipcodeTo();
        }
        if ($this->getIdTax() !== null) {
            $xml->tax_rule->id_tax = $this->getIdTax();
        }
        if ($this->getBehavior() !== null) {
            $xml->tax_rule->behavior = $this->getBehavior();
        }
        if ($this->getDescription() !== null) {
            $xml->tax_rule->description = $this->getDescription();
        }

        return $xml;
    }
}
