<?php

namespace App\Admin;

use App\Entity\LeadingExercise;
use App\Entity\Specialty;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LeadingExerciseAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('specialty', EntityType::class, [
                'label' => 'Специалност',
                'class' => Specialty::class,
                'choice_label' => 'name'
            ])
            ->add('exerciseType', ChoiceType::class, [
                'label' => 'Тип на упражнението',
                'choices' => [
                    'Лекция' => LeadingExercise::LEADING_EXERCISE_TYPE_LECTURE,
                    'Семинарно' => LeadingExercise::LEADING_EXERCISE_TYPE_SEMINAR,
                    'Лабораторно' => LeadingExercise::LEADING_EXERCISE_TYPE_LABORATORY,
                    'Курсова' => LeadingExercise::LEADING_EXERCISE_TYPE_COURSE
                ],
    ])
            ->add('exercise', null, [
                'label' => 'Упражнение'
            ])
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('specialty')
            ->add('exerciseType')
            ->add('exercise')
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
            ->with('Водещи занятия')
                ->add('specialty')
                ->add('exerciseType')
                ->add('exercise')
            ->end()
        ;
    }
}
