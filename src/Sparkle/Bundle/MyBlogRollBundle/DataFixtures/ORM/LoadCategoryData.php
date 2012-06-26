<?php

namespace Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM\LoadMyBlogRollData;
use Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Category as Category;

class LoadCategoryData extends LoadMyBlogRollData implements OrderedFixtureInterface {

    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager) {
        $categories = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($categories['Category'] as $reference => $columns) {
            // Create new Category entity
            $category = new Category();
            
            // Set tags referencies                        
            foreach ($columns['Tags'] as $tag) {
                $tag = $this->getReference('Tag_' . $tag);
                $category->addTag($tag);
            }
            
            $category->setName($columns['name']);

            $manager->persist($category);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Category_' . $reference, $category);
        }
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'categories';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder() {
        return 4;
    }

}