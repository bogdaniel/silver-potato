<?php

declare(strict_types=1);

namespace App\Disk\Framework\Form;

use App\Disk\Domain\UseCases\Create\CreateDiskRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('isPosted', HiddenType::class, ['data' => true]);
        $builder->add('name');
        $builder->add('path');
        $builder->add('save', SubmitType::class, [
            'attr' => [
                'class' => 'save'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => CreateDiskRequest::class,
                'csrf_protection' => false,
            ]
        );
    }
}
