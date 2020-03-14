<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $table = 'sub_categories';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'sub_category_name', 'category_id'
    ];

    /**
     * store sub category into sub category table.
     * @param $data
     * @return $stored 
     */
    public function storeSubCategory(array $data)
    {
        $subcategory =  new SubCategory();
        $subcategory->sub_category_name = $data['sub_category_name'];
        $subcategory->category_id = $data['category_name'];
        $stored = $subcategory->save();
        return $stored;
    }

    /**
     * get sub cat data for dropdown.
     * @param $id
     * @return json $sub_category 
     */
    public function getSubCategoryData($id)
    {
        $sub_category = SubCategory::where("category_id", $id)
            ->select("sub_category_name", "id")->get();
        return json_encode($sub_category);
    }
}
