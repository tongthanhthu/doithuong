<?php

namespace App\Http\Services\Stamp;
use App\Models\App;
use App\Models\Stamp;
use App\Models\ImageStamp;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StampServices
{

    public function app()
    {

        return App::find(Session('id_app'));

    }

    public function store($request)
    {

        try
        {
            $stamp = new Stamp;
            $stamp->many_time = $request->input('many_time');
            $stamp->stamp_number = $request->input('stamp_number');
            $stamp->app_id = Session('id_app');
            $stamp->save();

            session()->flash('success' ,'tạo stamp thành công');
        }
        catch(\exception $err)
        {
            session()->flash('error' ,'tạo stamp thất bại');
        }

    }

    public function update($requets,$stamp)
    {
        $app = $this->app();
        DB::beginTransaction();
        
        try
        {
            if($app->stamp->stamp_number != $requets->stamp_number)
            {
                ImageStamp::where('stamp_id',$app->Stamp->id)->delete();
            }
            $stamp->stamp_number = $requets->stamp_number;
            $stamp->many_time = $requets->many_time;
            $stamp->save();

            DB::commit();

            session()->flash('success' ,'sửa stamp thành công');

        }
        catch(\exception $err)
        {
            DB::rollBack();
            session()->flash('error' ,'sửa stamp thất bại');
        }

    }


    public function stroreImage($request ,$app)
    {

        $app = $this->app();
        DB::beginTransaction();

        try
        {
            ImageStamp::where('stamp_id',$app->Stamp->id)->delete();
            foreach ($request->image as $key => $value){

                $ImageStamp = new ImageStamp;
                $file = $value['current_image'];
                $file1 = $value['image_change'];
                $name  = $file->getClientOriginalName();
                $name1  = $file1->getClientOriginalName();
                $image = str::random(4)."_".$name;
                $image1 = str::random(4)."_".$name1;

                while(file_exists("upload/stamp/".$image))
                {
                    $image = str::random(4)."_".$name;
                }
                while(file_exists("upload/stamp/".$image1))
                {
                    $image1 = str::random(4)."_".$name1;
                }

                $file->move("upload/stamp/",$image);
                $file1->move("upload/stamp/",$image1);
                $ImageStamp->current_image = $image;
                $ImageStamp->image_change = $image1;
                $ImageStamp->stamp_id = $app->stamp->id;
                $ImageStamp->save();

            }
            DB::commit();

            session()->flash('success' ,'tạo ảnh stamp thành công');

        }
        catch(\exception $err)
        {
            DB::rollBack();
            session()->flash('error' ,'tạo ảnh stamp thất bại');
        }

    }


}
?>
