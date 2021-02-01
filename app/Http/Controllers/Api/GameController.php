<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\TraitApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\GameLog;
use App\Models\Words;
use App\Models\User;

class GameController extends Controller
{
    use TraitApi;

    /**
     * get word
     */
    public function wordData()
    {
        $data   = Words::where('is_active',1)->get()->toArray();
        return $data[array_rand($data,1)];
    }

    /**
     * return word 
     */
    public function getWords()
    {
        return $this->responseApi('ok',$this->wordData(),'ok');
    }

    /**
     * add new word
     */
    public function addWords(Request $request)
    {
        $data = $request->all();
        Words::create($data);
        return $this->responseApi('ok','','New Word Add');
    }

    /**
     * update score user
     */
    public function updateScore(Request $request)
    {
        $data           = $request->all();
        $user           = Auth::user();
        log::error($data);
        /** insert to game log  */
        $game_log['user_id'] = $user->id;
        $game_log['word_id'] = $data['word_id'];
        $game_log['result']  = ($data['answer'] == 1) ? true : false;
        GameLog::create($game_log);

        /**update user score */
        $score          = ($data['answer'] == 1) ? 10 : -10;
        $final_score    = (int)$user->score + $score;
        User::where('id',$user->id)->update(['score' => $final_score]);

        return $this->responseApi('ok','','Update score success');
    }
}
