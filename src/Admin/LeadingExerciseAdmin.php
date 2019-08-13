<?php

namespace App\Admin;

use App\Entity\Discipline;
use App\Entity\LeadingExercise;
use App\Entity\Specialty;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
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
            ->add('discipline', EntityType::class, [
                'label' => 'Дисциплина',
                'class' => Discipline::class,
                'choice_label' => 'name'
            ])
            ->add('lecturer', ModelType::class, [
                'label' => 'Ръководител',
                'btn_add' => false,
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
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('specialty')
            ->add('discipline')
            ->add('exerciseType')
            ->add('exercise')
            ->add('lecturer')
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
                ->add('discipline')
                ->add('exerciseType')
                ->add('exercise')
                ->add('lecturer')
            ->end()
        ;
    }
}
