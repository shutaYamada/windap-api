<?php

namespace App\UseCases\WindNote;

use App\Http\Requests\WindNote\WindNoteDeleteRequest;
use App\Models\WindNote;
use Illuminate\Http\Request;

class WindNoteDeleteAction
{
    public function __invoke($windNote)
    {
        $windNote->delete();

        return response()->json([
            'message' => 'ノートを削除しました',
            'data' => $windNote
        ], 200);
    }
}