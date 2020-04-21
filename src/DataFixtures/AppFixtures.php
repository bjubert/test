<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //création de 20 catégories
        $userArray = array();

        $admin = new Utilisateur();
        $adminPerm = array("ROLE_ADMIN");
        $admin->setIdentifiant('admin');
        $admin->setPassword('$argon2id$v=19$m=65536,t=4,p=1$cU1lZlROTm5PSmVqc3d3SQ$7wSD0iYU+ezV8KZuQTdyq2yisOtPeT0HnEMihD5dLo8');
        $admin->setRoles($adminPerm);

        $user = new Utilisateur();
        $userPerm = array();
        $user->setIdentifiant('user');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$cU1lZlROTm5PSmVqc3d3SQ$7wSD0iYU+ezV8KZuQTdyq2yisOtPeT0HnEMihD5dLo8');
        $user->setRoles($userPerm);

        $manager->persist($admin);
        $manager->persist($user);

        $manager->flush();
    }
}
