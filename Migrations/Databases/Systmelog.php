<?php

namespace Ti\Cardfraudsm\Migrations\Databases;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Ramsey\Collection\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'systemlogs')]
class Systmelog
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private  int $id;
    #[ORM\Column(type: 'integer')]
    private  int $administrator_id;
    #[ORM\Column(type: 'string')]
    private  string $timein;
    #[ORM\Column(type: 'string',nullable: true)]
    private  string $ipaddress;
    #[ORM\Column(type: 'string',nullable: true)]
    private  string $geolocationap;
    #[ORM\Column(type: 'string',nullable: true)]
    private  string $useaccountname;
    #[ORM\Column(type:"string",nullable:true)]
    private  string | null $timeout;

    #[ORM\Column(type:"string",nullable:true)]
    private  string | null $status="Pending";

    #[ORM\Column(type: 'datetime',columnDefinition: 'timestamp default current_timestamp')]
    private DateTime $created_at;

    #[ORM\Column(type: 'datetime',nullable: true)]
    private DateTime $updated_at;


    #[ORM\JoinColumn(name: 'administrator_id',referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity:Administrator::class,inversedBy:"logs")]
    private Administrator|null $administrator;

    /**
     * @param int $id
     * @param int $administrator_id
     * @param string $timein
     * @param string $ipaddress
     * @param string $geolocationap
     * @param string $useaccountname
     * @param string|null $timeout
     * @param DateTime $created_at
     */
    public function __construct(int $id, int $administrator_id, string $timein, string $ipaddress, string $geolocationap, string $useaccountname, ?string $timeout,?string $status, DateTime $created_at, DateTime $updated_at)
    {
        $this->id = $id;
        $this->administrator_id = $administrator_id;
        $this->timein = $timein;
        $this->ipaddress = $ipaddress;
        $this->geolocationap = $geolocationap;
        $this->useaccountname = $useaccountname;
        $this->timeout = $timeout;
        $this->status=$status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }


}