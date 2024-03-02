<x-app-layout>
    <div class="container mt-2.5">
        <h1 class="text-white">Add Image</h1>
        <div class="row">
            <div class="col-bd-5">
                <form action="/store" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-control mt-2.5">
                        <input name="image" type="file">
                    </div>

                    <button type="submit" class="btn btn-success mt-2.5 w-1/6">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
