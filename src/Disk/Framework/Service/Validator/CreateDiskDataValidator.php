<?php

namespace App\Disk\Framework\Service\Validator;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class CreateDiskDataValidator
{
    private ValidatorInterface $validator;
    private Assert\Collection $constraint;

    public function __construct(ValidatorInterface $validator)
    {
        $this->constraint = new Assert\Collection([
            'name' => new Assert\Required([
                new Assert\NotBlank(),
            ]),
            'path' => new Assert\Required([
                new Assert\NotBlank(),
            ]),
            'isPosted' => new Assert\Optional([
                new Assert\NotBlank(),
            ]),
            'save' => new Assert\Optional(),
        ]);
        $this->validator = $validator;
    }

    public function getErrors(?array $registerUserData): ?array
    {
        $violations = $this->validator->validate($registerUserData, $this->constraint);
        if (\count($violations) === 0) {
            return null;
        }

        $messages = [];
        foreach ($violations as $violation) {
            $messages[] = [
                $violation->getPropertyPath() => $violation->getMessage(),
            ];
        }

        return $messages;
    }
}
