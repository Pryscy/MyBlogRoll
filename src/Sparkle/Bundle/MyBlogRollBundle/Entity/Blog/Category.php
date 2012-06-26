<?php

namespace Sparkle\Bundle\MyBlogRollBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\CategoryRepository")
 */
class Category {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=25)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $tags
     * 
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="categories")
     * @ORM\JoinTable(name="categories_tags")
     */
    private $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }


    /**
     * Add tags
     *
     * @param Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Tag $tags
     */
    public function addTag(\Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Tag $tags)
    {
        $this->tags[] = $tags;
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
}