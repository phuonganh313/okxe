@extends('admin.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Item</div>
                <div class="panel-body">
                    <div id="dropzone-style" class="col-md-12"  style="display:none">
                        <div class="dropzone" id="my-dropzone" name="myDropzone"></div>
                        <input type="hidden" id="dropzone-hiden"  value="">
                    </div>
                    </br>
                    <form id="add-item" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="alert alert-danger" style="display:none">
                            <ul></ul>
                        </div>
                        @if(@$item)
                        <div>Ảnh</div></br>
                        <div class="row">
                            @foreach($item->images as $value)
                            <div class="col-xs-6 col-md-3">
                                <a href="#" class="thumbnail">
                                    <img src="{{url($value['url'])}}" alt="Smiley face">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div  class="form-group{{ $errors->has('id_county') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Quận *</label>
                            <div class="col-md-6">
                                <select id="id_county" data-column="3" name = "id_county"  class="search-input-select form-control width100percent">
                                    @if($item)
                                        <option value="{{$item->id_county ? $item->id_county : '' }}">{{$item->county ? $item->county->name  : '--------------------' }}</option>
                                    @else
                                        <option value="">--------------------</option>
                                    @endif
                                    @foreach($countys as $value)
                                        <option value="{{$value['id']}}">{{$value['name']}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_county'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_county') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" id="id_item"  value="{{$item ? $item->id : ''}}">
                        <div  class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Tiêu đề *</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control"  name="title" value="{{$item ? $item->title : ""}}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div  class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Giá bán *</label>
                            <div class="col-md-6">
                                <input id="price"  type="text" class="form-control" name="price" value="{{$item ? number_format($item->price, 0, '.', ',') : ""}}">
                                <input type="hidden" id="cost" name="cost" value="{{$cost}}">
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div  class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Mô tả *</label>
                            <div class="col-md-6">
                                <textarea rows="5" id="description" class="form-control" name="description" >{{$item ? $item->description : ""}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div  class="form-group">
                            <label class="col-md-4 control-label">Hãng</label>
                            <div class="col-md-6">
                                <select id="id_brand" data-column="3" name = "id_brand"  class="search-input-select form-control width100percent">
                                    @if($item)
                                        <option value="{{$item->id_brand ? $item->id_brand : '' }}">{{$item->brand ? $item->brand->name  : '--------------------' }}</option>
                                    @else
                                        <option value="">--------------------</option>
                                    @endif
                                    @foreach($brands as $value)
                                        <option value="{{$value['id']}}">{{$value['name']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div  class="form-group">
                            <label class="col-md-4 control-label">Dòng xe</label>
                            <div class="col-md-6">
                                <select id="id_model" data-column="3" name = "id_model" class="search-input-select form-control width100percent">
                                    @if($item)
                                        <option value="{{$item->id_model ? $item->id_model : '' }}">{{$item->model ? $item->model->name  : '--------------------' }}</option>
                                    @else
                                        <option value="">--------------------</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div  class="form-group">
                            <label class="col-md-4 control-label">Năm phát hành</label>
                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control" name="year" value="{{$item ? $item->year : ""}}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Số km đã đi</label>
                            <div class="col-md-6">
                                <select id="km_range" data-column="3" name = "range"  class="search-input-select form-control width100percent">
                                    @if($item)
                                        <option value="{{$item->km_range ? $item->km_range : '' }}">{{$item->km_range ? $item->km_range  : '--------------------' }}</option>   
                                    @else
                                        <option value="">------------------------</option>
                                    @endif
                                    
                                    @foreach($km_ranges as $value)
                                    <option value="{{$value}}" >{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div  class="form-group">
                            <label class="col-md-4 control-label">Loại xe</label>
                            <div class="col-md-6">
                                <select id="type" data-column="3" name = "type"  class="search-input-select form-control width100percent">
                                    @if($item)
                                        <option value="{{$item->type ? $item->type : '' }}">{{$item->type ? $item->type  : '--------------------' }}</option>   
                                    @else
                                        <option value="">------------------------</option>
                                    @endif
                                    
                                    @foreach($type as $value)
                                    <option value="{{$value}}" >{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div  class="form-group">
                            <label class="col-md-4 control-label">Tên người bán</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$item ? $item->name : ""}}">
                            </div>
                        </div>
                        
                        <div  class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Điện thoại người bán *</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{$item ? $item->phone : ""}}">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div  class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Link *</label>
                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link" value="{{$item ? $item->link : ""}}">
                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if(Auth::user()->id_role == 1)
                        <div class="form-group">
                            <label class="col-md-4 control-label">Imported</label>
                            <div class="col-md-6">
                                <input id="imported" type="text" data-column="3" name="imported" id="dayFrom" class="search-input-date bs-filters form-control width100percent" value="{{$item ? $item->imported : ""}}">
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary" id="submit">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="{{route('user.item.list')}}" id="done" style="display:none">
                        <button class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Done
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
        Dropzone.options.myDropzone= {
           url: '{{ url('item/upload') }}',
           headers: {
               'X-CSRF-TOKEN': '{!! csrf_token() !!}'
           },
           sending: function(file, xhr, formData){
                formData.append('id_item', $('#dropzone-hiden').val());
           },
           autoProcessQueue: true,
           uploadMultiple: true,
           parallelUploads: 5,
           maxFiles: 10,
           maxFilesize: 5,
           acceptedFiles: ".jpeg,.jpg,.png,.gif",
           dictFileTooBig: 'Image is bigger than 5MB',
           addRemoveLinks: true,
           removedfile: function(file) {
           var name = file.name;    
           name =name.replace(/\s+/g, '-').toLowerCase();    /*only spaces*/
            $.ajax({
                type: 'POST',
                url: '{{ url('admincp/deleteImg') }}',
                headers: {
                     'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                 },
                data: "id="+name,
                dataType: 'html',
                success: function(data) {
                    $("#msg").html(data);
                }
            });
          var _ref;
          if (file.previewElement) {
            if ((_ref = file.previewElement) != null) {
              _ref.parentNode.removeChild(file.previewElement);
            }
          }
          return this._updateMaxFilesReachedClass();
        },
        previewsContainer: null,
        hiddenInputContainer: "body",
       }
        var pathname = window.location.pathname ; // Returns path only
        var url      = window.location.href; 
        $("#submit").click(function(event){
		    $.ajax({
                url: '{{ url('item/add')}}',
                type: "POST",
                data: {
                        id_item: $("#id_item").val(),
                        id_county: $("#id_county").val(),
                        title: $("#title").val(),
                        price: $("#price").val(),
                        cost: $("#cost").val(),
                        description: $("#description").val(),
                        id_brand: $("#id_brand").val(),
                        id_model: $("#id_model").val(),
                        year: $("#year").val(),
                        km_range: $("#km_range").val(),
                        type: $("#type").val(),
                        name: $("#name").val(),
                        phone: $("#phone").val(),
                        link: $("#link").val(),
                        imported: $("#imported").val(),
                    },
                success: function(data){
                    if(data.errors){
                        printErrorMsg(data.errors);
                    }
                    else{
                        $("#dropzone-style").css("display", "");
                        $("#add-item").css("display", "none");
                        $("#done").css("display", "");
                        $("#dropzone-hiden").val(data.id_item);
                    }
                }
            });
            return false;
        });

        $("#id_brand").change(function(event){
		    $.ajax({
                url: '{{ url('item/model')}}',
                type: "POST",
                data: {
                    id_brand: $("#id_brand").val(),
                },
                success: function(data){
                    $("#id_model").html(data);
                }
            });
            return false;
        });
        function printErrorMsg (msg) {
            $(".alert-danger").find("ul").html('');
			$(".alert-danger").css('display','block');
			$.each( msg, function( key, value ) {
				$(".alert-danger").find("ul").append('<li>'+value+'</li>');
			});

        }
       
</script>

@endsection