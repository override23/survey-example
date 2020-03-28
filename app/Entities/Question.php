<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="questions")
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column
     */
    protected $text;

    /**
     * @ORM\Column
     */
    protected $rules;

    /**
     * @ORM\Column(type="integer")
     */
    protected $sortOrder;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question")
     */
    private $answers;

    public function __construct() {
        $this->answers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText($value): self
    {
        $this->text = $value;
        return $this;
    }

    public function getRules(): string
    {
        return $this->rules;
    }

    public function setRules($value): self
    {
        $this->rules = $value;
        return $this;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function getSortOrder(): int
    {
        return  $this->sortOrder;
    }

    public function setSortOrder($value): self
    {
        $this->sortOrder;
        return $this;
    }
}
