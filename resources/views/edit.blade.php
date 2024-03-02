<x-app-layout>
    <div class="container mt-2.5">
        <h1 class="text-white">Edit Image</h1>

        <img class="img-thumbnail mt-2.5" src="/{{$ImageInView->image}}" alt="">

        <div class="row">
            <div class="col-bd-5">
                <form action="{{ route('update',['id'=>$ImageInView->id]) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}
                    <div class="form-control mt-2.5">
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="btn btn-warning text-white mt-2.5 w-1/6">Edit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
