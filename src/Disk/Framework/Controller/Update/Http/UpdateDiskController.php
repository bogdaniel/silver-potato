<?php

declare(strict_types=1);

namespace App\Disk\Framework\Controller\Update\Http;

use App\Disk\Domain\UseCases\Update\Contract\UpdateDiskUseCaseContract;
use App\Disk\Domain\UseCases\Update\UpdateDiskRequest;
use App\Disk\Framework\View\Update\UpdateDiskHtmlView;
use App\Disk\Presentation\Update\Http\UpdateDiskHtmlPresenter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

#[Route('/disk/update/{uuid}', name: 'app')]
final class UpdateDiskController extends AbstractController
{
    private UpdateDiskHtmlView $registerView;
    private UpdateDiskUseCaseContract $useCase;
    private UpdateDiskHtmlPresenter $presenter;

    public function __construct(
        UpdateDiskHtmlView $registerView,
        UpdateDiskUseCaseContract $useCase,
        UpdateDiskHtmlPresenter $presenter
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
    public function __invoke(UpdateDiskRequest $request): Response
    {
        $this->useCase->execute($request, $this->presenter);

        return $this->registerView->generateView(
            $request,
            $this->presenter->viewModel()
        );
    }
}
