<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use App\Models\Recording;
use App\Models\Todo;

class BucketTodosController extends Controller
{
    public function index(Bucket $bucket)
    {
        return view('bucket-todos.index', [
            'bucket' => $bucket,
            'recordings' => $bucket->recordings()
                ->latest()
                ->with(['recordable', 'parent', 'creator'])
                ->get(),
        ]);
    }

    public function show(Bucket $bucket, Recording $recording)
    {
        return view('bucket-todos.show', [
            'bucket' => $bucket,
            'recording' => $recording,
        ]);
    }

    public function create(Bucket $bucket)
    {
        return view('bucket-todos.create', [
            'bucket' => $bucket,
            'recording' => $bucket->recordings()->make(),
            'todo' => new Todo(),
        ]);
    }

    public function store(Bucket $bucket)
    {
        $recording = $bucket->record($this->newTodo());

        return redirect()->route('buckets.todos.show', [
            'bucket' => $bucket,
            'recording' => $recording,
        ]);
    }

    public function edit(Bucket $bucket, Recording $recording)
    {
        return view('bucket-todos.edit', [
            'bucket' => $bucket,
            'recording' => $recording,
        ]);
    }

    public function update(Bucket $bucket, Recording $recording)
    {
        $recording->update([
            'recordable' => tap($this->newTodo())->save(),
        ]);

        return redirect()->route('buckets.todos.show', [
            'bucket' => $bucket,
            'recording' => $recording,
        ]);
    }

    public function destroy(Bucket $bucket, Recording $recording)
    {
        $recording->delete();

        return redirect()->route('buckets.todos.index', $bucket);
    }

    private function newTodo(): Todo
    {
        return new Todo(request()->validate([
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]));
    }
}
