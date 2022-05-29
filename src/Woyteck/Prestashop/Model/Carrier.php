<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class Carrier implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var bool */
    private $deleted;

    /** @var bool */
    private $isModule;

    /** @var int */
    private $idTaxRulesGroup;

    /** @var int */
    private $idReference;

    /** @var string */
    private $name;

    /** @var bool */
    private $active;

    /** @var bool */
    private $isFree;

    /** @var bool */
    private $shippingHandling;

    /** @var bool */
    private $shippingExternal;

    /** @var bool */
    private $rangeBehavior;

    /** @var int */
    private $shippingMethod;

    /** @var int */
    private $maxWidth;

    /** @var int */
    private $maxHeight;

    /** @var int */
    private $maxDepth;

    /** @var int */
    private $maxWeight;

    /** @var int */
    private $grade;

    /** @var string */
    private $externalModuleName;

    /** @var int */
    private $needRange;

    /** @var int */
    private $position;

    /** @var string[] */
    private $delay = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    public function isModule(): ?bool
    {
        return $this->isModule;
    }

    public function setIsModule(bool $isModule): void
    {
        $this->isModule = $isModule;
    }

    public function getIdTaxRulesGroup(): ?int
    {
        return $this->idTaxRulesGroup;
    }

    public function setIdTaxRulesGroup(int $idTaxRulesGroup): void
    {
        $this->idTaxRulesGroup = $idTaxRulesGroup;
    }

    public function getIdReference(): ?int
    {
        return $this->idReference;
    }

    public function setIdReference(int $idReference): void
    {
        $this->idReference = $idReference;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function isFree(): ?bool
    {
        return $this->isFree;
    }

    public function setIsFree(bool $isFree): void
    {
        $this->isFree = $isFree;
    }

    public function isShippingHandling(): ?bool
    {
        return $this->shippingHandling;
    }

    public function setShippingHandling(bool $shippingHandling): void
    {
        $this->shippingHandling = $shippingHandling;
    }

    public function isShippingExternal(): ?bool
    {
        return $this->shippingExternal;
    }

    public function setShippingExternal(bool $shippingExternal): void
    {
        $this->shippingExternal = $shippingExternal;
    }

    public function isRangeBehavior(): ?bool
    {
        return $this->rangeBehavior;
    }

    public function setRangeBehavior(bool $rangeBehavior): void
    {
        $this->rangeBehavior = $rangeBehavior;
    }

    public function getShippingMethod(): ?int
    {
        return $this->shippingMethod;
    }

    public function setShippingMethod(int $shippingMethod): void
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function getMaxWidth(): ?int
    {
        return $this->maxWidth;
    }

    public function setMaxWidth(int $maxWidth): void
    {
        $this->maxWidth = $maxWidth;
    }

    public function getMaxHeight(): ?int
    {
        return $this->maxHeight;
    }

    public function setMaxHeight(int $maxHeight): void
    {
        $this->maxHeight = $maxHeight;
    }

    public function getMaxDepth(): ?int
    {
        return $this->maxDepth;
    }

    public function setMaxDepth(int $maxDepth): void
    {
        $this->maxDepth = $maxDepth;
    }

    public function getMaxWeight(): ?int
    {
        return $this->maxWeight;
    }

    public function setMaxWeight(int $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): void
    {
        $this->grade = $grade;
    }

    public function getExternalModuleName(): ?string
    {
        return $this->externalModuleName;
    }

    public function setExternalModuleName(string $externalModuleName): void
    {
        $this->externalModuleName = $externalModuleName;
    }

    public function getNeedRange(): ?int
    {
        return $this->needRange;
    }

    public function setNeedRange(int $needRange): void
    {
        $this->needRange = $needRange;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function getDelay(int $languageId = 1): ?string
    {
        return $this->delay[$languageId] ?? null;
    }

    public function setDelay(string $delay, int $languageId = 1): void
    {
        $this->delay[$languageId] = $delay;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $carrier = new self;

        if (isset($array['id']) && $array['id'] !== '') {
            $carrier->setId((int) $array['id']);
        }
        if (isset($array['deleted'])) {
            $carrier->setDeleted($array['deleted'] === '1');
        }
        if (isset($array['is_module'])) {
            $carrier->setIsModule($array['is_module'] === '1');
        }
        if (isset($array['id_tax_rules_group'])) {
            $carrier->setIdTaxRulesGroup((int) $array['id_tax_rules_group']);
        }
        if (isset($array['id_reference'])) {
            $carrier->setIdReference((int) $array['id_reference']);
        }
        if (isset($array['name'])) {
            $carrier->setName($array['name']);
        }
        if (isset($array['active'])) {
            $carrier->setActive($array['active'] === '1');
        }
        if (isset($array['is_free'])) {
            $carrier->setIsFree($array['is_free'] === '1');
        }
        if (isset($array['shipping_handling'])) {
            $carrier->setShippingHandling($array['shipping_handling'] === '1');
        }
        if (isset($array['shipping_external'])) {
            $carrier->setShippingExternal($array['shipping_external'] === '1');
        }
        if (isset($array['range_behavior'])) {
            $carrier->setRangeBehavior($array['range_behavior'] === '1');
        }
        if (isset($array['shipping_method'])) {
            $carrier->setShippingMethod((int) $array['shipping_method']);
        }
        if (isset($array['max_width'])) {
            $carrier->setMaxWidth((int) $array['max_width']);
        }
        if (isset($array['max_height'])) {
            $carrier->setMaxHeight((int) $array['max_height']);
        }
        if (isset($array['max_depth'])) {
            $carrier->setMaxDepth((int) $array['max_depth']);
        }
        if (isset($array['max_weight'])) {
            $carrier->setMaxWeight((int) $array['max_weight']);
        }
        if (isset($array['grade'])) {
            $carrier->setGrade((int) $array['grade']);
        }
        if (isset($array['external_module_name'])) {
            $carrier->setExternalModuleName($array['external_module_name']);
        }
        if (isset($array['need_range'])) {
            $carrier->setNeedRange((int) $array['need_range']);
        }
        if (isset($array['position'])) {
            $carrier->setPosition((int) $array['position']);
        }
        if (isset($array['delay'])) {
            if (is_array($array['delay'])) {
                foreach ($array['delay'] as $name) {
                    $carrier->setDelay($name['value'], (int) $name['id']);
                }
            } else {
                $carrier->setDelay($array['delay']);
            }
        }

        return $carrier;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->carrier->id = $this->getId();
        }
        if ($this->isDeleted() !== null) {
            $xml->carrier->deleted = $this->isDeleted() ? '1' : '0';
        }
        if ($this->isModule() !== null) {
            $xml->carrier->is_module = $this->isModule() ? '1' : '0';
        }
        if ($this->getIdTaxRulesGroup() !== null) {
            $xml->carrier->id_tax_rules_group = $this->getIdTaxRulesGroup();
        }
        if ($this->getIdReference() !== null) {
            $xml->carrier->id_reference = $this->getIdReference();
        }
        if ($this->getName() !== null) {
            $xml->carrier->name = $this->getName();
        }
        if ($this->isActive() !== null) {
            $xml->carrier->active = $this->isActive() ? '1' : '0';
        }
        if ($this->isFree() !== null) {
            $xml->carrier->is_free = $this->isFree() ? '1' : '0';
        }
        if ($this->isShippingHandling() !== null) {
            $xml->carrier->shipping_handling = $this->isShippingHandling() ? '1' : '0';
        }
        if ($this->isShippingExternal() !== null) {
            $xml->carrier->shipping_external = $this->isShippingExternal() ? '1' : '0';
        }
        if ($this->isRangeBehavior() !== null) {
            $xml->carrier->range_behavior = $this->isRangeBehavior();
        }
        if ($this->getShippingMethod() !== null) {
            $xml->carrier->shipping_method = $this->getShippingMethod();
        }
        if ($this->getMaxWidth() !== null) {
            $xml->carrier->max_width = $this->getMaxWidth();
        }
        if ($this->getMaxHeight() !== null) {
            $xml->carrier->max_height = $this->getMaxHeight();
        }
        if ($this->getMaxDepth() !== null) {
            $xml->carrier->max_depth = $this->getMaxDepth();
        }
        if ($this->getMaxWeight() !== null) {
            $xml->carrier->max_weight = $this->getMaxWeight();
        }
        if ($this->getGrade() !== null) {
            $xml->carrier->grade = $this->getGrade();
        }
        if ($this->getExternalModuleName() !== null) {
            $xml->carrier->external_module_name = $this->getExternalModuleName();
        }
        if ($this->getNeedRange() !== null) {
            $xml->carrier->need_range = $this->getNeedRange();
        }
        if ($this->getPosition() !== null) {
            $xml->carrier->position = $this->getPosition();
        }
        $i = 0;
        foreach ($this->delay as $languageId => $value) {
            $xml->carrier->delay->language[$i] = $this->getDelay($languageId);
            if (!isset($xml->carrier->delay->language[$i]['id'])) {
                $xml->carrier->delay->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
