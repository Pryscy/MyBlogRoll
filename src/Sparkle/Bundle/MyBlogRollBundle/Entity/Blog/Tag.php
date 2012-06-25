<?php

namespace Sparkle\Bundle\MyBlogRollBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Tag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\TagRepository")
 */
class Tag
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
     * @var Category $category
     * 
     * @ORM\OneToOne(targetEntity="Category")
     */
    private $category;
    
     /**
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tags")
     **/
    private $articles;

    public function __construct() {
        $this->articles = new ArrayCollection();
    }    


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

    /**
     * Set category
     *
     * @param Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Category $category
     */
    public function setCategory(\Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add articles
     *
     * @param Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Article $articles
     */
    public function addArticle(\Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Article $articles)
    {
        $this->articles[] = $articles;
    }

    /**
     * Get articles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }
}