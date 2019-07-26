<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DisciplineAdmin extends AbstractAdmin
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
            ->end()
            ->with('Предвиден брой посещения')
                ->add('lecturesCount', null, [
                    'label' => 'Лекции'
                ])
                ->add('semExercisesCount', null, [
                    'label' => 'Семинарни Упражнения'
                ])
                ->add('labExercisesCount', null, [
                    'label' => 'Лабораторни Упражнения'
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
                ->add('lecturesCount')
                ->add('semExercisesCount')
                ->add('labExercisesCount')
            ->end()
        ;
    }
}
