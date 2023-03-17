<?php


namespace App\Traits;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

trait WithApiRequests
{
    public function getDataFromApi(string $apiUrl)
    {
        return Cache::remember('users', 3600, function () use ($apiUrl) {
            $response = Http::get($apiUrl);
            if ($response->ok()) {
                $data =  $response->json();
                $this->saveData($data['data']['rows']);
                return $data;
            }
            return null;
        });
    }

    public function clearApiCache()
    {
        Cache::forget('users');
    }

    public function saveData($users)
    {
        foreach ($users as $user) {
            User::updateOrCreate([
                'email' => $user['email'],
            ],[
                'id' => $user['id'],
                'name' => $user['fname'],
                'lname' => $user['lname'],
                'email' => $user['email'],
                'password' => bcrypt('password'),
                'created_at' => Carbon::createFromTimestamp($user['date']),
            ]);
        }
        return true;
    }
}
