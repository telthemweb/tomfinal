<?php

namespace Ti\Cardfraudsm\Migrations\Databases;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Ramsey\Collection\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'accounts')]
class Account{
    #[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;
    #[ORM\Column(type:'integer')]
	private int  $customer_Id;

    #[ORM\Column(type:'string')]
	private string  $accountnumber;

	#[ORM\Column(type:'float', nullable:true)]
	private float|null  $balance;

    #[ORM\Column(type:'float', nullable:true)]
	private float|null  $trans_limit;

    #[ORM\Column(type:'string', nullable:true)]
	private string|null  $branchname;

	#[ORM\Column(type:'string', nullable:true)]
	private string|null $bank;

    #[ORM\Column(type:'string', nullable:true)]
	private string|null  $location;

    #[ORM\Column(type:'string', nullable:true)]
	private string|null  $country;


    #[ORM\Column(type:'integer', nullable:true)]
	private int | null $status=0;

	#[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

	//onetone

	#[ORM\JoinColumn(name: 'customer_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Customer::class,inversedBy:"accounts")]
    private Customer|null $customer;

	#[ORM\OneToMany(mappedBy:'account',targetEntity:Transaction::class)]
    private Collection $transactions;

	/**
	 * @param int $id
	 * @param string|null $name
	 * @param DateTime $created_at
	 * @param DateTime $updated_at
	 */
	public function __construct(int $id,  int $customer_Id, string $accountnumber,   ?float $balance,  ?float $trans_limit,  ?string $branchname,?string $bank,  ?string $location,  ?string $country,int $status, DateTime $created_at, DateTime $updated_at) {
		$this->id = $id;
		$this->customer_Id = $customer_Id;
        $this->accountnumber = $accountnumber;
        $this->balance = $balance;
        $this->trans_limit = $trans_limit;
        $this->amoubranchnament = $branchname;
		$this->bank = $bank;
        $this->location = $location;
        $this->country = $country;
        $this->status = $status;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;

		$this->transactions = new ArrayCollection();
	}
}