<?php

declare(strict_types=1);

namespace App\Disk\Framework\View\Create;

use App\Disk\Domain\UseCases\Create\CreateDiskRequest;
use App\Disk\Framework\Form\FormType;
use App\Disk\Presentation\Create\Http\CreateDiskHtmlViewModel;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class CreateDiskHtmlView
{
    private Environment $twig;
    private FormFactoryInterface $formFactory;

    public function __construct(Environment $twig, FormFactoryInterface $formFactory)
    {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function generateView(CreateDiskRequest $request, CreateDiskHtmlViewModel $viewModel): Response
    {
        $data = [
            'controller_name' => 'Disk Create Controller',
            'viewModel' => $viewModel,
        ];

        $form = $this->formFactory->createBuilder(FormType::class, $request)->getForm();

        if (!$viewModel->violations && $request->isPosted) {
            return new Response($this->twig->render('templates/admin/disk/disk_creation_complete.html.twig', $data));
        }

        $data['form'] = $form->createView();

        return new Response($this->twig->render('templates/admin/disk/form.html.twig', $data));
    }
}
