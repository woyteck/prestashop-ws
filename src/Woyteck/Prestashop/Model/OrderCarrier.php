<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class OrderCarrier implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idOrder;

    /** @var int */
    private $idCarrier;

    /** @var int */
    private $idOrderInvoice;

    /** @var float */
    private $weight;

    /** @var float */
    private $shippingCostTaxExcl;

    /** @var float */
    private $shippingCostTaxIncl;

    /** @var string */
    private $tracking_number;

    /** @var DateTime */
    private $dateAdd;

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
    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    /**
     * @param int $idOrder
     */
    public function setIdOrder(int $idOrder): void
    {
        $this->idOrder = $idOrder;
    }

    /**
     * @return int|null
     */
    public function getIdCarrier(): ?int
    {
        return $this->idCarrier;
    }

    /**
     * @param int $idCarrier
     */
    public function setIdCarrier(int $idCarrier): void
    {
        $this->idCarrier = $idCarrier;
    }

    /**
     * @return int|null
     */
    public function getIdOrderInvoice(): ?int
    {
        return $this->idOrderInvoice;
    }

    /**
     * @param int $idOrderInvoice
     */
    public function setIdOrderInvoice(int $idOrderInvoice): void
    {
        $this->idOrderInvoice = $idOrderInvoice;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return float|null
     */
    public function getShippingCostTaxExcl(): ?float
    {
        return $this->shippingCostTaxExcl;
    }

    /**
     * @param float $shippingCostTaxExcl
     */
    public function setShippingCostTaxExcl(float $shippingCostTaxExcl): void
    {
        $this->shippingCostTaxExcl = $shippingCostTaxExcl;
    }

    /**
     * @return float|null
     */
    public function getShippingCostTaxIncl(): ?float
    {
        return $this->shippingCostTaxIncl;
    }

    /**
     * @param float $shippingCostTaxIncl
     */
    public function setShippingCostTaxIncl(float $shippingCostTaxIncl): void
    {
        $this->shippingCostTaxIncl = $shippingCostTaxIncl;
    }

    /**
     * @return string|null
     */
    public function getTrackingNumber(): ?string
    {
        return $this->tracking_number;
    }

    /**
     * @param string $tracking_number
     */
    public function setTrackingNumber(string $tracking_number): void
    {
        $this->tracking_number = $tracking_number;
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
     * @param array $array
     * @return ModelInterface
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $orderCarrier = new self;

        if (isset($array['id'])) {
            $orderCarrier->setId((int) $array['id']);
        }
        if (isset($array['id_order'])) {
            $orderCarrier->setIdOrder((int) $array['id_order']);
        }
        if (isset($array['id_carrier'])) {
            $orderCarrier->setIdCarrier((int) $array['id_carrier']);
        }
        if (isset($array['id_order_invoice'])) {
            $orderCarrier->setIdOrderInvoice((int) $array['id_order_invoice']);
        }
        if (isset($array['weight'])) {
            $orderCarrier->setWeight((float) $array['weight']);
        }
        if (isset($array['shipping_cost_tax_excl'])) {
            $orderCarrier->setShippingCostTaxExcl((float) $array['shipping_cost_tax_excl']);
        }
        if (isset($array['shipping_cost_tax_incl'])) {
            $orderCarrier->setShippingCostTaxIncl((float) $array['shipping_cost_tax_incl']);
        }
        if (isset($array['tracking_number'])) {
            $orderCarrier->setTrackingNumber($array['tracking_number']);
        }
        if (isset($array['date_add']) && $array['date_add'] !== '') {
            $orderCarrier->setDateAdd(new DateTime($array['date_add']));
        }

        return $orderCarrier;
    }

    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        /** @var stdClass $xml */
        if ($this->getId() !== null) {
            $xml->order_carrier->id = $this->getId();
        }
        if ($this->getIdOrder() !== null) {
            $xml->order_carrier->id_order = $this->getIdOrder();
        }
        if ($this->getIdCarrier() !== null) {
            $xml->order_carrier->id_carrier = $this->getIdCarrier();
        }
        if ($this->getIdOrderInvoice() !== null) {
            $xml->order_carrier->id_order_invoice = $this->getIdOrderInvoice();
        }
        if ($this->getWeight() !== null) {
            $xml->order_carrier->weight = $this->getWeight();
        }
        if ($this->getShippingCostTaxExcl() !== null) {
            $xml->order_carrier->shipping_cost_tax_excl = $this->getShippingCostTaxExcl();
        }
        if ($this->getShippingCostTaxIncl() !== null) {
            $xml->order_carrier->shipping_cost_tax_incl = $this->getShippingCostTaxIncl();
        }
        if ($this->getTrackingNumber() !== null) {
            $xml->order_carrier->tracking_number = $this->getTrackingNumber();
        }
        if ($this->getDateAdd() !== null) {
            $xml->order_carrier->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        }

        return $xml;
    }
}
