<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SubGroupsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Под Група')
                ->add('name', ChoiceType::class, [
                    'label' => 'Име на Под Групата',
                    'choices' => [
                        'a' => 'a',
                        'b' => 'b',
                        'c' => 'c',
                        'd' => 'd',
                        'e' => 'e',
                        'f' => 'f',
                        'g' => 'g',
                    ],
                ])
                ->add('studentNumber', null, [
                    'label' => 'Брой студенти'
                ])
                ->add('groups', ModelType::class, [
                    'label' => 'Група',
                    'btn_add' => false
                ])
            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('studentNumber')
            ->add('groups')
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
            ->with('Под Група')
                ->add('name')
                ->add('studentNumber')
                ->add('groups')
            ->end()
        ;
    }
}
