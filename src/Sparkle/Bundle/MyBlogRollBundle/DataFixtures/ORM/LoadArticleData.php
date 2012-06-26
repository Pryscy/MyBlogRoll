<?php

namespace Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sparkle\Bundle\MyBlogRollBundle\DataFixtures\ORM\LoadMyBlogRollData;
use Sparkle\Bundle\MyBlogRollBundle\Entity\Blog\Article as Article;

class LoadArticleData extends LoadMyBlogRollData implements OrderedFixtureInterface {

    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager) {
        $articles = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($articles['Article'] as $reference => $columns) {
            //Create Article entity
            $article = new Article();

            //Set blog reference
            $blog = $this->getReference('Blog_' . $columns['Blog']);
            $article->setBlog($blog);

            //Set tag referencies
            foreach ($columns['Tags'] as $tag) {
                $tag = $this->getReference('Tag_' . $tag);
                $article->addTag($tag);
            }

            $article->setTitle($columns['title']);
            $article->setUrl($columns['url']);
            $article->setSummary($columns['summary']);
            $article->setPostdate(new \DateTime($columns['postdate']));


            $manager->persist($article);
            $manager->flush();

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Article_' . $reference, $article);
        }
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile() {
        return 'articles';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder() {
        return 5;
    }

}