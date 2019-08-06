<?php

namespace App\Admin;

use App\Entity\Lecturer;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;


class LecturerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Lecturer')
            ->add('firstName')
            ->add('middleName')
            ->add('lastName')
            ->add('phone', TelType::class,[
                'required' => false,
            ])
            ->add('leadingExercises')
            ->add('academicTitle', ModelType::class, [
                'label' => 'Академична Титла',
                'btn_add' => false
            ])
            ->add('scientificTitle', ModelType::class, [
                'label' => 'Научни Титла',
                'multiple' => true,
                'btn_add' => false
            ])
            ->add('contract', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Primary' => Lecturer::LECTURER_CONTRACT_PRIMARY,
                    'Guest' => Lecturer::LECTURER_CONTRACT_GUEST,
                    'Civil' => Lecturer::LECTURER_CONTRACT_CIVIL
                ],
            ])
            ->add('email')
            ->add('estHours')
            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('firstName')
            ->add('middleName')
            ->add('lastName')
            ->add('academicTitle')
            ->add('scientificTitle')
            ->add('leadingExercises')
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
            ->with('Lecturer')
                ->add('email')
                ->add('scientificTitle')
                ->add('academicTitle')
                ->add('firstName')
                ->add('middleName')
                ->add('leadingExercises')
                ->add('lastName')
                ->add('estHours')
                ->add('contract')
                ->add('phone')
            ->end()
        ;
    }
}
