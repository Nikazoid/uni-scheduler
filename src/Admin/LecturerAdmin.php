<?php

namespace App\Admin;

use App\Entity\Lecturer;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class LecturerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Преподавател')
                ->with('Имена', ['class' => 'col-md-6'])
                    ->add('firstName')
                    ->add('middleName')
                    ->add('lastName')
                ->end()
                ->with('Титли', ['class' => 'col-md-6'])
                    ->add('academicTitle', ModelType::class, [
                        'label' => 'Академична Титла',
                        'btn_add' => false
                    ])
                    ->add('scientificTitle', ModelType::class, [
                        'label' => 'Научни Титли',
                        'multiple' => true,
                        'btn_add' => false
                    ])
                ->end()
                ->with('Допълнителна Информация', ['class' => 'col-md-12'])
                    ->add('room', null, [
                        'label' => 'Стая на преподавателя'
                    ])
                    ->add('contract', ChoiceType::class, [
                        'label' => 'Тип на договора',
                        'choices' => [
                            'Основен Трудов' => Lecturer::LECTURER_CONTRACT_PRIMARY,
                            'Гост' => Lecturer::LECTURER_CONTRACT_GUEST,
                            'Граждански' => Lecturer::LECTURER_CONTRACT_CIVIL
                        ],
                    ])
                    ->add('estHours', null, [
                        'label' => 'Брой полагащи се часове'
                    ])
                ->end()
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
            ->add('room')
            ->add('user')
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
                ->add('firstName')
                ->add('middleName')
                ->add('lastName')
                ->add('user')
                ->add('scientificTitle')
                ->add('academicTitle')
                ->add('leadingExercises')
                ->add('estHours')
                ->add('room')
                ->add('contract')
            ->end()
        ;
    }
}
