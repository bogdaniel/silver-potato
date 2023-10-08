<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\List;

use App\Disk\Domain\UseCases\List\ListDiskRequest;
use App\Disk\Presentation\List\Http\ListDiskHtmlViewModel;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class ListDiskHtmlView
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

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function generateView(ListDiskRequest $request, ListDiskHtmlViewModel $viewModel
    ): Response {
        $data = [
            'controller_name' => 'Disk Create Controller',
            'viewModel' => $viewModel,
        ];

        return new Response($this->twig->render('disk/list.html.twig', $data));

    }
}
