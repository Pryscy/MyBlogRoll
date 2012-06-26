<?php

namespace Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM\LoadMyBlogRollData;
use Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Owner as Owner;

class LoadOwnerData extends LoadMyBlogRollData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $owners = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($owners['Owner'] as $reference => $columns)
        {
            //Create Owner entity
            $owner = new Owner();
            
            
            $owner->setFirstName($columns['first_name']);
            $owner->setLastName($columns['last_name']);
            $owner->setEmail($columns['email']);
            $owner->setAge($columns['age']);
            $owner->setVisible($columns['visible']);           
            $manager->persist($owner);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Owner_'. $reference, $owner);
        }
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'owners';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 1;
    }
}