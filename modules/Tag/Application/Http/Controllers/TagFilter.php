<?php

namespace Meraki\Tag\Application\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Meraki\Tag\Application\Http\Resources\TagResource;
use Meraki\Tag\Infrastructure\Repositories\TagRepository;

class TagFilter extends Controller
{
    public function __construct(
        protected TagRepository $TagRepository,
    )
    {
        //
    }

    /**
     * Return the results of a Tag search with applied filters.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tags = $this->TagRepository->newQuery();

        $tags->when($request->input('term'), function ($query, $term) {
            return $query->where('name->en', 'like', '%' . $term . '%');
        });

        // sortBy column name
        // sortBy direction

        return TagResource::collection(
            $tags->paginate(5)
        );
    }
}
