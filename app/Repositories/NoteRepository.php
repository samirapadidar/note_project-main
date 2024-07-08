<?php

namespace App\Repositories;

use App\Models\Note;
use App\Repositories\Interfaces\NoteRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;

class NoteRepository implements NoteRepositoryInterface
{
    /**
     * Get And Return Tag
     * @param int $id
     * @return Tag
     */
    public function getNote(int $id): Note
    {
        return Note::findOrFail($id);
    }

    /**
     * Get And Return All Notes
     * @param int $count
     * @return AbstractPaginator
     */
    public function getAllNotes(): Collection
    {
        return Note::all();
    }

    /**
     * Create New Note
     * @param array $data
     * @return Note|false
     */
    public function createNote(array $data): Note|false
    {
        $note = new Note();
        $note->title = $data['title'];
        $note->content = $data['content'];
        $note->category_id = $data['category_id'];
        try {
            $note->save();
        } catch (QueryException $e) {
            Log::error(trans('repository.note.create_error') . $e->getMessage());
            return false;
        }
        return $note;
    }

    /**
     * Update Single Note
     * @param Note $note
     * @param array $data
     * @return Note|false
     */
    public function updateNote(Note $note, array $data): Note|false
    {
        if (isset($data['title'])) {
            $note->title = $data['title'];
        }
        if (isset($data['content'])) {
            $note->content = $data['content'];
        }
        if (isset($data['category_id'])) {
            $note->category_id = $data['category_id'];
        }
        try {
            $note->save();
        } catch (QueryException $e) {
            Log::error(trans('repository.note.create_error') . $e->getMessage());
            return false;
        }
        
        return $note;
    }
}

