<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;
use stdClass;

class Tag implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idLang;

    /** @var string */
    private $name;

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

    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    public function setIdLang(int $idLang): void
    {
        $this->idLang = $idLang;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     */
    public static function fromArray(array $array): ModelInterface
    {
        $tag = new self;
        if (isset($array['id'])) {
            $tag->setId((int) $array['id']);
        }
        if (isset($array['id_lang'])) {
            $tag->setIdLang((int) $array['id_lang']);
        }
        if (isset($array['name'])) {
            $tag->setName($array['name']);
        }

        return $tag;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->tag->id = $this->getId();
        }
        if ($this->getIdLang() !== null) {
            $xml->tag->id_lang = $this->getIdLang();
        }
        if ($this->getName() !== null) {
            $xml->tag->name = $this->getName();
        }

        return $xml;
    }
}
