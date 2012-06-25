<?php

namespace Sparkle\Bundle\MyBlogRollBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Blog
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\BlogRepository")
 */
class Blog
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=200)
     */
    private $url;
    
    /**
     * @var string $urlRss
     *
     * @ORM\Column(name="url_rss", type="string", length=200)
     */
    private $urlRss;
    
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $owners
     * 
     * @ORM\ManyToMany(targetEntity="Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Owner")
     * @ORM\JoinTable(name="blogs_owners")
     */
    private $owners;

    public function __construct() {
        $this->owners = new ArrayCollection();
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
     * Set urlRss
     *
     * @param string $urlRss
     */
    public function setUrlRss($urlRss)
    {
        $this->urlRss = $urlRss;
    }

    /**
     * Get urlRss
     *
     * @return string 
     */
    public function getUrlRss()
    {
        return $this->urlRss;
    }
    
    /**
     * add Owner
     * 
     * @param Owner owner
     */
    public function addOwner(Owner $owner) 
    {
        $this->owners[] = $owner;
    }
    
    /**
     * get Owners
     *  
     * @return ArrayCollection Owner
     */
    public function getOwners()
    {
        return $this->owners;
    }
}