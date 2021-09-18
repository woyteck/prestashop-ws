<?php
declare(strict_types=1);

namespace Woyteck\Prestashop\Model;

use DateTime;
use Exception;
use SimpleXMLElement;
use stdClass;

class Customer implements ModelInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $idDefaultGroup;

    /** @var int */
    private $idLang;

    /** @var DateTime */
    private $newsletterDateAdd;

    /** @var string */
    private $ipRegistrationNewsletter;

    /** @var DateTime */
    private $lastPasswdGen;

    /** @var bool */
    private $deleted;

    /** @var string */
    private $lastname;

    /** @var string */
    private $firstname;

    /** @var string */
    private $email;

    /** @var int */
    private $idGender;

    /** @var DateTime */
    private $birthday;

    /** @var bool */
    private $newsletter;

    /** @var bool */
    private $optin;

    /** @var string */
    private $website;

    /** @var string */
    private $company;

    /** @var string */
    private $siret;

    /** @var string */
    private $ape;

    /** @var float */
    private $outstandingAllowAmount;

    /** @var bool */
    private $showPublicPrices;

    /** @var int */
    private $idRisk;

    /** @var int */
    private $maxPaymentDays;

    /** @var bool */
    private $active;

    /** @var string */
    private $note;

    /** @var bool */
    private $isGuest;

    /** @var int */
    private $idShop;

    /** @var int */
    private $idShopGroup;

    /** @var DateTime */
    private $dateAdd;

    /** @var DateTime */
    private $dateUpd;

    /** @var string */
    private $resetPasswordToken;

    /** @var DateTime */
    private $resetPasswordValidity;

    /** @var array */
    private $associations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getIdDefaultGroup(): ?int
    {
        return $this->idDefaultGroup;
    }

    /**
     * @param int $idDefaultGroup
     */
    public function setIdDefaultGroup(int $idDefaultGroup): void
    {
        $this->idDefaultGroup = $idDefaultGroup;
    }

    /**
     * @return int|null
     */
    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    /**
     * @param int $idLang
     */
    public function setIdLang(int $idLang): void
    {
        $this->idLang = $idLang;
    }

    /**
     * @return DateTime|null
     */
    public function getNewsletterDateAdd(): ?DateTime
    {
        return $this->newsletterDateAdd;
    }

    /**
     * @param DateTime $newsletterDateAdd
     */
    public function setNewsletterDateAdd(DateTime $newsletterDateAdd): void
    {
        $this->newsletterDateAdd = $newsletterDateAdd;
    }

    /**
     * @return string|null
     */
    public function getIpRegistrationNewsletter(): ?string
    {
        return $this->ipRegistrationNewsletter;
    }

    /**
     * @param string $ipRegistrationNewsletter
     */
    public function setIpRegistrationNewsletter(string $ipRegistrationNewsletter): void
    {
        $this->ipRegistrationNewsletter = $ipRegistrationNewsletter;
    }

    /**
     * @return DateTime|null
     */
    public function getLastPasswdGen(): ?DateTime
    {
        return $this->lastPasswdGen;
    }

    /**
     * @param DateTime $lastPasswdGen
     */
    public function setLastPasswdGen(DateTime $lastPasswdGen): void
    {
        $this->lastPasswdGen = $lastPasswdGen;
    }

    /**
     * @return bool|null
     */
    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getIdGender(): ?int
    {
        return $this->idGender;
    }

    /**
     * @param int $idGender
     */
    public function setIdGender(int $idGender): void
    {
        $this->idGender = $idGender;
    }

    /**
     * @return DateTime|null
     */
    public function getBirthday(): ?DateTime
    {
        return $this->birthday;
    }

    /**
     * @param DateTime $birthday
     */
    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return bool|null
     */
    public function isNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    /**
     * @param bool $newsletter
     */
    public function setNewsletter(bool $newsletter): void
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return bool|null
     */
    public function isOptin(): ?bool
    {
        return $this->optin;
    }

    /**
     * @param bool $optin
     */
    public function setOptin(bool $optin): void
    {
        $this->optin = $optin;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return string|null
     */
    public function getSiret(): ?string
    {
        return $this->siret;
    }

    /**
     * @param string $siret
     */
    public function setSiret(string $siret): void
    {
        $this->siret = $siret;
    }

    /**
     * @return string|null
     */
    public function getApe(): ?string
    {
        return $this->ape;
    }

    /**
     * @param string $ape
     */
    public function setApe(string $ape): void
    {
        $this->ape = $ape;
    }

    /**
     * @return float|null
     */
    public function getOutstandingAllowAmount(): ?float
    {
        return $this->outstandingAllowAmount;
    }

    /**
     * @param float $outstandingAllowAmount
     */
    public function setOutstandingAllowAmount(float $outstandingAllowAmount): void
    {
        $this->outstandingAllowAmount = $outstandingAllowAmount;
    }

    /**
     * @return bool|null
     */
    public function isShowPublicPrices(): ?bool
    {
        return $this->showPublicPrices;
    }

    /**
     * @param bool $showPublicPrices
     */
    public function setShowPublicPrices(bool $showPublicPrices): void
    {
        $this->showPublicPrices = $showPublicPrices;
    }

    /**
     * @return int|null
     */
    public function getIdRisk(): ?int
    {
        return $this->idRisk;
    }

    /**
     * @param int $idRisk
     */
    public function setIdRisk(int $idRisk): void
    {
        $this->idRisk = $idRisk;
    }

    /**
     * @return int|null
     */
    public function getMaxPaymentDays(): ?int
    {
        return $this->maxPaymentDays;
    }

    /**
     * @param int $maxPaymentDays
     */
    public function setMaxPaymentDays(int $maxPaymentDays): void
    {
        $this->maxPaymentDays = $maxPaymentDays;
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return bool|null
     */
    public function isGuest(): ?bool
    {
        return $this->isGuest;
    }

    /**
     * @param bool $isGuest
     */
    public function setIsGuest(bool $isGuest): void
    {
        $this->isGuest = $isGuest;
    }

    /**
     * @return int|null
     */
    public function getIdShop(): ?int
    {
        return $this->idShop;
    }

    /**
     * @param int $idShop
     */
    public function setIdShop(int $idShop): void
    {
        $this->idShop = $idShop;
    }

    /**
     * @return int|null
     */
    public function getIdShopGroup(): ?int
    {
        return $this->idShopGroup;
    }

    /**
     * @param int $idShopGroup
     */
    public function setIdShopGroup(int $idShopGroup): void
    {
        $this->idShopGroup = $idShopGroup;
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
     * @return string|null
     */
    public function getResetPasswordToken(): ?string
    {
        return $this->resetPasswordToken;
    }

    /**
     * @param string $resetPasswordToken
     */
    public function setResetPasswordToken(string $resetPasswordToken): void
    {
        $this->resetPasswordToken = $resetPasswordToken;
    }

    /**
     * @return DateTime|null
     */
    public function getResetPasswordValidity(): ?DateTime
    {
        return $this->resetPasswordValidity;
    }

    /**
     * @param DateTime $resetPasswordValidity
     */
    public function setResetPasswordValidity(DateTime $resetPasswordValidity): void
    {
        $this->resetPasswordValidity = $resetPasswordValidity;
    }

    public function getAssociations(): ?array
    {
        return $this->associations;
    }

    public function setAssociations(array $associations): void
    {
        $this->associations = $associations;
    }

    /**
     * @param array $array
     * @return ModelInterface|self
     * @throws Exception
     */
    public static function fromArray(array $array): ModelInterface
    {
        $customer = new self;

        if (isset($array['id'])) {
            $customer->setId($array['id']);
        }
        if (isset($array['id_default_group'])) {
            $customer->setIdDefaultGroup((int) $array['id_default_group']);
        }
        if (isset($array['id_lang'])) {
            $customer->setIdLang((int) $array['id_lang']);
        }
        if (isset($array['newsletter_date_add'])
            && $array['newsletter_date_add'] !== ''
            && $array['newsletter_date_add'] !== '0000-00-00 00:00:00')
        {
            $customer->setNewsletterDateAdd(new DateTime($array['newsletter_date_add']));
        }
        if (isset($array['ip_registration_newsletter'])) {
            $customer->setIpRegistrationNewsletter($array['ip_registration_newsletter']);
        }
        if (isset($array['last_passwd_gen'])
            && $array['last_passwd_gen'] !== ''
            && $array['last_passwd_gen'] !== '0000-00-00 00:00:00'
        ) {
            $customer->setLastPasswdGen(new DateTime($array['last_passwd_gen']));
        }
        if (isset($array['deleted'])) {
            $customer->setDeleted($array['deleted'] === '1');
        }
        if (isset($array['lastname'])) {
            $customer->setLastname($array['lastname']);
        }
        if (isset($array['firstname'])) {
            $customer->setFirstname($array['firstname']);
        }
        if (isset($array['email'])) {
            $customer->setEmail($array['email']);
        }
        if (isset($array['id_gender'])) {
            $customer->setIdGender((int) $array['id_gender']);
        }
        if (isset($array['birthday'])
            && $array['birthday'] !== ''
            && $array['birthday'] !== '0000-00-00 00:00:00'
        ) {
            $customer->setBirthday(new DateTime($array['birthday']));
        }
        if (isset($array['newsletter'])) {
            $customer->setNewsletter($array['newsletter'] === '1');
        }
        if (isset($array['optin'])) {
            $customer->setOptin($array['optin'] === '1');
        }
        if (isset($array['website'])) {
            $customer->setWebsite($array['website']);
        }
        if (isset($array['company'])) {
            $customer->setCompany($array['company']);
        }
        if (isset($array['siret'])) {
            $customer->setSiret($array['siret']);
        }
        if (isset($array['ape'])) {
            $customer->setApe($array['ape']);
        }
        if (isset($array['outstanding_allow_amount'])) {
            $customer->setOutstandingAllowAmount((float) $array['outstanding_allow_amount']);
        }
        if (isset($array['show_public_prices'])) {
            $customer->setShowPublicPrices($array['show_public_prices'] === '1');
        }
        if (isset($array['id_risk'])) {
            $customer->setIdRisk((int) $array['id_risk']);
        }
        if (isset($array['max_payment_days'])) {
            $customer->setMaxPaymentDays((int) $array['max_payment_days']);
        }
        if (isset($array['active'])) {
            $customer->setActive($array['active'] === '1');
        }
        if (isset($array['note'])) {
            $customer->setNote($array['note']);
        }
        if (isset($array['is_guest'])) {
            $customer->setIsGuest($array['is_guest'] === '1');
        }
        if (isset($array['id_shop'])) {
            $customer->setIdShop((int) $array['id_shop']);
        }
        if (isset($array['id_shop_group'])) {
            $customer->setIdShopGroup((int) $array['id_shop_group']);
        }
        if (isset($array['date_add'])) {
            $customer->setDateAdd(new DateTime($array['date_add']));
        }
        if (isset($array['date_upd'])) {
            $customer->setDateUpd(new DateTime($array['date_upd']));
        }
        if (isset($array['reset_password_token'])) {
            $customer->setResetPasswordToken($array['reset_password_token']);
        }
        if (isset($array['reset_password_validity'])
            && $array['reset_password_validity'] !== ''
            && $array['reset_password_validity'] !== '0000-00-00 00:00:00'
        ) {
            $customer->setResetPasswordValidity(new DateTime($array['reset_password_validity']));
        }
        if (isset($array['associations'])) {
            $customer->setAssociations($array['associations']);
        }

        return $customer;
    }

    /**
     * @param SimpleXMLElement|stdClass $xml
     * @return SimpleXMLElement
     */
    public function toXml(SimpleXMLElement $xml): SimpleXMLElement
    {
        if ($this->getId() !== null) {
            $xml->customer->id = $this->getId();
        }
        if ($this->getIdDefaultGroup() !== null) {
            $xml->customer->id_default_group = $this->getIdDefaultGroup();
        }
        if ($this->getIdLang() !== null) {
            $xml->customer->id_lang = $this->getIdLang();
        }
        if ($this->getNewsletterDateAdd() !== null) {
            $xml->customer->newsletter_date_add = $this->getNewsletterDateAdd()->format('Y-m-d H:i:s');
        }
        if ($this->getIpRegistrationNewsletter() !== null) {
            $xml->customer->ip_registration_newsletter = $this->getIpRegistrationNewsletter();
        }
        if ($this->getLastPasswdGen() !== null) {
            $xml->customer->last_passwd_gen = $this->getLastPasswdGen()->format('Y-m-d H:i:s');
        }
        if ($this->isDeleted() !== null) {
            $xml->customer->deleted = $this->isDeleted() ? '1' : '0';
        }
        if ($this->getLastname() !== null) {
            $xml->customer->lastname = $this->getLastname();
        }
        if ($this->getFirstname() !== null) {
            $xml->customer->firstname = $this->getFirstname();
        }
        if ($this->getEmail() !== null) {
            $xml->customer->email = $this->getEmail();
        }
        if ($this->getIdGender() !== null) {
            $xml->customer->id_gender = (string) $this->getIdGender();
        }
        if ($this->getBirthday() !== null) {
            $xml->customer->birthday = $this->getBirthday()->format('Y-m-d');
        }
        if ($this->isNewsletter() !== null) {
            $xml->customer->newsletter = $this->isNewsletter() ? '1' : '0';
        }
        if ($this->isOptin() !== null) {
            $xml->customer->optin = $this->isOptin() ? '1' : '0';
        }
        if ($this->getWebsite() !== null) {
            $xml->customer->website = $this->getWebsite();
        }
        if ($this->getCompany() !== null) {
            $xml->customer->company = $this->getCompany();
        }
        if ($this->getSiret() !== null) {
            $xml->customer->siret = $this->getSiret();
        }
        if ($this->getApe() !== null) {
            $xml->customer->ape = $this->getApe();
        }
        if ($this->getOutstandingAllowAmount() !== null) {
            $xml->customer->outstanding_allow_amount = $this->getOutstandingAllowAmount();
        }
        if ($this->isShowPublicPrices() !== null) {
            $xml->customer->show_public_prices = $this->isShowPublicPrices() ? '1' : '0';
        }
        if ($this->getIdRisk() !== null) {
            $xml->customer->id_risk = $this->getIdRisk();
        }
        if ($this->getMaxPaymentDays() !== null) {
            $xml->customer->max_payment_days = $this->getMaxPaymentDays();
        }
        if ($this->isActive() !== null) {
            $xml->customer->active = $this->isActive() ? '1' : '0';
        }
        if ($this->getNote() !== null) {
            $xml->customer->note = $this->getNote();
        }
        if ($this->isGuest() !== null) {
            $xml->customer->guest = $this->isGuest() ? '1' : '0';
        }
        if ($this->getIdShop() !== null) {
            $xml->customer->id_shop = $this->getIdShop();
        }
        if ($this->getIdShopGroup() !== null) {
            $xml->customer->id_shop_group = $this->getIdShopGroup();
        }
        if ($this->getDateAdd() !== null) {
            $xml->customer->date_add = $this->getDateAdd()->format('Y-m-d H:i:s');
        }
        if ($this->getDateUpd() !== null) {
            $xml->customer->date_upd = $this->getDateUpd()->format('Y-m-d H:i:s');
        }
        if ($this->getResetPasswordToken() !== null) {
            $xml->customer->reset_password_token = $this->getResetPasswordToken();
        }
        if ($this->getResetPasswordValidity() !== null) {
            $xml->customer->reset_password_validity = $this->getResetPasswordValidity()->format('Y-m-d H:i:s');
        }

        return $xml;
    }
}
