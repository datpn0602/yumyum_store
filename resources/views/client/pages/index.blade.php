@extends('client.master')   
@section('content')  
<div id="magik-slideshow" class="magik-slideshow">
    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
            <ul>
                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='client/images/slider-1.jpg'>
                    <img src='client/images/slider-1.jpg' alt="slide-img" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' />
                </li>
                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='client/images/slider-2a.jpg'>
                    <img src='client/images/slider-2a.jpg' alt="slide" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' />
                </li>
                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='client/images/slider-3a.jpg'><img src='client/images/slider-3a.jpg' alt="slide" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' />
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end banner -->
<div class="top-banner-section wow bounceInUp animated">
    <div>
        <div class="row">
            <div class="col-lg-3 col-sm-3 col-xs-6">
                <div class="col add-banner1">
                    <div class="top-b-text"><strong>Designer Shoes</strong> For Women</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-6">
                <div class="col free-shipping"><strong>Free Shipping</strong> on order over $199</div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-6">
                <div class="col add-banner2">
                    <div class="top-b-text"><strong>Luxury Handbags</strong>2015 New Arrive</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-6">
              <div class="col last offer"><strong>New Collection</strong> Lorem ipsum dolor.</div>
          </div>
      </div>
  </div>
</div>
<!-- main container -->
<div class="main-col">
    <div class="container">
        <div class="row">
            <div class="01-grid-view">
                <div class="col-md-12">
                    <div class="std">
                        <div class="home-tabs wow bounceInUp animated">
                            <div class="producttabs">
                                <div id="magik_producttabs1" class="magik-producttabs"> 
                                    <div class="magik-pdt-container"> 
                                      <div class="magik-pdt-nav">
                                        <ul class="pdt-nav">
                                            <li class="item-nav tab-loaded tab-nav-actived" data-type="order" data-catid="" data-orderby="best_sales" data-href="pdt_best_sales">
                                                <span class="title-navi">{{ trans('messeage.pp') }}</span>
                                            </li>
                                            <li class="item-nav" data-type="order" data-catid="" data-orderby="new_arrivals" data-href="pdt_new_arrivals">
                                                <span class="title-navi">{{ trans('messeage.np') }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="magik-pdt-content wide-5">
                                        <div class="pdt-content is-loaded pdt_best_sales tab-content-actived">
                                            <ul class="pdt-list products-grid-home zoomOut play">
                                                @foreach($sale_product as $sale)
                                                <li class="item item-animate wide-first">
                                                    <div class="item-inner">
                                                        <div class="item-img">
                                                            <div class="item-img-info">
                                                                <a class="product-image" title="Sample Product" href="{{ route('food-detail', $sale->id) }}"> 
                                                                    <img alt="Sample Product" src="/{{ config('image.paths.resource')}}/{{ $sale ->image}}">
                                                                </a>
                                                                <div class="sale-label sale-top-left">sale</div>
                                                                <div class="item-box-hover">
                                                                    <div class="box-inner">                                        
                                                                        <div class="actions">
                                                                            <div class="add_cart">
                                                                                <a href="{{ route('order-food',[$sale->id, $sale->name]) }}"><button title="{{ trans('messeage.addCart') }}" class="button btn-cart"></button></a>
                                                                            </div>
                                                                            <div class="product-detail-bnt">
                                                                                <a href="{{ route('food-detail', $sale->id) }}" class="button detail-bnt" title = "{{ trans('messeage.food_detail') }}"><span>{{ trans('messeage.food_detail') }}</span></a>
                                                                            </div> 
                                                                            <span class="add-to-links"> 
                                                                                <a href="compare" class="link-compare add_to_compare" title="{{ trans('messeage.compare') }}"><span>{{ trans('messeage.compare') }}</span></a>
                                                                            </span> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title">
                                                                    <a title="Sample Product" href="{{ route('food-detail', $sale->id) }}">{{ $sale->name }}</a>
                                                                </div>
                                                                <div class="item-content">
                                                                    <div class="rating">
                                                                        <div class="ratings">
                                                                            <div class="rating-box">
                                                                                <div style="width:{{ isset($sale->rating) ? $sale->rating.'%' : '' }}" class="rating"></div>
                                                                            </div>
                                                                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        <div class="price-box"> 
                                                                            <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">{{ number_format($sale->price,0,",",".") }} VND </span> </p>
                                                                            <p class="special-price"><span class="price-label">Special Price</span> <span class="price">{{ number_format(($sale->price) - ($sale->price)*($sale->promotion->discount)/100,0,",",".") }}VND </span> </p> 
                                                                        </div>
                                                                        <div class="price-box">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="pager pages sale_product">
                                                    {!! $sale_product->links() !!}
                                            </div>
                                        </div>
                                        <div class="pdt-content pdt_new_arrivals is-loaded">
                                            <ul class="pdt-list products-grid-home zoomOut play">
                                                @foreach($new_product as $new)
                                                <li class="item item-animate wide-first">
                                                    <div class="item-inner">
                                                        <div class="item-img">
                                                            <div class="item-img-info">
                                                                <a href="{{ route('food-detail', $new->id) }}" title="Sample Product" class="product-image">
                                                                    <img src="/{{ config('image.paths.resource')}}/{{ $new ->image}}" alt="Sample Product">
                                                                </a>
                                                                <div class="new-label new-top-left">New</div>
                                                                <div class="item-box-hover">
                                                                    <div class="box-inner">
                                                                        <div class="actions">
                                                                            <div class="add_cart">
                                                                                <a href="{{ route('order-food',[$new->id, $new->name]) }}"><button title="{{ trans('messeage.addCart') }}" class="button btn-cart"></button></a>
                                                                            </div>
                                                                            <div class="product-detail-bnt"><a href="{{ route('food-detail', $new->id) }}" class="button detail-bnt"><span>Quick View</span></a>
                                                                            </div>
                                                                            <span class="add-to-links"> 
                                                                                <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title">
                                                                    <a href="{{ route('food-detail', $new->id) }}" title="Sample Product">{{ $new->name }}</a>
                                                                </div>
                                                                <div class="item-content">
                                                                    <div class="rating">
                                                                        <div class="ratings">
                                                                            <div class="rating-box">
                                                                                <div class="rating" style="width:{{ isset($new->rating) ? $new->rating.'%' : '' }}"></div>
                                                                            </div>
                                                                            <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        @if($new->promotion_id != NULL) 
                                                                            <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">{{ number_format($new->price,0,",",".") }} VND </span> </p>
                                                                            <p class="special-price"><span class="price-label">Special Price</span> <span class="price">{{ number_format(($new->price) - ($new->price)*($new->promotion->discount)/100,0,",",".") }}VND </span> </p> 
                                                                            @else
                                                                            <p class="special-price"><span class="price-label">Regular Price:</span> <span class="price">{{ number_format($new->price,0,",",".") }} VND </span> </p>
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="featured-pro container wow bounceInUp animated">
    <div class="slider-items-products">
        <div class="new_title center">
            <h2>{{ trans('messeage.fp') }}</h2>
        </div>
        <div id="featured-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                @foreach($featured_product as $product)
                <div class="item">
                    <div class="item-inner">
                        <div class="item-img">
                            <div class="item-img-info"> 
                                <a class="product-image" title="Sample Product" href="{{ route('food-detail', $product->id) }}"> 
                                    <img alt="Sample Product" src="/{{ config('image.paths.resource')}}/{{ $product->image}}"> 
                                </a>
                                @if($product->promotion_id != NULL)
                                    <div class="sale-label sale-top-left">{{ trans('messeage.sale') }}</div>
                                @endif
                                <div class="item-box-hover">
                                    <div class="box-inner">                                        
                                        <div class="actions">
                                            <div class="add_cart">
                                                <a href="{{ route('order-food',[$product->id, $product->name]) }}"><button title="{{ trans('messeage.addCart') }}" class="button btn-cart"></button></a>
                                            </div>
                                            <div class="product-detail-bnt">
                                                <a href="{{ route('food-detail', $product->id) }}" class="button detail-bnt" title = "{{ trans('messeage.food_detail') }}"><span>{{ trans('messeage.food_detail') }}</span></a>
                                            </div> 
                                            <span class="add-to-links"> 
                                                <a href="compare" class="link-compare add_to_compare" title="{{ trans('messeage.compare') }}"><span>{{ trans('messeage.compare') }}</span></a>
                                            </span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"> <a title="Sample Product" href="{{ route('food-detail', $product->id) }}">{{ $product->name }}</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div style="width:{{ isset($product->rating) ? $product->rating.'%' : '' }}" class="rating"></div>
                                                </div>
                                                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box">
                                                @if($product->promotion_id != NULL) 
                                                <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">{{ number_format($product->price,0,",",".") }} VND </span> </p>
                                                <p class="special-price"><span class="price-label">Special Price</span> <span class="price">{{ number_format(($product->price) - ($product->price)*($product->promotion->discount)/100,0,",",".") }}VND </span> </p> 
                                                @else
                                                <p class="special-price"><span class="price-label">Regular Price:</span> <span class="price">{{ number_format($product->price,0,",",".") }} VND </span> </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<div class="offer-slider wow animated parallax parallax-2">
    <div class="container">
        <ul class="bxslider">
            <li>
                <h2>New Product</h2>
                <h1>Sale up to 30% </h1>
                <p><i><u>11/10/2018-21/10/2018</u></i> </p>
                <li>
                    <h2>Hello hotness!</h2>
                    <h1>Summer collection</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Integer sed arcu massa. </p>
                    <a class="shop-now" href="#">View More</a> 
                </li>
                <li>
                    <h2>New launch</h2>
                    <h1>Designer dresses on sale</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Integer sed arcu massa. </p>
                    <a class="shop-now" href="#">Learn More</a> 
                </li>
            </li>
        </ul>
    </div>
</div>
{{-- <section class="featured-pro container wow bounceInUp animated">
    <div class="slider-items-products">
        <div class="new_title center">
            <h2>PIZZA</h2>
        </div>
        <div id="featured-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                @foreach($pizza_product as $pizza)
                <div class="item">
                    <div class="item-inner">
                        <div class="item-img">
                            <div class="item-img-info"> 
                                <a class="product-image" title="Sample Product" href="product_detail.html"> 
                                    <img alt="Sample Product" src="/{{ config('image.paths.resource')}}/{{ $pizza->image}}"> 
                                </a>
                                @if($pizza->promotion_id != NULL)
                                    <div class="sale-label sale-top-left">{{ trans('messeage.sale') }}</div>
                                @endif
                                <div class="item-box-hover">
                                    <div class="box-inner">                                        
                                        <div class="actions">
                                            <div class="add_cart">
                                                {!! Form::button('', ['title' => trans('messeage.addCart'), 'class' => 'button btn-cart']) !!}
                                            </div>
                                            <div class="product-detail-bnt">
                                                <a href="quick_view.html" class="button detail-bnt" title = "{{ trans('messeage.food_detail') }}"><span>{{ trans('messeage.food_detail') }}</span></a>
                                            </div> 
                                            <span class="add-to-links"> 
                                                <a href="compare" class="link-compare add_to_compare" title="{{ trans('messeage.compare') }}"><span>{{ trans('messeage.compare') }}</span></a>
                                            </span> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"> <a title="Sample Product" href="product_detail.html">{{ $pizza->name }}</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div style="width:80%" class="rating"></div>
                                                </div>
                                                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box">
                                                @if($pizza->promotion_id != NULL) 
                                                <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">{{ $pizza->price }} VND </span> </p>
                                                <p class="special-price"><span class="price-label">Special Price</span> <span class="price">{{ ($pizza->price) - ($pizza->price)*($pizza->promotion->discount)/100 }}VND </span> </p> 
                                                @else
                                                <p class="special-price"><span class="price-label">Regular Price:</span> <span class="price">{{ $pizza->price }} VND </span> </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
   
</section> --}}
<div class="offer-banner-section wow bounceInUp animated animated" style="visibility: visible;">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-3 col-xs-6">
          <div class="col"><img src="img/promo-banner-img1.png" alt="offer banner1"></div>
        </div>
        <div class="col-lg-3 col-sm-3 col-xs-6">
          <div class="col"><img src="img/promo-banner-img2.png" alt="offer banner2"></div>
        </div>
        <div class="col-lg-3 col-sm-3 col-xs-6">
          <div class="col"><img src="img/promo-banner-img3.png" alt="offer banner3"></div>
        </div>
        <div class="col-lg-3 col-sm-3 col-xs-6">
          <div class="col last"><img src="img/promo-banner-img4.png" alt="offer banner4"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

