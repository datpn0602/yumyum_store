@extends('client.master')  
@section('content') 
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home">
                        <a title="Go to Home Page" href="http://www.magikcommerce.com/">{{ trans('messeage.home') }}</a>
                        <span>&mdash;›</span>
                    </li>
                    <li class="category13">
                        <strong>{{ trans('messeage.contact') }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col2-right-layout wow bounceInUp animated">
    <div class="main container">
        <div class="row">
            <section class="col-main col-sm-9">
                <div class="page-title">
                    <h2>{{ trans('messeage.home') }}</h2>
                </div>
                <div class="static-contain">
                    <fieldset class="group-select">
                        <ul>
                            <li id="billing-new-address-form">
                                <fieldset>
                                    <ul>
                                        <li>
                                            <div class="customer-name">
                                                <div class="input-box name-firstname">
                                                    <label for="billing:firstname">{{ trans('messeage.user_name') }}<span class="required">*</span></label>
                                                    <br>
                                                    <input type="text" id="billing:firstname" name="billing[firstname]" title="User Name" class="input-text ">
                                                </div>
                                                <div class="input-box name-lastname">
                                                    <label for="billing:lastname">{{ trans('messeage.email') }}<span class="required">*</span> </label>
                                                    <br>
                                                    <input type="text" id="billing:lastname" name="billing[lastname]" title="Email" class="input-text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="input-box">
                                                <label for="billing:company">{{ trans('messeage.company') }}</label>
                                                <br>
                                                <input type="text" id="billing:company" name="billing[company]" title="Company" class="input-text">
                                            </div>
                                            <div class="input-box">
                                                <label for="billing:email">{{ trans('messeage.telephone') }}<span class="required">*</span></label>
                                                <br>
                                                <input type="text" name="billing[email]" id="billing:email" title="Telephone" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <label>{{ trans('messeage.address') }}<span class="required">*</span></label>
                                            <br>
                                            <input type="text" title="Street Address" name="billing[street][]" class="input-text">
                                        </li>
                                        <li>
                                            <input type="text" title="Street Address 2" name="billing[street][]" class="input-text">
                                        </li>
                                        <li class="">
                                            <label for="comment">{{ trans('messeage.content') }}<em class="required">*</em></label>
                                            <br>
                                            <div style="float:none" class="">
                                                <textarea name="comment" id="comment" title="Content" class="input-text" cols="5" rows="3"></textarea>
                                            </div>
                                        </li>
                                    </ul>
                                </fieldset>
                            </li>
                            <li><span class="require"><em class="required">* </em>{{ trans('messeage.*') }}</span>
                                <div class="buttons-set">
                                    <button type="submit" title="Submit" class="button submit">
                                        <span>{{ trans('messeage.submit') }}</span>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </fieldset>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
