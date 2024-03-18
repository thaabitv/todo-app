<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GithubIssuesController extends Controller
{
    public function index()
    {
        // Replace 'your-access-token' with your actual GitHub personal access token
        $accessToken = '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';

        // Initialize Guzzle HTTP client
        $client = new Client();
        
        // Make a GET request to GitHub API to fetch issues from 'john_doe/my-project' repository
        $response = $client->get('https://api.github.com/repos/thaabiv/todo-app/issues', [
            'headers' => [
                'Authorization' => 'Bearer '.$accessToken,
                'Accept' => 'application/vnd.github.v3+json',
            ]
        ]);

        // Decode JSON response
        $issues = json_decode($response->getBody()->getContents(), true);
        
        // Pass fetched issues data to the view
        return view('github-issues.index', ['issues' => $issues]);
    }
}