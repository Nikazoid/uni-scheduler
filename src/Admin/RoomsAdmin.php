<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;

class RoomsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('roomNumber', null, [
                'label' => 'Номер на стаята'
            ])
            ->add('faculty', ModelListType::class, [
                'label' => 'Факултет',
                'btn_add' => false
            ])
            ->add('capacity', null, [
                'label' => 'Капацитет'
            ])
            ->add('seats', null, [
                'label' => 'Работни места'
            ])
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('roomNumber')
            ->add('faculty')
            ->add('capacity')
            ->add('seats')
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
            ->with('Rooms')
                ->add('roomNumber')
                ->add('faculty')
                ->add('capacity')
                ->add('seats')
            ->end()
        ;
    }
}
