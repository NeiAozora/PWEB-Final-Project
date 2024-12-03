<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListDestinationController extends Controller
{
    public function index(Request $request){
        $categories = [
            'Alam',
            'Budaya & Sejarah',
            'Kuliner',
            'Religi',
            'Rekreasi',
            'Pantai & Bohari'
        ];

        $locations = [
            'Jawa Timur',
            'Jawa Barat'
        ];

        return view('visitor-pages.pages.list-tempat-wisata', compact('categories', 'locations'));
    }

    public function getDestinations(Request $request)
    {
        // Define dummy data for destinations
        $destinations = collect([
            [
                'id' => 1,
                'name' => 'Pantai Bali',
                'address' => 'Jl. Pantai, Bali',
                'image' => 'https://placehold.co/286x198.png?text=Bali+Beach',
                'price' => 500000,
                'avg_rating' => 4.5
            ],
            [
                'id' => 2,
                'name' => 'Gunung Bromo',
                'address' => 'Bromo Tengger Semeru, East Java',
                'image' => 'https://placehold.co/286x198.png?text=Mount+Bromo',
                'price' => 350000,
                'avg_rating' => 4.0
            ],
            [
                'id' => 3,
                'name' => 'Pulau Komodo',
                'address' => 'Komodo National Park, Nusa Tenggara',
                'image' => 'https://placehold.co/286x198.png?text=Komodo+Island',
                'price' => 750000,
                'avg_rating' => 5.0
            ],
            [
                'id' => 4,
                'name' => 'Kota Jakarta',
                'address' => 'Jl. Thamrin, Jakarta',
                'image' => 'https://placehold.co/286x198.png?text=Jakarta+City',
                'price' => 300000,
                'avg_rating' => 3.5
            ],
            // Add more dummy data as needed
        ]);

        // Pagination logic
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 8);

        $totalDestinations = $destinations->count();
        $totalPages = ceil($totalDestinations / $limit);

        $pagedDestinations = $destinations->forPage($page, $limit);

        // Return JSON response
        return response()->json([
            'destination' => $pagedDestinations,
            'current_page' => $page,
            'total_pages' => $totalPages
        ]);
    }


}
