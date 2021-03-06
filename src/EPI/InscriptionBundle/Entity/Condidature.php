<?php

namespace EPI\InscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condidature
 *
 * @ORM\Table(name="condidature")
 * @ORM\Entity(repositoryClass="EPI\InscriptionBundle\Repository\CondidatureRepository")
 */
class Condidature
{

    /**
     * @ORM\ManyToOne(targetEntity="EPI\InscriptionBundle\Entity\Job")
     * @ORM\JoinColumn(nullable=false)
     */

    private $job;



    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="condidat", type="string", length=255)
     */
    private $condidat;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set condidat
     *
     * @param string $condidat
     *
     * @return Condidature
     */
    public function setCondidat($condidat)
    {
        $this->condidat = $condidat;

        return $this;
    }

    /**
     * Get condidat
     *
     * @return string
     */
    public function getCondidat()
    {
        return $this->condidat;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Condidature
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Condidature
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set job
     *
     * @param \EPI\InscriptionBundle\Entity\Job $job
     *
     * @return Condidature
     */
    public function setJob(\EPI\InscriptionBundle\Entity\Job $job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return \EPI\InscriptionBundle\Entity\Job
     */
    public function getJob()
    {
        return $this->job;
    }
}
