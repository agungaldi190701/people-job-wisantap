<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Rating;
use Illuminate\Http\Request;

class ratingController extends Controller
{
    public function rating($id)
    {
        $rating = Destinasi::select('*')->where('id', $id)->get();
        return view('content.rating', [
            'rating' => $rating,
        ]);
    }

    public function storeRating(Request $request)
    {
        $pesan = [
            'required' => 'attribute wajib diisi',
            'mimes' => 'File harus berupa file jpg,png,jpeg',
        ];

        $this->validate($request, [
            'rating' => 'required',
        ], $pesan);

       

        $rating = new Rating;
        $rating->rating = $request->rating;
        $rating->destinasis_id = $request->destinasis_id;
        $rating->user_id = $request->user_id;
        $rating->save();

        return redirect('/detail/'. $request->destinasis_id)->with(['success' => 'Rating Berhasil Ditambahkan']);
    }
}
