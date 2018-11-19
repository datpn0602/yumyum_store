@extends('client.master')   
@section('content') 
<script type="text/javascript">
    function updateCart(qty, rowId) {
        $.get(
            '{{ asset('update-cart') }}',
            {qty: qty, rowId: rowId},
            function() {
                location.reload();
            }
            );
    }
</script>
<section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
        <div class="col-main">
            <div class="cart">
                <div class="page-title">
                    <h2>{{ trans('messeage.cart') }}</h2>
                </div>
                <div class="table-responsive">
                    {!! Form::open(['method' => 'POST']) !!}
                        {!! Form::hidden('form_key','Vwww7itR3zQFe86m') !!}
                        <fieldset>
                            <table class="data-table cart-table" id="shopping-cart-table">
                                <thead>
                                    <tr class="first last">
                                        <th rowspan="1">&nbsp;</th>
                                        <th rowspan="1"><span class="nobr">{{ trans('messeage.product_name') }}</span></th>
                                        <th colspan="1" class="a-center"><span class="nobr">{{ trans('messeage.price') }}</span></th>
                                        <th colspan="1" class="a-center"><span class="nobr">{{ trans('messeage.promotion') }}</span></th>
                                        <th class="a-center " rowspan="1">{{ trans('messeage.quantity') }}</th>
                                        <th colspan="1" class="a-center">{{ trans('messeage.promotional_pricing') }}</th>
                                        <th class="a-center" rowspan="1">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="first last">
                                        <td class="a-right last" colspan="8">
                                            <div class="panel-success"><b> Total: {{ $total }}</b></div>
                                            <a href="{{ route('home') }}">
                                                {!! Form::button( trans('messeage.continue_shopping'), ['title' => trans('messeage.continue_shopping'), 'class' => 'button btn-continue']) !!}
                                            </a>
                                            <a href=" {{ route('checkout.getCheckout') }}">
                                                {!! Form::button( trans('messeage.payment'), ['title' => trans('messeage.payment'), 'class' => 'button btn-update']) !!}    
                                            </a>
                                            <a href="#">
                                                {!! Form::button( trans('messeage.update_cart'), ['title' => trans('messeage.update_cart'), 'class' => 'button btn-update'] ) !!}   
                                            </a>
                                            <a href="#">
                                                {!! Form::button( trans('messeage.clear_cart'), ['title' => trans('messeage.clear_cart'), 'class' => 'button btn-update'] ) !!}   
                                            </a>    
                                        </td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($content as $item)
                                    <tr class="first odd">
                                        <td class="image"><a class="product-image" title="Sample Product" href="food_details"><img width="75" alt="Sample Product" src="/{{ config('image.paths.resource')}}/{{ $item->options->img }}"></a></td>
                                        <td><h2 class="product-name"> <a href="product_detail.html">{{ $item->name }}</a> </h2></td>
                                        <td class="a-center hidden-table"><span class="cart-price"> <span class="price">{{ number_format($item->price,0,",",".") }}</span> </span></td>
                                        <td class="a-center hidden-table">
                                            <span class="cart-price"> 
                                                <span class="price">
                                                    @if($item->options->promotion != null)
                                                        {{ $item->options->promotion }}%
                                                    @endif
                                                </span> 
                                            </span>
                                        </td>
                                        <td class="a-center movewishlist"><input type="number" maxlength="12" class="input-text qty" title="Qty" size="4" value="{{ $item->qty }}" name="cart[10522][qty]" onchange="updateCart(this.value, '{{ $item->rowId }}')"></td>
                                        <td class="a-center movewishlist">
                                            <span class="cart-price">
                                                <span class="price">
                                                    @if($item->options->promotion != null)
                                                        {{ number_format(($item->price) - ($item->price)*($item->options->promotion)/100,0,",",".") }}
                                                    @else {{ number_format($item->price*$item->qty,0,",",".") }}
                                                    @endif                                                  
                                                </span>
                                            </span>
                                        </td>
                                        <td class="a-center last"><a class="button remove-item" title="Remove item" href="{{ route('delete-food-in-cart',$item->rowId) }}"><span><span>Remove item</span></span></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
