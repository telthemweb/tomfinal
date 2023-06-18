<?php

namespace Ti\Cardfraudsm\Migrations\Databases;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Ramsey\Collection\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'audits')]
class Audit
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private  int $id;
    #[ORM\Column(type: 'integer')]
    private  int $administrator_id;
    #[ORM\Column(type: 'string')]
    private  string $entity;
    #[ORM\Column(type: 'text',nullable: true)]
    private  string $oldvalue;
    #[ORM\Column(type: 'text',nullable: true)]
    private  string $newvalue;
    #[ORM\Column(type: 'string',nullable: true)]
    private  string $action;
    #[ORM\Column(type: 'datetime',columnDefinition: 'timestamp default current_timestamp')]
    private DateTime $created_at;

    #[ORM\Column(type: 'datetime',nullable: true)]
    private DateTime $updated_at;

    #[ORM\JoinColumn(name: 'administrator_id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Administrator::class,inversedBy:"audits")]
    private Administrator|null $administrator;
}