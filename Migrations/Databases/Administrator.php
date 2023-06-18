<?php
namespace Ti\Cardfraudsm\Migrations\Databases;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Collection\Collection;

#[ORM\Entity]
#[ORM\Table(name:'administrators')]
class Administrator {
	#[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;
	#[ORM\Column(type:'integer')]
	private int $role_Id;
	#[ORM\Column(type:'string')]
	private string $name;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $surname;
	#[ORM\Column(type:"string", nullable:true)]
	private string $username;
	#[ORM\Column(type:"string", nullable:true)]
	private string $password;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $email;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $phone;
	#[ORM\Column(type:"string", nullable:true)]
	private string $gender;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $city;
	#[ORM\Column(type:"string", nullable:true)]
	private string | null $address;
	
	#[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

	#[ORM\JoinColumn(name: 'role_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Role::class,inversedBy:"administrators")]
    private Role|null $role;

	#[ORM\OneToMany(mappedBy:'administrator',targetEntity:Systmelog::class)]
    private Collection $logs;

	#[ORM\OneToMany(mappedBy:'administrator',targetEntity:Audit::class)]
    private Collection $audits;

	public function __construct(int $id, int $role_Id, string $name, ?string $surname, string $username, string $password, ?string $email, ?string $phone, string $gender, ?string $city, ?string $address, DateTime $created_at, DateTime $updated_at)
    {
        $this->id = $id;
        $this->role_Id = $role_Id;
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->country = $country;
        $this->province = $province;
        $this->city = $city;
        $this->address = $address;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}