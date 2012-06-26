<?php

namespace Sparkle\Bundle\MyBlogRollBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\ArticleRepository")
 */
class Article
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=150)
     */
    private $title;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var datetime $postdate
     *
     * @ORM\Column(name="postdate", type="datetime")
     */
    private $postdate;

    /**
     * @var string $summary
     *
     * @ORM\Column(name="summary", type="string", length=300)
     */
    private $summary;
    
    /**
     * @var Blog $blog
     * 
     * @ORM\OneToOne(targetEntity="Blog")
     */
    private $blog;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $tags
     * 
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
     * @ORM\JoinTable(name="articles_tags")
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set postdate
     *
     * @param datetime $postdate
     */
    public function setPostdate($postdate)
    {
        $this->postdate = $postdate;
    }

    /**
     * Get postdate
     *
     * @return datetime 
     */
    public function getPostdate()
    {
        return $this->postdate;
    }

    /**
     * Set summary
     *
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set blog
     *
     * @param Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Blog $blog
     */
    public function setBlog(\Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get blog
     *
     * @return Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Blog 
     */
    public function getBlog()
    {
        return $this->blog;
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