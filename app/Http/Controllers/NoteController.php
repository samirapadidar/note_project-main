<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\Interfaces\NoteServiceInterface;
use App\Http\Requests\CreateNote;
use App\Http\Requests\EditNote;

class NoteController extends Controller
{
    /**
     * Property Note
     * @var NoteServiceInterface
     */
    private NoteServiceInterface $note_service;

    /**
     * injecting dependencies
     * @param NoteServiceInterface $note_service
     */
    public function __construct(NoteServiceInterface $note_service)
    {
        $this->note_service = $note_service;
    }

    /**
     * Get And Return a Note
     * Route: Web/notes/update/{id}
     * Method:get
     * @param int $id
     * @return View
     */
    public function getNote(int $id): View
    {
        return $this->note_service->getNote(id: $id);
    }

    /**
     * Get And Return a Note details for show note`s content
     * Route: Web/notes/details/{id}
     * Method:get
     * @param int $id
     * @return View
     */
    public function getNoteDetail(int $id): View
    {
        return $this->note_service->getNoteDetail(id: $id);
    }

    /**
     * Show All Notes
     * Method:get
     * Return Get All Notes
     * @return View
     */
    public function getAllNotes(): View
    {
        return $this->note_service->getAllNotes();
    }

    /**
     * Create New Note
     * Route: Web/notes/create
     * Method:post
     * Return  RedirectResponse
     * @param CreateNote $request
     * @return RedirectResponse
     */
    public function createNote(CreateNote $request): RedirectResponse
    {
        $data = $request->getData();
        return $this->note_service->createNote(data: $data);
    }

    /**
     * Update Single Note
     * Method:put
     * Return RedirectResponse
     * @param EditSocialMedia $request
     * @return RedirectResponse
     */
    public function updateNote(EditNote $request): RedirectResponse
    {
        $data = $request->getData();
        $note_id = $request->getNoteId();
        return $this->note_service->updateNote(id: $note_id, data: $data);
    }
}
