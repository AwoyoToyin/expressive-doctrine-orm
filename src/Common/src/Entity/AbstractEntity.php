<?php

namespace Common\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractEntity implements EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    protected $id;

    /**
     * @Column(name="created_at", type="string", length=255)
     */
    private $createdAt;

    /**
     * @Column(name="updated_at", type="string", length=255)
     */
    private $updatedAt;

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt()
    {
        $this->createdAt = date('Y-m-d H:i:s');
        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate
     * Set the value of updatedAt
     *
     * @return  self
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = date('Y-m-d H:i:s');
        return $this;
    }

    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = (!empty($value)) ? $value : null;
        }
    }
}
