<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public function getTagsState()
    {
      $models = DB::table('tagables')
            ->select('tagable_type')
            ->distinct()
            ->get();

      $models_colection = collect();
      foreach ($models as $model) {
        $items_colection = collect();
        $items = $model->tagable_type::select('id', 'name')->get();
         foreach ($items as $item) {
           $item->tags;
           $item->model = $model->tagable_type;
           $items_colection->push($item);
         }
         $models_colection->push($items_colection);
      }

      $data = [
        'models' => $models_colection,
        'tags' => Tag::all(),
          ];

      return $data;

    }

    public function setTag(Request $request)
    {
      $item = $request->model_type::find($request->model_id);
      // attach
      $item->tags()->attach([
           $request->id,
        ]);

        return response()->json(['success' => true]);

      // code...
    }
}
