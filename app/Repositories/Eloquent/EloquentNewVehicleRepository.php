<?php

namespace App\Repositories\Eloquent;

use App\Brand;
use App\NewVehicle;
use App\Picture;
use App\Repositories\BaseRepository;
use App\Repositories\BrandRepository;
use App\Repositories\NewVehicleRepository;
use App\Repositories\VehicleRepository;
use App\Vehicle;
use Validator;

class EloquentNewVehicleRepository extends BaseRepository implements NewVehicleRepository {

    protected $model;

    /**
     * @param Vehicle $model
     */
    function __construct(NewVehicle $model) {
        $this->model = $model;
    }

    public function attachThumbnail($vehicle, $thumbnail) {
        if (isset($thumbnail) && $thumbnail->isValid()) {
            $basePath = 'uploads/';
            $destinationPath = 'vehicles'; // upload path
            $extension = $thumbnail->getClientOriginalExtension(); // getting image extension
            $fileName = 'vehicle-thumbnail-' . str_pad($vehicle->id, 10, '0', STR_PAD_LEFT) . '.' . $extension; // renameing image
            $thumbnail->move($basePath . $destinationPath, $fileName); // uploading file to given path

            $vehicle->thumbnail = "$destinationPath/$fileName";
            $vehicle->save();
        }
        return $vehicle;
    }

    /**
     * Attach galary pictures to resources
     *
     * @param $resource
     * @param $pictures
     * @return mixed
     */
    public function attachPictures($vehicle, $pictures)
    {
        $counter = $vehicle->pictures()?$vehicle->pictures()->count():0;
        if(is_array($pictures)) {
            foreach($pictures as $picture) {
                if (isset($picture) && $picture->isValid()) {
                    $basePath = 'uploads/';
                    $destinationPath = 'vehicle'; // upload path
                    $extension = $picture->getClientOriginalExtension(); // getting image extension
                    $fileName = 'VGP-'. $vehicle->id . '-' . milliseconds() . (++$counter) . '.' . $extension;
                    $picture->move($basePath . $destinationPath, $fileName); // uploading file to given path

                    $pictureEntity = new Picture();
                    $pictureEntity->path = "$destinationPath/$fileName";
                    $pictureEntity->caption = $vehicle->model;
                    $vehicle->pictures()->save($pictureEntity);
                }
            }
        }
        return $vehicle;
    }


}