<?php

namespace AppBundle\Form\Type;

use AppBundle\DTO\Task\NewTaskDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewTaskDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new NewTaskDTO(
                    $form->get('title')->getData(),
                    $form->get('content')->getData()
                );
            }
        ]);
    }
}
