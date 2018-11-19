@extends('client.master')   
@section('content')     
  <!-- Breadcrumbs -->
<div class="breadcrumbs bounceInUp animated">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home">
                        <a title="Go to Home Page" href="index.html">{{ trans('messeage.home') }}</a>
                        <span>» </span>
                    </li>
                    <li class="">
                        <a title="Go to Home Page" href="grid.html">{{ $product_detail->type->name }}</a>
                        <span>» </span>
                    </li>
                    <li class="category13">
                        <strong>{{ $product_detail->name}}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="row">
                <div class="product-view">
                    <div class="product-essential">
                        <form action="#" method="post" id="product_addtocart_form">
                            <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                            <div class="product-img-box col-sm-5 col-xs-12 bounceInRight animated">
                                <div class="new-label new-top-left"> New </div>
                                <div class="product-image">
                                    <div class="large-image"> 
                                        <a href="/{{ config('image.paths.resource')}}/{{ $product_detail->image}}" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                                            <img alt="Thumbnail" src="/{{ config('image.paths.resource')}}/{{ $product_detail->image}}">
                                        </a> 
                                    </div>
                                    <div class="flexslider flexslider-thumb">
                                        <ul class="previews-list slides">
                                            @foreach($image_detail as $image_detail)
                                                <li>
                                                <a href='{{ $image_detail->image}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '{{ $image_detail->image}}' "><img src="{{ $image_detail->image}}"/></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: more-images --> 
                            </div>
                            <div class="product-shop col-sm-7 col-xs-12 bounceInUp animated">
                                <div class="product-name">
                                    <h1>{{ $product_detail->name}}</h1>
                                </div>
                                <div class="short-description"> 
                                    {!! $product_detail->description !!}
                                </div>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div style="width:{{ $rate.'%' }}" class="rating"></div>
                                    </div>
                                    <p class="rating-links"> <a href="#"><span style="color:red">{{ $rate*5/100 }}</span> | {{ $rating }} Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                                </div>
                                <p class="availability in-stock pull-right"><span>In Stock</span></p>
                                <div class="price-block">
                                    <div class="price-box">
                                        @if($product_detail->promotion_id != NULL) 
                                            <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">{{ number_format($product_detail->price,0,",",".") }} VND </span> </p>
                                            <p class="special-price"><span class="price-label">Special Price</span> <span class="price">{{ number_format(($product_detail->price) - ($product_detail->price)*($product_detail->discount)/100,0,",",".") }}VND </span> </p> 
                                        @else
                                            <p class="special-price"><span class="price-label">Regular Price:</span> <span class="price">{{ number_format($product_detail->price,0,",",".") }} VND </span> </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="add-to-box">
                                    <div class="add-to-cart">
                                        <label for="qty">{{ trans('messeage.quantity') }}:</label>
                                        <div class="pull-left">
                                            <div class="custom pull-left">
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                                <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">

                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                            </div>
                                        </div>
                                        <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button">
                                            <a href="{{ route('order-food',[$product_detail->id, $product_detail->name]) }}"><span><i class="icon-basket"></i>{{ trans('messeage.addCart') }}</span></a>
                                        </button>
                                    </div>
                                </div>
                                <div class="email-addto-box">
                                    <ul class="add-to-links">
                                        <li>
                                            <span class="separator">|</span>
                                            <a class="link-compare" href="compare.html"><span>{{ trans('messeage.compare') }}</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="product-collateral col-sm-12 col-xs-12 bounceInUp animated">
                        <div class="add_info">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active">
                                    <a href="#product_tabs_description" data-toggle="tab">{{ trans('messeage.pd') }}</a>
                                </li>
                                <li>
                                    <a href="#reviews_tabs" data-toggle="tab">{{ trans('messeage.reviews') }}</a>
                                </li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        {!! $product_detail->information !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_tabs_tags"></div>
                                <div class="tab-pane fade" id="reviews_tabs">
                                    <div class="box-collateral box-reviews" id="customer-reviews">
                                        <div class="box-reviews1">
                                            <div class="form-add">
                                                <form id="review-form" method="post" action="{{ route('review.getReview', $product_detail->id) }}">
                                                    {{ csrf_field() }}
                                                    <fieldset>
                                                        <h4>{{ trans('messeage.reviews') }}<em class="required">*</em></h4>
                                                        <span id="input-message-box"></span>
                                                        <table id="product-review-table" class="data-table">
                                                            <thead>
                                                                <tr class="first last">
                                                                    <th>&nbsp;</th>
                                                                    <th><span class="nobr">1 *</span></th>
                                                                    <th><span class="nobr">2 *</span></th>
                                                                    <th><span class="nobr">3 *</span></th>
                                                                    <th><span class="nobr">4 *</span></th>
                                                                    <th><span class="nobr">5 *</span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="first odd">
                                                                    <th>{{ $product_detail->name }}</th>
                                                                    <td class="value">
                                                                        <input type="radio" class="radio" value="1" id="Price_1" name="rating">
                                                                    </td>
                                                                    <td class="value">
                                                                        <input type="radio" class="radio" value="2" id="Price_2" name="rating">
                                                                    </td>
                                                                    <td class="value">
                                                                        <input type="radio" class="radio" value="3" id="Price_3" name="rating">
                                                                    </td>
                                                                    <td class="value">
                                                                        <input type="radio" class="radio" value="4" id="Price_4" name="rating">
                                                                    </td>
                                                                    <td class="value last">
                                                                        <input type="radio" class="radio" value="5" id="Price_5" name="rating">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <input type="hidden" value="" class="validate-rating" name="validate_rating">
                                                        {{-- <div class="review1">
                                                            <ul class="form-list">
                                                                <li>
                                                                    <label class="required" for="nickname_field">Nickname<em>*</em></label>
                                                                    <div class="input-box">
                                                                        <input type="text" class="input-text" id="nickname_field" name="nickname">
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <label class="required" for="summary_field">Summary<em>*</em></label>
                                                                    <div class="input-box">
                                                                        <input type="text" class="input-text" id="summary_field" name="title">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div> --}}
                                                        <div class="review2">
                                                            <ul>
                                                                <li>
                                                                    <label class="required label-wide" for="review_field">{{ trans('messeage.comments') }}<em>*</em></label>
                                                                    <div class="input-box">
                                                                        <textarea rows="3" cols="5" id="review_field" name="comment"></textarea>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <div class="buttons-set">
                                                                <button class="button submit" title="Submit Review" type="submit"><span>Submit</span></button>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="box-reviews2">
                                            <h3>{{ trans('messeage.reviews') }}:</h3>
                                            <div class="box visible">
                                                <ul>
                                                    @foreach($comment as $cmt)
                                                    <li>
                                                        <div class="review">
                                                            <h6><a href="#">Comment</a></h6>
                                                            <small>Review by <span>{{ $cmt->user->name }} </span>on {{ $cmt->date }} </small>
                                                            <div class="review-txt">{{ $cmt->content }}</div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    {{-- <li class="even">
                                                        <table class="ratings-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Value</th>
                                                                    <td>
                                                                        <div class="rating-box">
                                                                            <div class="rating" style="width:100%;"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Quality</th>
                                                                    <td>
                                                                        <div class="rating-box">
                                                                            <div class="rating" style="width:100%;"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Price</th>
                                                                    <td>
                                                                        <div class="rating-box">
                                                                            <div class="rating" style="width:80%;"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="review">
                                                            <h6><a href="#/catalog/product/view/id/60/">Amazing</a></h6>
                                                            <small>Review by <span>Sandra Parker</span>on 1/3/2014 </small>
                                                            <div class="review-txt"> Minimalism is the online ! </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <table class="ratings-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Value</th>
                                                                    <td>
                                                                        <div class="rating-box">
                                                                            <div class="rating" style="width:100%;"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Quality</th>
                                                                    <td>
                                                                        <div class="rating-box">
                                                                            <div class="rating" style="width:100%;"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Price</th>
                                                                    <td>
                                                                        <div class="rating-box">
                                                                            <div class="rating" style="width:80%;"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="review">
                                                            <h6><a href="#/catalog/product/view/id/59/">Nicely</a></h6>
                                                            <small>Review by <span>Anthony  Lewis</span>on 1/3/2014 </small>
                                                            <div class="review-txt"> Unbeatable service and selection. This store has the best business model I have seen on the net. They are true to their word, and go the extra mile for their customers. I felt like a purchasing partner more than a customer. You have a lifetime client in me. </div>
                                                        </div>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                            <div class="actions"> <a class="button view-all" id="revies-button" href="#"><span><span>View all</span></span></a></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_tabs_custom">
                                    <div class="product-tabs-content-inner clearfix">
                                        <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                                          simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                          has been the industry's standard dummy text ever since the 1500s, when 
                                          an unknown printer took a galley of type and scrambled it to make a type
                                          specimen book. It has survived not only five centuries, but also the 
                                          leap into electronic typesetting, remaining essentially unchanged. It 
                                          was popularised in the 1960s with the release of Letraset sheets 
                                          containing Lorem Ipsum passages, and more recently with desktop 
                                          publishing software like Aldus PageMaker including versions of Lorem 
                                      Ipsum.</span></p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_tabs_custom1">
                                    <div class="product-tabs-content-inner clearfix">
                                        <p> <strong> Comfortable </strong><span>&nbsp;preshrunk shirts. Highest Quality Printing.  6.1 oz. 100% preshrunk heavyweight cotton Shoulder-to-shoulder taping Double-needle sleeves and bottom hem     

                                          Lorem Ipsumis
                                          simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                          has been the industry's standard dummy text ever since the 1500s, when 
                                          an unknown printer took a galley of type and scrambled it to make a type
                                          specimen book. It has survived not only five centuries, but also the 
                                          leap into electronic typesetting, remaining essentially unchanged. It 
                                          was popularised in the 1960s with the release of Letraset sheets 
                                          containing Lorem Ipsum passages, and more recently with desktop 
                                          publishing software like Aldus PageMaker including versions of Lorem 
                                      Ipsum.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-slider col-lg-12 col-xs-12 bounceInDown animated">
                        <div class="slider-items-products">
                            <div class="slider-items-products">
                                <div class="new_title center">
                                    <h2>{{ trans('messeage.rp') }}</h2>
                                </div>

                                <div id="related-products-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        @foreach($related_product as $product)
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
                                                                            <div style="width:80%" class="rating"></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript --> 
<base href="{{ asset('') }}" >
<script type="text/javascript" src="client/bower_components/bower/jquery.min.js"></script> 
<script type="text/javascript" src="client/bower_components/bower/bootstrap.min.js"></script> 
<script type="text/javascript" src="client/bower_components/bower/parallax.js"></script> 
<script type="text/javascript" src="client/bower_components/bower/common.js"></script> 
<script type="text/javascript" src="client/bower_components/bower/owl.carousel.min.js"></script> 
<script type="text/javascript" src="client/bower_components/bower/jquery.flexslider.js"></script> 
<script type="text/javascript" src="client/bower_components/bower/jquery.mobile-menu.min.js"></script> 
<script type="text/javascript" src="client/bower_components/bower/cloud-zoom.js"></script>
@endsection
