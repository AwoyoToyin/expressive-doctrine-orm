<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Common\Entity\AbstractEntity;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="blog_post")
 */
class Post extends AbstractEntity implements \JsonSerializable
{
    /**
     * @ORM\Column(name="author", type="string", length=32)
     * @var string
     */
    private $author;

    /**
     * @ORM\Column(name="title", type="string", length=32)
     * @var string
     */
    private $title;

    /**
     * Get the value of author
     *
     * @return  string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param  string  $author
     * @return self
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Get the value of title
     *
     * @return  string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param  string  $title
     * @return self
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id'            => $this->id,
            'author'        => $this->author,
            'title'         => $this->title
        ];
    }
}
