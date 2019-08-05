<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class FacultyAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Oписание')
                ->add('name', null, [
                    'label' => 'Име на Факултета'
                ])
                ->add('abbreviation', null, [
                    'label' => 'Съкращение'
                ])
            ->end()
            ->with('Кабинети')
                ->add('rooms', null, [
                    'label' => 'Стаи'
                ])
            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('abbreviation')
            ->add('rooms')
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
            ->with('Факултет')
                ->add('name')
                ->add('abbreviation')
                ->add('rooms')
            ->end()
        ;
    }
}
