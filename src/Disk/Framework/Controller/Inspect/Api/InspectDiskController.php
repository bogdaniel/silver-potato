<?php

declare(strict_types=1);

namespace App\Disk\Framework\Controller\Inspect\Api;

use App\Disk\Domain\UseCases\Inspect\Contract\InspectDiskUseCaseContract;
use App\Disk\Domain\UseCases\Inspect\InspectDiskRequest;
use App\Disk\Framework\View\Inspect\InspectDiskHtmlView;
use App\Disk\Presentation\Inspect\Http\InspectDiskHtmlPresenter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

#[Route('/api/disk/inspect/{uuid}', name: 'app_api_disk_inspect')]
final class InspectDiskController extends AbstractController
{
    private InspectDiskHtmlView $registerView;
    private InspectDiskUseCaseContract $useCase;
    private InspectDiskHtmlPresenter $presenter;

    public function __construct(
        InspectDiskHtmlView $registerView,
        InspectDiskUseCaseContract $useCase,
        InspectDiskHtmlPresenter $presenter
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
    public function __invoke(InspectDiskRequest $request): Response
    {
        $this->useCase->execute($request, $this->presenter);

        return $this->registerView->generateView(
            $request,
            $this->presenter->viewModel()
        );
    }
}
