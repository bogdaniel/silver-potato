<?php

namespace App\Disk\Framework\ArgumentResolver;

use App\Disk\Domain\UseCases\Create\CreateDiskRequest;
use App\Disk\Framework\Service\Validator\CreateDiskDataValidator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class FormToDiskRequestResolver implements ValueResolverInterface
{
    private CreateDiskDataValidator $createDiskDataValidator;

    public function __construct(CreateDiskDataValidator $createDiskDataValidator)
    {

        $this->createDiskDataValidator = $createDiskDataValidator;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {

        $argumentType = $argument->getType();

        if (!$argumentType || $argument->getType() !== CreateDiskRequest::class) {
            return [];
        }

        $registerUserData = $request->request->all();

        $isPosted = $registerUserData['form']['isPosted'] ?? null;
        $registerRequest = new CreateDiskRequest(\Ramsey\Uuid\Uuid::uuid4());

        if ($isPosted !== null) {
            $registerRequest = new CreateDiskRequest(\Ramsey\Uuid\Uuid::uuid4(),
                $registerUserData['form']['name'],
                $registerUserData['form']['path'],
                [],
                $this->createDiskDataValidator->getErrors($registerUserData['form']),
                (bool)(int)$isPosted
            );
        }

        yield $registerRequest;
    }
}
