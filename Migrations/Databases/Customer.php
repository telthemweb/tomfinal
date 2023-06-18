<?php
namespace Ti\Cardfraudsm\Migrations\Databases;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Collection\Collection;

#[ORM\Entity]
#[ORM\Table(name:'customers')]
class Customer {
	#[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;
	#[ORM\Column(type:'string', unique:true)]
	private string $name;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $surname;
	#[ORM\Column(type:"string", nullable:true)]
	private string $password;
	#[ORM\Column(type:"string", nullable:true, unique:true)]
	private string | null $email;
	#[ORM\Column(type:"string", nullable:true, unique:true)]
	private string | null $phone;
	#[ORM\Column(type:"string", nullable:true)]
	private string $gender;
	#[ORM\Column(type:"string", nullable:true)]
	private string$country;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $province;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $district;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $city;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $address;
	#[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;
	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

	#[ORM\OneToMany(mappedBy:'customer',targetEntity:Order::class)]
    private Collection $orders;

	#[ORM\OneToMany(mappedBy:'customer',targetEntity:Creditcard::class)]
    private Collection $creditcards;

	#[ORM\OneToMany(mappedBy:'customer',targetEntity:Transaction::class)]
    private Collection $transactions;

	#[ORM\OneToMany(mappedBy:'customer',targetEntity:Account::class)]
    private Collection $accounts;

	public function __construct(int $id, string $name, ?string $surname, string $password, ?string $email, ?string $phone, string $gender,?string $country, ?string $province, ?string $district, ?string $city, ?string $address, DateTime $created_at, DateTime $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->gender = $gender; 
		$this->country = $country;
        $this->province = $province;
        $this->district = $district;
        $this->city = $city;
        $this->address = $address;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
		$this->orders = new ArrayCollection();
		$this->creditcards = new ArrayCollection();
		$this->transactions = new ArrayCollection();
		$this->accounts = new ArrayCollection();
    }
}