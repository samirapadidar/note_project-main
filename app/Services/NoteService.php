<?php

namespace App\Services;

use App\Repositories\Interfaces\NoteRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\Interfaces\NoteServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class NoteService implements NoteServiceInterface
{
    /**
     * Inject Note Repository
     * @var NoteRepositoryInterface
     * @var CategoryRepositoryInterface
     */
    private NoteRepositoryInterface $note_repository;
    private CategoryRepositoryInterface $category_repository;

    /**
     * Dependency Injection  By Service Container
     * @param NoteRepositoryInterface $note_repository
     * @param CategoryRepositoryInterface $category_repository
     */
    public function __construct(NoteRepositoryInterface $note_repository, CategoryRepositoryInterface $category_repository)
    {
        $this->note_repository = $note_repository;
        $this->category_repository = $category_repository;
    }

    /**
     * Get Note
     * @param int $id
     * @return JsonResponse
     */
    public function getNote(int $id): View
    {
        $note = $this->note_repository->getNote(id: $id);
        $categories = $this->category_repository->getAllCategories();
        return view('notes.edit', ['note' => $note, 'categories' => $categories]);
    }

    /**
     * Get And Return a Note details for show note`s content
     * @param int $id
     * @return View
     */
    public function getNoteDetail(int $id): View
    {
        $note = $this->note_repository->getNote(id: $id);
        return view('notes.singleNote', ['note' => $note]);
    }

    /**
     * Get All notes
     * @return View
     */
    public function getAllNotes(): View
    {
        $notes = $this->note_repository->getAllNotes();
        $categories = $this->category_repository->getAllCategories();
        return view('notes.list', ['notes' => $notes, 'categories' => $categories]);
    }

    /**
     * create New Nots
     * @param array $data
     * @return RedirectResponse
     */
    public function createNote(array $data): RedirectResponse
    {
        $result = $this->note_repository->createNote(data: $data);
        if (!$result) {
            Log::error(trans('response.note.create_error'));
            return redirect('notes')->with('error', 'Note failed to create!');
        }
        return redirect('notes')->with('successfully', 'Note created successfully');
    }

    /**
     * Update Exist Note
     * @param int $id
     * @param array $data
     * @return RedirectResponse
     */
    public function updateNote(int $id, array $data): RedirectResponse
    {
        $note = $this->note_repository->getNote(id: $id);
        $result = $this->note_repository->updateNote(note: $note, data: $data);
        if (!$result) {
            Log::error(trans('response.note.update_error'));
            return redirect('notes')->with('error', 'Note failed to update!');
        }
        return redirect('notes')->with('successfully', 'Note updated successfully');
    }
}
