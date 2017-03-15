<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Task;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class TaskAdmin.
 */
class TaskAdmin extends AbstractAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('description')
            ->add('category')
            ->add('status', 'choice', [
                'choices' => [
                    'task_form.status.open' => Task::STATUS_OPEN,
                    'task_form.status.closed' => Task::STATUS_CLOSED,
                ],
                'translation_domain' => 'app',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('category')
            ->add('status')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('category')
            ->add('status')
            ->add('createdAt');
    }
}
