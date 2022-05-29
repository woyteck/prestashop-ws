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

    /** @var string[] */
    private $value = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdFeature(): ?int
    {
        return $this->idFeature;
    }

    public function setIdFeature(int $idFeature): void
    {
        $this->idFeature = $idFeature;
    }

    public function isCustom(): ?bool
    {
        return $this->custom;
    }

    public function setCustom(bool $custom): void
    {
        $this->custom = $custom;
    }

    public function getValue(int $languageId = 1): ?string
    {
        return $this->value[$languageId] ?? null;
    }

    public function setValue(string $value, int $languageId = 1): void
    {
        $this->value[$languageId] = $value;
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
            if (is_array($array['value'])) {
                foreach ($array['value'] as $name) {
                    $productFeatureValue->setValue($name['value'], (int) $name['id']);
                }
            } else {
                $productFeatureValue->setValue($array['value']);
            }
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
        $i = 0;
        foreach ($this->value as $languageId => $value) {
            $xml->product_feature_value->value->language[$i] = $this->getValue($languageId);
            if (!isset($xml->product_feature_value->value->language[$i]['id'])) {
                $xml->product_feature_value->value->language[$i]->addAttribute('id', (string) $languageId);
            }
            $i++;
        }

        return $xml;
    }
}
