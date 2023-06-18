<?php

namespace Ti\Cardfraudsm\Migrations\Databases;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Ramsey\Collection\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'creditcards')]
class Creditcard{
    #[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;

    #[ORM\Column(type:'integer')]
	private int  $customer_Id;

	#[ORM\Column(type:'string', unique:true)]
	private string $name;

	#[ORM\Column(type:'integer')]
	private int  $account_Id;

	#[ORM\Column(type:'string', unique:true)]
	private string  $ac_number;

    #[ORM\Column(type:'integer')]
	private int  $pin;

    #[ORM\Column(type:'integer', nullable:true)]
	private int | null $status=0;

	#[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

	//onetone

	#[ORM\JoinColumn(name: 'customer_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Customer::class,inversedBy:"creditcards")]
    private Customer|null $customer;

	#[ORM\JoinColumn(name: 'account_Id',referencedColumnName: 'id')]
    #[ORM\OneToOne(targetEntity:Account::class)]
    private Account|null $account;

	#[ORM\OneToMany(mappedBy:'creditcard',targetEntity:Transaction::class)]
    private Collection $transactions;

	/**
	 * @param int $id
	 * @param string|null $name
	 * @param DateTime $created_at
	 * @param DateTime $updated_at
	 */
	public function __construct(int $id,  int $customer_Id,int $account_Id,  string $ac_number,int $pin,int $status, DateTime $created_at, DateTime $updated_at) {
		$this->id = $id;
		$this->customer_Id = $customer_Id;
		$this->account_Id = $account_Id;
        $this->ac_number = $ac_number;
        $this->pin = $pin;
        $this->status = $status;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;
		$this->transactions = new ArrayCollection();
	}
}