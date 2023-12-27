<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;

use App\Models\Medicine;
use App\Models\DetailCheck;

use Session;

class MedicineController extends Controller
{
    public function index() 
    {
        $medicines = Medicine::all();

        return view('admin.medicines.index', [
            'medicines' => $medicines
        ]);
    }

    public function create(Request $request) 
    {
        return view('admin.medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:50|unique:medicines',
            'price'     => 'required|max_digits:10',
            'packaging' => 'required|string|max:25',
        ]);

        Medicine::create([
            'name'      => $request->name,
            'price'     => $request->price,
            'packaging' => $request->packaging,
        ]);

        return redirect()->route('list-medicines');
    }

    public function edit($id) 
    {
        $medicine = Medicine::find($id);

        return view('admin.medicines.edit', [
            'medicine' => $medicine
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:50|unique:medicines,name,' . $id,
            'price'     => 'required|max_digits:10',
            'packaging' => 'required|string|max:25',
        ]);

        Medicine::where('id', $id)->update([
            'name'      => $request->name,
            'price'     => $request->price,
            'packaging' => $request->packaging,
        ]);

        return redirect()->route('list-medicines');
    }

    public function destroy($id) 
    {
        $sumDetailCheck = DetailCheck::where('medicine_id', '=', $id)->count();

        if ($sumDetailCheck <= 0) {
            Medicine::destroy($id);
        } else {
            Session::flash('error', 'Data obat masih terpakai di detail periksa');
        }

        return redirect()->route('list-medicines');
    }
}
