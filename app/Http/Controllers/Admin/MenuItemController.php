<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
class MenuItemController extends Controller
{
    public function index(){return view('admin.items.index',['items'=>MenuItem::with('category.branch')->orderBy('sort_order')->get()]);}
    public function create(){return view('admin.items.form',['item'=>new MenuItem,'categories'=>Category::with('branch')->get(),'branches'=>Branch::where('is_active',true)->get()]);}
    public function store(Request $r){$data=$this->data($r);$branches=$data['branches']??[];unset($data['branches']);$item=MenuItem::create($data);$this->sync($item,$branches);return redirect()->route('admin.items.index')->with('status','Menu item created.');}
    public function edit(MenuItem $item){return view('admin.items.form',['item'=>$item,'categories'=>Category::with('branch')->get(),'branches'=>Branch::where('is_active',true)->get()]);}
    public function update(Request $r,MenuItem $item){$data=$this->data($r);$branches=$data['branches']??[];unset($data['branches']);$item->update($data);$this->sync($item,$branches);return redirect()->route('admin.items.index')->with('status','Menu item updated.');}
    public function destroy(MenuItem $item){$item->delete();return back()->with('status','Menu item deleted.');}
    private function data(Request $r): array{return $r->validate(['category_id'=>'required|exists:categories,id','name_en'=>'required|string|max:160','name_ar'=>'required|string|max:160','description_en'=>'nullable|string','description_ar'=>'nullable|string','ingredients_en'=>'nullable|string','ingredients_ar'=>'nullable|string','price'=>'required|numeric|min:0','is_available'=>'nullable|boolean','is_featured'=>'nullable|boolean','sort_order'=>'nullable|integer|min:0','branches'=>'nullable|array','branches.*'=>'exists:branches,id']);}
    private function sync(MenuItem $item,array $branches): void {$sync=[];foreach($branches as $id){$sync[$id]=['is_available'=>true];}$item->branches()->sync($sync);}
}
