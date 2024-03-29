<?php

namespace App\Admin;

use App\Entity\Groups;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;

class GroupsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Група')
                ->add('name', ChoiceType::class, [
                    'label' => 'Име на Групата',
                    'choices' => [
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                    ],
                ])
                ->add('specialty', ModelType::class, [
                    'label' => 'Специалност',
                    'btn_add' => false
                ])
                ->add('studentNumber', null, [
                    'label' => 'Брой студенти'
                ])
                ->add('educationType', ChoiceType::class, [
                    'label' => 'Вид на обучение',
                    'choices' => [
                        'Редовно' => Groups::GROUPS_EDUCATION_TYPE_REGULAR,
                        'Задочно' => Groups::GROUPS_EDUCATION_TYPE_ABSENTIA
                    ],
                ])
            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('subGroups')
            ->add('specialty')
            ->add('studentNumber')
            ->add('educationType')
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
            ->with('Група')
                ->add('name')
                ->add('subGroups')
                ->add('specialty')
                ->add('studentNumber')
                ->add('educationType')
            ->end()
        ;
    }
}
