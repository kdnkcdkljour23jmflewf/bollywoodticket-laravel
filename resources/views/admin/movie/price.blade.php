@extends('admin.component.app')
@section('content')
<table border="2">
    <thead>
        <tr>
            <th>
                Movie Name
            </th>
            <th>
                Category Name
            </th>
            <th>
                Movie Price
            </th>
            <th>
                Auditoriam Name
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @forelse ($movieprice_data as $item)
                @php
                    $item = (object) $item;
                @endphp
                @php
                    $auditoriam_data = DB::table('auditoriam')->select('*')->whereIn('id',explode(',',$item->auditoriam_id))->get();
                @endphp
                    <td>{{$item->movies->name}} </td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>                
                        @forelse($auditoriam_data as $v)
                            {{ $v->name }}
                            @empty
                            No auditorium data available
                        @endforelse
                    </td>
                @empty                                        
            @endforelse
        </tr>
    </tbody>
</table>
@endsection