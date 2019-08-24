<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Validator\ErrorElement;

class SpecialtyAdmin extends AbstractAdmin
{
    public function validate(ErrorElement $errorElement, $object)
    {
        $getCurrentStartYear=$object->getStartYear();

        if ($getCurrentStartYear<date("Y")){
            $errorElement
                ->with('startYear')
                ->addViolation('Моля въведете година поляма от '. date("Y"))
                ->end();
        }
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Имена', ['class' => 'col-md-6'])
                ->add('name', null, [
                    'label' => 'Име на Специалност'
                ])
                ->add('abbreviation', null, [
                    'label' => 'Съкращение'
                ])
                ->end()
                ->with('Поток', ['class' => 'col-md-6'])
                    ->add('startYear', null, [
                        'label' => 'Година на Започване',
                    ])
                ->end()
            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('abbreviation')
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
            ->add('startYear')
            ->add('endYear')
            ->end()
        ;
    }

    public function prePersist($object)
    {
        $object->setEndYear($object->getStartYear()+4);
    }

    public function preUpdate($object)
    {
        $object->setEndYear($object->getStartYear()+4);
    }
}
