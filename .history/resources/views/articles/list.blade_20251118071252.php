@extends('my_layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Page Header -->
        <div class="container-xxl py-3 d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4 text-dark m-0">All Articles</h2>
            <a href="{{ route('articles.create') }}" class="btn btn-dark btn-sm">Create</a>
        </div>

        <!-- Table Content -->
        <div class="container-fluid py-4">
            <x-message></x-message>

            <div class="card shadow-sm">
                <div class="card-body p-3">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="60">ID</th>
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th width="150">Created At</th>
                                    <th width="220">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($articles->isNotEmpty())
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->author }}</td>
                                            <td>{{ \Carbon\Carbon::parse($article->created_at)->format('d M, y') }}</td>
                                            <td>
                                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-dark btn-sm me-1">Edit</a>
                                                <button type="button" onclick="deleteArticle({{ $article->id }})" class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No articles found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $articles->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    function deleteArticle(id){
        if(confirm("Are you sure you want to delete this article?")){
            $.ajax({
                url: '{{ route("articles.destroy") }}',
                type: 'DELETE',
                data: {id:id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response){
                    window.location.href = '{{ route("articles.index") }}';
                }
            });
        }
    }
</script>
@endsection
