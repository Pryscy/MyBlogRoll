<?php

namespace Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM\LoadMyBlogRollData;
use Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Tag as Tag;


class LoadTagData extends LoadMyBlogRollData implements OrderedFixtureInterface {

    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager) {
        $tags = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($tags['Tag'] as $reference => $columns) {
            // Create new Category entity
            $tag = new Tag();    
            
            
            $tag->setName($columns['name']);

            $manager->persist($tag);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Tag_' . $reference, $tag);
        }
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'tags';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder() {
        return 3;
    }

}