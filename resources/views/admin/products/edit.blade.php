@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="required" for="name">Product Name</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="required" for="slug">Slug</label>
                        <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" required>
                        @if($errors->has('slug'))
                            <div class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="product_category_id">Category</label>
                        <select class="form-control {{ $errors->has('product_category_id') ? 'is-invalid' : '' }}" name="product_category_id" id="product_category_id">
                            @foreach($categories as $id => $category)
                                <option value="{{ $id }}" {{ (old('product_category_id') ?? $product->product_category_id) == $id ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('product_category_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('product_category_id') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description" id="short_description" rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                        @if($errors->has('short_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('short_description') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea class="form-control ckeditor {{ $errors->has('long_description') ? 'is-invalid' : '' }}" name="long_description" id="long_description">{!! old('long_description', $product->long_description) !!}</textarea>
                        @if($errors->has('long_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('long_description') }}
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="main_image">Main Image</label>
                        <div class="needsclick dropzone {{ $errors->has('main_image') ? 'is-invalid' : '' }}" id="main_image-dropzone">
                        </div>
                        @if($errors->has('main_image'))
                            <div class="invalid-feedback">
                                {{ $errors->first('main_image') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="gallery">Gallery Images</label>
                        <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
                        </div>
                        @if($errors->has('gallery'))
                            <div class="invalid-feedback">
                                {{ $errors->first('gallery') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="sort_order">Sort Order</label>
                        <input class="form-control {{ $errors->has('sort_order') ? 'is-invalid' : '' }}" type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $product->sort_order) }}" min="0">
                        @if($errors->has('sort_order'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sort_order') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                Featured Product
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <h5>SEO Information</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $product->meta_title) }}">
                        @if($errors->has('meta_title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_title') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" name="meta_description" id="meta_description" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
                        @if($errors->has('meta_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_description') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}" placeholder="keyword1, keyword2, keyword3">
                        @if($errors->has('meta_keywords'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_keywords') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.mainImageDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 2,
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="main_image"]').remove()
      $('form').append('<input type="hidden" name="main_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="main_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->getFirstMedia('main_image'))
      var file = {!! json_encode($product->getFirstMedia('main_image')) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="main_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }
        return _results
    }
}

var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 2,
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($product) && $product->getMedia('gallery'))
      var files = {!! json_encode($product->getMedia('gallery')) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }
         return _results
     }
}

$('#name').on('blur', function() {
    var name = $(this).val();
    var slug = name.toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-');
    $('#slug').val(slug);
});

$(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.products.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $product->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
