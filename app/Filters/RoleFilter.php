<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is not authenticated
        if (!session('is_logged_in')) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        // If role is not matching
        if ($arguments && !in_array(session('role'), $arguments)) {
            return redirect('/profile')->with('error', 'You do not have permission to view this page.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 
    }
}
