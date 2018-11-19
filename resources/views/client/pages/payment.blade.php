@extends('client.master')   
@section('content')
<section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
        <div class="col-main">
            <div class="cart">
                {{-- <div class="page-title">
                    <h2>{{ trans('messeage.cart') }}</h2>
                </div> --}}
                {{-- <div class="table-responsive">
                    <form method="post" action="#">
                        <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                        <fieldset>
                            <table class="data-table cart-table" id="shopping-cart-table">
                                <thead>
                                    <tr class="first last">
                                        <th rowspan="1">&nbsp;</th>
                                        <th rowspan="1"><span class="nobr">{{ trans('messeage.product_name') }}</span></th>
                                        <th class="a-center " rowspan="1">{{ trans('messeage.quantity') }}</th>
                                        <th colspan="1" class="a-center">{{ trans('messeage.total') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="first last">
                                        <td class="a-right last" colspan="8">
                                            <a href="index">
                                                <button onclick="setLocation('http://magento.magikthemes.com/magikClassic/womens.html')" class="button btn-continue" title="Continue Shopping" type="button">
                                                    <span>{{ trans('messeage.continue_shopping') }}</span>
                                                </button>
                                            </a>    
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr class="first odd">
                                        <td class="image"><a class="product-image" title="Sample Product" href="food_details"><img width="75" alt="Sample Product" src="products-images/01.jpg"></a></td>
                                        <td><h2 class="product-name"> <a href="product_detail.html">Sample Product</a> </h2></td>
                                        <td class="a-center movewishlist">1</td>
                                        <td class="a-center movewishlist"><span class="cart-price"> <span class="price">$29.95</span> </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                    </form>
                </div> --}}
                <br> 
                <div class="page-title">
                    <h2>{{ trans('messeage.payment') }}</h2>
                </div>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade in">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="cart-collaterals row">
                    <div class="col-sm-4">
                        <div class="shipping">
                            <h3>{{ trans('messeage.customer_information') }}</h3>
                            <div class="shipping-form">
                                <form id="shipping-zip-form" method="post" action="{{ route('checkout.getCheckout') }}">
                                    {{ csrf_field() }} 
                                    <ul class="form-list">
                                        <li>
                                            <label class="required" for="email">{{ trans('messeage.full_name') }}: <em>*</em></label>
                                            <div class="input-box">
                                                <input type="text" name="name" id="name" class="input-text validate-postcode">
                                            </div>
                                        </li>
                                        <li>
                                            <label class="required" for="phone">{{ trans('messeage.phone') }}: <em>*</em></label>
                                            <div class="input-box">
                                                <input type="text" name="phone" id="phone" class="input-text validate-postcode">
                                            </div>
                                        </li>
                                        <li>
                                            <label class="required" for="address">{{ trans('messeage.address') }}: <em>*</em></label>
                                            <div class="input-box">
                                                <input type="text" name="address" id="address" class="input-text validate-postcode">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="note">{{ trans('messeage.note') }}:</label>
                                            <div class="input-box">
                                                <input type="textarear" name="description" id="description" class="input-text validate-postcode">
                                            </div>
                                        </li>
                                        <li>
                                            <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="submit">
                                                <span>{{ trans('messeage.submit') }}</span>
                                            </button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-4">
                        <div class="discount">
                            <h3>{{ trans('messeage.discount_codes') }}</h3>
                            <form method="post" action="#" id="discount-coupon-form">
                                <label for="coupon_code">{{ trans('messeage.coupon_code') }}</label>
                                <input type="hidden" value="0" id="remove-coupone" name="remove">
                                <input type="text" name="coupon_code" id="coupon_code" class="input-text fullwidth">
                                <button value="Apply Coupon" class="button coupon " title="Apply Coupon" type="button">
                                    <span>{{ trans('messeage.cart_total') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="totals col-sm-4">
                        <h3>{{ trans('messeage.cart_total') }}</h3>
                        <div class="inner">
                            <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                                <tfoot>
                                    <tr>
                                        <td colspan="1" class="a-left"><strong>{{ trans('messeage.grand_total') }}</strong></td>
                                        <td class="a-right"><strong><span class="price">{{ $total }} VNĐ</span></strong></td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td colspan="1" class="a-left">{{ trans('messeage.total') }}</td>
                                        <td class="a-right"><span class="price">{{ $total }} VNĐ</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" class="a-left">{{ trans('messeage.ship') }}</td>
                                        <td class="a-right"><span class="price">$2</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <ul class="checkout">
                                <li>
                                    <button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button">
                                        <span>{{ trans('messeage.submit') }}</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
