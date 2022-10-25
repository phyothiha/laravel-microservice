<?php

namespace Meraki\Solution\Application\Http\Controllers;

use Meraki\Foundations\Application\BaseController;
use Meraki\Solution\Domain\Services\SolutionService;
use Meraki\Solution\Application\Http\Requests\StoreSolutionRequest;
use Meraki\Solution\Application\Http\Resources\SolutionResource;

class SolutionController extends BaseController
{
    public function __construct(
        protected SolutionService $solutionService
    )
    {
        //
    }

    public function index()
    {
        return SolutionResource::collection(
            $this->solutionService->getAll()
        );
    }

    public function store(StoreSolutionRequest $request)
    {
        $validated = $request->validated();

        $this->solutionService->create($validated);

        return $this->simpleSuccessResponse('Solution Created.');
    }

    public function show(int $id)
    {
        return new SolutionResource(
            $this->solutionService->findById($id)
        );
    }

    public function update(StoreSolutionRequest $request, int $id)
    {
        $validated = $request->validated();

        $this->solutionService->update($id, $validated);

        return $this->simpleSuccessResponse('Solution Updated.');
    }

    public function destroy(int $id)
    {
        $this->solutionService->delete($id);

        return $this->simpleSuccessResponse('Solution Deleted.');
    }
}
