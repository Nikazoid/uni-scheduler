<?php

namespace App\Admin;

use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserAdmin extends AbstractAdmin
{
    private $passwordEncoder;

    public function setPasswordEncoder(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('lecturer', ModelType::class, [
                'required' => false,
                'label' => 'Преподавател',
                'btn_add' => false,
            ])
            ->add('username')
            ->add('email')
            ->add('password',PasswordType::class, [
                'required' => false,
            ])
            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'choices' => [
                    'Lecturer' => User::USER_ROLE_LECTURER,
                    'Admin' => User::USER_ROLE_ADMIN,
                ],
            ])
            ->end();
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('lecturer')
            ->add('roles','choice', [
                'multiple' => true,
                'choices' => []
            ])
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('User')
            ->add('email')
            ->add('lecturer')
            ->add('username')
            ->add('phone')
            ->add('roles')
        ;
    }

    public function prePersist($object)
    {
        $object->setPassword($this->passwordEncoder->encodePassword($object, $object->getPassword()));
    }

    public function preUpdate($object)
    {
        $object->setPassword($this->passwordEncoder->encodePassword($object, $object->getPassword()));
    }

    public function toString($object)
    {
        return $object->getUsername() ?? parent::toString($object);
    }
}
