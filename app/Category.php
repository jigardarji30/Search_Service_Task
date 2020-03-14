<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'category_name', 'service_name', 'description', 'activation_start_date', 'activation_end_date'
    ];

    /**
     * get service details from category table with join sub category table
     * 
     * @param
     * @return
     */
    public function getServiceDetails()
    {
        return Category::leftjoin('sub_categories', 'category_id', '=', 'categories.id')
            ->select('categories.*', 'sub_categories.sub_category_name', 'sub_categories.category_id')
            ->paginate(10);
    }

    /**
     * get service details for filter
     * 
     * @param
     * @return
     */
    public function getServiceDetailsForFilter()
    {
        return Category::leftjoin('sub_categories', 'category_id', '=', 'categories.id')
            ->select('categories.*', 'sub_categories.sub_category_name', 'sub_categories.category_id');
    }

    /**
     * store category data into category table
     * 
     * @param
     * @return
     */
    public function storeCategory(array $data)
    {
        $category =  new Category();
        $category->category_name = $data['category_name'];
        $category->service_name = $data['service_name'];
        $category->description = $data['description'];
        $category->activation_start_date = $data['activation_start_date'];
        $category->activation_end_date = $data['activation_end_date'];
        $stored = $category->save();
        return $stored;
    }

    /**
     * get data with filter
     * @param
     * @return
     */
    public function filterService($filterOption)
    {
        return  Category::leftjoin('sub_categories', 'category_id', '=', 'categories.id')
            ->select('categories.*', 'sub_categories.sub_category_name', 'sub_categories.category_id')
            ->Where(function ($query) use ($filterOption) {
                foreach ($filterOption as $key => $value) {
                    if ($key == 'category_name') {
                        if ($value != "") {
                            $query->where('categories.' . $key, 'LIKE', '%' . $value . '%');
                        }
                    } else if ($key == 'sub_category_name') {
                        if ($value != "") {
                            $query->where('sub_categories.' . $key, 'LIKE', '%' . $value . '%');
                        }
                    } else if ($key != 'activation_start_date' && $key != 'activation_end_date') {
                        if ($value != "") {
                            $query->where('categories.' . $key, 'LIKE', '%' . $value . '%');
                        }
                    }
                }
            });
    }
}
