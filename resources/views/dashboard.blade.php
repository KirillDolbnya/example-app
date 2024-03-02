<x-app-layout>
    <div class="container mt-5">
        <h1 align="center" class="text-white">My Gallery</h1>
        <div class="row">
            @foreach($ImagesInView as $image)
                <div class="col-md-3 my-gallery">
                    <img class="img-thumbnail image-home" src="/{{$image->image}}" alt="">
                    <a href="/show/{{$image->id}}" class="my-btn btn btn-primary text-white">Show</a>
                    <a href="/edit/{{$image->id}}" class="my-btn btn btn-warning text-white">Edit</a>
                    <a href="/delete/{{$image->id}}" class="my-btn btn btn-danger text-white">Delete</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
