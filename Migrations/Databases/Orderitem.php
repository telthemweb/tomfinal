<?php
namespace Ti\Cardfraudsm\Migrations\Databases;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Collection\Collection;
#[ORM\Entity]
#[ORM\Table(name:'orderitems')]
class Orderitem {
    #[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;

    #[ORM\Column(type:'integer')]
	private int $order_Id;

    #[ORM\Column(type:'integer')]
	private int $product_Id;

    #[ORM\Column(type:'integer')]
	private int $quantity;

    #[ORM\Column(type: 'float',nullable: true)]
    private float|null $price;


    #[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

    #[ORM\JoinColumn(name: 'product_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Product::class,inversedBy:"orderitems")]
    private Product|null $product;

    #[ORM\JoinColumn(name: 'order_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Order::class,inversedBy:"orderitems")]
    private Order|null $order;


    public function __construct(int $id, int $product_Id, string $quantity, ?float $price, DateTime $created_at, DateTime $updated_at)
    {
        $this->id = $id;
        $this->product_Id = $product_Id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}