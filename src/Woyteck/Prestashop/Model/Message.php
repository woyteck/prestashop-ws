<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class Message implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idCart;

    /** @var int */
    private $idOrder;

    /** @var int */
    private $idCustomer;

    /** @var int */
    private $idEmployee;

    /** @var string */
    private $message;

    /** @var bool */
    private $private;

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
    public function getIdCart(): ?int
    {
        return $this->idCart;
    }

    /**
     * @param int $idCart
     */
    public function setIdCart(int $idCart): void
    {
        $this->idCart = $idCart;
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
    public function getIdEmployee(): ?int
    {
        return $this->idEmployee;
    }

    /**
     * @param int $idEmployee
     */
    public function setIdEmployee(int $idEmployee): void
    {
        $this->idEmployee = $idEmployee;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return bool|null
     */
    public function isPrivate(): ?bool
    {
        return $this->private;
    }

    /**
     * @param bool $private
     */
    public function setPrivate(bool $private): void
    {
        $this->private = $private;
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
     * @return ModelInterface|self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $message = new self;
        if (isset($array['id'])) {
            $message->setId($array['id']);
        }
        if (isset($array['id_cart'])) {
            $message->setIdCart((int) $array['id_cart']);
        }
        if (isset($array['id_order'])) {
            $message->setIdOrder((int) $array['id_order']);
        }
        if (isset($array['id_customer'])) {
            $message->setIdCustomer((int) $array['id_customer']);
        }
        if (isset($array['id_employee'])) {
            $message->setIdEmployee((int) $array['id_employee']);
        }
        if (isset($array['message'])) {
            $message->setMessage(html_entity_decode($array['message']));
        }
        if (isset($array['private'])) {
            $message->setPrivate($array['private'] === '1');
        }
        if (isset($array['date_add'])) {
            $message->setDateAdd(new DateTime($array['date_add']));
        }

        return $message;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->message->id = $this->getId();
        }
        if ($this->getIdCart() !== null) {
            $xml->message->id_cart = $this->getId();
        }
        if ($this->getIdOrder() !== null) {
            $xml->message->id_order = $this->getIdOrder();
        }
        if ($this->getIdCustomer() !== null) {
            $xml->message->id_customer = $this->getIdCustomer();
        }
        if ($this->getIdEmployee() !== null) {
            $xml->message->id_employee = $this->getIdEmployee();
        }
        if ($this->getMessage() !== null) {
            $xml->message->message = $this->getMessage();
        }
        if ($this->isPrivate() !== null) {
            $xml->message->private = $this->isPrivate() ? '1' : '0';
        }
        if ($this->getDateAdd() !== null) {
            $xml->message->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        }

        return $xml;
    }
}
