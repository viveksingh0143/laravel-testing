<?php

namespace App\Repositories\Eloquent;

use App\Brand;
use App\Dealer;
use App\Inventory;
use App\Repositories\BaseRepository;
use App\Repositories\BrandRepository;
use App\Repositories\DealerRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\UserRepository;
use Validator;

class EloquentInventoryRepository extends BaseRepository implements InventoryRepository {

    protected $model;

    function __construct(Inventory $model) {
        $this->model = $model;
    }

    public function create($columns, $user = null)
    {
        if(isset($user)) {
            unset($columns['user_id']);
            $columns['user_id'] = $user->id;
        }
        return parent::create($columns);
    }

    /**
     * Attach galary pictures to resources
     *
     * @param $resource
     * @param $pictures
     * @return mixed
     */
    public function attachPictures($inventory, $pictures)
    {
        $counter = $inventory->pictures()?$inventory->pictures()->count():0;
        if(is_array($pictures)) {
            foreach($pictures as $picture) {
                if (isset($picture) && $picture->isValid()) {
                    $basePath = 'uploads/';
                    $destinationPath = 'vehicle'; // upload path
                    $extension = $picture->getClientOriginalExtension(); // getting image extension
                    $fileName = 'IGP-'. $inventory->id . '-' . milliseconds() . (++$counter) . '.' . $extension;
                    $picture->move($basePath . $destinationPath, $fileName); // uploading file to given path

                    $pictureEntity = new Picture();
                    $pictureEntity->path = "$destinationPath/$fileName";
                    $pictureEntity->caption = $inventory->registration;
                    $inventory->pictures()->save($pictureEntity);
                }
            }
        }
        return $inventory;
    }
}