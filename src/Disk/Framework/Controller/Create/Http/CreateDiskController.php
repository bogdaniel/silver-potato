<?php

declare(strict_types=1);

namespace App\Disk\Framework\Controller\Create\Http;

use App\Disk\Domain\UseCases\Create\Contract\CreateDiskUseCaseContract;
use App\Disk\Domain\UseCases\Create\CreateDiskRequest;
use App\Disk\Framework\View\Create\CreateDiskHtmlView;
use App\Disk\Presentation\Create\Http\CreateDiskHtmlPresenter;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

#[Route('/disk/create', name: 'app_disk_create')]
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
     * @param CreateDiskRequest $request
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
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
