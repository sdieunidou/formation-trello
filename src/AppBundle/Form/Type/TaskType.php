<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TaskType.
 */
class TaskType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'task_form.name',
            ])
            ->add('category', null, [
                'label' => 'task_form.category',
                'required' => false,
                'empty_data' => null,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'task_form.description',
                'required' => false,
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'task_form.status.label',
                'choices' => [
                    'task_form.status.open' => Task::STATUS_OPEN,
                    'task_form.status.closed' => Task::STATUS_CLOSED,
                ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => Task::class,
                'translation_domain' => 'app',
            ]);
    }
}
