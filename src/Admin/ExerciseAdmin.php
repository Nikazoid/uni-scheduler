<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\Form\Type\DatePickerType;
use Sonata\Form\Type\DateTimePickerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;

class ExerciseAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Занятие')
                ->add('leadingExercise', ModelType::class, [
                    'label' => 'Водещ занятие',
                    'btn_add' => false
                ])
                ->add('rooms', ModelType::class, [
                    'label' => 'Стаи',
                    'btn_add' => false
                ])
                ->add('start', DateTimePickerType::class, [
                    'label' => 'Час на започване',
                    'dp_view_mode'          => 'days',
                    'dp_min_view_mode'      => 'days',
                ])
                ->add('end', DateTimePickerType::class, [
                    'label' => 'Час на започване',
                    'dp_view_mode'          => 'days',
                    'dp_min_view_mode'      => 'days',
                ])
                ->add('dayName', ChoiceType::class, [
                    'label' => 'Ден от седмицата',
                    'choices' => [
                        'Понеделник' => 'Monday',
                        'Вторник' => 'Tuesday',
                        'Сряда' => 'Wednesday',
                        'Четвъртък' => 'Thursday',
                        'Петък' => 'Friday',
                    ],
                ])
            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('leadingExercise')
            ->add('rooms')
            ->add('start')
            ->add('end')
            ->add('dayName')
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
            ->with('Занятие')
                ->add('leadingExercise')
                ->add('rooms')
                ->add('start')
                ->add('end')
                ->add('dayName')
            ->end()
        ;
    }
}
