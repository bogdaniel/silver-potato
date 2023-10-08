<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\Update;

use App\Disk\Domain\UseCases\Update\UpdateDiskRequest;
use App\Disk\Presentation\Update\Http\UpdateDiskHtmlViewModel;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class UpdateDiskHtmlView
{
    private Environment $twig;
    private FormFactoryInterface $formFactory;

    public function __construct(
        Environment $twig,
        FormFactoryInterface $formFactory
    ) {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
    }

    public function generateView(
        UpdateDiskRequest $request,
        UpdateDiskHtmlViewModel $viewModel
    ): Response {
        return new Response($this->twig->render('', [
            'controller_name' => 'PageResolverController',
        ]));
    }
}
