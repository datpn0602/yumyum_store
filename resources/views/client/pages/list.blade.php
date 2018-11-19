@extends('client.master')   
@section('content')   
<!-- Breadcrumbs -->
<div class="breadcrumbs bounceInUp animated">
    <div class="container">
        <div class="row">
          <div class="col-xs-12">
              <ul>
                  <li class="home"> <a title="Go to Home Page" href="index.html">{{ trans('messeage.home') }}</a><span>» </span></li>
                  <li class=""> <a title="Go to Home Page" href="grid.html">{{ trans('messeage.pizza') }}</a><span>» </span></li>
              </ul>
          </div>
      </div>
  </div>
</div>
<!-- Breadcrumbs End --> 
<!-- Main Container -->
<section class="main-container col2-left-layout bounceInUp animated">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Tops & Tees</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-main col-sm-9 col-sm-push-3">
                <article class="col-main">
                    <div class="category-description std">
                        <div class="slider-items-products">
                            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
                                    <!-- Item -->
                                    <div class="item"> 
                                        <a><img alt="" src="client/img/header-drink.jpg"></a>
                                    </div>
                                    <div class="item"> 
                                        <a><img alt="" src="client/img/header-pizza.jpg"></a>
                                    </div>
                                    <div class="item"> 
                                        <a><img alt="" src="client/img/header-starter.jpg"></a>
                                    </div>
                                    <!-- End Item --> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="toolbar">
                        <div class="sorter">
                            <div class="view-mode"> 
                                <a href="{{ route('food-type',$type_name->id ) }}" title="Grid" class="button button-grid">&nbsp;</a>
                                <span title="List" class="button button-active button-list">&nbsp;</span>    
                            </div>
                        </div>
                        <div class="pager">
                            <div id="limiter">
                                <label>View: </label>
                                <ul>
                                    <li><a href="#">15<span class="right-arrow"></span></a>
                                        <ul>
                                            <li><a href="#">20</a></li>
                                            <li><a href="#">30</a></li>
                                            <li><a href="#">35</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @if(count($type_product) != 0)
                    <div class="category-products">
                        <ol class="products-list" id="products-list">
                            @foreach($type_product as $product)
                            <li class="item first">
                                <div class="product-image"> 
                                    <a href="{{ route('food-detail', $product->id) }}" title="Sample Product">
                                        <img class="small-image" src="/{{ config('image.paths.resource')}}/{{ $product->image}}" alt="Sample Product">
                                    </a> 
                                </div>
                                <div class="product-shop">
                                    <h2 class="product-name">
                                        <a href="{{ route('food-detail', $product->id) }}" title="Sample Product">{{ $product->name }}</a>
                                    </h2>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div class="rating-box">
                                                <div style="width:{{ isset($product->rating) ? $product->rating.'%' : '' }}" class="rating"></div>
                                            </div>
                                        </div>
                                        <p class="rating-links"> 
                                            <a href="#">{{ trans('messeage.reviews') }}(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> 
                                        </p>
                                    </div>
                                    <div class="desc std">
                                        {{$product->description}}
                                            <a class="link-learn" title="" href="{{ route('food-detail', $product->id) }}"><b><i>Learn More</i></b></a>
                                        </p>
                                    </div>
                                    <div class="price-box">
                                        @if($product->promotion_id != NULL) 
                                        <p class="old-price">
                                            <span class="price-label"></span>
                                            <span id="old-price-212" class="price">{{ number_format($product->price,0,",",".") }} VND </span>
                                        </p>
                                        <p class="special-price">
                                            <span class="price-label"></span>
                                            <span id="product-price-212" class="price">{{ number_format(($product->price) - ($product->price)*($product->promotion->discount)/100,0,",",".") }}VND </span>
                                        </p>
                                        @else 
                                        <p class="special-price"><span class="price-label">Regular Price:</span> <span class="price">{{ number_format($product->price,0,",",".") }} VND </span> </p>
                                        @endif
                                    </div>
                                    <div class="actions">
                                        <a href="{{ route('order-food',[$product->id, $product->name]) }}"><button class="button btn-cart ajx-cart" title="Add to Cart" type="button"><span>{{ trans('messeage.addCart') }}</span></button></a>
                                        <span class="add-to-links"> 
                                            <a title="Add to Compare" class="button link-compare" href="compare.html"><span>{{ trans('messeage.compare') }}</span></a>
                                        </span> 
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                        <div class="pages">
                            <div class="pager pagination">
                                {!! $type_product->links() !!}
                            </div>
                        </div>
                    </div>
                    @else
                    <hr>    
                    <h3 style="margin-bottom: 300px">Chưa có sản phẩm nào.</h3>
                    @endif
                </article>
                <!--  ///*///======    End article  ========= //*/// --> 
            </div>
            <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <aside class="col-left sidebar">
                    <div class="side-nav-categories">
                        <div class="block-title">{{ trans('messeage.category') }}</div>
                        <!--block-title--> 
                        <!-- BEGIN BOX-CATEGORY -->
                        <div class="box-content box-category">
                            <ul>
                                @foreach($types as $type)
                                <li><a class="active" href="{{ route('food-type', $type->id) }}">{{ $type->name }}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--box-content box-category--> 
                    </div>     
                </aside>
            </div>
        </div>
    </div>

                        <!--box-content box-category--> 
                    </div>     
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
