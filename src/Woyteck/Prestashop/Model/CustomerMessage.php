<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class CustomerMessage implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idEmployee;

    /** @var int */
    private $idCustomerThread;

    /** @var string */
    private $ipAddress;

    /** @var string */
    private $message;

    /** @var string */
    private $fileName;

    /** @var string */
    private $userAgent;

    /** @var bool */
    private $private;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

    /** @var bool */
    private $read;

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
     * @return int
     */
    public function getIdEmployee(): int
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
     * @return int|null
     */
    public function getIdCustomerThread(): ?int
    {
        return $this->idCustomerThread;
    }

    /**
     * @param int $idCustomerThread
     */
    public function setIdCustomerThread(int $idCustomerThread): void
    {
        $this->idCustomerThread = $idCustomerThread;
    }

    /**
     * @return string|null
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
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
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string|null
     */
    public function getUserAgent(): ?string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent(string $userAgent): void
    {
        $this->userAgent = $userAgent;
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
     * @return bool|null
     */
    public function isRead(): ?bool
    {
        return $this->read;
    }

    /**
     * @param bool $read
     */
    public function setRead(bool $read): void
    {
        $this->read = $read;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $customerMessage = new self;
        if (isset($array['id'])) {
            $customerMessage->setId($array['id']);
        }
        if (isset($array['id_employee'])) {
            $customerMessage->setIdEmployee((int) $array['id_employee']);
        }
        if (isset($array['id_customer_thread'])) {
            $customerMessage->setIdCustomerThread((int) $array['id_customer_thread']);
        }
        if (isset($array['ip_address'])) {
            $customerMessage->setIpAddress($array['ip_address']);
        }
        if (isset($array['message'])) {
            $customerMessage->setMessage($array['message']);
        }
        if (isset($array['file_name'])) {
            $customerMessage->setFileName($array['file_name']);
        }
        if (isset($array['user_agent'])) {
            $customerMessage->setUserAgent($array['user_agent']);
        }
        if (isset($array['private'])) {
            $customerMessage->setPrivate($array['private'] === '1');
        }
        if (isset($array['date_add']) && $array['date_add'] !== '') {
            $customerMessage->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd']) && $array['date_upd'] !== '') {
            $customerMessage->setDateUpd(new DateTime($array['date_upd']));
        }

        return $customerMessage;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->customer_message->id = $this->getId();
        }
        if ($this->getIdEmployee() !== null) {
            $xml->customer_message->id_employee = $this->getIdEmployee();
        }
        if ($this->getIdCustomerThread() !== null) {
            $xml->customer_message->id_customer_thread = $this->getIdCustomerThread();
        }
        if ($this->getIpAddress() !== null) {
            $xml->customer_message->ip_address = $this->getIpAddress();
        }
        if ($this->getMessage() !== null) {
            $xml->customer_message->message = $this->getMessage();
        }
        if ($this->getFileName() !== null) {
            $xml->customer_message->file_name = $this->getFileName();
        }
        if ($this->getUserAgent() !== null) {
            $xml->customer_message->user_agent = $this->getUserAgent();
        }
        if ($this->isPrivate() !== null) {
            $xml->customer_message->private = $this->isPrivate() ? '1' : '0';
        }
        if ($this->getDateAdd() !== null) {
            $xml->customer_message->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        }
        if ($this->getDateUpd() !== null) {
            $xml->customer_message->date_upd = $this->getDateUpd()->format('Y-m-d H:i:s');
        }

        return $xml;
    }
}
