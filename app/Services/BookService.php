<?php 

namespace App\Services;
use Google\Client;
use Google_Service_Books;

class BookService {


    private $service;

    public function __construct()
    {
        $client = new Client();
        $client->setApplicationName(env('GOOGLE_APPLICATION_NAME'));
        $client->setDeveloperKey(env('GOOGLE_DEVELOPER_KEY'));

        $this->service = new Google_Service_Books($client);

    }


    public function getBooks(array $query)
    {
        return $this->service->volumes->listVolumes($query);
    }
}