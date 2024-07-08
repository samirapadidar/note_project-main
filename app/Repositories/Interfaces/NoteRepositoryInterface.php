<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Note;

interface NoteRepositoryInterface
{
    /**
     * Get And Return Single Note
     * @param int $id
     * @return Note
     */
    public function getNote(int $id): Note;

    /**
     * Get And Return All Note
     * @param int $count
     * @return Collection
     */
    public function getAllNotes(): Collection;

    /**
     * Create New Note
     * @param array $data
     * @return Note|false
     */
    public function createNote(array $data): Note|false;

    /**
     * Update Single Note
     * @param Note $note
     * @param array $data
     * @return Note|false
     */
    public function updateNote(Note $note, array $data): Note|false;
}
