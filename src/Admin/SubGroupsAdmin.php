<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;

class SubGroupsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Под Група')
                ->add('name', null, [
                    'label' => 'Име на Под Групата'
                ])
                ->add('studentNumber', null, [
                    'label' => 'Брой студенти'
                ])
                ->add('groups', ModelListType::class, [
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
