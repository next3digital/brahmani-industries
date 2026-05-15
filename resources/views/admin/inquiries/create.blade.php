@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.inquiry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.inquiries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ip">{{ trans('cruds.inquiry.fields.ip') }}</label>
                <input class="form-control {{ $errors->has('ip') ? 'is-invalid' : '' }}" type="text" name="ip" id="ip" value="{{ old('ip', '') }}">
                @if($errors->has('ip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inquiry.fields.ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.inquiry.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inquiry.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.inquiry.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inquiry.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.inquiry.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inquiry.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subject">{{ trans('cruds.inquiry.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', '') }}">
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inquiry.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.inquiry.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inquiry.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="page_url">{{ trans('cruds.inquiry.fields.page_url') }}</label>
                <input class="form-control {{ $errors->has('page_url') ? 'is-invalid' : '' }}" type="text" name="page_url" id="page_url" value="{{ old('page_url', '') }}">
                @if($errors->has('page_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('page_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inquiry.fields.page_url_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection