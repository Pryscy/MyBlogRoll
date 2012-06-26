<?php

namespace Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM\LoadMyBlogRollData;
use Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\TopArticle as TopArticle;


class LoadTopArticleData extends LoadMyBlogRollData implements OrderedFixtureInterface {

    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager) {
        $topArticles = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($topArticles['TopArticle'] as $reference => $columns) {
            // Create new Category entity
            $topArticle = new TopArticle();
            
            //Set Category referencies
            $article = $this->getReference('Article_'.$columns['Article']);
            $topArticle->setArticle($article);
            
            $topArticle->setExpires(new \DateTime(isset($columns['expires']) ? $columns['expires'] : null));
            $topArticle->setPeriod(isset($columns['period']) ? $columns['period'] : 0);
            $topArticle->setSortAuto(isset($columns['sort_auto']) ? $columns['sort_auto'] : False);

            $manager->persist($topArticle);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('TopArticle_' . $reference, $topArticle);
        }
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'toparticles';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder() {
        return 6;
    }

}