@extends('admin.component.app')
@section('content')
@forelse ($movieprice_data as $item)
                              @php
                                  $item = (object) $item;
                                @endphp
                                {{$item->movies->name}}
                                {{$item->category->name}}
                                {{$item->price}}
@empty
@endforelse
@endsection