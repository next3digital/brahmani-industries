@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inquiry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inquiries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.id') }}
                        </th>
                        <td>
                            {{ $inquiry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.ip') }}
                        </th>
                        <td>
                            {{ $inquiry->ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.mobile') }}
                        </th>
                        <td>
                            {{ $inquiry->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.email') }}
                        </th>
                        <td>
                            {{ $inquiry->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.name') }}
                        </th>
                        <td>
                            {{ $inquiry->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.subject') }}
                        </th>
                        <td>
                            {{ $inquiry->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.description') }}
                        </th>
                        <td>
                            {{ $inquiry->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.page_url') }}
                        </th>
                        <td>
                            {{ $inquiry->page_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inquiries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection