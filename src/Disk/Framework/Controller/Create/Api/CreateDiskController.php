<?php

declare(strict_types=1);

namespace App\Disk\Framework\Controller\Create\Api;

use App\Disk\Domain\UseCases\Create\Contract\CreateDiskUseCaseContract;
use App\Disk\Domain\UseCases\Create\CreateDiskRequest;
use App\Disk\Framework\View\Create\CreateDiskHtmlView;
use App\Disk\Presentation\Create\Http\CreateDiskHtmlPresenter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

#[Route('/api/disk/create', name: 'app_api_disk_create')]
final class CreateDiskController extends AbstractController
{
    private CreateDiskHtmlView $registerView;
    private CreateDiskUseCaseContract $useCase;
    private CreateDiskHtmlPresenter $presenter;

    public function __construct(
        CreateDiskHtmlView $registerView,
        CreateDiskUseCaseContract $useCase,
        CreateDiskHtmlPresenter $presenter
    ) {
        $this->registerView = $registerView;
        $this->useCase = $useCase;
        $this->presenter = $presenter;
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function __invoke(CreateDiskRequest $request): Response
    {
        $this->useCase->execute($request, $this->presenter);

        return $this->registerView->generateView(
            $request,
            $this->presenter->viewModel()
        );
    }
}
