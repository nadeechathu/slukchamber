<?php

namespace App\Services\Admin\Services;

//models
use App\Models\ServiceImage;

//interfaces
use App\Interfaces\Admin\Services\ServiceImageInterface;

class ServicesImageService implements ServiceImageInterface
{

    /**
     * Store a newly created service image in storage.
     */
    public function create($serviceId, $bannerImage)
    {

        //check whether user upload service image, if yes save banner_image
        $savedServiceImage = null;

        if ($bannerImage != null) {

            $imageName = 'image_' . time() . '.' . $bannerImage->extension();

            $bannerImage->move(public_path('images/uploads/services/images/'), $imageName);
            $banner_image = 'images/uploads/services/images/' . $imageName;

            $serviceImage = new ServiceImage();

            $serviceImage->service_id = $serviceId;
            $serviceImage->banner_image = $banner_image;
            $serviceImage->type = 0;
            $serviceImage->status = 1;

            $savedServiceImage = ServiceImage::create($serviceImage->toArray());
        }

        return $savedServiceImage;
    }

    /**
     * Update service image in storage.
     */
    public function update($serviceId, $bannerImage)
    {

        //check whether user upload service image, if yes save banner_image
        $savedServiceImage = null;

        if ($bannerImage != null) {
            $imageName = 'image_' . time() . '.' . $bannerImage->extension();
            $bannerImage->move(public_path('images/uploads/services/images/'), $imageName);
            $banner_image = 'images/uploads/services/images/' . $imageName;
            // $serviceImage = ServiceImage::where('service_id', $serviceId)->get()->first();
            // if ($serviceImage == null) {
            //     //create a new one if the post image does not exists
            //     $serviceImage = new ServiceImage();
            // }
            $data = array(
                'service_id' =>$serviceId,
                'banner_image' => $banner_image,
                'type' =>0,
                'status' =>1,
            );
            ServiceImage::updateOrCreate(['service_id' => $serviceId], $data);
            // $serviceImage->service_id= $serviceId;
            // $serviceImage->banner_image= $banner_image;
            // $serviceImage->type= 0;
            // $serviceImage->status= 1;

            // $$serviceImage->save();
        }

        return $savedServiceImage;
    }
}
