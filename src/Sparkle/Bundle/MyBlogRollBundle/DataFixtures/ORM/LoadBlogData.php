<?php

namespace Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM\LoadMyBlogRollData;
use Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Blog as Blog;

class LoadBlogData extends LoadMyBlogRollData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $blogs = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($blogs['Blog'] as $reference => $columns)
        {
            // Create new blog entity
            
            $blog = new Blog();
            
            //Set reference to owner
            foreach ($columns['Owners'] as  $owner) {
                $owner = $this->getReference('Owner_'. $owner);
                $blog->addOwner($owner);
            }
                        
            
            $blog->setName($columns['name']);
            $blog->setUrl($columns['url']);
            $blog->setUrlRss($columns['urlRss']);
            
            $manager->persist($blog);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Blog_'. $reference, $blog);
        }
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'blogs';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 2;
    }
}