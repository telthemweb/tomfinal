<?php
namespace Ti\Cardfraudsm\Migrations\Databases;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Collection\Collection;
#[ORM\Entity]
#[ORM\Table(name:'products')]
class Product {
    #[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;

    #[ORM\Column(type:'integer')]
	private int $category_Id;

	#[ORM\Column(type:'string', unique:true)]
	private string | null $name;

    #[ORM\Column(type:'text', nullable:true)]
	private string | null $product_img;

    #[ORM\Column(type:"float", nullable:true)]
	private float|null $price;

    #[ORM\Column(type:'integer',nullable:true)]
	private int|null $quantity;

    #[ORM\Column(type:'string', nullable:true)]
	private string | null $isOnPromototion ="false";

    #[ORM\Column(type:'integer', nullable:true)]
	private int | null $isPublished =0;

    #[ORM\Column(type:'datetime', nullable:true)]
	private DateTime | null $expiry_date;
    #[ORM\Column(type:'string', nullable:true)]
    private string | null $weight;

    #[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;


    #[ORM\JoinColumn(name: 'category_Id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Category::class,inversedBy:"products")]
    private Category|null $category;


    #[ORM\OneToMany(mappedBy:'product',targetEntity:Orderitem::class)]
    private Collection $orderitems;

    public function __construct(int $id, int $farmer_Id,int $category_Id, string $name, ?float $price,?int $quantity,?string $isOnPromototion,?int $isPublished,?DateTime $expiry_date,?string $weight, DateTime $created_at, DateTime $updated_at)
    {
        $this->id = $id;
        $this->farmer_Id = $farmer_Id;
        $this->category_Id = $category_Id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->isOnPromototion = $isOnPromototion;
        $this->isPublished = $isPublished;
        $this->expiry_date = $expiry_date;
        $this->weight = $weight;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->orderitems = new ArrayCollection();
    }
}