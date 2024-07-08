@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tags').select2({
            tags: true,
            tokenSeparators: [','],
            placeholder: "تگ‌ها را وارد کنید",
            createTag: function (params) {
                var term = $.trim(params.term);
                if (term === '') {
                    return null;
                }
                return {
                    id: term,
                    text: term,
                    newTag: true // add additional parameters
                };
            }
        });
    });
</script>
@endsection

<div class="card card-primary">
    <div class="card-header">
        <strong><a href="#">{{\Illuminate\Support\Facades\Auth::user()->name}} - مدیر کل</a></strong>
    </div>
    <form id="quickForm" method="post" enctype="multipart/form-data" action="{{ route('categories.create') }}">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
                <label for="title">نام</label>
                <input type="text" name="name" class="form-control" id="title" placeholder="نام دسته بندی را وارد کنید">
            </div>
            <div class="form-group">
                <label>انتخاب زیر دسته بندی</label>    
                <select class="form-control" name="category_id">
                    @if(!count($categories))
                        <option value="">زیردسته بندی را انتخاب کنید</option>
                    @else    
                        <option value="">زیردسته بندی را انتخاب کنید</option>
                        @foreach($categories as $category)
                            <option value= "{{ $category->id }}" class="caret">{{ $category->name }}</span>
                        @endforeach
                    @endif
                </select>
            </div>
                <div class="form-group">
                <label>انتخاب برچسب</label>
                    <select class="select2" name= "tags[]" id="tags" multiple="multiple" data-placeholder="انتخاب تگ" style="width: 100%;">
                        @if(!count($tags))
                            <option value="">برچسبی ای موجود نیست</option>
                        @else 
                            @foreach($tags as $tag)
                                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                            @endforeach
                    
                        @endif
                    </select>
                </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">افزودن</button>
        </div>
    </form>
</div>
<script src="/plugins/select2/select2.min.js"></script>
<script>
    $('.select2').select2({
        dir: 'rtl'
    });
    document.addEventListener('DOMContentLoaded', function () {
        var toggler = document.getElementsByClassName("caret");
        for (var i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function () {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    });
    $('.add-image').click(function () {
        const html = '<div class="col-md-2 col-sm-6"> <div class="ltr text-left"> <label class="btn btn-success mr-2" type="button"> <input class="d-none" type="file" name="images[]"> <i class="fas fa-upload"></i> آپلود عکس </label> </div></div>';
        $(this).parents('.form-group').find('.row').append(html);
    });
</script>
<style>
    .nested {
        display: none;
    }
    .caret {
        cursor: pointer;
    }
    .caret::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
    }
    .caret-down::before {
        content: "\25BC";
    }
    .active {
        display: block;
    }
</style>