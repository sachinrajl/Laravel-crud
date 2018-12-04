<?php

namespace App\Http\Controllers;

use DB;

class RajyogFilmController extends Controller
{
    public function updateEntryTime()
    {
        $users = DB::table('tbl_users')->select('id', 'entry_time')
        ->get();

        $i = 1;
        foreach ($users as $user):
            $time = '+' . $i . ' minute';

            //Added 1 min
            $addMinute = date('Y-m-d H:i:s', strtotime($time . ' ' . $user->entry_time));

            if ($user->entry_time) {
                echo $user->entry_time . '=> ' . $addMinute . "<br/>";

                /* $response = DB::table('tbl_users')
            ->where('id', $user->id)
            ->update(['entry_time' => $addMinute]); */
        }
        $i++;
        endforeach;

    }
        
}
