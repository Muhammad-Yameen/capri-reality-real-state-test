<?php

namespace App\Http\Livewire;

use App\Interfaces\ApiRequestInterface;
use App\Models\User;
use App\Traits\WithApiRequests;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Users extends Component implements ApiRequestInterface
{
    use WithApiRequests;

    public $title = '';
    public $apiUrl = '';
    public $headers = [];
    public $users = [];

    public function mount()
    {
        $this->apiUrl =  'https://cspf-dev-challenge.herokuapp.com';
        $this->getUsers();
    }

    public function getUsers()
    {
        $response =  $this->getDataFromApi($this->apiUrl);
        if ($response) {
            $this->title = $response['title'];
            $this->headers = $response['data']['headers'];
            $this->users = User::all();
        }
    }

    public function getForceFullyDataFromApi()
    {
        $this->clearApiCache();
        $this->getUsers();
        session()->flash('message', 'The cache has been cleared, and fresh data has been listed from the API.');

    }

    public function render()
    {
        return view('livewire.users');
    }
}
