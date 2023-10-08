<?php

declare(strict_types=1);

namespace App\Disk\Framework\Form;

use App\Disk\Domain\UseCases\Read\ReadDiskRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => ReadDiskRequest::class,
                'csrf_protection' => true,
            ]
        );
    }
}
