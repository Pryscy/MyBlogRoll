<?php

namespace Sparkle\Bundle\MyBlogRollBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\CategoryRepository")
 */
class Category
{
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}