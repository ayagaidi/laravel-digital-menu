<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return view('admin.branches.index', ['branches' => Branch::with('restaurant')->orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.branches.form', ['branch' => new Branch]);
    }

    public function store(Request $r)
    {
        $data = $this->validateData($r);
        $data['restaurant_id'] = Restaurant::current()->id;
        Branch::create($data);

        return redirect()->route('admin.branches.index')->with('status', 'Branch created.');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.form', compact('branch'));
    }

    public function update(Request $r, Branch $branch)
    {
        $branch->update($this->validateData($r));

        return redirect()->route('admin.branches.index')->with('status', 'Branch updated.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return back()->with('status', 'Branch deleted.');
    }

    private function validateData(Request $r): array
    {
        return $r->validate(['name_en' => 'required|string|max:120', 'name_ar' => 'required|string|max:120', 'address_en' => 'nullable|string|max:255', 'address_ar' => 'nullable|string|max:255', 'phone' => 'nullable|string|max:50', 'is_active' => 'nullable|boolean', 'sort_order' => 'nullable|integer|min:0']);
    }
}
