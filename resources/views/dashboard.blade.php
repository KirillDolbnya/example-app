<x-app-layout>
    <div class="container mt-5">
        <h1 align="center" class="text-white">My Gallery</h1>
        <div class="row">
{{--            @dd($ImagesInView)--}}
            @php
                $name = $ImagesInView->filter(function ($image){
                   return $image->id == 12;
                });

                dd($name);
            @endphp

{{--            @foreach($ImagesInView as $image)--}}
                <div class="col-md-3 my-gallery">
{{--                    <img class="img-thumbnail image-home" src="/{{$image->image}}" alt="">--}}
{{--                    <a href="{{ route('show',['id'=>$image->id]) }}" class="my-btn btn btn-primary text-white">Show</a>--}}
{{--                    <a href="{{ route('edit',['id'=>$image->id]) }}" class="my-btn btn btn-warning text-white">Edit</a>--}}
{{--                    <form action="{{ route('delete',['id'=>$image->id]) }}" method="POST">--}}
{{--                        {{csrf_field()}}--}}
{{--                        {{ method_field('DELETE') }}--}}
{{--                        <button type="submit" class="my-btn btn btn-danger text-white">DELETE</button>--}}
{{--                    </form>--}}
{{--                    <a href="{{ route('delete',['id'=>$image->id]) }}" class="my-btn btn btn-danger text-white">Delete</a>--}}
                </div>
{{--            @endforeach--}}
        </div>
    </div>
</x-app-layout>
