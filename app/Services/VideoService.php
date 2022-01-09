<?php

namespace App\Services;


use App\Http\Requests\Profile\SaveCongratulationRequest;
use App\Http\Requests\SaveReviewRequest;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoService {
    /**
     * @param SaveCongratulationRequest|SaveReviewRequest|Request $request
     * @param string $path
     *
     * @return array
     */
    public static function uploadVideo($request, $path = 'reviews'){
        $file = $request->file('video');
        $originalName = $file->getClientOriginalName();
        $originalName = str_replace(' ', '', $originalName);
        $fileName = time().'_'.$originalName;
        Storage::disk('public')->putFileAs('videos/upload_videos/' . $path . DIRECTORY_SEPARATOR, $file, $fileName);
//        Storage::disk('public')->makeDirectory('images/resize_images/reviews/');
//        Image::make($file->getRealPath())
//            ->resize(150, 150, function($img){
//                $img->aspectRatio();
//            })->resizeCanvas(150, 150)
//            ->save(storage_path('app/public/images/resize_images/reviews/' . $fileName));

        return [
            'src' => 'videos/upload_videos/' . $path . DIRECTORY_SEPARATOR . $fileName,
            'original_name' => $originalName,
            'name' => $fileName
        ];
    }

    /**
     * @param SaveCongratulationRequest|SaveReviewRequest|Request $request
     * @param Model $review
     * @param string $path
     *
     * @return array
     */
    public static function updateVideo($request, Model $review, string $path = 'reviews'){
        $videoInfo = self::uploadVideo($request, $path);
        if($review->video){
            self::deleteVideo($review);
        }

        return $videoInfo;
    }

    /**
     * @param string $path
     * @param Model $review
     */
    public static function deleteVideo(Model $item, string $path = 'reviews'){
        $filePath = 'videos/upload_videos/' . $path . DIRECTORY_SEPARATOR . optional($item->video)->name;
        $is_exist = Storage::disk('public')->exists($filePath);
        if($is_exist && $item->video){
            Storage::disk('public')->delete($filePath);
            $item->video->delete();
        }
    }
}
