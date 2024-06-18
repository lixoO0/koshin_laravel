@if ($item->exists)
    <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
    @method('PATCH')
 @else
    <form method="POST" action="{{ route('blog.admin.categories.store') }}">
 @endif
