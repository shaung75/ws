<?php

namespace App\Http\Controllers;

use App\Models\Piano;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PianoController extends Controller
{
		/**
		 * Show all pianos
		 * @param  Request $request [description]
		 * @return [type]           [description]
		 */
    public function index(Request $request) {
    	return view('pianos.index', [
    		//'pianos' => Piano::paginate(),
    		'pianos' => $this->paginate(Piano::get()->sortBy('stock_number'), 5, $request->page, ['path' => 'pianos'])
    	]);
    }

    /**
     * Paginate collection results
     * @param  [type]  $items   [description]
     * @param  integer $perPage [description]
     * @param  [type]  $page    [description]
     * @param  array   $options [description]
     * @return [type]           [description]
     */
    private function paginate($items, $perPage = 5, $page = null, $options = []) {
	    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
	    $items = $items instanceof Collection ? $items : Collection::make($items);
	    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
		}
}
