<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use SimpleXMLElement;

interface ModelInterface
{
    public function getId(): ?int;
    public static function fromArray(array $array): ModelInterface;
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement;
}
