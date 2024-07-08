@section('head')
@section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="/plugins/select2/select2.min.css">
@endsection
@endsection
<div class="card card-primary">
    <div class="card-header">
        <strong><a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}} -
                مدیر کل</a>
        </strong>
    </div>
    <form id="quickForm" method="post" enctype="multipart/form-data" action="{{ route('notes.create') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="card-body">
            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="عنوان یادداشت را وارد کنید">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
            <label>انتخاب دسته بندی</label>
                <select class="form-control" name="category_id">
                @if(!count($categories))
                    <option>دسته بندی موجود نیست</option>
                @else
                    <!-- <option>دسته بندی ها</option>
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{ $category->name }}</option>
                    @endforeach -->
                    <option>دسته بندی را انتخاب کنید</option>
                    @foreach($categories as $category)
                        @include('categories.subcategoryselect', ['category' => $category])
                    @endforeach
                @endif
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>متن یادداشت</label>
{{--                <textarea class="form-control" name="content" rows="3" placeholder="متن یادداشت را وارد کنید."></textarea>--}}
                <textarea class="form-control" name="content" id="body" placeholder="متن یادداشت را وارد کنید." name="body"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">افزودن</button>
        </div>
    </form>
</div>
@section('bottom-script')
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>
    <script src="../../dist/js/demo.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" ></script>
@endsection
