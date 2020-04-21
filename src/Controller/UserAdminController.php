<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserAdminController extends EasyAdminController
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function persistUtilisateurEntity($user)
    {
        // Avec FOSUserBundle, on faisait comme ça :
        // $this->get('fos_user.user_manager')->updateUser($user, false);
        $this->updatePassword($user);
        parent::persistEntity($user);
    }

    public function updateUtilisateurEntity($user)
    {
        // Avec FOSUserBundle, on faisait comme ça :
        //$this->get('fos_user.user_manager')->updateUser($user, false);
        $this->updatePassword($user);
        parent::updateEntity($user);
    }

    public function updatePassword(Utilisateur $user)
    {
        if (!empty($user->getPlainPassword())) {
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPlainPassword()));
        }
    }
}
