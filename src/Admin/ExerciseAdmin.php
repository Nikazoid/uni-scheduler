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

        $getCurrentStart=$object->getStart();
        $getCurrentEnd=$object->getEnd();
        $getCurrentLeadingExercise=$object->getLeadingExercise()->getId();

//        dump($getCurrentLeadingExercise);

        $sql = "SELECT *
                FROM exercise
                WHERE 
                    leading_exercise_id = $getCurrentLeadingExercise 
                AND start = '" . "$getCurrentStart'" . "
                AND " . "'" . "end" . "' = " . "'". "$getCurrentEnd" ."'";


        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        dump($result);

        if ($getCurrentStart<$getCurrentEnd){
            $errorElement
                ->with('start')
                    ->addViolation('Моля въведете час полям от '. date("Y"))
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
                ->add('start', TimeType::class, [
                    'label' => 'Час на започване',
                    'input'  => 'string',
                    'widget' => 'choice',
                ])
                ->add('end', TimeType::class, [
                    'label' => 'Час на приключване',
                    'input'  => 'string',
                    'widget' => 'choice',
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
