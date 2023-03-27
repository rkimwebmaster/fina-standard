<?php

namespace App\Entity;

use App\Repository\TcPaysRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TcPaysRepository::class)]
class TcPays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var int
     *
     * @ORM\Column(name="Sort_Order", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sortOrder;

    /**
     * @var string
     *
     * @ORM\Column(name="Commo_Name", type="string", length=64, nullable=false)
     */
    private $commoName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Formal_Name", type="string", length=64, nullable=true)
     */
    private $formalName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Type_of_governance", type="string", length=32, nullable=true)
     */
    private $typeOfGovernance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Sub_Type", type="string", length=48, nullable=true)
     */
    private $subType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Sovereignty", type="string", length=32, nullable=true)
     */
    private $sovereignty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Capital", type="string", length=96, nullable=true)
     */
    private $capital;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISO_4217_Currency_Code", type="string", length=16, nullable=true)
     */
    private $iso4217CurrencyCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISO_4217_Currency_Name", type="string", length=16, nullable=true)
     */
    private $iso4217CurrencyName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ITU_T_Telephone_Code", type="string", length=16, nullable=true)
     */
    private $ituTTelephoneCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISO_3166_1_2_Letter_Code", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $iso316612LetterCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISO_3166_1_3_Letter_Code", type="string", length=3, nullable=true, options={"fixed"=true})
     */
    private $iso316613LetterCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISO_3166_1_Number", type="string", length=3, nullable=true, options={"fixed"=true})
     */
    private $iso31661Number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IANA_Country_Code_TLD", type="string", length=16, nullable=true)
     */
    private $ianaCountryCodeTld;

    public function __toString()
    {
        return $this->ituTTelephoneCode. '-'.$this->ianaCountryCodeTld;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
