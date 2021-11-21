<?php

namespace App\Services;


use App\Http\Requests\Admin\UpdateBannerRequest;
use App\Http\Requests\Profile\SaveCongratulationRequest;
use App\Http\Requests\SaveReviewRequest;
use App\Models\Banner;
use App\Models\Logo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageService {
    const UPLOAD_PATH = 'images/upload_images/';
    const RESIZE_PATH = 'images/resize_images/';

    /**
     * @param SaveCongratulationRequest|SaveReviewRequest|Request $request
     * @param string $path
     *
     * @return array
     */
    public static function uploadImage($request, $path = 'reviews'){
        $file = $request->file('img');
        $originalName = $file->getClientOriginalName();
        $originalName = str_replace(' ', '', $originalName);
        $fileName = time().'_'.$originalName;
        Storage::disk('public')->putFileAs(self::UPLOAD_PATH . $path . DIRECTORY_SEPARATOR, $file, $fileName);
        Storage::disk('public')->makeDirectory(self::RESIZE_PATH . $path . DIRECTORY_SEPARATOR);
        Image::make($file->getRealPath())
            ->resize(150, 150, function($img){
                $img->aspectRatio();
            })->resizeCanvas(150, 150, 'center', false, '#f2f2f2')
            ->save(storage_path('app/public/' . self::RESIZE_PATH . $path . DIRECTORY_SEPARATOR . $fileName));

        return [
            'src' => self::UPLOAD_PATH . $path . DIRECTORY_SEPARATOR . $fileName,
            'original_name' => $originalName,
            'name' => $fileName
        ];
    }

    /**
     * @param SaveCongratulationRequest|SaveReviewRequest|Request $request
     * @param $item
     *
     * @return array
     */
    public static function updateImage($request, $item){
        $imageInfo = self::uploadImage($request);
        if($item->image){
            self::deleteImage($item);
        }

        return $imageInfo;
    }

    /**
     * @param string $path
     * @param Model $item
     */
    public static function deleteImage(Model $item, string $path = 'reviews')
    {

        $filePath = self::UPLOAD_PATH . $path . DIRECTORY_SEPARATOR . optional($item->image)->name;
        $is_exist = Storage::disk('public')->exists($filePath);
        if($is_exist && $item->image){
            Storage::disk('public')->delete($filePath);
            $resizeFilePath = self::RESIZE_PATH . $path . DIRECTORY_SEPARATOR . optional($item->image)->name;
            if(Storage::disk('public')->delete($resizeFilePath)){
                Storage::disk('public')->delete($resizeFilePath);
            }
            $item->image->delete();
        }
    }

    public static function uploadBanner($request){
        $file = $request->file('img');
        $originalName = $file->getClientOriginalName();
        $originalName = str_replace(' ', '', $originalName);
        $fileName = time().'_'.$originalName;
        Storage::disk('public')->putFileAs('images/default_images/banners/', $file, $fileName);
//        Storage::disk('public')->makeDirectory('images/resize_images/reviews/');
//        Image::make($file->getRealPath())
//            ->resize(150, 150, function($img){
//                $img->aspectRatio();
//            })->resizeCanvas(150, 150)
//            ->save(storage_path('app/public/images/resize_images/reviews/' . $fileName));

        return [
            'src' => 'images/default_images/banners/' . $fileName,
            'original_name' => $originalName,
            'name' => $fileName
        ];
    }

    public static function updateBanner(UpdateBannerRequest $request, Banner $banner){
        $imageInfo = self::uploadBanner($request);
        if($banner->src){
            $filePath = 'images/default_images/banners/' . $banner->name;
            $is_exist = Storage::disk('public')->exists($filePath);
            if($is_exist){
                Storage::disk('public')->delete($filePath);
//                $resizeFilePath = 'images/resize_images/reviews/' . $review->image->name;
//                if(Storage::disk('public')->delete($resizeFilePath)){
//                    Storage::disk('public')->delete($resizeFilePath);
//                }
            }
        }

        return $imageInfo;
    }

    public static function uploadLogo($request){
        $file = $request->file('img');
        $originalName = $file->getClientOriginalName();
        $originalName = str_replace(' ', '', $originalName);
        $fileName = time().'_'.$originalName;
        Storage::disk('public')->putFileAs('images/default_images/logos/', $file, $fileName);
//        Storage::disk('public')->makeDirectory('images/resize_images/reviews/');
//        Image::make($file->getRealPath())
//            ->resize(150, 150, function($img){
//                $img->aspectRatio();
//            })->resizeCanvas(150, 150)
//            ->save(storage_path('app/public/images/resize_images/reviews/' . $fileName));

        return [
            'src' => 'images/default_images/logos/' . $fileName,
//            'original_name' => $originalName,
            'name' => $fileName
        ];
    }

    public static function updateLogo(Request $request, Logo $logo){
        $imageInfo = self::uploadLogo($request);
        if($logo->src){
            $filePath = 'images/default_images/logos/' . $logo->name;
            $is_exist = Storage::disk('public')->exists($filePath);
            if($is_exist){
                Storage::disk('public')->delete($filePath);
//                $resizeFilePath = 'images/resize_images/reviews/' . $review->image->name;
//                if(Storage::disk('public')->delete($resizeFilePath)){
//                    Storage::disk('public')->delete($resizeFilePath);
//                }
            }
        }

        return $imageInfo;
    }

    public static function deleteLogo(Logo $logo){
        if($logo->src){
            $filePath = 'images/default_images/logos/' . $logo->name;
            $is_exist = Storage::disk('public')->exists($filePath);
            if($is_exist){
                Storage::disk('public')->delete($filePath);
            }
        }
    }
}
