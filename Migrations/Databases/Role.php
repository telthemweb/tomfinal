<?php
namespace Ti\Cardfraudsm\Migrations\Databases;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Collection\Collection;
#[ORM\Entity]
#[ORM\Table(name:'roles')]
class Role {
	#[ORM\Id]
	#[ORM\Column(type:'integer')]
	#[ORM\GeneratedValue]
	private int $id;
	#[ORM\Column(type:'string', unique:true)]
	private string $name;
	#[ORM\Column(type:'string')]
	private string $level;
	#[ORM\Column(type:'integer')]
	private int $status = 1;
	#[ORM\Column(type:'datetime', columnDefinition:'timestamp default current_timestamp')]
	private DateTime $created_at;

	#[ORM\Column(type:'datetime', nullable:true)]
	private DateTime $updated_at;

	#[ORM\OneToMany(mappedBy:'role',targetEntity:Administrator::class)]
    private Collection $administrators;
}