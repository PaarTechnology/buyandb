@extends('theme-views.layouts.app')

@section('title', translate('Order_Complete').' | '.$web_config['name']->value.' '.translate('ecommerce'))

@section('content')
    <main class="main-content d-flex flex-column gap-3 py-3 mb-5">
        <div class="container">
            <div class="card">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-md-10">
                            <div class="text-center d-flex flex-column align-items-center gap-3">
                                <img width="46" src="{{ theme_asset('assets/img/icons/check.png') }}" class="dark-support" alt="">
                                <h3>{{ translate('Your_Order_is_Completed') }}</h3>
                                <p class="text-muted">{{ translate('thank_you_for_your_order') }}! {{ translate('your_order_has_been_processed.') }} {{ translate('check_your_email_to_get_the_order_id_and_details.') }}</p>
                                <div class="d-flex flex-wrap justify-content-center gap-3">
                                    <a href="{{route('home')}}" class="btn btn-outline-primary bg-primary-light border-transparent">{{ translate('Continue_Shopping') }}</a>

                                    <a href="{{ route('track-order.index') }}" class="btn btn-primary">{{ translate('Track_Order') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')

@endpush
