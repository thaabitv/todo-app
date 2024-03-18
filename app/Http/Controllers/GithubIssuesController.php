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
        
        // Make a GET request to GitHub API to fetch issues from 'thaabitv/todo-app' repository
        $response = $client->get('https://api.github.com/repos/thaabitv/todo-app/issues', [
            'headers' => [
                'Authorization' => 'Bearer '.$accessToken,
                'Accept' => 'application/vnd.github.v3+json',
            ]
        ]);

        // Check if the request was successful
        if ($response->getStatusCode() == 200) {
            // Decode JSON response
            $issues = json_decode($response->getBody()->getContents(), true);
            
            // Pass fetched issues data to the view
            return view('github-issues.index', ['issues' => $issues]);
        } else {
            // Handle the case when fetching issues fails
            return redirect()->back()->with('error', 'Failed to fetch issues.');
        }
    }

    public function create()
    {
        // Add logic to display the form for creating a new issue
        return view('github-issues.create');
    }

    public function createIssue(Request $request)
    {
        // Replace 'your-access-token' with your actual GitHub personal access token
        $accessToken = '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';

        // Initialize Guzzle HTTP client
        $client = new Client();
        
        // Make a POST request to create a new GitHub issue
        $response = $client->post("https://api.github.com/repos/thaabitv/todo-app/issues", [
            'headers' => [
                'Authorization' => 'Bearer '.$accessToken,
                'Accept' => 'application/vnd.github.v3+json',
            ],
            'json' => [
                'title' => $request->input('title'), // Get title from the request
                'body' => $request->input('body'), // Get body from the request
            ]
        ]);

        // Check if the request was successful
        if ($response->getStatusCode() == 201) {
            return redirect()->back()->with('success', 'Issue created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create issue.');
        }
    }

    public function closeIssue($issue)
    {
        // Replace 'your-access-token' with your actual GitHub personal access token
        $accessToken = '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';

        // Initialize Guzzle HTTP client
        $client = new Client();
        
        // Make a PATCH request to close the GitHub issue
        $response = $client->patch("https://api.github.com/repos/thaabitv/todo-app/issues/{$issue}", [
            'headers' => [
                'Authorization' => 'Bearer '.$accessToken,
                'Accept' => 'application/vnd.github.v3+json',
            ],
            'json' => ['state' => 'closed'] // Set the issue state to 'closed'
        ]);

        // Check if the request was successful
        if ($response->getStatusCode() == 200) {
            return redirect()->back()->with('success', 'Issue closed successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to close issue.');
        }
    }
}
