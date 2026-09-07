<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index(){return view('admin.categories.index',['categories'=>Category::with('branch')->orderBy('sort_order')->get()]);}
    public function create(){return view('admin.categories.form',['category'=>new Category,'branches'=>Branch::where('is_active',true)->get()]);}
    public function store(Request $r){Category::create($this->data($r));return redirect()->route('admin.categories.index')->with('status','Category created.');}
    public function edit(Category $category){return view('admin.categories.form',['category'=>$category,'branches'=>Branch::where('is_active',true)->get()]);}
    public function update(Request $r,Category $category){$category->update($this->data($r));return redirect()->route('admin.categories.index')->with('status','Category updated.');}
    public function destroy(Category $category){$category->delete();return back()->with('status','Category deleted.');}
    private function data(Request $r): array{return $r->validate(['branch_id'=>'required|exists:branches,id','name_en'=>'required|string|max:120','name_ar'=>'required|string|max:120','description_en'=>'nullable|string','description_ar'=>'nullable|string','is_active'=>'nullable|boolean','sort_order'=>'nullable|integer|min:0']);}
}
