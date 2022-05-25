@extends('layouts.app')
@section('content')

<section>
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            @lang('Los mejores peces para comer mientras juegas!')
            <div class="card margin-top margin-bottom">

                <div class="card-header">
                    <h3> @lang('PECES') </h3>
                </div>
                <div class="card-body">
                    <ul class="ul-list">
                        @foreach ($data['fishes'] as $item)
                            <li class="card card-item ">
                                <h5 class="card-header"> {{ $item['name'] }}</h5>
                                <div class="card-body card-item-cart">
                                    
                                <img class="img imagen-items"
                               
                                        src="https://ichef.bbci.co.uk/news/640/amz/worldservice/live/assets/images/2015/03/28/150328223244_pescado_promo_624x351_thinkstock.jpg"style="align:center width: 120px;height: 220px; padding: 10px; margin: 0px;" />
                                    <ul>
                                        
                                        <li><b>@lang('pais') :</b> {{$item['country']}}</li>
                                        <li><b>@lang('latitud'):</b> {{$item['geoLatitude']}}</li>
                                        <li><b>@lang('longitud'):</b> {{$item['geoLongitude']}}</li>
                                    </ul>                                                                        

                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection