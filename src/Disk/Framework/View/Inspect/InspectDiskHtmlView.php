<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\Inspect;

use App\Disk\Domain\UseCases\Inspect\InspectDiskRequest;
use App\Disk\Presentation\Inspect\Http\InspectDiskHtmlViewModel;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class InspectDiskHtmlView
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
        InspectDiskRequest $request,
        InspectDiskHtmlViewModel $viewModel
    ): Response {
        return new Response($this->twig->render('', [
            'controller_name' => 'PageResolverController',
        ]));
    }
}
