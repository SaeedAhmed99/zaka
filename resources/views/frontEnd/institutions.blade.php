@extends('frontEnd.layout')
<link href="{{ URL::asset('assets/frontend/css/background-style-rtl.min9322.css') }}" rel="stylesheet"/>
<style>
    #inner-headline{
        display: none;
    }
</style>
@section('content')
  {{-- <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('Home') }}"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>

                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    <section style="margin: 54px 0 54px 0;">
        <div class="container">
            @foreach ($institutionss as $item)
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{$item->details_ar}}">{{$item->details_ar}}</a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{$item->details_ar}}">{{$item->title_ar}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection