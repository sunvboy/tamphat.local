@extends('homepage.layout.home')
@section('content')
{!!htmlBreadcrumb($seo['meta_title'])!!}
@include('product.frontend.category.data',['module' => 'search','title' => $seo['meta_title']])
@endsection