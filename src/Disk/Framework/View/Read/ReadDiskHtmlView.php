<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\Read;

use App\Disk\Domain\UseCases\Read\ReadDiskRequest;
use App\Disk\Presentation\Read\Http\ReadDiskHtmlViewModel;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class ReadDiskHtmlView
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
        ReadDiskRequest $request,
        ReadDiskHtmlViewModel $viewModel
    ): Response {
        return new Response($this->twig->render('', [
            'controller_name' => 'PageResolverController',
        ]));
    }
}
