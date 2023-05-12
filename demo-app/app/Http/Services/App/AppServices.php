<?php

namespace App\Http\Services\App;

use App\Models\App;
use Illuminate\Support\Str;
use Session;


class AppServices
{

    public function store($request)
    {

        try
        {
            $app = new App;
            $app->name = $request->input('name');
            $app->status = $request->input('status');
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str::random(4)."_".$name;

            while(file_exists("upload/logo/".$image))
            {
                $image = str::random(4)."_".$name;
            }

            $file->move("upload/logo/",$image);
            $app->image = $image;
            $app->save();

            session()->flash('success' ,'tạo app thành công');

        }
        catch(\exception $err)
        {
            session()->flash('error' ,'thêm lỗi');
        }
    }

    public function update($request , $app)
    {

        try
        {
            $app->name = $request->input('name');
            $app->status = $request->input('status');
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $image = str::random(4)."_".$name;

                while(file_exists("upload/logo/".$image))
                {
                    $image = str::random(4)."_".$name;
                }

                $file->move("upload/logo/",$image);
                unlink("upload/logo/".$app->image);
                $app->image = $image;
            }

            $app->save();

            session()->flash('success' ,'cập nhật thành công');


        }
        catch(\exception $err)
        {
            session()->flash('error' ,'cập nhật lỗi');
        }

    }



}
?>
