<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\DatePickerType;

class SpecialtyAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Oписание')
            ->add('name', null, [
                'label' => 'Име на Дисциплината'
            ])
            ->add('abbreviation', null, [
                'label' => 'Съкращение'
            ])
            ->add('groups', null, [
                'label' => 'Групи'
            ])
            ->add('startYear', DatePickerType::class, [
                'label' => 'Година на Започване',
                'dp_view_mode'          => 'months',
                'dp_min_view_mode'      => 'months',
            ])
            ->add('endYear', DatePickerType::class, [
                'label' => 'Година на Завършване',
                'dp_view_mode'          => 'months',
                'dp_min_view_mode'      => 'months',
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
            ->add('groups')
            ->add('startYear')
            ->add('endYear')
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
            ->with('Discipline')
            ->add('name')
            ->add('abbreviation')
            ->add('groups')
            ->add('startYear')
            ->add('endYear')
            ->end()
        ;
    }
}
