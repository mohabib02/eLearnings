<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users = [];

        for ($i = 1; $i <= 50; $i++) {
            $user = new User();
            $user->setFirstName("firstname $i");
            $user->setLastName("lastname $i");
            $user->setEmail("email $i");
            $user->setPassword("password $i");
            $user->setCreatedAt(new \DateTime());

            $manager->persist($user);

            $users[] = $user;
        }

        $categories = [];

        for ($i = 1; $i <= 10; $i++) {
            $category = new Category();
            $category->setTitle("Category title $i");

            $manager->persist($category);

            $categories[] = $category;
        }

        for ($i = 1; $i <= 50; $i++) {
            $article = new Article();
            $article->setTitle("Article title $i");
            $article->setContent("Article content $i");
            $article->setImage("https://picsum.photos/200/200");
            $article->setCreatedAt(new \DateTime());
            $article->addCategory($categories[random_int(1, 9)]);
            $article->setUser($users[random_int(1, 49)]);

            $manager->persist($article);
        }


        $manager->flush();
    }
}
