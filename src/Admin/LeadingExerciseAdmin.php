<?php

namespace App\Admin;

use App\Entity\Discipline;
use App\Entity\LeadingExercise;
use App\Entity\Specialty;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\Form\Validator\ErrorElement;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LeadingExerciseAdmin extends AbstractAdmin
{
    public function validate(ErrorElement $errorElement, $object)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        $lecturerID=$object->getLecturer()->getId();
        $disciplineID=$object->getDiscipline()->getId();
        $exerciseType=$object->getExerciseType();

        $sql = "SELECT *
                FROM leading_exercise
                WHERE 
                    lecturer_id = $lecturerID 
                AND discipline_id = $disciplineID 
                AND exercise_type = '" . "$exerciseType" . "'" . " LIMIT 1";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        if (count($result)>0){
            $errorElement
                ->with('lecturer')
                    ->addViolation('Toзи Преподавател вече преподава по съответната дисциплина')
                ->end();
        }

        if ($exerciseType=$object->getExerciseType() == 'лекция')
        {
            $sql1 = "SELECT *
                FROM leading_exercise
                WHERE discipline_id = $disciplineID AND exercise_type = '" . "лекция" . "'" . " LIMIT 1";

            $stmt = $em->getConnection()->prepare($sql1);
            $stmt->execute();

            $result = $stmt->fetchAll();

            if (count($result)>0){
                $errorElement
                    ->with('exerciseType')
                    ->addViolation('Лекцията по тази дисциплина е заета ')
                    ->end();
            }
        }
    }

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
