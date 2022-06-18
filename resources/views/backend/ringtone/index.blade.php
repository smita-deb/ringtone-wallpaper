@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header">All Ringtones
                <span class="float-right">
                    <a href="{{route('ringtones.create')}}">
                    <button class="btn btn-primary">Create Ringtones</button>
                    </a>
                </span></div>
                <table class="table">
                    <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">File</th>
                      <th scope="col">Category</th>
                      <th scope="col">Size</th>
                      <th scope="col">Download</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      @if(count($ringtones)>0)
                      @foreach ($ringtones as $key=>$ringtone)

                      <th scope="row">{{$key+1}}</th>
                      <td>{{$ringtone->title}}</td>
                      <td>{{$ringtone->description}}</td>
                      <td>
                      <audio controls onplay="pauseOther(this);">
                      <source src="/audio/{{$ringtone->file}}" type="audio/ogg">>
                      Your Browser is not support this file
                      </audio>
                      </td>
                      <td>{{$ringtone->category_id}}</td>
                      <td>{{$ringtone->size}}</td>
                      <td>{{$ringtone->download}}</td>
                       <td><a href="{{route('ringtones.edit',[$ringtone->id])}} ">
                        <button class="btn btn-info">Edit</button>
                        </a>
                      </td>
                      <td>
                        <form action="{{route('ringtones.destroy',[$ringtone->id])}}" method="POST" onSubmit="return confirm('Do you want to delete? ')">@csrf
                          {{method_field('DELETE')}}
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>


                    </tr>
                      @endforeach
                      @else
                      <td>No record exist</td>
                      @endif
                    </tbody>
                    </table>
            </div>
        </div>

    </div>
</div>


@endsection
