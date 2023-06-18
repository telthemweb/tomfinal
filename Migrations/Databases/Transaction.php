<?php

namespace Ti\Cardfraudsm\Migrations\Databases;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Ramsey\Collection\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'transactions')]
class Transaction{
    #[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;


    #[ORM\Column(type:'integer')]
	private int  $customer_Id;

	#[ORM\Column(type:'integer')]
	private int  $account_Id;

	#[ORM\Column(type:'integer')]
	private int  $creditcard_Id;

	#[ORM\Column(type:'float', nullable:true)]
	private float|null  $amount;

	#[ORM\Column(type:'string', nullable:true)]
	private string|null  $country;

	#[ORM\Column(type:'string', nullable:true)]
	private string|null  $city;

	#[ORM\Column(type:'string', nullable:true)]
	private string|null  $ipaddress;

	#[ORM\Column(type:'string', nullable:true)]
	private string|null  $timetransaction;


    #[ORM\Column(type:'integer', nullable:true)]
	private int | null $status=0;

	#[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

	#[ORM\JoinColumn(name: 'customer_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Customer::class,inversedBy:"transactions")]
    private Customer|null $customer;

	#[ORM\JoinColumn(name: 'account_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Account::class,inversedBy:"transactions")]
    private Account|null $account;

	#[ORM\JoinColumn(name: 'creditcard_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Creditcard::class,inversedBy:"transactions")]
    private Creditcard|null $creditcard;

	//onetone

	/**
	 * @param int $id
	 * @param string|null $name
	 * @param DateTime $created_at
	 * @param DateTime $updated_at
	 */
	public function __construct(int $id,int $customer_Id,int $account_Id,int $creditcard_Id,  ?float $amount,int $status,?string $country,?string $city,?string $ipaddress,?string $timetransaction, DateTime $created_at, DateTime $updated_at) {
		$this->id = $id;
		$this->customer_Id = $customer_Id;
		$this->account_Id = $account_Id;
		$this->creditcard_Id = $creditcard_Id;
        $this->amount = $amount;
        $this->status = $status;
		$this->$this->country=$country;
		$this->city=$city;
		$this->ipaddress=$ipaddress;
		$this->timetransaction=$timetransaction;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;

		
	}
}