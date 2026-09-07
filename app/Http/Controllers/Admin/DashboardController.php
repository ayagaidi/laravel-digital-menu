<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Category;
use App\Models\MenuItem;
class DashboardController extends Controller
{ public function __invoke(){return view('admin.dashboard',['branches'=>Branch::count(),'categories'=>Category::count(),'items'=>MenuItem::count()]);} }
