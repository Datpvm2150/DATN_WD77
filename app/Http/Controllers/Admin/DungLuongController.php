<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DungLuong;
use Illuminate\Http\Request;

class DungLuongController extends Controller
{
    public function index()
    {
        $dungluongs = DungLuong::all();
        return view('admins.dungluongs.index', compact('dungluongs'));
    }

    public function create()
    {
        return view('admins.dungluongs.create');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validDungLuong = $request->validate(
                [
                    'ten_dung_luong' => 'required|string|max:255|unique:dung_luongs,ten_dung_luong'
                ],
                [
                    'ten_dung_luong.required' => 'tên dung lượng không được để trống',
                    'ten_dung_luong.string' => 'tên dung lượng phải là một chuỗi!',
                    'ten_dung_luong.max' => "Tên dung lượng không quá 255 ký tự!",
                    'ten_dung_luong.unique' => 'Tên dung lượng đã tồn tại!'
                ]
            );
            $params = $request->except('_token');
            DungLuong::create($params);
            return redirect()->route('admin.dungluongs.index')->with('success', 'Thêm mới dung lượng thành công');
        }
    }

    public function edit(string $id){
        $dungluongs = DungLuong::query()->findOrFail($id);
        return view('admins.dungluongs.update',compact('dungluongs'));
    }

    public function update(Request $request,string $id)  {
        if($request->isMethod("PUT")){
            $validDungLuong = $request->validate([
                'ten_dung_luong' =>[
                    'required',
                    'string',
                    'max:255',
                    'unique:dung_luongs,ten_dung_luong,' .$id,
                ]
                ],
                [
                    'ten_dung_luong.required' => 'Tên dung lượng không được để trống!',
                    'ten_dung_luong.string' => 'Tên dung lượng phải là một chuỗi!',
                    'ten_dung_luong.max' => 'Tên dung lượng không quá 255 ký tự!',
                    'ten_dung_luong.unique' => 'Tên dung lượng đã tồn tại'
                ]);
                $params = $request->except('_token','_method');
                $dungluongs = DungLuong::query()->findOrFail($id);
                $dungluongs->update($params);
                return redirect()->route('admin.dungluongs.index')->with('success','Cập nhật thành công');
        }
    }

    public function onOffDungLuong($id)  {
        $dungluong = DungLuong::find($id);
        if(!$dungluong){
            return redirect()->route('admin.banners.index')->with('error','Dung lượng không tồn tại');
        }
        if($dungluong->trang_thai == true){
            $countDungLuong = $dungluong->bienTheSanPhams()->withTrashed()->get();
            if(count($countDungLuong) > 0){
                return redirect()->back()->with('error','Dung lượng đã có sản phẩm, không thể ngừng hoạt động!');
            }
            $dungluong->trang_thai = false;
            $dungluong->save();
            return redirect()->back()->with('success','Ngừng hoạt động dung lượng');
        } else {
            $dungluong->trang_thai = true;
            $dungluong->save();
            return redirect()->back()->with('success','Hoạt động dung lượng');
        }
    }

    public function destroy(string $id)  {
        $dungluongs = DungLuong::findOrFail($id);
        if(!$dungluongs){
            return redirect()->back()->with('error','Không tìm thấy dung lượng!');
        }
        $countDungLuong = $dungluongs->bienTheSanPhams()->withTrashed()->get();
        if(count($countDungLuong) > 0){
            return redirect()->back()->with('error','Dung lượng đã có sản phẩm, không thể xóa! ');
        }
        $dungluongs->delete();
        return redirect()->route('admin.dungluongs.index')->with('success', 'Xóa kích cỡ dung lượng thành công');
    }
}
