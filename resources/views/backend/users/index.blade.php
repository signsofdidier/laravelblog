@extends('layouts.backend')
@section('title', 'Users')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('backend.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Posts</li>
@endsection
@section('charts')
@endsection
@section('content')
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="GET" action="{{ route('users.index') }}" class="mb-3">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-filter"></i> Filter Posts
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('users.index') }}">
                    <div class="row g-3">
                        <!-- Zoekveld -->
                        <div class="col-md-4">
                            <label for="search" class="form-label fw-bold">Search by Title or
                                Content</label>
                            <input type="text" name="search" id="search" class="form-control"
                                   placeholder="Enter keyword..." value="{{ request('search') }}">
                        </div>
                        <!-- Categorieën (Checkboxes) -->
                        {{--<div class="col-md-5">
                            <label class="form-label fw-bold">Categories</label>
                            <div class="d-flex flex-wrap">
                                <div class="d-flex flex-wrap">
                                    @foreach($categories as $id => $name)
                                        <div class="form-check me-3">
                                            <input type="checkbox" name="category_ids[]"
                                                   value="{{ $id }}" id="category-{{ $id }}"
                                                   class="form-check-input"
                                                   178
                                                {{ in_array($id, request('category_ids', [])) ? 'checked' : '' }}>
                                            <label for="category-{{ $id }}" class="form-checklabel">{{$name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>--}}
                        <!-- Filter- en Resetknoppen -->
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="fas fa-sync-alt"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>

    <p class="text-muted">Showing {{ $users->total() > 0 ? $users->count() : 0 }} of
        {{ $users->total() }} users</p>

    <div class="mb-4">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>@sortablelink('id', 'Id', [], ['class' => 'text-dark'])</th>
                    <th>Photo</th>
                    <th>@sortablelink('name', 'Name', [], ['class' => 'text-dark'])</th>
                    <th>@sortablelink('email', 'Email', [], ['class' => 'text-dark'])</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>@sortablelink('created_at', 'Created', [], ['class' => 'text-dark'])</th>
                    <th>@sortablelink('updated_at', 'Updated', [], ['class' => 'text-dark'])</th>
                    <th>Deleted</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Deleted</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @if($users)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                @if($user->photo && file_exists(public_path('assets/img/'.$user->photo->path)))
                                    <img
                                        src="{{asset('assets/img/'.$user->photo->path)}}"
                                        alt="{{$user->photo->alternate_text ?? $user->name}}"
                                        class="img-fluid rounded object-fit-cover" style="width: 40px; height: 40px;"
                                    >
                                @else
                                    <img
                                        src="https://placehold.co/40"
                                        alt="No Image"
                                        class="img-fluid rounded object-fit-cover" style="width: 40px; height: 40px;"
                                    >
                                @endif

                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div>
                                    @foreach($user->roles as $role)

                                        <span class="badge rounded-pill text-bg-primary">
                                            <i class="fas fa-user-shield"></i>
                                            {{$role->name}}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                {{--If else voor boolean naar text om te zetten--}}
                                <div class="{{$user->is_active==1 ? 'badge rounded-pill text-bg-success' : 'badge rounded-pill text-bg-danger'}}">{{$user->is_active==1 ? 'Active' : 'Not Active'}}
                                </div>
                            </td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            {{--<td>{{$user->deleted_at ? $user->deleted_at->diffForHumans() :  ''}}</td>--}}
                            <td>{{$user->deleted_at ? 'yes' :  'no'}}</td>
                            <td>
                                {{--Edit Button--}}
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm" title="Edit User">
                                    <i class="fas fa-edit text-white"></i>
                                </a>
                                @if($user->trashed())
                                    <form method="POST" action="{{ route('users.restore', $user->id)  }}" style="display:inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm" title="Restore User">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </form>
                                @else()
                                    <form method="POST" action="{{ route('users.destroy', $user->id)  }}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete User">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        <div>
            {{--{{$users->links()}}--}}
            {!! $users->appends(request()->except('page'))->render() !!}
        </div>
    </div>

@endsection
