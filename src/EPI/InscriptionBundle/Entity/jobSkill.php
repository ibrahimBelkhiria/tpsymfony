<?php

namespace EPI\InscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jobSkill
 *
 * @ORM\Table(name="job_skill")
 * @ORM\Entity(repositoryClass="EPI\InscriptionBundle\Repository\jobSkillRepository")
 */
class jobSkill
{
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
     * @ORM\Column(name="level", type="string", length=255)
     */
    private $level;


    /**
     *@ORM\ManyToOne(targetEntity="EPI\InscriptionBundle\Entity\Job")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job;


    /**
     * @ORM\ManyToOne(targetEntity="EPI\InscriptionBundle\Entity\skill")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skill;


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
     * Set level
     *
     * @param string $level
     *
     * @return jobSkill
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set job
     *
     * @param \EPI\InscriptionBundle\Entity\Job $job
     *
     * @return jobSkill
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

    /**
     * Set skill
     *
     * @param \EPI\InscriptionBundle\Entity\skill $skill
     *
     * @return jobSkill
     */
    public function setSkill(\EPI\InscriptionBundle\Entity\skill $skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \EPI\InscriptionBundle\Entity\skill
     */
    public function getSkill()
    {
        return $this->skill;
    }
}
