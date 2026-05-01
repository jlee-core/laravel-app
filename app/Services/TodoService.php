<?php

namespace App\Services;

use App\Models\Todo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class TodoService
{
    public function create(array $data, ?UploadedFile $attachment = null): Todo
    {
        $attachmentPath = null;
        if ($attachment) {
            $attachmentPath = $attachment->store('todos', 'public');
        }
        return Todo::create([
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'body' => $data['body'] ?? null,
            'attachment_path' => $attachmentPath,
            'is_done' => false,
            'user_id' => Auth::id(),
        ]);
    }
}
