<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
      $editableUnit = null;
      $suppliers = Supplier::all();

      if (in_array($request->get('action'), ['edit', 'delete']) && $request->has('id')) {
          $editableUnit = Supplier::find($request->get('id'));
      }

      return view('supplier.index', compact('suppliers', 'editableUnit'));
    }

    public function store(Request $request)
    {
        $newSupplier = $request->validate([
            'nama' => 'required|max:15',
            'tlpn' => 'required|min:10|numeric',
            'alamat' => 'required|max:255',
        ]);

        Supplier::create($newSupplier);

        flash(trans('supplier.created'), 'success');

        return redirect()->route('supplier.index');
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplierData = $request->validate([
          'nama' => 'required|max:15',
          'tlpn' => 'required|min:10|numeric',
          'alamat' => 'required|max:255',
        ]);

        $supplier->update($supplierData);

        flash(trans('supplier.updated'), 'success');

        return redirect()->route('supplier.index');
    }

    public function destroy(Request $request, Supplier $supplier)
    {
        if ($request->get('supplier_id') == $supplier->id && $supplier->delete()) {
            flash(trans('supplier.deleted'), 'success');

            return redirect()->route('supplier.index');
        }
        flash(trans('type.undeleted'), 'error');

        return back();
    }
}
