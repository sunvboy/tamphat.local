@extends('homepage.layout.home')
@section('content')
{!!htmlBreadcrumb('',$breadcrumb)!!}
@include('product.frontend.category.data',['module' => $module,'title' => $detail->title])
@endsection