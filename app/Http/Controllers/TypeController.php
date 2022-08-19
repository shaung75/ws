<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
  /**
	 * Show all manufacturers
	 * @return [type] [description]
	 */
    public function index() {
    	return view('types.index', [
    		'types' => Type::all(),
    	]);
    }

    /**
     * Store the service type
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) {
    	$formFields = $request->validate([
          'type' => ['required', Rule::unique('types','type')],
          'duration' => ['required', 'numeric']
      ]);

      $formFields['type'] = $request->type;

      $type = Type::create($formFields);

      return redirect()->back()->with('message', 'Created successfully');
    }

    /**
     * Update service type
     * @param  type $type [description]
     * @return [type]                     [description]
     */
    public function update(Request $request) {
        $formFields = $request->validate([
            'type' => ['required', Rule::unique('types','type')],
            'id' => 'required',
            'duration' => ['required', 'numeric']
        ]);

        $type = Type::find($request->id);

        $type->update($formFields);

        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Delete service type
     * @param  Manufacturer $manufacturer [description]
     * @return [type]                     [description]
     */
    public function destroy(Type $type) {
        if(count($type->services) > 0) {
            return redirect()->back()->with('error', 'There are services currently using this type');       
        }

        $type->delete();

        return redirect()->back()->with('message', 'Service type deleted');
    }
}
