<?php

namespace Ti\Cardfraudsm\Migrations\Databases;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Collection\Collection;

#[ORM\Entity]
#[ORM\Table(name:'categories')]
class Category {
	#[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;

	#[ORM\Column(type:'string', unique:true)]
	private string | null $name;

	#[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

	#[ORM\OneToMany(mappedBy:'category',targetEntity:Product::class)]
    private Collection $products;

	/**
	 * @param int $id
	 * @param string|null $name
	 * @param DateTime $created_at
	 * @param DateTime $updated_at
	 */
	public function __construct(int $id,  ? string $name, DateTime $created_at, DateTime $updated_at) {
		$this->id = $id;
		$this->name = $name;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;
		$this->products = new ArrayCollection();
	}
}