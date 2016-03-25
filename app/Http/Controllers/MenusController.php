<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MenuRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Eloquent\MenuRepository as Menu;

class MenusController extends Controller
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->all();
        return view('admin.menus.index',
            [
                'page_title' => 'show all',
                'menus' => $menus
            ]
        );
    }

    public function create()
    {
        $menus = $this->menu->all(['id', 'parent_id', 'title']);
        return view('admin.menus.create', [
            'page_title' => 'Add menu',
            'menus' => $menus
        ]);
    }

    public function store(MenuRequest $request)
    {
        if (!isset($request->status)) {
            $status = 0;
        } else {
            $status = 1;
        }
        $menus = $this->menu->create(
            [
                'title' => $request->title,
                'url' => $request->url_menu,
                'parent_id' => $request->parent_id,
                'target' => $request->target,
                'status' => $status
            ]
        );
    }

    public function edit($id)
    {
        $list_menus = $this->menu->all(['id', 'title']);
        $edit_menus = $this->menu->find($id);
        return view('admin.menus.edit', [
            'page_title'=>'Edit menu',
            'list_menus'=>$list_menus,
            'edit_menus'=>$edit_menus
        ]);
    }

    public function update(MenuRequest $request, $id)
    {
        if(!isset($request->status)) {
            $status = 0;
        } else {
            $status = $request->status;
        }
        $update = $this->menu->update([
            'title'=>$request->title,
            'url'=>$request->url_menu,
            'parent_id'=>$request->parent_id,
            'target'=>$request->target,
            'status'=>$status
        ],$id);
    }
    public function destroy($id)
    {
        $this->menu->delete($id);
        return redirect()->route('menuindex')->with('status','Menu delete successfully!');
    }
}
