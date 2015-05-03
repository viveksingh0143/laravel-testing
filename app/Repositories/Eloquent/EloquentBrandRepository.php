<?php

namespace App\Repositories\Eloquent;

use App\Brand;
use App\Repositories\BaseRepository;
use App\Repositories\BrandRepository;
use Validator;

class EloquentBrandRepository extends BaseRepository implements BrandRepository {

    protected $model;

    function __construct(Brand $model) {
        $this->model = $model;
    }

    public function attachLogo($brand, $logo) {
        if (isset($logo) && $logo->isValid()) {
            $basePath = 'uploads/';
            $destinationPath = 'brands'; // upload path
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $fileName = 'brand-logo-' . str_pad($brand->id, 10, '0', STR_PAD_LEFT) . '.' . $extension; // renameing image
            $logo->move($basePath . $destinationPath, $fileName); // uploading file to given path

            $brand->logo = "$destinationPath/$fileName";
            $brand->save();
        }
        return $brand;
    }


}