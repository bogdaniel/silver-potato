<?php

declare(strict_types=1);

namespace App\Disk\Framework\Form;

use App\Disk\Domain\UseCases\Inspect\InspectDiskRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InspectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => InspectDiskRequest::class,
                'csrf_protection' => true,
            ]
        );
    }
}
