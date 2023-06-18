<?php
namespace Ti\Cardfraudsm\Migrations\Databases;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Collection\Collection;
#[ORM\Entity]
#[ORM\Table(name:'orders')]
class Order {
    #[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;

    #[ORM\Column(type:'string',nullable: true)]
	private string|null $ordernumber;

    #[ORM\Column(type:'integer')]
	private int $customer_Id;

    #[ORM\Column(type:'integer')]
	private int $quantity;

    #[ORM\Column(type: 'float',nullable: true)]
    private float|null $total_amt;

    #[ORM\Column(type: 'integer',nullable: true)]
    private int|null $ispaid=0;

    

    #[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

    #[ORM\OneToMany(mappedBy:'order',targetEntity:Orderitem::class)]
    private Collection $orderitems;

    #[ORM\JoinColumn(name: 'customer_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Customer::class,inversedBy:"orders")]
    private Customer|null $customer;

    public function __construct(int $id,?string $ordernumber, int $customer_Id, string $quantity, ?float $total_amt,?int $ispaid, DateTime $created_at, DateTime $updated_at)
    {
        $this->id = $id;
        $this->ordernumber = $ordernumber;
        $this->customer_Id = $customer_Id;
        $this->quantity = $quantity;
        $this->total_amt = $total_amt;
        $this->ispaid = $ispaid;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->orderitems = new ArrayCollection();
    }
}