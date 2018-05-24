<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeMerk;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $editableUnit = null;
        $typeMerks = TypeMerk::withCount('products_unit')->get();

        if (in_array($request->get('action'), ['edit', 'delete']) && $request->has('id')) {
            $editableUnit = TypeMerk::find($request->get('id'));
        }

        return view('type.index', compact('typeMerks', 'editableUnit'));
    }

    public function store(Request $request)
    {
        $newUnit = $request->validate([
            'nama_type' => 'required|max:60',
        ]);

        TypeMerk::create($newUnit);

        flash(trans('type.created'), 'success');

        return redirect()->route('type-merk.index');
    }

    public function update(Request $request, TypeMerk $type_merk)
    {
        $typeData = $request->validate([
            'nama_type' => 'required|max:60',
        ]);

        $type_merk->update($typeData);

        flash(trans('type.updated'), 'success');

        return redirect()->route('type-merk.index');
    }

    public function destroy(Request $request, TypeMerk $type_merk)
    {
        $this->validate($request, [
          'type_merk_id' => 'required|exists:type_merks,id|not_exists:products_units,type_merk_id',
        ], [
          'type_merk_id.not_exists' => trans('type.undeleteable'),
        ]);
        if ($request->get('type_merk_id') == $type_merk->id && $type_merk->delete()) {
            flash(trans('type.deleted'), 'success');

            return redirect()->route('type-merk.index');
        }

        flash(trans('type.undeleted'), 'error');

        return back();
    }
}
