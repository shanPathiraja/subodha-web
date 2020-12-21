<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    /**
     * Public image upload directory.
     *
     * @var string
     */
    protected $uploads = 'images';

    /**
     * Store a new user avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ImageRequest $request, ?int $user = null)
    {
        /*
        $data = [
            'image' => Storage::disk('s3')->url(
                $request->file('image')->store($this->uploads, 's3')
            ),
        ];
        */
        $data = [
            'image' => Storage::disk('public')->url(
                $request->file('image')->store($this->uploads, 'public')
            ),
        ];

        if (!is_null($user)) {
            User::find($user)->update(['photo' => $data['image']]);
        }

        return response($data, 200);
    }
}
