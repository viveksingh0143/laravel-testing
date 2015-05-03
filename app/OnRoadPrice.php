<?php namespace App;

use App\Repositories\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;

class OnRoadPrice extends Model {

    use CommonModelMethods;
    protected $relation_searchable = array(
        'bname' => 'vehicles' ,
        'model' => 'vehicles',
        'variant' => 'vehicles'
    );
    protected $searchable = array('id', 'brand', 'model', 'variant');
    protected $ignore_regex = array('id', 'status');

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'on_road_prices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['vehicle_id','type','state','ex_show_room_price','registration_charge','insurance_charge','warehouse_charge','extended_warranty_charge','body_care_charge','essential_kit_charge'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = array(
        'ex_show_room_price'        => 'integer',
        'registration_charge'       => 'integer',
        'insurance_charge'          => 'integer',
        'warehouse_charge'          => 'integer',
        'extended_warranty_charge'  => 'integer',
        'body_care_charge'          => 'integer',
        'essential_kit_charge'      => 'integer',
    );

    /**
     * Get the vehicle associated with the given used vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function getPrePackageRoadPriceAttribute()
    {
        $sum = 0;
        $sum += isset($this->ex_show_room_price)? $this->ex_show_room_price : 0;
        $sum += isset($this->registration_charge)? $this->registration_charge : 0;
        $sum += isset($this->insurance_charge)? $this->insurance_charge : 0;
        $sum += isset($this->warehouse_charge)? $this->warehouse_charge : 0;
        $sum += isset($this->extended_warranty_charge)? $this->extended_warranty_charge : 0;
        return $sum;
    }

    public function getPostPackageRoadPriceAttribute()
    {
        $sum = $this->prePackageRoadPrice;
        $sum += isset($this->body_care_charge)? $this->body_care_charge : 0;
        $sum += isset($this->essential_kit_charge)? $this->essential_kit_charge : 0;
        return $sum;
    }
}
