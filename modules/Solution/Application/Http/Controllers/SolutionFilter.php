<?php

namespace Meraki\Solution\Application\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Meraki\Solution\Infrastructure\Repositories\SolutionRepository;
use Meraki\Solution\Application\Http\Resources\SolutionResource;

class SolutionFilter extends Controller
{
    public function __construct(
        protected SolutionRepository $solutionRepository,
    )
    {
        //
    }

    /**
     * Return the results of a solution search with applied filters.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $solutions = $this->solutionRepository->newQuery();

        // Title
        $solutions->when($request->input('term'), function ($query, $term) {
            return $query->where('title', 'like', '%' . $term . '%');
        });

        // Status
        // 0 is marked as false condition
        $request->whenHas('status', function ($input) use ($solutions) {
            $solutions->when($input, function ($query, $status) {
                return $query->where('status', $status);
            });
        });

        // Tags
        $solutions->when($request->input('tags'), function ($query, $tags) {
            return $query->withAllTags($tags);
        });

        // User
        $solutions->when($request->input('user'), function ($query, $user) {
            return $query->where('user_id', $user);
        });

        // Created at
        $solutions->when($request->input('created_at'), function ($query, $created_at) {
            return $query->whereDate('created_at', $created_at);
        });

        // Updated at
        $solutions->when($request->input('updated_at'), function ($query, $updated_at) {
            return $query->whereDate('updated_at', $updated_at);
        });

        return SolutionResource::collection(
            $solutions->paginate(10)
        );
    }
}
