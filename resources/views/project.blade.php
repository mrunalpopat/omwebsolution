@extends('front.layouts.header')
@section('content')

<!--Changing the number in the column_# class changes the number of columns-->
<style type="text/css">
    figure {
    margin: 0px 3px !important;
}
</style>
<div id="wrap">
    <div id="columns" class="columns_4">
        <div class="box">
        @foreach($getData as $data)
            <?php $imageData = json_decode($data->images, true); ?>
            
                <figure>
                    <img src="{{asset('uploads/').'/'.$imageData[0]}}">
                    <hr>
                    <figcaption>{{$data->name}}</figcaption>
                    <span class="price" style="float: left;">₹{{$data->price}}</span>
                    <span class="price" style="float: right;"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    <a class="button btn-get-started scrollto" href="{{route('projectDetail',$data->id)}}">Buy Now</a>
                </figure>
            
        @endforeach
        </div>
    </div>
</div>
@endsection