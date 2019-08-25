<?php

namespace App\Admin;

use App\Entity\Exercise;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\Form\Validator\ErrorElement;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class ExerciseAdmin extends AbstractAdmin
{
    public function validate(ErrorElement $errorElement, $object)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        $getCurrentStart = $object->getStart();
        $getCurrentEnd = $object->getEnd();
        $getCurrentDayName = $object->getDayName();
        $getCurrentLeadingExercise = $object->getLeadingExercise()->getId();
        $getCurrentGroupSpecialty = $object->getSubGroups()->getGroups()->getSpecialty()->getAbbreviation();
        $getCurrentLeadingExerciseSpecialty = $object->getLeadingExercise()->getSpecialty()->getAbbreviation();

        if ($getCurrentGroupSpecialty != $getCurrentLeadingExerciseSpecialty) {
            $errorElement
                ->with('leadingExercise')
                    ->addViolation(
                        'Водещия на тази специалност не преподава на избраната група от вас група ' .
                        $object->getSubGroups()
                    )
                ->end()
                ->with('subGroups')
                    ->addViolation('Моля изберете подходяща група')
                ->end();
        }

        $sql3 = "SELECT *
                FROM leading_exercise
                WHERE
                    id = $getCurrentLeadingExercise 
                    AND exercise_type = 'лекция' 
                LIMIT 1";

        $stmt = $em->getConnection()->prepare($sql3);
        $stmt->execute();

        $result3 = $stmt->fetchAll();

        if (count($result3) > 0) {
            $errorElement
                ->with('leadingExercise')
                    ->addViolation('Toзи преподавател вече преподава лекция по тази дисциплина')
                ->end();
        }

        $sql = "SELECT *
                FROM exercise
                WHERE
                    leading_exercise_id = $getCurrentLeadingExercise 
                    AND `start` = ". "'" . "$getCurrentStart" . "'" .
                    "AND day_name = " . "'"."$getCurrentDayName" . "'" . " LIMIT 1";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        if (!empty($result)) {
            $errorElement
                ->with('start')
                    ->addViolation('вече има занятие в този час')
                ->end()
                ->with('dayName')
                    ->addViolation('вече има занятие в този ден')
                ->end();
        }

        $getCurrentStartInt = (int)$getCurrentStart;
        $getCurrentEndInt = (int)$getCurrentEnd;
        $hoursResult = $getCurrentEndInt - $getCurrentStartInt;

        if ($hoursResult != 2){
            $errorElement
                ->with('start')
                    ->addViolation('Не може да има занятие по-дълго от 2 часа')
                ->end()
                ->with('end')
                    ->addViolation('Не може да има занятие по-дълго от 2 часа')
                ->end();
        }

        if ($getCurrentStart>$getCurrentEnd){
            $errorElement
                ->with('start')
                    ->addViolation('Моля въведете час полям от '. $getCurrentEnd)
                ->end();
        }
    }

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
                ->add('start', ChoiceType::class, [
                    'label' => 'Час на започване',
                    'choices' => [
                        '07:15' => '07:15',
                        '09:15' => '09:15',
                        '11:15' => '11:15',
                        '13:15' => '13:15',
                        '15:15' => '15:15',
                        '17:15' => '17:15',
                    ],
                ])
                ->add('end', ChoiceType::class, [
                    'label' => 'Час на приключване',
                    'choices' => [
                        '09:00' => '09:00',
                        '11:00' => '11:00',
                        '13:00' => '13:00',
                        '15:00' => '15:00',
                        '17:00' =>  '17:00',
                        '19:00' => '19:00',
                    ],
                ])
                ->add('subGroups', ModelType::class, [
                    'label' => 'Избери Група/Под-група',
                    'btn_add' => false
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
                ->add('semesterSplit', ChoiceType::class, [
                    'label' => 'Име на семестъра',
                    'choices' => [
                        'Зимен' => Exercise::EXERCISE_SEMESTER_SPLIT_WINTER,
                        'Летен' => Exercise::EXERCISE_SEMESTER_SPLIT_SUMMER
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
            ->add('subGroups')
            ->add('rooms')
            ->add('start')
            ->add('end')
            ->add('dayName')
            ->add('semesterSplit')
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
                ->add('subGroups')
                ->add('rooms')
                ->add('start')
                ->add('end')
                ->add('dayName')
                ->add('semesterSplit')
            ->end()
        ;
    }

//    public function prePersist($object)
//    {
//        dump($object->getStart());
//        $object->setEnd($object->getStart()+4);
//    }
//
//    public function preUpdate($object)
//    {
//        $object->setEndYear($object->getStartYear()+4);
//    }
}
