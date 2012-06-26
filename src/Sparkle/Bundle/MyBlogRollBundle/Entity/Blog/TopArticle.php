<?php

namespace Sparkle\Bundle\MyBlogRollBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\TopArticle
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TopArticle
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
     * @var Article $article
     * 
     * @ORM\OneToOne(targetEntity="Article")
     */
    private $article;    

    /**
     * @var boolean $sort_auto
     *
     * @ORM\Column(name="sort_auto", type="boolean")
     */
    private $sort_auto;

    /**
     * @var datetime $expires
     *
     * @ORM\Column(name="expires", type="datetime")
     */
    private $expires;

    /**
     * @var integer $period
     *
     * @ORM\Column(name="period", type="integer")
     */
    private $period;


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
     * Set sort_auto
     *
     * @param boolean $sortAuto
     */
    public function setSortAuto($sortAuto)
    {
        $this->sort_auto = $sortAuto;
    }

    /**
     * Get sort_auto
     *
     * @return boolean 
     */
    public function getSortAuto()
    {
        return $this->sort_auto;
    }

    /**
     * Set expires
     *
     * @param datetime $expires
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;
    }

    /**
     * Get expires
     *
     * @return datetime 
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set period
     *
     * @param integer $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * Get period
     *
     * @return integer 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set article
     *
     * @param Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Article $article
     */
    public function setArticle(\Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get article
     *
     * @return Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }
}