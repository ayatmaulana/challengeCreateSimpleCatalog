<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public const DOLLAR_TODAY = 13563;

    protected $model;

    public function __construct(Product $model)
    {
        $this->model                = $model;
    }

    public function enhanceDollarField( $data )
    {
        // if ( !$data instanceof Illuminate\Database\Eloquent\Collection)
        //     return false;

        $currentDollars             = self::DOLLAR_TODAY;
        return $data->map( function( $item ) use ( $currentDollars ) {
            $item->price_in_dollar  = number_format( (float) $item->price / $currentDollars, 2, ",", "."); 
            return $item;
        } );
    }

    public function index()
    {
        $data['products']           = $this->enhanceDollarField( $this->model->get() );
        
        return view('web.index', compact('data'));
    }

    public function showByCategory( $id )
    {
        $data['products']           = $this->enhanceDollarField( $this->model->where('category_id', $id)->get() );
        
        return view('web.index', compact('data'));
    }

    public function show( $id )
    {
        $data['is_detail_page']     = true;
        $data['products']           = $this->enhanceDollarField( $this->model->where('id', $id)->get() );

        return view('web.index', compact('data'));
    }
}
