<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class ProductFeatureValue implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idFeature;

    /** @var bool */
    private $custom;

    /** @var string */
    private $value;

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
    public function getIdFeature(): ?int
    {
        return $this->idFeature;
    }

    /**
     * @param int $idFeature
     */
    public function setIdFeature(int $idFeature): void
    {
        $this->idFeature = $idFeature;
    }

    /**
     * @return bool|null
     */
    public function isCustom(): ?bool
    {
        return $this->custom;
    }

    /**
     * @param bool $custom
     */
    public function setCustom(bool $custom): void
    {
        $this->custom = $custom;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     */
    public static function fromArray(array $array): ModelInterface
    {
        $productFeatureValue = new self;

        if (isset($array['id'])) {
            $productFeatureValue->setId((int) $array['id']);
        }
        if (isset($array['id_feature'])) {
            $productFeatureValue->setIdFeature((int) $array['id_feature']);
        }
        if (isset($array['custom'])) {
            $productFeatureValue->setCustom($array['custom'] === '1');
        }
        if (isset($array['value'])) {
            $productFeatureValue->setValue($array['value']);
        }

        return $productFeatureValue;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->product_feature_value->id = $this->getId();
        }
        if ($this->getIdFeature() !== null) {
            $xml->product_feature_value->id_feature = $this->getIdFeature();
        }
        if ($this->isCustom() !== null) {
            $xml->product_feature_value->custom = $this->isCustom() ? '1' : '0';
        }
        if ($this->getValue() !== null) {
            $xml->product_feature_value->value->language = $this->getValue();
        }

        return $xml;
    }
}
