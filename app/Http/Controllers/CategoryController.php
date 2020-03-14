<?php

namespace App\Http\Controllers;

use Exception;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $category;
    public $subCategory;

    public function __construct(Category $category, SubCategory $subCategory)
    {
        $this->category = $category;
        $this->subCategory = $subCategory;
    }


    /**
     * listing of category with subcategory
     * @param
     * @return
     */
    public function index()
    {
        $categories = $this->category->getServiceDetails();
        return view('categoryList', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * add category form 
     * @param
     * @return
     */
    public function addCategory()
    {
        return view('addCategory');
    }

    /**
     * add sub category form 
     * @param
     * @return
     */
    public function addSubCategory()
    {
        return view('addSubCategory');
    }


    /**
     * store category data
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function storeCategory(Request $request)
    {
        try {
            $this->category->storeCategory($request->all());
            return redirect('/');
        } catch (Exception $e) {
            \Log::error($e);
        }
    }

    /**
     *  store sub category data
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function storeSubCategory(Request $request)
    {
        try {
            $this->subCategory->storeSubCategory($request->all());
            return redirect('/');
        } catch (Exception $e) {
            \Log::error($e);
        }
    }

    /**
     * Get Ajax Request and return Data
     * @param $id
     * @return json data
     */
    public function getSubCategoryBasedOnCategory($id)
    {
        return $this->subCategory->getSubCategoryData($id);
    }


    /*
    * filter data
    *
    * @param  \Illuminate\Http\Request $request
    * @return 
    * */
    public function filterService(Request $request)
    {
        $serviceData = $this->category->filterService($request->all());
        if ($request->category_name == "" && $request->sub_category_name == "" && $request->activation_start_date == "" && $request->activation_end_date == "") {
            $serviceData = $this->getAllServiceData();
        }
        $categories = $serviceData->paginate(10);
        return view('categoryList', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /*
    * Get all service data
    *
    * @return mixed
    */
    public function getAllServiceData()
    {
        return $this->category->getServiceDetailsForFilter();
    }
}
