<?php

namespace App\Services\Interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface NoteServiceInterface
{
    /**
     * Get Note
     * @param int $id
     * @return View
     */
    public function getNote(int $id): View;

    /**
     * Get All Note
     * @return View
     */
    public function getAllNotes(): View;

    /**
     * create New Note
     * @param array $data
     * @return RedirectResponse
     */
    public function createNote(array $data): RedirectResponse;

    /**
     * Update Exist Note
     * @param int $id
     * @param array $data
     * @return RedirectResponse
     */
    public function updateNote(int $id, array $data): RedirectResponse;
}
